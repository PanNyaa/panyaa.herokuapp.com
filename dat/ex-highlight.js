//言語名を大文字化したりするやつ。目についたら追加していく
function LangNameNormalize(str) {
  if (str == 'php') return 'PHP';
  if (str == 'cs') return 'C#';
  if (str == 'javascript') return 'JavaScript';
  if (str == 'perl') return 'Perl';
  if (str == 'bash') return 'Bash';
  return str;
}

//無名関数なので即時実行されるぞ！
!(function () {
  //document.querySelectorAllで返ってくるのはオブジェクトらしいので配列に変換するやつ
  Array.prototype.forEach.call(
    //pre code要素を全部取得
    document.querySelectorAll('pre code'),function (block,i){
      
      //追加する用のdiv要素を定義
      const div = document.createElement('div');
      
      //言語名追加、hljsクラスと言語名クラスの順番が逆転していることがあるのでそれへの対応も
      div.textContent = LangNameNormalize(block.classList[block.classList[1] != 'hljs' ? 1 : 0]);
      
      //追加するdivにクラスを追加、CSSでいじれるぞ！
      div.classList.add('hl-header');
      
      //要素をHTMLに追加
      block[i].insertBefore(div, block[i].firstChild);
    }
  );
})();