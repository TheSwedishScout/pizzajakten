document.addEventListener('DOMContentLoaded', function() {
    // body...
    document.getElementById('loginForm').addEventListener('submit', function(e){
        e.preventDefault()
        let user = this.children['username'];
        let pass = this.children['password'];
        let errorMSG = this.children[3];
        ajax.post('assets/logInParse.php', {"username":user.value, "password":pass.value, 'page': "register"}, function(data){
            var data = JSON.parse(data);
            if (data.sucsess){
                user.value = "";
                pass.value = "";
                location.href = document.referrer;
            }else{
                
                errorMSG.innerText = data.error;
            }
            if(formValidation === true) {
                window.open("path/to/page.html", "_self");
    }        else {
                errorMSG.innerText = data.error;
    }
            
        })
        // Code taaken from: https://codepen.io/colorlib/pen/rxddKy
    });
    document.getElementById('register-form').addEventListener('change', function(e){
        let errorMSG = this.children[5];
        errorMSG.innerText = "";
        
    })
    document.getElementById('register-form').addEventListener('submit', function(e){
        e.preventDefault()
        let username = this.children['username'];
        let password = this.children['password'];
        let name = this.children['name'];
        let email = this.children['email'];
        let errorMSG = this.children[5];
        ajax.post('assets/register_parse.php', {"username":username.value, "password":password.value, "name":name.value, "email":email.value}, function(data){
            var data = JSON.parse(data);
            if (data.sucsess){
                username.value = ""
                password.value = ""
                name.value = ""
                email.value = ""
                switshinput(username.parentNode);
            }else{
                errorMSG.innerText = data.error;
            }
        })
        // Code taaken from: https://codepen.io/colorlib/pen/rxddKy
    });
    var message = document.getElementsByClassName('message');
    for (var text of message){
        text.getElementsByTagName('a')[0].addEventListener('click', switshinput);
    }
    function switshinput(e) {
        if(e.tagName =="FORM"){
            var form = e;
        }else{
            var form = e.target.parentNode.parentNode;
        }
            form.style.display = "none";
            if(form.nextElementSibling != null){
                form.nextElementSibling.style.display = "block";
            }else{
                form.previousElementSibling.style.display = "block";
            }

    }
    
})