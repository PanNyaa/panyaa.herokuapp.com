

<style type"text/css">

/* Webフォントの読み込み */
/* Generated by Font Squirrel (http://www.fontsquirrel.com) on October 17, 2015 */
@font-face {
    font-family: 'cartoon_blocks_christmasRg';
    src:url('/WebFonts/cartoon_blocks_christmas-webfont-t.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

.counter-num {
    /* letter-spacing: -0.0vw; */
    font-family: "cartoon_blocks_christmasRg";
    font-size: 40px;
    color: #00c9ff;
    text-align: center;
    margin: -0.32em 0em -0.32em -0em;
    text-shadow: 0px 1px 0px rgba(0, 201, 255, 0.6),0px 2px 0px rgba(0, 201, 255, 0.3),0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0 5px #fff,0 0.08em 5px rgba(0,0,0,1),0 -0.04em 2px rgba(0,0,0,1);
    /* display: block; */
}

.counter-ty{
    font-size: 9px;
    color: #03D;
    line-height: 0.8;
    text-align: center;
    padding: 0em 0em 0.5em 0em;
}

</style>

<?php

    //渡されたリクエスト値をある程度正当なものかどうか判別する
    if(strlen($_REQUEST['fpk']) != 32)return -1; //ハッシュ値は32バイトなのでそれ以外の場合は不正な値とみなし処理を終了

    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);   //Deprecated 抑制
    date_default_timezone_set('Asia/Tokyo');            //タイムゾーンを日本に設定しま～～～す
    ini_set( 'display_errors', 1 );                     //エラーメッセージを表示する設定にする

    //手動で配置したdropbox-sdkを読み込む。ファイルパスはphpの場所に応じて適宜書き換えてください。
    //require_once dirname(__FILE__)."/../../../lib/Dropbox/autoload.php";
    //require_once('/app/vendor/autoload.php'); //heroku上にdropbox-sdkがインストールできたのでどこからでもお手軽インクルード
    require($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');  //Documentrootからvendorを読み込む…
    //namespace Controllers;

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
    $ipdata = "0.0.0.0 0.0.0.0";   //仮データを入れておく
    $iptable = [0];
    
    $fingerhash = $_REQUEST['fpk']; //ajaxで渡されたFingerPrintのハッシュデータを取得
    $fingerhashdata = "0000000000000000 0000000000000000";  //仮データを入れておく
    $fingerhashtable = [0];

    $path_countdata = "/data/countdata.txt";            //ファイルパスなので適宜いじってください
    $path_ipdata = "/data/ipdata.txt";                  //※ファイルパスの先頭には / もしくは ./ が必須なようです(無い場合はsdk側でエラーが出る)
    $path_fingerhashdata = "/data/fingerhashdata.txt";   //例えば /data/a.dat と指定した場合、アプリケーション指定したフォルダの直下にdata/a.datが生成されます
                                                        //例えば ./data/a.dat と指定した場合、このphpを実行しているフォルダの場所の構成がそのままアプリケーション指定したフォルダの直下に生成されます
                                                        //例えばheroku上で /wp-content/themes/plain-blog/accsesscounter.php で実行している場合、./data/a.dat と指定すると、
                                                        //  (アプリケーションフォルダ名)/app/wp-content/themes/plain-blog/data/a.dat が生成されます(/app/が間に挟まるのはherokuの特性です)
                                                        //絶対パスを指定すればそのままのパスでdropboxに作成されます
    $ipflag = true;
    $repeatflag = true;

    $countdata = $client->getFileContents($path_countdata); //dropboxからファイル(これはアクセス数カウントデータ)を読み込んで文字列に返す
    $counts = split(" ", $countdata);   //トータルアクセス数・今日のアクセス数・昨日のアクセス数・日付データを半角スペースで分解して格納

    if(date("j") != $counts[3]) {       //日付確認（日付が変わった場合）
        $counts[3] = date("j");         //日付$count[3]を今日の日付に
        $counts[2] = $counts[1];        //昨日のカウント$count[2]を$count[1]に
        $counts[1] = 0;                 //今日のカウント$count[1]を0に
        $fingerhashtable = split(" ", $fingerhashdata); //仮データを半角スペースで分解して配列に格納(FingerHash)、昨日の分を上書き
    }else{
        $fingerhashdata = $client->getFileContents($path_fingerhashdata);   //FingerHashテーブルもDropboxから読み込み
        $fingerhashtable = split(" ", $fingerhashdata);                     //FingerHashのデータ群も同じく分解し配列に格納
    }
    
    //IPログはずっと消さずにログをとっておきます
    $ipdata = $client->getFileContents($path_ipdata);
    $iptable = split(" ", $ipdata);
    
    //今日の分のIPログに同じIPアドレスがあったらカウントしない
    //(実際はIPアドレスを判別処理に使わずログを取ってるだけです)
    foreach ($iptable as &$value) {
        if($value === $ip){
            $ipflag = false;
            break;
        }
    }
    unset($value);
    
    //今日の分のFingerHashログに同じハッシュがあったらカウントしない
    foreach ($fingerhashtable as &$value) {
        if($value === $fingerhash){
            $repeatflag = false;
            break;  //同じハッシュがあったのでハッシュテーブルチェックをbreakでやめる
        }
    }
    unset($value);
    
    if($repeatflag){
        
        $counts[0]++;   //トータルカウント+1
        $counts[1]++;   //今日のカウント+1
        
        array_unshift($fingerhashtable,$fingerhash);        //FingerHash値を配列の最初にプッシュする

        $countdata = join(" ", $counts);    //counts配列に含まれる数値群を文字列に変換して格納する、区切り文字は半角スペース
        $fingerhashdata = join(" ", $fingerhashtable);       //これも同じく

        $client->uploadFileContents($path_countdata,$countdata);    //文字列をファイルに書き込んでアップロード
        $client->uploadFileContents($path_fingerhashdata,$fingerhashdata);          //これも同じく
    }
    
    echo "<div class=\"counter-ty\">あくせすかうんた<br><br></div>\n";
    echo "<div class=\"counter-num\">",sprintf("%06d", $counts[0]),"</div>";
    echo "<div class=\"counter-ty\"><br>今日：", $counts[1], "　昨日：", $counts[2], "</div>\n";
    
    if($ipflag){
        array_unshift($iptable,$ip);        //アクセス元IPアドレスを配列の最初にプッシュする
        $ipdata = join(" ",$iptable);
        $client->uploadFileContents($path_ipdata,$ipdata);
    }
    
?>

