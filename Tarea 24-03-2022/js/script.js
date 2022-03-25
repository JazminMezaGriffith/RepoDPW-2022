var num1=5;
var multi1=0;
console.log("PRIMER EJERCICIO_________________________________________________");
console.log("Imprimiendo la tala del", num1);
for(var i=1; i<=10; i++){
  multi1=num1*i;
  console.log(num+"x"+i+"="+multi1);
}


var num=5;
var num2=7;
var multi=0;
console.log("SEGUNDO EJERCICIO_________________________________________________");
if(num>num2){
  console.log("No es posible procesar la petición")
}else{
  for(var l=num; l<=num2; l++){
    console.log("Imprimiendo la tala del", num);
    for(var i=1; i<=10; i++){
      multi=num*i;
      console.log(num+"x"+i+"="+multi);
    }
    num=num+1;
    console.log("_____________________________");
  }
}
