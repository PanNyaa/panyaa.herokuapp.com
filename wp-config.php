<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', getenv('SQL_DB_NAME'));



////////////////////////////////////////////////////////////////////////////////////////
//残念だったな！！！パスワードやらなんやらは環境変数に置いてきたぜ！！！！！！！！！！//
////////////////////////////////////////////////////////////////////////////////////////

//////////////////////
//  getenvはいいぞ  //
//////////////////////


/** MySQL データベースのユーザー名 */
define('DB_USER', getenv('SQL_DB_USER'));

/** MySQL データベースのパスワード */
define('DB_PASSWORD', getenv('SQL_DB_PASS'));

/** MySQL のホスト名 */
define('DB_HOST', getenv('SQL_DB_HOST'));

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

//なんかこれがないと旧ブログにリダイレクトされちゃうっぽい？
define('WP_HOME','http://panyaa.herokuapp.com');
define('WP_SITEURL','http://panyaa.herokuapp.com');

//管理画面からPHPの編集をできなくするやつらしいです
define('DISALLOW_FILE_EDIT', true);

//ログインや管理画面を強制的にSSL通信にするやつらしいです
define('FORCE_SSL_ADMIN', true);
if ( ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) {
       $_SERVER['HTTPS']='on';
}

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
 
/* 認証用ユニークキー変更 2016/09/02 の夜 */
define('AUTH_KEY',         'XK_GC|nV&]:W$/Q(OrT)CBvOfQXwseFg/8jS+a/3x-fGt9B{w*QpFeES)rEvP_]A');
define('SECURE_AUTH_KEY',  'vAf5OWk1Ke#lbVJ[IYeiIrtcfe<+&l=,0>U+8E-p6pn1A{VF-Rd:O]lrYPe)x03_');
define('LOGGED_IN_KEY',    'sxwW+{nB2WgzV-k%$|-OZp__X(BK<8Yb,%>-.jbu-V<#DeUE=B?Dj*gy~6rZN2_C');
define('NONCE_KEY',        '9qP+?9Z3e6@c~*j9LYVUN,-?i [nPDnm`=S+Y:]~~,9u{<L22_`S.o+ *d+(uD4u');
define('AUTH_SALT',        'hu2~tMLK1=(@izJ5]Mc -GvAxbd1pKMl!UCohWY/_;#/w[M6[#1+}sJKUev6C?#(');
define('SECURE_AUTH_SALT', 'jR7AiWFaI+~GoX+Q17M@-p9-3DWML;, {u|k4Z@+;{pi3-o__0Fpg%F*PyL{Lw{`');
define('LOGGED_IN_SALT',   '=Vp8-_vs)D* [:G}|_!{k!O<,!ns;xIWJ#+^?+9n@+v~~G3PPdkVH9NItn`@~if ');
define('NONCE_SALT',       '9<ll~q3;jGy6g=U%F-y&o )ADDBQFlpToN&y_zVRo*lQ[C&Y`HG<s#04A:QgdgdN');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_20151013';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
