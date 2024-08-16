//Create a toggle button that changes the screen to dark-mode when clicked & light-mode when clicked again.
let modeBtn = document.querySelector("#bg");
let curMode = "Light";

modeBtn.addEventListener("click", () => {
    if(curMode === "Light"){
        curMode = "Dark";
        document.querySelector("body").style.backgroundColor = "black";
    }else{
        curMode = "Light";
        document.querySelector("body").style.backgroundColor = "white";
    }
    console.log(curMode)

});