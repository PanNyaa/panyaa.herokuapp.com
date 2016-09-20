//言語名を大文字化したりなんかしたりする関数。目についたら追加していく～～～
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
    //querySelectorAllで返ってくるのはオブジェクトらしい…
    //のでそれを配列に変換するやつ
    Array.prototype.forEach.call(

        //pre code要素を全部取得
        document.querySelectorAll('pre code'),function(block){

            //追加する用のdiv要素を定義
            const div = document.createElement('div');

            //hljsと言語名クラスの順番が逆転してることがあるのでそれの対応
            const j = block.classList[1] != 'hljs' ? 1:0;

            //言語名追加
            div.textContent = LangNameNormalize(block.classList[j]);

            //追加するdivにクラスを追加、CSSでいじれるぞ！
            div.classList.add('hl-header');

            //要素をHTMLに追加、blockの中身は自動インクリメントされるみたい
            block.insertBefore(div, block.firstChild);
        }

    );
  
}();
