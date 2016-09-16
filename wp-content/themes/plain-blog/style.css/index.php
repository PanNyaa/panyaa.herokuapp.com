<?php header('Content-type: text/css');?>

<?php

    class FSize{
        const DefaultFont           =   11;
        const MobileFont            =   self::DefaultFont * 0.75;    //モバイル環境用の文字サイズ
        const body                  =   self::DefaultFont / 100;
        const single_title          =   self::body *23  .'em';
        const page_title            =   self::body *22  .'em';
        const page_title_h1         =   self::body *25  .'em';
        const p                     =   self::body *15  .'em';
        const h_subscribe           =   self::body *20  .'em';
        const myprofile             =   self::body *10  .'em';
        const myprofile_c           =   self::body * 8  .'em';
        const myprofile_links       =   self::body *11  .'em';
        const content_wrap_h2       =   self::body *20  .'em';
        const copyright             =   self::body *12  .'em';
        const reply_title           =   self::body *20  .'em';
        const reply_title_a         =   self::body *15  .'em';
        const fn_says               =   self::body *14  .'em';
        const comment_meta_a        =   self::body *13  .'em';
        const footer_widget_h2      =   self::body *15  .'em';
        const footer_widget_li_a    =   self::body *13  .'em';
        const h1                    =   self::body *30  .'em';
        const h2                    =   self::body *30  .'em';
        const h3                    =   self::body *25  .'em';
        const h4                    =   self::body *20  .'em';
        const h5                    =   self::body *18  .'em';
        const h6                    =   self::body *15  .'em';
        const dt                    =   self::body *18  .'em';
        const dd                    =   self::body *15  .'em';
        const pre                   =   self::body *11.5.'em';
        const big                   =   self::body *20  .'em';
        const small                 =   self::body * 7.5.'em';
        const q_before              =   self::body *25  .'em';
        const q_after               =   self::body *25  .'em';
        const sub_sup               =   self::body *12  .'em';
        const tt                    =   self::body *13  .'em';
        const ul_li                 =   self::body * 9  .'em';
        const navigation_ul_li_a    =   self::body *13  .'em';
        const navigation_ul_ul_li_a =   self::body *13  .'em';
        const categories_row_ul     =   self::body *13  .'em';
    }
    
    class GSize{
        const wbg =   25;
    }
    
    class Path{
        const wbg_r   =   "/wp-content/themes/plain-blog/whitening_r.png";
        const wbg_l   =   "/wp-content/themes/plain-blog/whitening_l.png";
        const bg_haru =   "/wp-content/themes/plain-blog/harubg.png";
    }
    
?>

/* ！！！スタイルシート完全に理解した！！！ */
/*
Theme Name: Plain Blog
Author: NavThemes
Author URI: http://www.navthemes.com
Version: 1.6
License: GNU General Public License
License URI: http://www.gnu.org/licenses/gpl-3.0.en.html
Description: Plain Blog Theme is a minimal Blog theme From NavThemes.com. It can be used for any blog, simple yet elegant. Comes with and without sidebar page templates, it has inbuilt social sharing. It has four widget areas in footer, so you have flexibility to put anything in footer. Can be used for technology blog, travel blog, fitness blog, health blog, personal blog or any blogging purpose.
Text Domain: plain-blog
Theme URI: http://www.navthemes.com/plain-blog-theme
Tags: white, red, threaded-comments, custom-menu
*/

/* edit by pan_nyaa */
/* <font_c class="red">～～</p> で文字色を指定できるようにしたぞい！ */

font_c.red {
    color: #FF0000;
}
font_c.green {
    color: #00FF00;
}
font_c.blue {
    color: #0000FF;
}

/* タグクラウドの押しピン記号 */

.tagcloud a::before {
    color: rgba(255, 54, 0, 0.01);
    content: "📌";
    margin: 0em 0.27em 0em -1.0em;
    font-size: 0.7em;
    text-shadow: 0em -0.6em 0em #FF3F00;
    font-family: 'Segoe UI Symbol';
}
/* IE10とかのスクロールバーがコンテンツにかぶさるアレをなんとかするアレ */

@-ms-viewport {
    width: auto;
    initial-scale: 1;
}
@viewport {
    width: device-width;
    initial-scale: 1;
}
/* IEだけ画像縮小で汚くなる問題を解決する ＆ 画像のoutline消す */

img {
    -ms-interpolation-mode: bicubic;
    outline: none;
}
/* ヘッダーのCSSはだいたいTwitterWebのスタイルを参考にしました */

