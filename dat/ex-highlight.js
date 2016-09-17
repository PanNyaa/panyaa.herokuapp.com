//WordPressで使うときは $ じゃなくて jQuery にしないとダメみたい……
//無名関数なので即時実行されるぞ！
jQuery(function(){
	
	//pre には配列で<pre>にアクセス可能なアレがpreの個数分入る
	var pre = document.getElementsByTagName('pre');

	//console.log(pre);の実行結果 HTMLCollection [ <pre>, <pre>, <pre>, <pre> ]
	//たとえばpreが4個見つかったのならpre[0] ~ pre[3] でいじれるぞ！

	//eachでpre codeの数だけループされるぞ！
    jQuery("pre code").each(function(i, block) {
        //block.classList[1]でpre codeタグのクラスの二番目(hljs php←これ)が入ってるぞ！
        
        //divタグで作りまーす
        var div = document.createElement('div');
        
        //言語名追加
        div.textContent = block.classList[1];

		//divにclass追加、CSSでいじれ！
		div.classList.add('hl-header');
		
		//pre要素の最初の子要素として追加
		pre[i].insertBefore(div,pre[i].firstChild);
        
    });
   

});

