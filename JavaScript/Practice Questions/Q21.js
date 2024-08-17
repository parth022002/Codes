//You are creating a website for your college. Create a class User with 2 properties, name & email. It also has a method called viewData( ) that allows user to view website data

let DATA = "Information"

class user{
    constructor(name, email)
    {
        this.name = name;
        this.email = email;
    }

    viewData() {
        console.log(DATA);
        console.log(`\n Name: ${this.name}, Email: ${this.email}`);
    }
}

let student1 = new user("Parth", "parthahuja@gmail.com");
let student2 = new user("Rocky", "rock@gmail.com");
let prof1 = new user("Michael", "profmichael@gmail.com");