#title_img {
    outline: none;
    display: inherit;
    text-align: center;
    position: absolute;
    width: 95%;
}
#h_menu {
    height: 40px;
    /*outline: medium none;*/
    /*font-size: 3em;*/
    
    overflow: hidden;
    display: inherit;
    position: absolute;
    margin: 0em 0em 0em 0.2em;
    background-color: rgba(255, 255, 255, 0.01);
}
#h_menu:hover {
    width: 240px;
    height: 100px;
    opacity: 0.333;
    transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -webkit-transition: all 0.5s ease;
    background-color: rgba(0, 0, 0, 0.5);
}
#h_menu_item {
    outline: medium none;
    text-align: center;
}
#headerbar_fix {
    /*top: 0px;*/
    /* WordPressログイン中に表示されるヘッダーに被るので無効 */
    
    position: fixed;
    left: 0px;
    right: 0px;
    z-index: 1000;
    height: 48px;
    /* タイトル画像追加前40 */
    
    background: rgba(255, 255, 255, 0.66) none repeat scroll 0% 0%;
    border-bottom: 3px dotted rgba(0, 128, 255, 0.5);
}
#headerbar {
    position: relative;
    width: 100%;
    border-bottom: 3px dashed rgba(0, 128, 255, 0.25);
    height: 44px;
    /* タイトル画像追加前36 */
    
    display: inline-block;
}
.clear_fix {
    height: 24px;
}
.h_search_section {
    position: absolute;
    right: 0px;
    /* IE10のスクロールバーを被らなくしたのでお役御免 */
    /* top:0px; */
    /* 横並べをちゃんとdisplay:inlineでやったのでお役御免 */
    
    margin: 0.6em 0em 0em 0em;
    display: inherit;
}
.h_searchform {}
.h_subscribe {
    outline: none;
    background: rgba(255, 255, 255, 0.01) none repeat scroll 0% 0%;
    box-shadow: 0px -3px 4px 0px rgba(0, 0, 0, 0.2) inset;
    border-radius: 30px;
    border: 0px solid rgba(0, 224, 255, 0.85);
    color: rgba(170, 170, 170, 0.01);
    text-align: center;
    font-size: <?php echo FSize::h_subscribe;?>;
    padding: 0em;
    margin: 0em;
    /*width: 192px;*/
    /* いいのかなこれ・・・？レスポンシブ的なアレでうまくいかなかったりしてたら別の方法で横幅いじいじする */
    
    width: 24vw;
    /* 画面横幅に合わせて伸縮。CSS3 16だとスマホで小さいので24に*/
    /*vertical-align: bottom;*/
    /* IEではこれがないとずれる、firefoxでは有無にかかわらず正常表示 */
    
    line-height: 130%;
    /* こっちのほうが整った */
    /* 130%でIEとfirefox両方で整った */
    
    text-shadow: 0em -0.1em 0em rgba(170, 170, 170, 0.75);
    /* 擬似的に文字だけを上に少しずらす */
}
.h_subscribe::-webkit-input-placeholder {
    color: rgba(0, 0, 0, 0.01);
}
.h_subscribe_btn {
    outline: none;
    font-family: 'Segoe UI Symbol';
    /* Chromeでも絵文字が表示できるように。泥でも絵文字表示になった*/
    
    background: rgba(254, 93, 85, 0.85) none repeat scroll 0% 0%;
    color: rgba(255, 255, 255, 0.01);
    border: 0px solid rgba(254, 73, 65, 0.85);
    font-size: 20px;
    text-align: center;
    padding: 0em 0.25em;
    margin: 0em;
    border-radius: 30px;
    box-shadow: 0px -4px 4px 0px rgba(234, 53, 45, 0.85) inset;
    /*line-height:130%;*/
    /* こっちのほうが整った */
    /* 130%でIEとfirefox両方で整った */
    
    text-shadow: 0em -0.1em 0em rgba(255, 255, 255, 1);
    /* 擬似的に文字だけ上にずらす */
}
pre code {
    text-align: left;
}
/* されたコメントの背景を追加、白の透明度75%に */
/* 左右内部に余白を追加 */

#comments {
    background: rgba(255, 255, 255, 0.85);
    padding: 0.1em 3em 0em 3em;
}
/* アクセスカウンターをｵｻﾚに包む用 */
/* <div id="accesscounter"> ～ </div> */

#accesscounter {
    /*    background: rgba(255, 255, 255, 0.33) none repeat scroll 0% 0%;
    padding: 0em 3em;
    border: 2px outset rgba(0,224,255,0.15);
*/
    
    color: rgb(0, 85, 221);
    background: rgba(255, 255, 255, 0.50) none repeat scroll 0% 0%;
    padding: 0em 3em;
    border: 2px dotted rgba(0, 224, 255, 0.25);
    border-radius: 30px;
}
#myprofile {
    color: rgb(0, 85, 221);
    background: rgba(255, 255, 255, 0.50) none repeat scroll 0% 0%;
    padding: 0.25em 1.5em;
    border: 2px dotted rgba(0, 224, 255, 0.25);
    border-radius: 30px;
    font-size: <?php echo FSize::myprofile;?>;
}
#myprofile_c {
    padding: 0.5em 0em 0em 1em;
    font-size:<?php echo FSize::myprofile_c;?>;
}
#myprofile_links_wrap {
    background: rgba(255, 255, 255, 0.50) none repeat scroll 0% 0%;
    border: 2px dotted rgba(0, 224, 255, 0.25);
    border-radius: 30px;
}
#myprofile_links {
    color: rgb(0, 85, 221);
    padding: 0.25em 1.51em 0.5em 1.5em;
    font-size:<?php echo FSize::myprofile_links;?>;
}
#myprofile_links_c {
    padding: 0.0em 0em 0em 0.91em;
    margin: -0.1em 0em 0em 0em;
}
#sns_bts {
    vertical-align: top;
    z-index: 1000;
    position: fixed;
    border-radius: 30px;
    padding: 0.25em 1em;
    box-shadow: 0px 12px 10px -4px #FFF inset, 0px -6px 10px 4px #CCD inset;
    text-align: center;
    left: 0.5em;
    bottom: 0.5em;
    /* 古いの↓ */
    /*
    text-align: left;
	background: rgba(255, 255, 255, 0.33) none repeat scroll 0% 0%;
	border: 2px dotted rgba(0, 224, 255, 0.25);
	border-radius: 30px;
	vertical-align: top;
	padding: 0em 1.5em;
*/
}
#sns_bts_cs {
    padding: 0.5em;
    display: inline-block;
    vertical-align: inherit;
    margin: 0em 0em -0.4em 0em;
}
.tagcloud {
    position: relative;
    overflow: hidden;
    /* padding: 0 22px 0 14px; */
    
    text-align: left;
}
.tagcloud a {
    display: inline-block;
    background: rgba(255, 252, 233, 0.9) none repeat scroll 0% 0%;
    white-space: nowrap;
    line-height: 1.0;
    padding: 6px 6px 9px 15px;
    margin: 0px 5px 5px 0px;
    text-decoration: none;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    box-shadow: 0px -3px 3px rgba(205, 46, 0, 0.2) inset, 1px -0px 3px rgba(205, 46, 0, 0.2);
}
.tagcloud a:hover {
    /* color: #b54f41; */
    
    background: #FFF9D6 none repeat scroll 0% 0%;
    text-decoration: underline;
}
/* 自分用スタイルここまで */
/* Hyper text
------------------------------------------------- */

