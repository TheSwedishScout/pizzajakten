document.addEventListener("DOMContentLoaded", function(){ //Ser till att scriptet inte laddar förens allt är inladdat
    function GetCategory(cat) { 
        ajax.get("assets/getcategory.php", {'category':cat}, function (data) { // hämtar data från asset... med en get parameter "category" 
            var options= JSON.parse(data); // skapar en array från json data
            var mainDiv = document.getElementsByClassName('left')[0]; // skapar en lenk till högra rutan
            debugger;
            for(var i = 0; i < options.length; i++){ //loppar igenom alla ingredienser
                var btn = document.createElement("button"); // skapar en knapp
                
                btn.innerText=options[i].namn; // skriver ingrediensens namn i knappen
                mainDiv.appendChild(btn); // puttar in ingrediensen i listan
                //gör så att knappen är tryckbar och att den gör något
            }
        })
    }
    GetCategory("KÖTT");
    // hämta tabarna
    //add event listerner 
        //ta bort active classen från alla tabbar 
        //lägg till active på tabben man just klickade på
        // hämta ingredienserna som ska visas under den tabben
        // byt bakgrunds färg på main

})