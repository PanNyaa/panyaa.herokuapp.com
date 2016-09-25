function AddCSS(path){  //その名の通りの関数
    const d = document;
    const link = d.createElement('link');
    const h = d.getElementsByTagName('head')[0];
    link.href = path;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    h.appendChild(link);
}

!function(){
    const req = new XMLHttpRequest();
    //AddCSS("/dat/accesscounter.css");
    req.onreadystatechange = function() {
        const result = document.getElementById('accesscounter');
        if (req.readyState == 4) { // 通信の完了時
            console.log("通信完了");
            if (req.status == 200) { // 通信の成功時
                console.log("通信性交");
                result.innerHTML = req.responseText;
            }else {
                console.log(req.status);
            }
        }else{
            result.innerHTML = "まだだよ"
        }
    };

    req.open('POST', 'accesscounter.php', true);
    req.setRequestHeader('content-type','application/x-www-form-urlencoded;charset=UTF-8');
    req.send('fpk=' + 'test');
}();