a {
    /*\*/
    
    overflow: hidden;
    /* for Fx */
    /**/
    
    -webkit-transition: 200ms;
    -moz-transition: 200ms;
    -o-transition: 200ms;
    transition: 200ms;
    /* text glow */
}
a:link,
a:visited {
    color: #ff7800;
}
a:focus,
a:active {
    color: #ff3000;
    text-decoration: underline;
}
a:hover {
    text-shadow: 0px 0px 2px #FF7880;
    text-decoration: underline;
}
html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
font,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td {
    border: 0;
    font-family: inherit;
    font-size: 100%;
    font-style: inherit;
    font-weight: inherit;
    margin: 0;
    outline: 0;
    padding: 0;
    vertical-align: baseline;
}
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
nav,
section {
    display: block;
}
audio,
canvas,
video {
    display: inline-block;
    max-width: 100%;
}
html {
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    font-smoothing: antialiased;
}
.bg-whitening {
    background: rgba(255, 255, 255, 0.133);
}
html,
body {
    height: 100%;
    width: 100%;
}
body {
    
    background-image:
        url(<?php echo Path::wbg_l;?>),
        url(<?php echo Path::wbg_r;?>),
        url(<?php echo Path::wbg_l;?>),
        url(<?php echo Path::wbg_r;?>),
        url(<?php echo Path::bg_haru;?>);

    background-repeat: repeat-y, repeat-y, repeat-y, repeat-y, repeat;
    background-position: top left, top right, top left, top right, top left;
    background-attachment: fixed, fixed, fixed, fixed, scroll;
    /* 雪な背景がfixedだとAndroidChromeで表示が崩れるので諦めた */
    
    background-size:
        <?php echo GSize::wbg, "px"," ", GSize::wbg, "px";?>,
        <?php echo GSize::wbg, "px"," ", GSize::wbg, "px";?>,
        <?php echo GSize::wbg, "px"," ", GSize::wbg, "px";?>,
        <?php echo GSize::wbg, "px"," ", GSize::wbg, "px";?>,
        18% auto;
        
    margin: 0;
    padding: 0;
    /*Default font size */
    
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    font-smoothing: antialiased;
    font-size: <?php echo FSize::DefaultFont;?>px;
}

@media(max-width:360px){ /* ビューポートの横幅が360px以下のモバイル環境だったら小さいフォントサイズにする */
    body{
        font-size: <?php echo FSize::MobileFont;?>px;
    }
}
@media(min-width:361px){ /* ビューポートの横幅が361px以上のパソコン環境だったら普通のフォントサイズにする */
    body{
        font-size: <?php echo FSize::DefaultFont;?>px;
    }
}
/**

 * 2.0 Basic Structure

 * -----------------------------------------------------------------------------

 */

#main_container {
    width: 100%;
    padding: 0;
}
.container {
    max-width: 1255px;
    margin: auto;
}
p {
    font-size: 1.4em;
    color: #676363;
    line-height: 2em;
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    padding-top: 1em;
}
h1 {
    font-size: <?php echo FSize::h1;?>;
    color: #fff;
    margin: 0;
}
.page-title {
    text-transform: none;
    margin: 0px;
    font-size: <?php echo FSize::page_title;?>;
    text-align: center;
    padding: 40px 0;
    background: rgba(255, 255, 255, 0.85);
    margin-bottom: 60px;
    box-shadow: 0px 0px 0.1px 0px #ccc;
    font-weight: 600;
}
.nothing-found {
    margin-bottom: 0px;
}
.page-title h1 {
    text-transform: none;
    margin: 0px;
    font-size: <?php echo FSize::page_title_h1;?>;
}
h1.single-title {
    /* 古いの */
    /*
	text-transform:none;
	font-size:25px;
	text-align:center;
	margin:0px;
	padding:0px;
	margin-bottom:10px;
	*/
    
    text-transform: none;
    font-size: <?php echo FSize::single_title; ?>;
    text-align: center;
    margin: 0px 0px 10px;
    padding: 0.17em;
    border: 2px dotted rgba(0, 224, 255, 0.25);
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.5);
}
h2 {
    font-size: 2em;
    color: #313131;
    margin-top: 25px;
    font-weight: 700;
    text-transform: none;
}
h1 {
    font-size: 2.5em;
    color: #313131;
    font-weight: 700;
}
.no-padding {
    padding: 0px;
}
/**

 * header wrapper

 * -----------------------------------------------------------------------------

 */

