document.addEventListener("DOMContentLoaded", function(){ //Ser till att scriptet inte laddar förens allt är inladdat
    var choosenIng = [];
    var choosenIngElem = [];
    var deChoosenIng = [];
    var deChoosenIngElem = [];
    function GetCategory(cat) { 
        ajax.get("assets/getcategory.php", {'category':cat}, function (data) { // hämtar data från asset... med en get parameter "category" 
            var options= JSON.parse(data); // skapar en array från json data
            var mainDiv = document.getElementById('shoises'); // skapar en länk till vänstra bakgrundsrutan
            mainDiv.innerHTML='';
            for(var i = 0; i < options.length; i++){ //loppar igenom alla ingredienser
                var btn = document.createElement("button"); // skapar en knapp
                btn.innerText=capitalizeFirstLetter(options[i].namn); // skriver ingrediensens namn i knappen
                if (choosenIng.includes(options[i].namn)){
                    btn.classList.add('activeButton');
                }
                mainDiv.appendChild(btn); // puttar in ingrediensen i listan
                
                //gör så att knappen är tryckbar och att den gör något
                (btn.addEventListener('click', adding));

                function adding(e){
                    
                    var index = choosenIng.indexOf(this.innerText);
                    var indexNot = deChoosenIng.indexOf(this.innerText);
                    if (index > -1){ //Finns i arrayn chosen ing
                        choosenIng.splice(index,1);
                        choosenIngElem[index].classList.remove('activeButton');
                        choosenIngElem[index].classList.add('unvanted');
                        choosenIngElem.splice(index,1);
                        var indexOfElem = choosenIngElem.indexOf(this);
                        deChoosenIng.push(this.innerText);
                        deChoosenIngElem.push(this);
                        
                    }else if(indexNot > -1){ // i unselected
                        deChoosenIng.splice(indexNot,1);
                        deChoosenIngElem[indexNot].classList.remove('unvanted');
                        deChoosenIngElem.splice(indexNot,1);
                    }else{
                        this.classList.add('activeButton') // aktiv knapp som är tryckt. går att "trycka av"
                        choosenIng.push(this.innerText);
                        choosenIngElem.push(this);
                    }
                    GetPizza(choosenIng, deChoosenIng);
                    //splice gör att det tas bort från arrayen
                    console.log(choosenIng);
                    console.log(deChoosenIng);
                    
                    //Add a list of selected items on the top
                    var ul = document.getElementById('selected');
                    ul.innerHTML= "";
                    for(var ingLoop of choosenIng){
                        var li = document.createElement('li');
                        li.innerText = ingLoop;
                        ul.appendChild(li);
                        (li.addEventListener('click', adding));
                    }
                }
            }
        })
    }
    GetCategory("grönsaker");
    // hämta tabarna
        var tabs = document.getElementsByClassName('tabs')[0];
    
    for(var tab of tabs.children){
        tab.addEventListener('click',function(e){
            for(var tab2 of tabs.children){
                tab2.classList.remove('active');
            }
            e.preventDefault();
            this.classList.add('active');
            GetCategory(this.innerText);
            var mainDiv = document.getElementsByClassName('left')[0];
            var classen = this.classList[1]
            mainDiv.classList.remove("tab1");
            mainDiv.classList.remove("tab2");
            mainDiv.classList.remove("tab3");
            mainDiv.classList.remove("tab4");
            mainDiv.classList.remove("tab5");
            mainDiv.classList.remove("tab6");
            mainDiv.classList.add(classen);
            
            
        });        
    }
        //add event listerner       
        //add event listerner 
        //ta bort active classen från alla tabbar 
        //lägg till active på tabben man just klickade på
        // hämta ingredienserna som ska visas under den tabben
        // byt bakgrundsfärg på main

    function GetPizza(choosenIng, deChoosenIng) { 
        var valda = choosenIng;
        var ovalda = deChoosenIng;
        ajax.get("assets/getPizzas.php", {'ingredienser':choosenIng, 'ejdessa': deChoosenIng}, function (data) { // hämtar data från asset... med en get parameter 
            var result = JSON.parse(data);
            console.log(result);
            var ul = document.getElementsByClassName('resultat')[0];
            ul.innerHTML = "";
            for (var pizza of result ){
                //Create and print a pizza object
                var link = document.createElement("a");
                link.href = "pizzerior?ingredienser="+pizza.ingredienser.join(",")
                var li = document.createElement("li");
                li.classList.add("resultatInner");
                var image = document.createElement("img");
                image.src = "images/pizza6.png";
                var h2 = document.createElement("h2");
                h2.innerText = pizza.namn;
                var h3 = document.createElement("ul");
                var sorted = [];
                for (var i = 0, L=valda.length ; i < L; i++) {
                  sorted[i]=valda[i].toLowerCase();
                }

                for (var i = 0; i < pizza.ingredienser.length; i++) {
                    var ingredElem = document.createElement("li");
                    ingredElem.innerText = pizza.ingredienser[i];

                    if(sorted.includes(pizza.ingredienser[i].toLowerCase())) {
                        ingredElem.classList.add('chosen');
                    }
                    h3.appendChild(ingredElem);
                }
                var ingred = pizza.ingredienser.join(", ");
                /*var image = document.createElement("h4");
                image.innerText = "images/pizza6.png";
                **/
                link.appendChild(image);
                link.appendChild(h2);
                link.appendChild(h3);
                li.appendChild(link);
                ul.appendChild(li);

            }
        })
    }
})
