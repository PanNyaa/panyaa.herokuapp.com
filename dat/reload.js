function reload_jammer(){
	var e;
	var event = e || window.event;
	var k = event.keyCode;
	if((event.ctrlKey == true && k == 82) || (event.ctrlKey == true && k == 78) || (k == 116) || (event.ctrlKey == true && k == 116))
	{
   		event.keyCode = 0;
   		event.returnValue = false;
   		event.cancelBubble = true;
   		return false;
	}

	return true;

}

reload_jammer();

