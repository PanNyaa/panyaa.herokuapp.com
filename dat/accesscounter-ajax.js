!function(){
    const req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        const result = document.getElementsByClassName('accesscounter');
        if (req.readyState == 4) { // 通信の完了時
            if (req.status == 200) { // 通信の成功時
                console.log("ajax通信成功！");
                result.innerHTML = req.responseText;
            }else {
                console.log("ajaxエラーが発生しました：");
                console.log(req.status);
            }
        }else{
            result.innerHTML = "アクセスカウンターが表示される予定のところ";
        }
    };

    //FingerPrintでユーザー識別子ハッシュを作成してajaxでPHPに渡す
    new Fingerprint2().get(function(result){
        req.open('POST', '/wp-content/themes/plain-blog/accesscounter.php', true);
        req.setRequestHeader('content-type','application/x-www-form-urlencoded;charset=UTF-8');
        req.send('fpk=' + result);
    });

    console.log("にゃう！？こんなところまで見ようとするとはJavaScript大好き勢だな！？JSはいいぞ！！！！！！！");
    console.log("でもショタのほうが好きです……///");

}();


