document.addEventListener("DOMContentLoaded", function() {
	var form = document.getElementById("selectPizzeria");
	form.addEventListener("submit", function (e) {
		e.preventDefault();
		var list = document.getElementById('pizzaz-in-pizzeria');
		list.innerHTML = "<b>Loading...</p>";
		
		ajax.get('assets/getpizzeriaspizzas.php', {'pizzeria': this[0].value}, printpizzas);
	})
	function printpizzas(data) {
		var list = document.getElementById('pizzaz-in-pizzeria');
		list.innerHTML = "";
		var res = JSON.parse(data);
		for (var pizza of res) {
			(function () {
				var thisp = pizza;
				var li = document.createElement("li");
				var h3 = document.createElement("h3");
				var p = document.createElement("p");
				var uling = document.createElement("ul");
				var button = document.createElement("button");

				h3.innerText = pizza.pizzanr+") "+pizza.name;
				p.innerText = pizza.pris

				for(var ing of pizza.ingredienser){
					var liing = document.createElement("li");
					liing.innerText = ing;
					uling.appendChild(liing)
					
				}
				button.innerText = "Ändra";
				button.addEventListener("click", andra)
				function andra(e) {
					thisp.oldstate = li.innerHTML;
					li.innerHTML = "<h3>"+thisp.pizzanr+")</h3> ";
					var form = document.createElement('form');
					var name = document.createElement('input');
					name.type = "text";
					name.value = thisp.name;
					var pris = document.createElement('input');
					pris.type = "text";
					pris.value = thisp.pris;

					form.appendChild(name)
					form.appendChild(pris)
					var uling2 = document.createElement("ul");
					/*ingrediener*/
					
					var removedIngred = [];
					function updateIngList(ingredienser) {
						uling2.innerHTML ="";
						for(var ing2 of ingredienser){
							(function () {
								// body...
								var ingredisd= ing2

								var liing2 = document.createElement("li");
								var remove = document.createElement("a");
								remove.innerText =" X";
								remove.href="#";
								remove.addEventListener('click',function(e) {
									e.preventDefault();
									thisp.ingredienser;
									removedIngred.push(ingredisd);
									var pos = thisp.ingredienser.indexOf(ingredisd);
									thisp.ingredienser.splice(pos, 1);
									/*Ingredienser som tarsbort ska tas bort från thisp.ingredienser*/
									
									
									this.parentNode.parentNode.removeChild(this.parentNode);
								})

								liing2.innerText = ing2;
								liing2.appendChild(remove);
								uling2.appendChild(liing2);
							})()
						}
					}
					updateIngList(thisp.ingredienser);
					form.appendChild(uling2);
					var display = document.createElement('ul');
					form.appendChild(display);
					/*lägg till ny ingrediens*/
					var nying = document.createElement('input');
					nying.type = 'text';
					nying.placehoder = "Ny ingrediens";
					//Eventlistener för ingredienser
					/*---------------------------------------------------------------------------------------------------------------------------*/
					/*---------------------------------------------------------------------------------------------------------------------------*/
					/*---------------------------------------------------------------------------------------------------------------------------*/
					nying.addEventListener("input", function (e) {
						//console.log(this.value.length);

						if(this.value.length >= 3 && e.inputType != "deleteContentBackward" && e.inputType != 'deleteWordBackward'){
							let input = this;
							ajax.get("../assets/gettopalikeingredients.php", {'term':this.value}, function (data) {
								var options= JSON.parse(data)[0];
								
								if(options.length > 0){
									input.value = options[0].namn;
								}
								
							})
						}
					});
					nying.addEventListener("keydown", function (e) {
						
						if(e.key == "Tab" || e.key == 'Enter') {
				            
				            if(e.preventDefault) {
				                e.preventDefault();
				            }
				            /*add to list of ingrediens*/

				            var li = document.createElement("li");
				            let input = this;
				            ajax.get("../assets/gettopalikeingredients.php", {'term':this.value}, function (data) {
								
								var options= JSON.parse(data)[0];
								if(typeof(options[0].namn) == "string"){
									thisp.ingredienser.push(options[0].namn);
									
									updateIngList(thisp.ingredienser);
								}
				            	input.value = "";
							})
				        }
					})
					/*-------------------------------------------------------------------------------------------------*/
					/*-------------------------------------------------------------------------------------------------*/
					/*-------------------------------------------------------------------------------------------------*/
					/*-------------------------------------------------------------------------------------------------*/
					form.appendChild(nying);
					/*knappar*/
					/*avbryt spara*/
					var avbryt = document.createElement('input');
					avbryt.type = "button";
					avbryt.value = "Avbryt";
					var spara = document.createElement('input');
					spara.type = "submit";
					spara.value = "Spara";
					form.appendChild(avbryt)
					form.appendChild(spara)

					li.appendChild(form);
					avbryt.addEventListener("click",function (e){
						e.preventDefault();
						li.innerHTML = thisp.oldstate;
						li.lastChild.addEventListener('click', andra)
					})
					form.addEventListener("submit",function (e){
						e.preventDefault();
						removedIngred
						thisp.id;
						this;
						for (var ingToRemove of removedIngred) {
							var index = thisp.ingredienser.indexOf(ingToRemove);
							if (index > -1) {
								thisp.ingredienser.splice(index, 1);
							}
						}
						var data = {'pizza':thisp.id, 'namn': thisp.name, 'pris':thisp.pris, 'ingredienser':thisp.ingredienser};
						console.log(data);
						ajax.post("assets/updatepizza.php", data, reprint)
						
						li.lastChild.addEventListener('click', andra)
					})
				}
				li.appendChild(h3);
				li.appendChild(p);
				li.appendChild(uling);
				li.appendChild(button);
				list.appendChild(li);
				function reprint(data) {
					// body...
					debugger;
					
				}
			}
			)()


		}
	}
})