.header_bg {
    background: rgba(244, 244, 244, 0.0);
}
.header {
    width: 100%;
    padding: 1.0em 0em;
    border-bottom: 0px solid #eee;
}
.logo h1,
.logo p {
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-size: 3.0em;
    color: #fe5d55;
    font-weight: 700;
    margin: 0px;
    padding: 0px;
    line-height: 50px;
}
.nav ul {
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-size: 1.6em;
    font-weight: 700;
    text-transform: none;
    padding-top: 0.5em;
    position: relative;
}
.nav ul li {
    list-style: none;
    float: left;
}
.nav ul li a {
    color: #ff7880;
    text-decoration: none;
    padding: 10px 2.0em;
}
.nav ul li a.active {
    color: #fe5d55;
}
.nav ul li a:hover {
    color: #fe5d55;
    text-decoration: none;
}
.nav ul li ul {
    padding: 0;
    position: absolute;
    top: 40px;
    left: 130px;
    right: 0;
    width: 150px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    display: none;
    opacity: 0;
    visibility: hidden;
    -webkit-transiton: opacity 0.2s;
    -moz-transition: opacity 0.2s;
    -ms-transition: opacity 0.2s;
    -o-transition: opacity 0.2s;
    -transition: opacity 0.2s;
    z-index: 999;
}
.nav ul li ul li {
    background: rgba(254, 93, 85, 0.85);
    display: block;
    color: #fff;
    font-size: 0.6em;
    padding: 0.8em 0em;
    border-bottom: 1px solid #eee;
}
.nav ul li ul li a {
    color: #fff;
}
.nav ul li ul li:hover {
    background: rgba(254, 93, 85, 1);
}
.nav ul li:hover ul {
    display: block;
    opacity: 1;
    visibility: visible;
}
.banner_heading {
    width: 100%;
    padding: 1em 0em;
    text-align: center;
}
.banner_heading h1 {
    color: #ccc;
    font-size: 1.5em;
    letter-spacing: 0.2em;
    text-transform: none;
    font-weight: 600;
}
/**

 * middle section

 * -----------------------------------------------------------------------------

 */

.middle_section {
    width: 100%;
    background: rgba(244, 244, 244, 0.0);
    padding: 3.3em 0em;
}
.date-wrapper {}
.middle_section .date {
    text-align: center;
    background: rgba(254, 93, 85, 0.85);
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-weight: 700;
    font-size: 1.4em;
    color: #fff;
    line-height: 1.5em;
    padding: 10px 1.5px 10px 7px;
    /*margin: 0px 0px 0px -20px;*/
    
    display: inline-block;
    margin-right: 1px;
    position: relative;
    width: 100%;
    border-radius: 30px 0px 0px 30px;
}
.middle_section .date:before,
.date:after {
    top: 100%;
    left: 50%;
    /* border: solid transparent; */
    
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
.middle_section .date:before {
    border-color: rgba(194, 225, 245, 0);
    border-top-color: #fe5d55;
    border-width: 10px;
    margin-left: -11px;
}
.middle_section .date:after {
    border-color: rgba(136, 183, 213, 0);
    border-top-color: #fe5d55;
    border-width: 10px;
    margin-left: -10px;
}
.post_block {
    background: rgba(255, 255, 255, 0.85);
    width: 100%;
    margin-bottom: 0em;
}
img {
    max-width: 100%;
}
.wp-caption {
    max-width: 100%;
    width: 100%;
}
.content_wrap {
    padding: 2em 2.0em;
    box-shadow: 0px 0px 1px 0px #ccc;
    text-align: center;
}
.content_wrap h2 {
    text-align: center;
    font-size: <?php echo FSize::content_wrap_h2;?>;
}
.content_wrap p {
    text-align: left;
    padding: 0;
    line-height: 2.62857;
}
.readmore {
    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.66);
    color: #fe5d55;
    display: inline-block;
    font-size: 1.4em;
    margin-top: 15px;
    padding: 10px 20px;
    position: relative;
    text-transform: none;
    margin-bottom: -20px;
    vertical-align: middle;
}
.readmore a {
    color: #fe5d55;
    text-decoration: none;
}
.readmore a:hover {
    color: #333;
    text-decoration: none;
}
.border {
    border-bottom: 1px solid #eee;
    width: 100%;
    margin: 4em 0em;
}
.categories_row ul {
    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.0);
    display: block;
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-size: <?php echo FSize::categories_row_ul;?>;
    margin: -50px auto auto;
    padding: 80px 0px 20px 0px;
    text-align: center;
    text-transform: none;
    width: 80%;
    position: relative;
}
.categories_row li {
    display: inline;
    list-style: none;
    margin-right: 10px;
    line-height: 30px;
}
.categories_row li a {
    color: #6e6e6e;
    text-decoration: none;
    padding: 1px;
}
.categories_row li a:hover {
    color: #fe5d55;
}
.categories_row .fa {
    color: #a3a3a3;
    font-size: 1em;
    margin: 0em 0.2em;
}
.social {
    text-align: center;
}
.social .fa {
    color: #2a2a26;
    font-size: 2em;
    margin: 1.5em 0.8em;
}
.pagination > li > a,
.pagination > li > span {
    background-color: rgba(255, 255, 255, 0.85);
    border: 0px solid #ccc;
    color: #333;
    float: left;
    margin: 3px;
    padding: 10px 15px;
    position: relative;
    text-decoration: none;
    font-size: 1em;
    border-radius: 0px !important;
    box-shadow: 0px 0px 1px 0px #ccc;
}
.pagination > li > a.active {
    background: rgba(254, 93, 85, 0.85);
    border: 0;
    color: #fff;
}
.comment-pagination {
    margin: 20px 0px;
}
.clearboth {
    clear: both;
}
.comment-pagination a,
.comment-pagination span {
    background-color: rgba(255, 255, 255, 0.85);
    border: 0px solid #ccc;
    color: #333;
    float: left;
    margin: 3px;
    padding: 5px 10px;
    position: relative;
    text-decoration: none;
    font-size: 1.5em;
    border-radius: 0px !important;
    box-shadow: 0px 0px 1px 0px #ccc;
}
.comment-pagination span.current {
    background: rgba(254, 93, 85, 0.85);
    border: 0;
    color: #fff;
}
/**

 * Sidebar section

 * -----------------------------------------------------------------------------

 */

