//言語名を大文字化したりなんかしたりするやつ。目についたら追加していく
function LangNameNormalize(str){
    if(str == "php")return "PHP";
    if(str == "cs")return "C#";
    if(str == "javascript")return "JavaScript";
    if(str == "perl")return "Perl";
    if(str == "bash")return "Bash";
    return str;
}

//WordPressで使うときは $ じゃなくて jQuery にしないとダメみたい……
//無名関数なので即時実行されるぞ！
!(function(){

    //blockには配列でpreにアクセス可能なアレがpreの個数分入る
    //たとえばpreが4個見つかったのならblock[0] ~ block[3] でいじれるぞ！
    document.querySelectorAll("pre code").forEach(function(block,i){
        
        //追加するためのdiv要素の定義
        const div = document.createElement('div');
        
        //言語名追加
        //block.classList[1]にはcodeタグのクラスの二番目(hljs php←これ)が入ってるぞ！
        //codeに予めクラス名で言語指定していた場合はこの順番が逆転するのでそれへの対応も
        div.textContent = LangNameNormalize(block.classList[ block.classList[1] != 'hljs' ? 1:0 ]);
        
        //divにclass追加、CSSでいじれ！
        div.classList.add('hl-header');
        
        //pre要素の最初の子要素として追加
        block[i].insertBefore(div,elm[i].firstChild);
        
    });

});
