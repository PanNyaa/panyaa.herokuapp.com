：<?php

ini_set( 'display_errors', 1 );                     //エラーメッセージを表示する設定にする

/**https://github.com/kunalvarma05/dropbox-php-sdk/wiki/Configuration */
/**上記SDKに自作関数を組み込んだりする為のラッパーです */

//require('vendor/autoload.php');

/** メインっぽいやつだけ as 以降の名前で使えるように */
use Kunnu\Dropbox\Dropbox as dbx;
use Kunnu\Dropbox\DropboxApp as dbxApp;
use Kunnu\Dropbox\DropboxFile as dbxFile;





/** SDKから継承して自作関数を仕込めるようにする群 */
class ExDropbox extends dbx {

    public function __construct($app)
    {
        //継承されるとコンストラクタが実行されるので継承元の親クラスにそのまま引数を渡す
        parent::__construct($app);
    }


    //Dropbox内のファイルパスを指定してファイル内容を返す関数
    public function getFileContents($filename)
    {
        return $this->download($filename)->getContents();
    }


    /**phpのテンポラリに文字列を書き込んでファイルとしてアップロードしちゃう関数
     * 第一引数：Dropboxへのファイルパス
     * 第二引数：ファイル内容となる文字列
     * 第三引数：mode(同名ファイルの場合は別名で保存:"add" 、上書き保存:"overwrite") 
     * 第四引数：autorename("true" or "false")
     * 第五引数：mute("true" or "false")
     * 
     * 第一引数にファイルパス、第二引数に文字列を渡すだけでその名前でその内容のファイルがDropBoxに生成されます
     * 第三引数以降は可変オプションです。指定しない場合、デフォルトでは ["mode" => "add"],["autorename" => false],["mute" => false]になります
     * 上書き保存したい場合は第三引数に ["mode" => "overwrite"] を指定してください
    */
    public function uploadFileContents(...$arguments) 
    {

        //デフォルトパラメータをセット
        $parameters = array(null,null,["mode" => "add"],["autorename" => false],["mute" => false]);

        //デフォルトパラメータを渡された引数で上書き
        foreach ($arguments as $key => $value) {
            $parameters[$key] = $value;
        }
        unset($value);

        if( !$parameters[0] || !$parameters[1]){
            echo "uploadFileContentsに指定したファイルパスか文字列がnullです\n";
            return false;
        }
        
        //bオプションをつけないとアップロードしても0byteのファイルになっちゃう？のでbオプション必須
        $ramStream = fopen('php://memory', 'w+b');
        rewind($ramStream);

        //渡された文字列をphpテンポラリに出力
        fputs($ramStream,  $parameters[1]);
        rewind($ramStream);

        //ファイルをアップロード
        //の前にDropboxファイルストリームを生成(これが無いとだめっぽい)
        $dropboxFile = dbxFile::createByStream($parameters[0], $ramStream);
        $this->upload($dropboxFile,$parameters[0],$parameters[2],$parameters[3],$parameters[4])->getName();

        fclose($ramStream);
        return true;
    }

}

class ExDropboxApp extends dbxApp {

    public function __construct(string $clientId, string $clientSecret, string $accessToken = null) {
        //継承元の親クラスにそのまま引数を渡す
        parent::__construct($clientId,$clientSecret,$accessToken);
    }

}



?>