jQuery(function(){
	
	var pre[] = document.getElementsByTagName('pre');	//pre には配列で<pre>にアクセス可能なアレがpreの個数分入る
	
	//console.log(pre);
	//↑の実行結果 HTMLCollection [ <pre>, <pre>, <pre>, <pre> ]
	//たとえばpreが4個見つかったのならpre[0] ~ pre[3] でいじれるぞ！

    jQuery("pre code").each(function(i, block) {
        console.log(block.classList[1]);	//block.classList[1]でpre codeタグのクラスの二番目(hljs php←これ)が入ってるぞ！
        
        var div = document.createElement('div');
        div.textContent = block.classList[1];

		//class追加
		element.classList.add('hl-header');
		
		
		
		
		
		pre[i].appendChild(div);

        
    });
   

});

