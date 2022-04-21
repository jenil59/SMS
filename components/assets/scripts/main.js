function openbox(a) {
    var lsc = a.lastElementChild;  
    lsc.classList.toggle("openbox");
    if(lsc.classList.contains("openbox")){
        var mt =setTimeout(()=>{
            lsc.classList.remove("openbox");
            console.log("ok");
        },10000)      
    }
}