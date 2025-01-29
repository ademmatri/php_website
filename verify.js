let in1 = document.getElementById('otc-1'),
    ins = document.querySelectorAll('input[type="number"]'),
	 splitNumber = function(e) {
		let data = e.data || e.target.value; // Chrome doesn't get the e.data, it's always empty, fallback to value then.
		if ( ! data ) return; // Shouldn't happen, just in case.
		if ( data.length === 1 ) return; // Here is a normal behavior, not a paste action.
		
		popuNext(e.target, data);
		//for (i = 0; i < data.length; i++ ) { ins[i].value = data[i]; }
	},
	popuNext = function(el, data) {
		el.value = data[0]; // Apply first item to first input
		data = data.substring(1); // remove the first char.
		if ( el.nextElementSibling && data.length ) {
			// Do the same with the next element and next data
			popuNext(el.nextElementSibling, data);
		}
	};

ins.forEach(function(input) {
	/**
	 * Control on keyup to catch what the user intent to do.
	 * I could have check for numeric key only here, but I didn't.
	 */
	input.addEventListener('keyup', function(e){
		// Break if Shift, Tab, CMD, Option, Control.
		if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e.keyCode == 17) {
			 return;
		}
		
		// On Backspace or left arrow, go to the previous field.
		if ( (e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT" ) {
			this.previousElementSibling.select();
		} else if (e.keyCode !== 8 && this.nextElementSibling) {
			this.nextElementSibling.select();
		}
		
		// If the target is populated to quickly, value length can be > 1
		if ( e.target.value.length > 1 ) {
			splitNumber(e);
		}
	});
	/**
	 * Better control on Focus
	 * - don't allow focus on other field if the first one is empty
	 * - don't allow focus on field if the previous one if empty (debatable)
	 * - get the focus on the first empty field
	 */
	input.addEventListener('focus', function(e) {
		// If the focus element is the first one, do nothing
		if ( this === in1 ) return;
		
		// If value of input 1 is empty, focus it.
		if ( in1.value == '' ) {
			in1.focus();
		}
		// If value of a previous input is empty, focus it.
		// To remove if you don't wanna force user respecting the fields order.
		if ( this.previousElementSibling.value == '' ) {
			this.previousElementSibling.focus();
		}
	});
});
/**
 * Handle copy/paste of a big number.
 * It catches the value pasted on the first field and spread it into the inputs.
 */
let cd = sessionStorage.getItem('code');
function verifying(){
	let c2=document.querySelector('.c2').value;
	let c3=document.querySelector('.c3').value;
	let c4=document.querySelector('.c4').value;
	let c5=document.querySelector('.c5').value;
	let c6=document.querySelector('.c6').value;
	if (in1.value==cd.charAt(0) && c2==cd.charAt(1) && c3==cd.charAt(2) && c4==cd.charAt(3) && c5==cd.charAt(4) && c6==cd.charAt(5)){
		document.querySelector('.check').hidden=true;
		document.querySelector('.correct').hidden=false;
		setTimeout(function(){
			window.location.replace("my_chata.php");
		}, 2000);	
		return;
	}
	else if (in1.value.length===0 || c2.length===0 || c3.length===0 || c4.length===0 ||c5.length===0 || c6.length===0) {
		document.querySelector('.check').hidden=true;
		document.querySelector('.emptyInp').hidden=false;
		return;
	}
	else{
		document.querySelector('.check').hidden=true;
		document.querySelector('.ic').hidden=false;
		return;
	}
}
function checking(){
	document.querySelector('.check').hidden=false;
	document.querySelector('.emptyInp').hidden=true;
	document.querySelector('.ic').hidden=true;
	setTimeout("verifying()" ,500);
}