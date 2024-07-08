<?php
echo "OOPS - Class & Objects<br>";

class Employee{
    //properties
    public $name;
    public $salary;

    //methods
    //constructor - IT allows to initialize objects. It is the code which is executed whenever a new object is instantiated(created).
    function __construct($name, $salary){
        $this->name = $name;
        $this->salary = $salary;
        }
    //destructor - It is the code which is executed whenever an object is destroyed.
    function __destruct(){
        echo "Employee $this->name is destroyed <br>";
        }
    
}

$parth = new Employee("Parth", 56000);
$John = new Employee("John", 77000);

echo "Salary of $parth->name is $parth->salary <br>";
echo "Salary of $John->name is $John->salary <br>";

?>