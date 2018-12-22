var start = new Date().getTime();
var best = 50000;
        
//funcion que crea un color aleatorio
function randomColor() {
    var letters = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];
    var color = "#";
            
    for(var i = 0; i < 6; i++){
        color = color + letters[Math.floor(Math.random() * 16)];
    }
            
    return color;
}
        
function makeShapeAppear() {
    //variables aleatorias de posicion y tamaño
    var randomTop = Math.random()*300;
    var randomLeft = Math.random()*300;
    var randomWH = Math.floor(Math.random()*150)+50;
    var color = randomColor();
            
    document.getElementById("shape").style.top = randomTop + "px";
    document.getElementById("shape").style.left = randomLeft + "px";
    document.getElementById("shape").style.width = randomWH + "px";
    document.getElementById("shape").style.height = randomWH + "px";
    document.getElementById("shape").style.backgroundColor = color;
    document.getElementById("shape").style.display = "block";
            
    //reinicia el reloj al aparecer
    start = new Date().getTime();
            
}
        
        
function appearAfterDelay() {
    setTimeout(makeShapeAppear, Math.random()*3000);          
}
        
appearAfterDelay();
        
document.getElementById("shape").onclick=function(){
            
    document.getElementById("shape").style.display = "none";

    var end = new Date().getTime();
    var timeTaken = (end-start)/1000;
            
    document.getElementById("timeTaken").innerHTML = timeTaken + "s";
            
    if (timeTaken < best){
        best = timeTaken;
        document.getElementById("bestTime").innerHTML = timeTaken + "s";
    }
            
    appearAfterDelay();
            
};