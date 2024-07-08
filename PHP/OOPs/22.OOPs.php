<?php
    class Employee{
        public $name;
        public $salary;

        function __construct($name, $salary){
            $this->name = $name;
            $this->salary = $salary;
            $this->describe();
        }

        protected function describe(){
            echo "Name: ".$this->name."<br>";
            echo "Salary: ".$this->salary."<br>";
        }
    }

    class Programmer extends Employee {
        public $lang = "PHP";

        function __construct($name, $lang ,$salary){
            $this->name = $name;
            $this->lang = $lang;
            $this->salary = $salary;
            $this->describe();
        }


    }

    $parth = new Employee("Parth", 30000);
    $sam = new Programmer("Sam", "Python" ,3000);
    
    
    
?>