#sidebar {
    padding: 0;
}
.sidebar {
    width: 100%;
    padding: 0;
}
.add_section {
    padding: 0;
    text-align: center;
}
.blue_border {
    width: 16px;
    height: 16px;
    margin: auto;
    background: rgba(254, 93, 85, 0.85) none repeat scroll 0% 0%;
    position: relative;
    top: -2.7em;
    border-radius: 30px;
}
.search_section {
    text-align: center;
}
.sidebar h2,
.search_section h3 {
    font-size: 1.4em;
    padding: 0em 0;
}
.sidebar img {
    /* 無効 2015-10-16 */
    /*
    width: 100%;
*/
    
    vertical-align: text-top;
    /* サイドバー画像の位置をテキストの中央に合わせる */
}
.search_section .fa {
    font-size: 4em;
    color: #fe5d55;
}
.search_section .subscribe {
    background: rgba(248, 249, 253, 0.85);
    border: 1px solid #ededed;
    padding: 1em;
    width: 68%;
    /* IEだと75%では予期せぬ改行が発生する -2015-10-15*/
    /* Chromeだと74%では予期せぬ改行が発生する、68%で収まった -2015-10-15*/
    
    text-align: center;
    margin-bottom: 0.5em;
}
.search_section .subscribe_btn {
    border: 2px solid rgba(254, 93, 85, 0.85);
    padding: 0.8em 1em;
    text-align: center;
    color: #fff;
    background: rgba(254, 93, 85, 0.85);
    font-weight: 700;
}
.categories_section,
.sidebar_widget,
.widget_recent_entries,
.widget_archive {
    background: rgba(255, 255, 255, 0.85);
    padding: 2em 2em;
    border: 1px solid #eee;
    text-align: left;
    margin-bottom: 1.5em;
    /* サイドバーの縦の隙間を狭く */
}
.categories_section ul,
.sidebar_widget ul,
.widget_recent_entries ul,
.widget_archive ul {
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-size: 1.4em;
    margin: 0;
}
.categories_section ul li,
.sidebar_widget ul li,
.widget_recent_entries ul li,
.widget_archive ul li {
    list-style: none;
    float: left;
    display: block;
    width: 100%;
    padding: 0.5em 1.5em;
}
.categories_section ul li a,
.sidebar_widget ul li a,
.widget_recent_entries ul li a,
.widget_archive ul li a {
    color: #676363;
    text-decoration: none;
}
.categories_section ul li a:hover,
.sidebar_widget ul li a:hover,
.widget_recent_entries ul li a:hover,
.widget_archive ul li a:hover {
    color: #fe5d55;
    text-decoration: none;
}
.popular_post {
    margin-bottom: 2em;
}
.popular_post h3 {
    font-size: 1.4em;
    color: #333;
    font-weight: 600;
}
.popular_post p {
    font-size: 1.2em;
    color: #333;
    padding: 0.3em 0em;
}
/**

 * Footer section

 * -----------------------------------------------------------------------------

 */

.footer_wrapper {
    width: 100%;
    padding: 3em 0em;
    /* border-top: 0.5em solid #595959; */
    
    clear: both;
}
.footer_wrapper h2 {
    text-transform: none;
    color: #4a4949;
    font-size: 2em;
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
}
.subscribe {
    padding: 10px;
    border: 1px solid #eee;
    font-size: 1.3em;
}
.subscribe_btn {
    background: rgba(254, 93, 85, 0.85);
    padding: 0.7em 1em;
    color: #fff;
    text-align: center;
    border: 0;
    outline: 0;
    font-size: 1.4em;
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    margin-left: 0.5em;
}
.ft_social .fa {
    color: #2a2a26;
    font-size: 2em;
    margin: 0.5em 0.8em;
}
.copyright {
    padding: 8px;
    background: rgba(221, 221, 221, 0.85);
    font-size:<?php echo FSize::copyright;?>;
}
@media screen and (min-width: 736px) and (max-width: 768px) {
    .header .pull-left {
        float: left !important;
    }
    .header .pull-right {
        float: right !important;
    }
    .nav ul li {
        float: left !important;
        padding-bottom: 1em;
    }
    .add_section img {
        max-width: 100%;
    }
    .add_section {
        text-align: center;
    }
    .date {
        float: none !important;
    }
}
@media screen and (max-width: 1023px) {
    .header {
        text-align: center;
    }
    .header .pull-left,
    .header .pull-right {
        float: none !important;
    }
    .nav ul li {
        float: none;
        padding-bottom: 1em;
    }
    .date {
        float: none;
        text-align: center;
        margin: auto auto 20px auto;
        display: block;
    }
    .categories_row ul {
        padding-left: 0;
    }
    .categories_row li a {
        padding-bottom: 0.8em;
        display: inline-block;
    }
    .social .fa {
        margin: 0.5em 0.8em;
    }
    .sidebar img {
        width: auto;
        margin-bottom: 1em;
    }
    .popular_post,
    .categories_section {
        text-align: center;
    }
    .add_section img {
        max-width: 100%;
    }
    .footer_wrapper {
        text-align: center
    }
    .footer_wrapper h2 {
        margin-top: 2em;
    }
}
/*

* Other

*/

