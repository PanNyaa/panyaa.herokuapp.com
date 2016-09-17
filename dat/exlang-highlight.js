/**
 * <pre>に重ねて<code>のclass名表示と、行番号表示
 *
 */
(function(document){
    init();
    function init() {
        var pres = document.getElementsByTagName('pre');
        for (var i = 0; i < pres.length; i++) {
            pres[i].style.position = 'relative';
            var div = document.createElement('div');
            div.innerHTML = pres[i].firstChild.getAttribute('class');
            div.style.position = 'absolute';
            div.style.top = '0';
            div.style.left = '0';
            div.style.backgroundColor = '#e61';
            div.style.color = '#fff';
            div.style.fontSize = '13px';
            div.style.padding = '1px 5px';
            pres[i].appendChild(div);
            //
            var div2 = document.createElement('div');
            var h = pres[i].clientHeight;
            var txt = '';
            for (var n = 1; n < parseInt(h / 17); n++) {
                txt += strPad3(n) + '<br>';
            }
            div2.innerHTML = txt;
            div2.style.position = 'absolute';
            div2.style.top = '21px';
            div2.style.left = '6px';
            div2.style.color = '#558';
            div2.style.fontSize = '13px';
            div2.style.lineHeight = '17px';
            pres[i].appendChild(div2);
        }
    }
    function strPad3(str) {
        var len = String(str).length;
        return Array(4 - len).join(' ') + str;
    }
})(document);