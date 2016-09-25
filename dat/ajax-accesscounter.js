!function(){
var req = new XMLHttpRequest();
req.onreadystatechange = function() {
  if (req.readyState == 4) { // 通信の完了時
    if (req.status == 200) { // 通信の成功時
      this.innerHTML = req.responseText;
    }
  }else{
    result.innerHTML = "まだだよ"
  }
}

req.open('POST', 'accesscounter.php', true);
req.setRequestHeader('content-type',
  'application/x-www-form-urlencoded;charset=UTF-8');
req.send('fpk=' + 'test');

}();
