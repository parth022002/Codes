/*Write a code which can give grades to students according to their scores:
80-100, A
70-89, B
60-69, C
50-59, D
0-49, F
*/

let score = prompt("Enter Your Score (0 - 100)");

if (score<=100 && score>=90){
    grade = "A";
} else if(score<=89 && score>=70){
    grade = "B";
}else if(score<=69 && score>=60){
    grade = "C";
}else if(score<=59 && score>=50){
    grade = "D";
}else{
    grade = "F";
}

console.log("Score = "+ score +", So your grade is "+grade)