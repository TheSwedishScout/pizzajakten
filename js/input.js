document.addEventListener('DOMContentLoaded', function(e) {
	var check = {};
	check.all = document.getElementById('alldays');
	check.weekend = document.getElementById('weekend');
	check.all.addEventListener('change', toggleAll);
	check.weekend.addEventListener('change', toggleWeekend);
	function toggleAll(e) {
		
			document.getElementById('olikaOppetiderInput').classList.toggle('hidden');
			if(this.checked){
				document.getElementById('firstTimeinputName').innerText = "Mån-Sön";
			}else{
				document.getElementById('firstTimeinputName').innerText = "Måndag";
				
			}
	}
	function toggleWeekend(e) {
		
			document.getElementById('vardahhelginput').classList.toggle('hidden');
			if(this.checked){
				document.getElementById('firstTimeinputName').innerText = "Mån-Tor";
			}else{
				document.getElementById('firstTimeinputName').innerText = "Måndag";
				
			}
	}
})