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
	  	event.preventDefault();
	    document.getElementById('meny').classList.remove("visabale");
		document.removeEventListener('click', hide)
	  }
	};
    if(!!document.getElementById('cookie_button')){
        document.getElementById('cookie_button').addEventListener('click', function (e) {
            ajax.post ('assets/start_cookie.php', {}, function (data) {
                document.getElementById('cookie_button').parentNode.classList.add('hidden');
                
            });
        })
    }
    if(!!document.getElementById('tillKassa')){
        document.getElementById('tillKassa').addEventListener('click', function (e) {
            e.preventDefault();
            if (pizzerior > 1){
                if (confirm("Du har mer än 1 pizzeria") == true) {
                    txt = "You pressed OK!";
                    window.location.replace('kassa.php');
                } else {
                    txt = "You pressed Cancel!";
                }
                console.log(txt);
            }
        })
    }
    

    if(!!document.getElementsByClassName('star')){
        elems = document.getElementsByClassName('star');
        for (var i = 0; i < elems.length; i++) {
            (function () {
                var denna = i;
                elems[i].addEventListener('click', function (e) {
                    e.preventDefault()
                    var id = this.attributes.value.nodeValue;
                    star(id, elems[denna])
                }
                )
            }
            )()
            

        }
        
    }
    function star(id, elem) {
        ajax.post('assets/starPizza.php', {'pizza': id}, function (data) {
            data = JSON.parse(data);
            var hmm = typeof data.deleted; 
            elem.classList.toggle('stared');
            /*if (typeof data.deleted !== 'undefined'){
                elem.innerHTML = "Star";
            }else{
                elem.innerHTML = "Stared";
            }*/
            //debugger
        })
    }
})
// AJAX CODE FROM https://stackoverflow.com/questions/8567114/how-to-make-an-ajax-call-without-jquery
var ajax = {};
ajax.x = function () {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }
    var versions = [
        "MSXML2.XmlHttp.6.0",
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < versions.length; i++) {
        try {
            xhr = new ActiveXObject(versions[i]);
            break;
        } catch (e) {
        }
    }
    return xhr;
};

ajax.send = function (url, callback, method, data, async) {
    if (async === undefined) {
        async = true;
    }
    var x = ajax.x();
    x.open(method, url, async);
    x.onreadystatechange = function () {
        if (x.readyState == 4) {
            callback(x.responseText)
        }
    };
    if (method == 'POST') {
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    
    x.send(data)
};

ajax.get = function (url, data, callback, async) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async)
};

ajax.post = function (url, data, callback, async) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url, callback, 'POST', query.join('&'), async)
};
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}




