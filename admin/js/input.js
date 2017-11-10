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
	/*PIZZA*/

	var pizza= {};
	document.getElementById('ingredinesIn').addEventListener("input", function (e) {
		//console.log(this.value.length);

		if(this.value.length >= 3 && e.inputType != "deleteContentBackward" && e.inputType != 'deleteWordBackward'){
			let input = this;
			ajax.get("../assets/gettopalikeingredients.php", {'term':this.value}, function (data) {
				var options= JSON.parse(data)[0];

				input.value = options[0].namn;
				
			})
		}
	})
	pizza.ingredienser=[];
	document.getElementById('ingredinesIn').addEventListener("keydown", function (e) {
		
		if(e.key == "Tab" || e.key == 'Enter') {
            
            if(e.preventDefault) {
                e.preventDefault();
            }
            /*add to list of ingrediens*/
            var ul = document.getElementById('list');
            var li = document.createElement("li");
            let input = this;
            ajax.get("../assets/gettopalikeingredients.php", {'term':this.value}, function (data) {
				
				var options= JSON.parse(data)[0];
				if(typeof(options[0].namn) == "string"){
					if(!pizza.ingredienser.includes(options[0].namn)){
						pizza.ingredienser.push(options[0].namn);
            			li.innerText = options[0].namn;
            			ul.appendChild(li);
					}
				}
				console.log(pizza);
            	input.value = "";
			})
        }
	})
	document.getElementById('AddPizza').addEventListener("submit", function(e){
		e.preventDefault();
		//send information to add pizza
		pizza.pizzeria = this[0].value;
		pizza.namn = this[1].value;
		pizza.nummer = this[2].value;
		pizza.pris = this[4].value;
		var inputs = this;
		ajax.post("../assets/savepizza.php", pizza, function (data) {
			// body...
			inputs
			inputs[1].value = '';
			inputs[2].value = Number(inputs[2].value)+1;
			inputs[4].value = '';
			document.getElementById('list').innerHTML= "";
			pizza.ingredienser = [];
			pizza.namn =""
			pizza.nummer =""
			pizza.pris =""

			debugger;
		})
	})
	document.getElementById('SelectPizzeria').addEventListener("change", function (e) {
		var pizzeria = this.value;
		ajax.get("./assets/getMaxNr.php", {'pizzeria': pizzeria}, function (data) {
			//http://localhost/pizzajakten/admin/assets/getMaxNr.php?pizzeria=156
			pizzeria;
			document.getElementById('pizzaNR').value = Number(data) +1;
		})
		
	})
	document.getElementById('nyIngrediens').addEventListener('submit', function (e) {
		e.preventDefault();
		var ing = {};
		var elems = {};
		elems.namn = this[0];
		ing.namn = this[0].value;
		elems.kat = this[1];
		ing.kat = this[1].value;
		debugger;
		ajax.post("./assets/nyIng.php", ing, function (data) {
			elems.namn.value = "";

		})
	});
})