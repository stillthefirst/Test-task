var btn = document.getElementById("btn");
var close = document.getElementById("close"); 

btn.onclick = function(){
    overlay();
}
close.onclick = function(){
    overlay();
}

 function overlay() {
    el = document.getElementById("overlay");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
};