.alignright {
    text-align: right;
}
.alignleft {
    text-align: left;
}
.aligncenter {
    text-align: center;
}
/* 05.04.2015  */

.comment-form {
    background: rgba(255, 255, 255, 0.85);
    padding: 5em 2.0em;
}
.comment-form input {
    border: 1px solid #ccc;
    width: 70%;
    padding: 10px 12px;
}
.comment-form textarea {
    border: 1px solid #ccc;
    width: 90%;
    padding: 10px 12px;
    background: rgba(255, 255, 255, 0.85);
}
.comment-form .submit {
    background: rgba(254, 93, 85, 0.85);
    width: auto;
    color: #fff;
    border: none;
    padding: 10px 12px;
}
.comment-form label {
    display: block;
    text-transform: none;
}
#reply-title {
    font-size: <?php echo FSize::reply_title;?>;
    color: #fe5d55;
    text-transform: none;
    font-weight: bold;
    margin-bottom: 20px;
    margin-top: 20px;
}
.reply a {
    color: #fe5d55;
    font-size: <?php echo FSize::reply_title_a;?>;
    font-weight: 700;
    float: right;
    text-transform: none;
}
.fn,
.says {
    font-size: <?php echo FSize::fn_says;?>;
    color: #232323;
    font-weight: 600;
    text-transform: none;
}
.comment-meta a {
    font-size: <?php echo FSize::comment_meta_a;?>;
    color: #232323;
}
.comment-author {
    margin-top: 50px;
    padding-top: 50px;
    border-top: 1px solid #dddddd;
}
.comment-author img {
    float: left;
    margin-right: 10px;
}
.footer_widget h2 {
    text-transform: none;
    font-size: <?php echo FSize::footer_widget_h2;?>;
    font-weight: 700;
    color: #232323;
}
.footer_widget li {
    list-style: none;
}
.footer_widget li a {
    color: #232323;
    font-size: <?php echo FSize::footer_widget_li_a;?>;
    padding: 0px 10px;
    margin: 8px 0px;
    display: block;
}
}
.wp-caption,
.wp-caption-text,
.sticky,
.gallery-caption,
.bypostauthor {}
.comment.parent .comment {
    margin-left: 20px;
}
/*=========================
	
	Element Page Css

==========================*/

.alignright {
    float: right;
}
.alignleft {
    float: left;
}
.aligncenter {
    margin-right: auto;
    margin-left: auto;
}
blockquote.alignright,
.wp-caption.alignright,
img.alignright {
    margin: 0.4em 0 1.6em 1.6em;
}
blockquote.alignleft,
.wp-caption.alignleft,
img.alignleft {
    margin: 0.4em 1.6em 1.6em 0;
}
.entry-header span {
    line-height: 24px;
}
.entry-content {
    margin-top: 20px;
}
.entry-content span a,
.entry-content .fa {
    color: #333;
}
.entry-content .fa {
    padding-right: 8px;
}
.entry-content span a:hover,
.entry-content .fa:hover {
    color: #cfa332;
}
.entry-content span {
    /* padding-right:20px; */
    /* これは一体なんなんじゃ・・・？ ソース乗せハイライトが変な風に表示されるので無効化*/
}
h1 {
    font-size: <?php echo FSize::h1;?>;
    color: #232323;
    margin-bottom: 0px;
    text-transform: none;
}
h2 {
    font-size: <?php echo FSize::h2;?>;
    color: #232323;
    margin-bottom: 10px;
    margin-top: 0;
    text-transform: none;
}
h3 {
    font-size: <?php echo FSize::h3;?>;
    color: #232323;
    margin-bottom: 10px;
    font-weight: 700;
}
h4 {
    font-size: <?php echo FSize::h4;?>;
    color: #232323;
    margin-bottom: 10px;
    font-weight: 700;
}
h5 {
    font-size: <?php echo FSize::h5;?>x;
    color: #232323;
    margin-bottom: 10px;
    font-weight: 700;
}
h6 {
    font-size: <?php echo FSize::h6;?>;
    color: #232323;
    margin-bottom: 10px;
    font-weight: 700;
}
/*p {
    font-size: 15px;
}*//*たぶんこれ要らない*/
blockquote {
    background: rgba(241, 241, 241, 0.85);
    padding: 10px;
    border-left: 3px solid #ccc;
    margin: 20px 0px;
}
blockquote p {
    padding: 0;
}
table,
tr,
td,
th {
    border: 1px solid #f1f1f1;
    padding: 10px;
    font-size: 14px;
}
table {
    margin-bottom: 50px;
}
dt {
    font-size: <?php echo FSize::dt;?>;
    font-weight: 600;
    color: #232323;
}
dd {
    font-size: <?php echo FSize::dd;?>;
    padding-left: 30px;
}
dl {
    margin-bottom: 50px;
}
ul li {
    margin-left: 15px;
    text-align: left;
    font-size: <?php echo FSize::ul_li;?>;
    text-align: left;
}
ol li {
    margin-left: 15px;
    font-size: 15px;
    text-align: left;
}
address {
    font-weight: 600;
    font-size: 13px;
}
p strong {
    font-weight: 700;
    color: #333;
}
pre {
    padding: 5px;
    font-weight: 400;
    color: #232323;
    font-size: <?php echo FSize::pre;?>;
    border: 3px dotted;
    border-color: #FFFFFF;
    background-color: #f5f5f5;
}
cite {
    font-style: normal;
}
big {
    font-size: <?php echo FSize::big;?>;
}
/* 2015-10-15 追加 */
/* なんでbigはあるのにsmallが用意されてないんですかねぇ… */

