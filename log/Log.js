function login(){
    let user = document.getElementById("usuario").value;
    let password = document.getElementById("clave").value;
    
        if(user == "" || password.length < 3){
        alert("Logueado incorrectamente");
    }
    else{
        alert(user + " bienvenido");
    }
}
