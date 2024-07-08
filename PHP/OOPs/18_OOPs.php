<?php
echo "OOPS - Class & Objects<br>";
class player{
    //Properties
    public $name;
    public $speed = 5;
    public $running = false;

    //Methods
    function set_name($name){
        $this->name = $name;
    }
    function get_name(){
        return $this->name;
    }
    function run(){
        $this->running = true;
    }

    function stopRun(){
        $this->running = false;
    }
}

$player1 = new Player();
$player1->set_name("Parth");
echo $player1->get_name();
?>