!function(){
var req = new XMLHttpRequest();

req.open('POST', 'accesscounter.php', true);
req.setRequestHeader('content-type',
  'application/x-www-form-urlencoded;charset=UTF-8');
req.send('fpk=' + 'test');

}();
