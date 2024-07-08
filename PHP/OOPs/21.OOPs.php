<?php
class Employee{
    public $name = "Parth";
    private $age = 21;
    private $salary = 10000;

    function setSalary($salary){
        $this->salary = $salary;
    }
    function getSalary(){
        echo "Salary of $this->name is $this->salary <br>";
    }

    function showName(){
        echo "The Name of employee is $this->name <br>";
    }
}
//Inherting a new class Programmer from Employee
class Programmer extends Employee{
    private $language = 'PHP';
    public function changeLanguage($lang){
        $this->language = $lang;
    }
    public function showLanguage(){
        echo "The language of programmer is $this->language <br>";
    }
}

$John = new Employee();
$John->name = "John" ;
$John->showName();
$John->getSalary();
$John->setSalary(1000);
$John->getSalary();


$Sam = new Programmer();
$Sam->name = "Sam";
$Sam->showName();
$Sam->getSalary();
$Sam->setSalary(100000);
$Sam->getSalary();
$Sam->showLanguage();
$Sam->changeLanguage('Python');
$Sam->showLanguage();

?>