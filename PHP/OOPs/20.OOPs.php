<?php
class Example {
    public $publicProperty = "Public";
    protected $protectedProperty = "Protected";
    private $privateProperty = "Private";

    public function publicMethod() {
        return "Public Method";
    }

    protected function protectedMethod() {
        return "Protected Method";
    }

    private function privateMethod() {
        return "Private Method";
    }

    public function accessMethods() {
        // Can access all methods within the class
        echo $this->publicMethod() . "<br>";     // Outputs: Public Method
        echo $this->protectedMethod() . "<br>";  // Outputs: Protected Method
        echo $this->privateMethod() . "<br>";    // Outputs: Private Method
    }
}

class DerivedExample extends Example {
    public function accessParentMethods() {
        // Can access public and protected methods, but not private
        echo $this->publicMethod() . "<br>";     // Outputs: Public Method
        echo $this->protectedMethod() . "<br>";  // Outputs: Protected Method
        // echo $this->privateMethod();        // Error: Cannot access private method
    }
}

$example = new Example();
echo $example->publicProperty . "<br>";    // Outputs: Public
// echo $example->protectedProperty;      // Error: Cannot access protected property
// echo $example->privateProperty;        // Error: Cannot access private property

$example->accessMethods();               // Outputs all methods

$derivedExample = new DerivedExample();
$derivedExample->accessParentMethods();  // Outputs public and protected methods
?>
