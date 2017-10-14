document.getElementById('loginForm').addEventListener('submit', function(e){
        e.preventDefault()
        let user = this.children['username'];
        let pass = this.children['password'];
        postAjax('assets/logInParse.php', {"username":user.value, "password":pass.value, 'page': "register"}, function(data){
            var data = JSON.parse(data);
            if (data.sucsess){
                user.value = "";
                pass.value = "";
            }else{
                var errorMSG = document.createElement('p');
                errorMSG.innerText = data.error;
                login[1].appendChild(errorMSG)
            }
        })
    });