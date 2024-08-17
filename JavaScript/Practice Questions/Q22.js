// Create a new class called Admin which inherits from User. Add a new method called editData to Admin that allows it to edit website data.

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

class Admin extends user {
    constructor(name, email){
        super(name, email);
    }
    editData(){
        DATA = "Edited Information";
    }
}

let student1 = new user("Parth", "parthahuja@gmail.com");
let student2 = new user("Rocky", "rock@gmail.com");
let prof1 = new user("Michael", "profmichael@gmail.com");

let admin = new Admin("admin", "admin@gmail.com");