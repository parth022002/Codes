//Create a <p> tag in html, give it a class & some styling. Now create a new class in CSS and try to append this class to the <p> element. Solve this problem using classList. Did you notice, how you overwrite the class name when you add a new one?
let para = document.querySelector("p");
para.classList.add("newClass");