small {
    font-size: <?php echo FSize::small;?>;
}
abbr {
    text-transform: none;
    color: #000;
}
em {
    font-style: italic;
}
q:before {
    content: '\f10d';
    content: open-quote;
    color: #000;
    font-size: <?php echo FSize::q_before;?>;
}
q:after {
    content: '\f10e';
    content: close-quote;
    color: #000;
    font-size: <?php echo FSize::q_after;?>;
}
sub,
sup {
    color: #000;
    font-weight: 600;
    font-size: <?php echo FSize::sub_sup;?>;
}
tt {
    font-size: <?php echo FSize::tt;?>;
    letter-spacing: 1px;
    color: #000;
}
var {
    font-style: italic;
}
.sticky h2 a:after {
    content: '';
    border-bottom: 3px solid #000;
    width: 7%;
    display: block;
    margin: 10px 0;
}
.sticky h2 a {
    color: #000;
}
.single .bottom-border,
.page .bottom-border {
    margin-top: 20px;
}
/* Text meant only for screen readers. */

.screen-reader-text {
    clip: rect(1px, 1px, 1px, 1px);
    position: absolute !important;
    height: 1px;
    width: 1px;
    overflow: hidden;
}
.screen-reader-text:focus {
    background-color: rgba(241, 241, 241, 0.85);
    border-radius: 3px;
    box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
    clip: auto !important;
    color: #21759b;
    display: block;
    font-size: 14px;
    font-size: 0.875rem;
    font-weight: bold;
    height: auto;
    left: 5px;
    line-height: normal;
    padding: 15px 23px 14px;
    text-decoration: none;
    top: 5px;
    width: auto;
    z-index: 100000;
    /* Above WP toolbar. */
}
/*-------------------Navigation*/

