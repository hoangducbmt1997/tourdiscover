/*
function a() {
		var s = document.getElementById("price-number").innerHTML

		var b = document.getElementById("number").value
		if(b==1){
			document.getElementById('result-number').innerHTML = b*1;
		}else if(b==0){
			document.getElementById('result-number').innerHTML = 0;
		}
		
		document.getElementById('result-number').innerHTML = s*(b+1);

	}
*/



(function() {
 
  window.inputNumber = function(el) {

    var min = el.attr('min') || false;
    var max = el.attr('max') || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function() {
      init($(this));
    });

    function init(el) {

      els.dec.on('click', decrement);
      els.inc.on('click', increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if(!min || value > min) {
          el[0].value = value;
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if(!max || value < max) {
          el[0].value = value++;
        }
      }
    }
  }
})();

inputNumber($('.input-number'));
