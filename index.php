<?php

// 1. Продемонструвати базовий синтаксис PHP: 

//     середовище розробки 
//     локальний веб-сервер  
//     робота зі змінними, з рядками 
//     конкатенація 
//     масиви, асоціативні масиви
//     explode, implode
//     розіменування змінних
//     порівняння
//     приведення типів

echo "<h2>Working with variables</h2>";

$name = "Ihor";
$age = 23;
$isStudent = false;

echo "Name: $name <br>";
echo "Age: $age <br>";
echo "Student: " . ($isStudent ? "Yep" : "No") . "<br>";


// --------------------------------------------------

echo "<h2>Working with strings and concatenation</h2>";

$firstName = "Ihor";
$lastName = "Syniaiev";

$fullName = $firstName . " " . $lastName;
echo "Full name: $fullName <br>";


// --------------------------------------------------

echo "<h2>Arrays</h2>";

$numbers = [1, 2, 3, 4, 5];

echo "First element: $numbers[0] <br>";


// --------------------------------------------------

echo "<h2>Associative array</h2>";

$user = [
    "name" => "Ihor",
    "age" => 23,
    "city" => "Kyiv"
];

echo "Username: " . $user["name"] . "<br>";


// --------------------------------------------------

echo "<h2>explode() and implode()</h2>";

$string = "0 sleep hours,What you mean,0 steam playtime";
$arrayFromString = explode(",", $string);

echo "Second element after explode: " . $arrayFromString[1] . "<br>";

$newString = implode(" | ", $arrayFromString);
echo "Result implode: " . $newString . "<br>";


// --------------------------------------------------

echo "<h2>Renaming variables</h2>";

$varName = "message";
$message = "That's right, I came here undercover.";

echo $$varName . "<br>";


// --------------------------------------------------

echo "<h2>Comparison</h2>";

$a = 10;
$b = "10";

echo "== : ";
echo ($a == $b) ? "true" : "false";

echo "<br>=== : ";
echo ($a === $b) ? "true" : "false";


// --------------------------------------------------

echo "<h2>Type conversion</h2>";

$stringNumber = "25";
$converted = (int)$stringNumber;

echo "Type before: ";
echo gettype($stringNumber);

echo "<br>Type after: ";
echo gettype($converted);

?>
