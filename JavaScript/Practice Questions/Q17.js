//Create 3 divs with common class name - “box”. Access them & add some unique text to each of them.

let divs = document.querySelectorAll(".box");

let idx = 1;
for(div of divs){
    div.innerText += ` \n New values of index ${idx} div` ;
    idx++;
}
