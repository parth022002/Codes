class Person {
    // Constructor to initialize properties
    constructor(name, age) {
        this.name = name; // Property
        this.age = age;   // Property
    }

    // Method to describe the person
    describe() {
        console.log(`${this.name} is ${this.age} years old.`);
    }
}

// Creating an instance of the Person class
let person1 = new Person("Parth", 21);

// Calling a method on the instance
person1.describe(); // Output: Parth is 21 years old.


// inheritance

// Parent class
class Animal {
    constructor(name) {
        this.name = name;
    }

    speak() {
        console.log(`${this.name} makes a sound.`);
    }
}

// Child class inheriting from Animal
class Dog extends Animal {
    constructor(name, breed) {
        super(name); // Call the parent class's constructor
        this.breed = breed;
    }

    speak() {
        console.log(`${this.name} barks.`);
    }
}

// Creating instances of the classes
let dog1 = new Dog("Buddy", "Golden Retriever");

// Calling methods
dog1.speak(); // Output: Buddy barks.

// super class

class Employee {
    constructor(name, salary) {
        this.name = name;
        this.salary = salary;
    }

    describe() {
        console.log(`${this.name} earns $${this.salary} per year.`);
    }
}

class Manager extends Employee {
    constructor(name, salary, department) {
        super(name, salary); // Call the parent class's constructor
        this.department = department;
    }

    describe() {
        super.describe(); // Call the parent class's describe method
        console.log(`${this.name} manages the ${this.department} department.`);
    }
}

let manager1 = new Manager("Alice", 90000, "HR");
manager1.describe();
// Output:
// Alice earns $90000 per year.
// Alice manages the HR department.
