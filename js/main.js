document.addEventListener("DOMContentLoaded", function () {
	document.getElementById('burger').addEventListener("click", function (e) {
		document.addEventListener('click', hide)
		var meny = document.getElementById('meny')
		meny.classList.add("visabale");
	});
	//I'm using "click" but it works with any event
	function hide(event) {
		var isClickInside = document.getElementById('meny').contains(event.target);
		var meny = document.getElementById('burger').contains(event.target);


	  if (!isClickInside && !meny) {
	    document.getElementById('meny').classList.remove("visabale");
	  }
	};
})