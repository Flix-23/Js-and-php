const dolar = 58
const euroPeso = 63
const libraEsterlina =73
const yen = 2.55


moneda = parseInt(prompt("Ingresa un numero del 1-4 \n" + "1- dolar\n" + "2- euro\n" +"Libra Esterlina\n" + "4- yen"));

let money = parseInt(prompt("Ingrese la cantidad a cambiar"));

switch(moneda){
    case 1: 
    alert("La moneda escogida es el dolar");
    cambio = dolar * money
    if (cambio >= 10000 && cambio < 20000){
        alert("El total de dolar ingresado cambiado a peso es " + cambio + " con una tasa de 10%");
    }
    else if(cambio >= 20001){
        alert("El total de dolar ingresado cambiado a peso es " + cambio + " con una tasa de 15%");
    }
    else{alert("El total de euros ingresados cambiados a peso es " + cambio + " con una tasa de 5%");
    }    
    break
    
    case 2: 
    alert("La moneda escogida es el euro");
    cambio = euroPeso * money
    if (cambio >= 10000 && cambio < 20000){
        alert("El total de euros ingresados cambiados a peso es " + cambio + " con una tasa de 10%");
    }
    else if(cambio >= 20001){
        alert("El total de euros ingresados cambiados a peso es " + cambio + " con una tasa de 15%");
    }
    else{alert("El total de euros ingresados cambiados a peso es " + cambio + " con una tasa de 5%");
    }
    break
    case 3: 
    alert("La moneda escogida es la libra esterlina");

    cambio = libraEsterlina * money

    if (cambio >= 10000 && cambio < 20000){
        alert("El total de libra esterlina ingresada cambiado a peso es " + cambio + " con una tasa de 10%")
    }
    else if(cambio >= 20001){
        alert("El total de libra esterlina ingresada cambiado a peso es " + cambio + " con una tasa de 15%");
    }
    else{alert("El total de euros ingresados cambiados a peso es " + cambio + " con una tasa de 5%"); 
    }
    break

    case 4: 
    alert("La moneda escogida es el yen");
    cambio = yen * money

    if (cambio >= 10000 && cambio < 20000){
        alert("El total de yen ingresado cambiado a peso es " + cambio + " con una tasa de 10%");
    }
    else if(cambio >= 20001){
        alert("El total de yen ingresado cambiado a peso es " + cambio + " con una tasa de 15%");
    }
    else{alert("El total de euros ingresados cambiados a peso es " + cambio + " con una tasa de 5%");
    }
    break
    default: alert("Moneda desconocida");
}
