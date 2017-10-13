document.addEventListener("DOMContentLoaded", function(){ //Ser till att scriptet inte laddar förens allt är inladdat
    var choosenIng = [];
    function GetCategory(cat) { 
        ajax.get("assets/getcategory.php", {'category':cat}, function (data) { // hämtar data från asset... med en get parameter "category" 
            var options= JSON.parse(data); // skapar en array från json data
            var mainDiv = document.getElementsByClassName('left')[0]; // skapar en länk till vänstra bakgrundsrutan
            mainDiv.innerHTML='';
            for(var i = 0; i < options.length; i++){ //loppar igenom alla ingredienser
                var btn = document.createElement("button"); // skapar en knapp
                btn.innerText=options[i].namn; // skriver ingrediensens namn i knappen
                if (choosenIng.includes(options[i].namn)){
                    btn.classList.add('activeButton');
                }
                mainDiv.appendChild(btn); // puttar in ingrediensen i listan
                
                //gör så att knappen är tryckbar och att den gör något
                (btn.addEventListener('click',function(e){
                    this.classList.toggle('activeButton') // aktiv knapp som är tryckt. går att "trycka av"
                    
                    var index = choosenIng.indexOf(this.innerText);
                    if (index > -1){
                        choosenIng.splice(index,1);
                        
                    }else{
                        choosenIng.push(this.innerText);
                    }
                    GetPizza(choosenIng);
                    //splice gör att det tas bort från arrayen
                    console.log(choosenIng);
                }))
            }
        })
    }
    GetCategory("grönsak");
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
            var mainDiv = document.getElementsByClassName('left')[0];;
            mainDiv.style.background=this.style.background;
            
        });        
    }
        //add event listerner       
        //add event listerner 
        //ta bort active classen från alla tabbar 
        //lägg till active på tabben man just klickade på
        // hämta ingredienserna som ska visas under den tabben
        // byt bakgrundsfärg på main

    function GetPizza(choosenIng) { 
        ajax.get("assets/getPizzas.php", {'ingredienser':choosenIng}, function (data) { // hämtar data från asset... med en get parameter 
            
      var result = JSON.parse(data);
            debugger
        })
    }
    
    
})





