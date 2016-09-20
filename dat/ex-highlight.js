//言語名を大文字化したりなんかしたりする関数。目についたら追加していく～～～～
function LangNameNormalize(str) {
    if (str == 'php') return 'PHP';
    if (str == 'cs') return 'C#';
    if (str == 'javascript') return 'JavaScript';
    if (str == 'perl') return 'Perl';
    if (str == 'bash') return 'Bash';
    return str;
}

//無名関数を即時実行しているぞ！
!function () {
    //querySelectorAllで返ってくるのはオブジェクトらしい……
    //のでそれを配列に変換するやつ
    //forEachで繰り返し実行しているぞ！
    Array.prototype.forEach.call(
        
        //ページ中のpre code要素を全て取得しその個数分だけループする
        //blockの中にはcode要素のクラスやテキストなどの情報が詰まってるぞ！
        document.querySelectorAll('pre code'),function(block){

            //追加する用のdiv要素を定義
            const div = document.createElement('div');

            //hljsと言語名クラスの順番が逆転してることがあるのでそれへの対応
            const j = block.classList[1] != 'hljs' ? 1:0;

            //言語名追加
            div.textContent = LangNameNormalize(block.classList[j]);

            //div要素にクラスを追加、CSSでいじれるぞ！
            div.classList.add('hl-header');

            //div要素をcode要素の直前(preとの間)に追加
            //blockは自動インクリメントされて次のpre code要素が読み込まれる
            block.parentNode.insertBefore(div, block);

        }

    );
  
}();