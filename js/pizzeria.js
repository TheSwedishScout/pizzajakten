document.addEventListener('DOMContentLoaded', function () {
	var mainR = document.getElementsByClassName('right');
	var tabs = document.getElementsByClassName('tabs')[0].children;
	document.getElementById('öppettiderTab').addEventListener('click', function () {
		nullClasses()
		this.classList.add('active');
		document.getElementById('öppetider').classList.remove('hidden');

	});
	document.getElementById('kartaTab').addEventListener('click', function () {
		mainR
		nullClasses()
		this.classList.add('active');
		document.getElementById('karta').classList.remove('hidden');
	});
	function nullClasses() {
		for (var i = mainR.length - 1; i >= 0; i--) {
			mainR[i].classList.add('hidden');
		}
		for (var i = tabs.length - 1; i >= 0; i--) {;
			tabs[i].classList.remove('active');
		}
	}
})