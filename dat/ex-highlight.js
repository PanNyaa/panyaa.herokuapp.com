(function () {
    $("pre code").each(function(i, block) {
    //block.classList; // これをあれこれする //ここにクラス名が入っている？
    
    console.log(block.classList);
    
    hljs.highlightBlock(block);
  })
}());