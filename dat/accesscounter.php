<?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);   //Deprecated 抑制
    date_default_timezone_set('Asia/Tokyo');            //タイムゾーンを日本に設定しま～～～す
    ini_set( 'display_errors', 1 );                     //エラーメッセージを表示する設定にする
    //手動で配置したdropbox-sdkを読み込む。ファイルパスはphpの場所に応じて適宜書き換えてください。
    //require_once dirname(__FILE__)."/../../../lib/Dropbox/autoload.php";
    require('../vendor/autoload.php'); //heroku上にdropbox-sdkがインストールできたのでどこからでもお手軽インクルード
    // \Dropbox を dbx としても記述できるように定義する
    use \Dropbox as dbx;
    //自作関数を入れるので新しいクラスを dbx\Client から継承して作る、継承むずかしいです！！
    class PanyaaExtends extends dbx\Client
    {
        //PanyaaExtendsをnewしたときに引数を書くとここに読み込まれる
        //引数にはアクセストークンを指定します
        public function __construct($accessToken,$AppName)
        {
            parent::__construct($accessToken,$AppName);
        }
        //phpのテンポラリを利用してdropboxからデータを読み込んで返す関数
        //たぶん $client->getFileContents("/data/a.dat") とかいう風にやれば読み込んだ文字列を返してくれる？
        //もうちょっと綺麗な場所に書きたいぞい……（ぼやき
        public function getFileContents($filename)
        {
            $stream = fopen('php://memory', 'w+');
            $this->getFile($filename, $stream);
            rewind($stream);
            $fileContents = stream_get_contents($stream);
            fclose($stream);
            return $fileContents;
        }
        //phpの○ンポラリに文字列を書き込んでファイルとしてアップロードしちゃう関数
        //ファイルパスと文字列を渡すだけでその名前でその内容のファイルがDropBoxに生成されます
        // dbx\WriteMode::force() を指定しているので、ファイルは上書き保存されます
        public function uploadFileContents($filename,$str)
        {
            $stream = fopen('php://memory', 'w+b');//bオプションをつけないとアップロードしても0byteのファイルになっちゃう？のでbオプション必須
            rewind($stream);
            fputs($stream, $str);
            rewind($stream);    //めっちゃrewindしてるけどこうしないと正しい内容がアップロードされない
            $this->uploadFile($filename, dbx\WriteMode::force(), $stream);
            fclose($stream);
            return true;
        }
    }
    //クラスを変数に定義、アクセストークンはここで指定します。getenv()でheroku上に設定した環境変数から読み込んでいます。第二引数は適当な文字列で良いっぽいです
    $client = new PanyaaExtends(getenv('DROPBOX_ACCESS_TOKEN'),"panyaa");
    $countdata = "0 0 0 0"; //仮データを入れておく
    $counts = [0];
    $ip = $_SERVER['REMOTE_ADDR'];  //アクセス元のIPアドレスを取得
    $ipdata = "0.0.0.0 0.0.0.0";;   //仮データを入れておく
    $iptable = [0];
    $path_countdata = "/data/countdata.dat";    //ファイルパスなので適宜いじってください
    $path_ipdata = "/data/ipdata.dat";          //※ファイルパスの先頭には / もしくは ./ が必須なようです(無い場合はsdk側でエラーが出る)
                                                //例えば /data/a.dat と指定した場合、アプリケーション指定したフォルダの直下にdata/a.datが生成されます
                                                //例えば ./data/a.dat と指定した場合、このphpを実行しているフォルダの場所の構成がそのままアプリケーション指定したフォルダの直下に生成されます
                                                //例えばheroku上で /wp-content/themes/plain-blog/accsesscounter.php で実行している場合、./data/a.dat と指定すると、
                                                //      (アプリケーションフォルダ名)/app/wp-content/themes/plain-blog/data/a.dat が生成されます(/app/が間に挟まるのはherokuの特性です)
    $flag = true;
    $countdata = $client->getFileContents($path_countdata); //dropboxからファイル(これはアクセス数カウントデータ)を読み込んで文字列に返す
    $counts = split(" ", $countdata);   //トータルアクセス数・今日のアクセス数・昨日のアクセス数・日付データを半角スペースで分解して格納
    if(date("j") != $counts[3]) {       //日付確認（日付が変わった場合）
        $counts[3] = date("j");         //日付$count[3]を今日の日付に
        $counts[2] = $counts[1];        //昨日のカウント$count[2]を$count[1]に
        $counts[1] = 0;                 //今日のカウント$count[1]を0に
        $iptable = split(" ", $ipdata); //入っている仮データを分割して配列にぽいぽい
    }else{
        $ipdata = $client->getFileContents($path_ipdata);   //dropboxからファイル(これはipテーブル)を読み込んで文字列に返す
        $iptable = split(" ", $ipdata);                     //IPデータ群を半角スペース区切りで分解して配列にいれる
    }
    //直近100アクセス以内に同じIPアドレスがあったらカウントしない
    for($i=0;$i<100;$i++){
        if($ip === $iptable[$i]){
            $flag = false;
            break;
        }
    }
    if($flag){          //新しいIPの訪問者だった場合カウントする
        $counts[0]++;   //トータルカウント+1
        $counts[1]++;   //今日のカウント+1
        array_unshift($iptable,$ip);        //アクセス元IPアドレスを配列の最初にプッシュする、この関数便利です！
        $countdata = join(" ", $counts);    //counts配列に含まれる数値群を文字列に変換して格納する、区切り文字は半角スペース
        $ipdata = join(" ",$iptable);       //これも同じく
        $client->uploadFileContents($path_countdata,$countdata);    //文字列をファイルに書き込んでアップロード
        $client->uploadFileContents($path_ipdata,$ipdata);          //これも同じく
    }
    echo "<div class=\"counter-ty\">あくせすかうんた<br><br></div>\n";
    echo "<div class=\"counter-num\">",sprintf("%06d", $counts[0]),"</div>";
    echo "<div class=\"counter-ty\"><br>今日：", $counts[1], "　昨日：", $counts[2], "</div>\n";
?>