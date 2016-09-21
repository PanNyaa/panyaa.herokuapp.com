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

            //言語名テキストとツールチップを内包する用の親div要素を定義
            //言語名テキストとなるhl-headerの子ノード
            //ツールチップとなるhl-headerの子ノード
            const hl_header  = document.createElement('div');
            const hl_lang    = document.createElement('div');
            const hl_copybtn = document.createElement('div');
            
            //hljsと言語名クラスの順番が逆転してることがあるのでそれへの対応
            const j = block.classList[1] != 'hljs' ? 1:0;
            
            //CSSクラスの追加
            hl_header.classList.add('hl-header');
            hl_lang.classList.add('hl-lang');
            hl_copybtn.classList.add('hl-copybtn');

            //言語名テキストの追加
            //クリップボードにコピーするボタンのテキスト(絵文字)追加
            hl_lang.textContent = LangNameNormalize(block.classList[j]);
            hl_copybtn.textContent = "📥"; //📎
          
            //onClickイベントを追加
            //onClickが存在するhl-copybtnの親要素hl-headerの次の要素codeを指定
            hl_copybtn.onclick = new Function("CopyClipBoard(this.parentNode.nextElementSibling);");

            //hl-header要素をcode要素の直前(preとの間)に追加
            //blockは自動インクリメントされて次のpre code要素が読み込まれる
            block.parentNode.insertBefore(hl_header, block);
            
            //言語名テキストのノードをhl-headerに追加
            //クリップボードにコピーするボタンのノードをhl-headerに追加
            hl_header.appendChild(hl_lang);
            hl_header.appendChild(hl_copybtn);

        }

    );
  
}();

//クリップボードボタンがクリックされたときに実行するやつ、関数名の通り
//html上でonClick="CopyClipBoard(this)" のように、
//引数をthisとすればonClickが存在する場所の要素を取得できる
function CopyClipBoard(elm){
    const range = document.createRange();
    const selection = window.getSelection();

    //確実に選択範囲を確定するために既存の選択範囲を解除
    selection.removeAllRanges();

    //elm内のテキスト全部を選択範囲に追加
    range.selectNodeContents(elm);

    //選択範囲を適用
    window.getSelection().addRange(range);

    //クリップボードに選択範囲をコピー
    document.execCommand('copy');

    //コピーし終わったので選択範囲を解除
    selection.removeAllRanges();
}