#navigation,
#navigation ul,
#navigation ul li,
#navigation ul li a,
#navigation #menu-button {
    margin: 0;
    padding: 0;
    border: 0;
    list-style: none;
    line-height: 1;
    display: block;
    position: relative;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-family: Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
}
#navigation:after,
#navigation > ul:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0;
}
#navigation #menu-button {
    display: none;
}
#navigation {
    width: auto;
    line-height: 1;
    background: rgba(255, 255, 255, 0.85);
    z-index: 9999;
}
#menu-line {
    position: absolute;
    top: 0;
    left: 0;
    height: 3px;
    /*  background: rgba(0,154,225,0.85);*/
    
    -webkit-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -ms-transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
}
#navigation > ul > li {
    float: left;
}
#navigation.align-center > ul {
    font-size: 0;
    text-align: center;
}
#navigation.align-center > ul > li {
    display: inline-block;
    float: none;
}
#navigation.align-center ul ul {
    text-align: left;
}
#navigation.align-right > ul > li {
    float: right;
}
#navigation.align-right ul ul {
    text-align: right;
}
#navigation > ul > li > a {
    padding: 20px;
    font-size: <?php echo FSize::navigation_ul_li_a;?>;
    text-decoration: none;
    text-transform: none;
    color: #000000;
    -webkit-transition: color .2s ease;
    -moz-transition: color .2s ease;
    -ms-transition: color .2s ease;
    -o-transition: color .2s ease;
    transition: color .2s ease;
}
#navigation > ul > li:hover > a,
#navigation > ul > li.active > a {
    color: #232323;
}
#navigation > ul > li.has-sub > a {
    padding-right: 25px;
}
#navigation > ul > li.has-sub > a::after {
    position: absolute;
    top: 25px;
    right: 10px;
    width: 4px;
    height: 4px;
    border-bottom: 1px solid #000000;
    border-right: 1px solid #000000;
    content: "";
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
    -webkit-transition: border-color 0.2s ease;
    -moz-transition: border-color 0.2s ease;
    -ms-transition: border-color 0.2s ease;
    -o-transition: border-color 0.2s ease;
    transition: border-color 0.2s ease;
}
#navigation > ul > li.has-sub:hover > a::after {
    border-color: #009ae1;
}
#navigation ul ul {
    position: absolute;
    left: -9999px;
}
#navigation li:hover > ul {
    left: auto;
}
#navigation.align-right li:hover > ul {
    right: 0;
}
#navigation ul ul ul {
    margin-left: 100%;
    top: 0;
}
#navigation.align-right ul ul ul {
    margin-left: 0;
    margin-right: 100%;
}
#navigation ul ul li {
    height: 0;
    -webkit-transition: height .2s ease;
    -moz-transition: height .2s ease;
    -ms-transition: height .2s ease;
    -o-transition: height .2s ease;
    transition: height .2s ease;
}
#navigation ul li:hover > ul > li {
    height: auto;
}
#navigation ul ul li a {
    padding: 10px 20px;
    width: 160px;
    font-size: <?php echo FSize::navigation_ul_ul_li_a;?>;
    background: rgba(51, 51, 51, 0.85);
    text-decoration: none;
    color: #dddddd;
    -webkit-transition: color .2s ease;
    -moz-transition: color .2s ease;
    -ms-transition: color .2s ease;
    -o-transition: color .2s ease;
    transition: color .2s ease;
    display: block;
}
#navigation ul ul li:hover > a,
#navigation ul ul li a:hover {
    color: #ffffff;
    background: rgba(0, 0, 255, 0.85);
}
#navigation ul ul li.has-sub > a::after {
    position: absolute;
    top: 13px;
    right: 10px;
    width: 4px;
    height: 4px;
    border-bottom: 1px solid #dddddd;
    border-right: 1px solid #dddddd;
    content: "";
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
    -webkit-transition: border-color 0.2s ease;
    -moz-transition: border-color 0.2s ease;
    -ms-transition: border-color 0.2s ease;
    -o-transition: border-color 0.2s ease;
    transition: border-color 0.2s ease;
}
#navigation.align-right ul ul li.has-sub > a::after {
    right: auto;
    left: 10px;
    border-bottom: 0;
    border-right: 0;
    border-top: 1px solid #dddddd;
    border-left: 1px solid #dddddd;
}
#navigation ul ul li.has-sub:hover > a::after {
    border-color: #ffffff;
}
@media all and (max-width: 768px),
only screen and (-webkit-min-device-pixel-ratio: 2) and (max-width: 1024px),
only screen and (min--moz-device-pixel-ratio: 2) and (max-width: 1024px),
only screen and (-o-min-device-pixel-ratio: 2/1) and (max-width: 1024px),
only screen and (min-device-pixel-ratio: 2) and (max-width: 1024px),
only screen and (min-resolution: 192dpi) and (max-width: 1024px),
only screen and (min-resolution: 2dppx) and (max-width: 1024px) {
    #navigation {
        width: 100%;
    }
    #navigation ul {
        width: 100%;
        display: none;
    }
    #navigation.align-center > ul,
    #navigation.align-right ul ul {
        text-align: left;
    }
    #navigation ul li,
    #navigation ul ul li,
    #navigation ul li:hover > ul > li {
        width: 100%;
        height: auto;
        border-top: 1px solid rgba(120, 120, 120, 0.15);
    }
    #navigation ul li a,
    #navigation ul ul li a {
        width: 100%;
    }
    #navigation > ul > li,
    #navigation.align-center > ul > li,
    #navigation.align-right > ul > li {
        float: none;
        display: block;
    }
    #navigation ul ul li a {
        padding: 20px 20px 20px 30px;
        font-size: 15px;
        color: #000000;
        background: none;
        font-weight: 400;
        text-transform: capitalize;
    }
    #navigation ul ul li:hover > a,
    #navigation ul ul li a:hover {
        color: #000000;
    }
    #navigation ul ul ul li a {
        padding-left: 40px;
    }
    #navigation ul ul,
    #navigation ul ul ul {
        position: relative;
        left: 0;
        right: auto;
        width: 100%;
        margin: 0;
    }
    #navigation > ul > li.has-sub > a::after,
    #navigation ul ul li.has-sub > a::after {
        display: none;
    }
    #menu-line {
        display: none;
    }
    #navigation #menu-button {
        display: block;
        padding: 20px;
        color: #000000;
        cursor: pointer;
        font-size: 12px;
        text-transform: none;
    }
    #navigation #menu-button::after {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        display: block;
        width: 15px;
        height: 2px;
        background: rgba(0, 0, 0, 0.85);
    }
    #navigation #menu-button::before {
        content: '';
        position: absolute;
        top: 25px;
        right: 20px;
        display: block;
        width: 15px;
        height: 7px;
        border-top: 2px solid #000000;
        border-bottom: 2px solid #000000;
    }
    #navigation .submenu-button {
        position: absolute;
        z-index: 10;
        right: 0;
        top: 0;
        display: block;
        border-left: 1px solid rgba(120, 120, 120, 0.15);
        height: 52px;
        width: 52px;
        cursor: pointer;
    }
    #navigation .submenu-button::after {
        content: '';
        position: absolute;
        top: 21px;
        left: 26px;
        display: block;
        width: 1px;
        height: 11px;
        background: rgba(0, 0, 0, 0.85);
        z-index: 99;
    }
    #navigation .submenu-button::before {
        content: '';
        position: absolute;
        left: 21px;
        top: 26px;
        display: block;
        width: 11px;
        height: 1px;
        background: rgba(0, 0, 0, 0.85);
        z-index: 99;
    }
    #navigation .submenu-button.submenu-opened:after {
        display: none;
    }
    #navigation ul.open {
        display: block !important;
    }
}
!important;
}
}