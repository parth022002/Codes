//We are given array of marks of students. Filter our of the marks of students that scored 90+.

let score = [45,66,89,98,95,99];

console.log("All the scores : "+score)

let result = score.filter((element) => {
    return element >= 90;
});

console.log("Scored 90+ : "+result)