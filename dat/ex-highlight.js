//言語名を大文字化したりなんかしたりするやつ。目についたら追加していく
function LangNameNormalize(str){
    if(str == "php")return "PHP";
    if(str == "cs")return "C#";
    if(str == "javascript")return "JavaScript";
    if(str == "perl")return "Perl";
    if(str == "bash")return "Bash";
}

//WordPressで使うときは $ じゃなくて jQuery にしないとダメみたい……
//無名関数なので即時実行されるぞ！
jQuery(function(){

    //pre には配列でpreにアクセス可能なアレがpreの個数分入る
    var pre = document.getElementsByTagName('pre');

    //たとえばpreが4個見つかったのならpre[0] ~ pre[3] でいじれるぞ！

    //eachでpre codeの数だけループされるぞ！
    jQuery("pre code").each(function(i, block) {
        
        var j,div;
        
        //block.classList[1]にはcodeタグのクラスの二番目(hljs php←これ)が入ってるぞ！
        //codeに予めクラス名で言語指定していた場合はこの順番が逆転するのでそれへの対応
        j = block.classList[1] != 'hljs' ? 1 : 0;
        
        //divタグで作りまーす。div変数はオブジェクトになるのかな？
        div = document.createElement('div');
        
        //言語名追加
        
        div.textContent = LangNameNormalize(block.classList[j]);

        //divにclass追加、CSSでいじれ！
        div.classList.add('hl-header');

        //pre要素の最初の子要素として追加
        pre[i].insertBefore(div,pre[i].firstChild);

    });

});
