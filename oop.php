<?php

// 2. Продемонструвати ООП:

//     класи
//     члени класу: публічні, приватні
//     нащадки класу
//     обʼєкти
//     конструктор 
//     виклик батьківського конструктора
//     методи
//     статичні методи
//     магічні методи
//     інтерфейси
//     трейти
//     паттерн Singleton

echo "<h1>OOP in PHP</h1>";

// Class
class Person {
    public $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }

    public function greet() {
        return "Task maded by $this->name";
    }
}

// Inheritance
class Student extends Person {
    public $university;

    public function __construct($name, $age, $university) {
        parent::__construct($name, $age);
        $this->university = $university;
    }

    public function greet() {
        return parent::greet() . ", I graduated from $this->university";
    }
}

// Trait
trait LoggerTrait {
    public function logInfo($message) {
        echo "[INFO]: $message<br>";
    }
}

// Interface
interface LoggerInterface {
    public static function log($message);
}

// Singleton
class Singleton {
    private static $instance = null;

    private function __construct() {
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function sayHello() {
        return "Wow, i`m alone!";
    }
}

// Magic method
class MagicExample {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function __toString() {
        return "Magical object: $this->name";
    }
}

// Demo

echo "<h2>Person</h2>";
$person = new Person("Ihor", 23);
echo $person->greet() . "<br>";
echo $person->name . "<br>"; //public
echo "Age: " . $person->getAge() . "<br>"; //private

echo "<h2>Student (inheritance Person)</h2>";
$student = new Student("IhorSt", 20, "NULES");
echo $student->greet() . "<br>";

echo "<h2>Singleton</h2>";
$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();
echo $instance1->sayHello() . "<br>";
echo "Identical copies? " . (($instance1 === $instance2) ? "Yep" : "No") . "<br>";

echo "<h2>Trait</h2>";
class MyLogger {
    use LoggerTrait;
}
$logger = new MyLogger();
$logger->logInfo("Messages using Trait");

echo "<h2>Interface</h2>";
class MyStaticLogger implements LoggerInterface {
    public static function log($message) {
        echo "[STATIC LOG]: $message<br>";
    }
}
MyStaticLogger::log("Hello via the static method of the interface");

echo "<h2>Magic method __toString</h2>";
$magic = new MagicExample("Object1");
echo $magic;

?>
