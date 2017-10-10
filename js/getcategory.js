document.addEventListener("DOMContentLoaded", function(){
    ajax.get("assets/getcategory.php", {'category':"grönsak"}, function (data) {
        var options= JSON.parse(data);
        debugger
        for(var i = 0; i < options.length; i++){
            var btn = document.createElement("button");
            var mainDiv = document.getElementsByClassName('left')[0]; 
            
            btn.innerText=options[i].namn;
            mainDiv.appendChild(btn);
        }
    })
})