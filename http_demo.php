<?php

// 3. Продемонструвати обробку HTTP-запитів:

//     обробити GET, POST запити
//     показати використання масивів $_GET, $_POST, $_REQUEST
//     створити надбудову (клас-wrapper) над $_GET, $_POST
//     продемонструвати роботу з cookies
//     продемонструвати роботу з сесіями

session_start();
echo "<h1>Demonstration of HTTP request processing</h1>";
?>

<h2>Form GET</h2>
<form method="get" action="">
    Text?: <input type="text" name="name_get">
    <input type="submit" value="Send GET">
</form>

<h2>Form POST</h2>
<form method="post" action="">
    Text?: <input type="text" name="name_post">
    <input type="submit" value="Send POST">
</form>

<?php
// GET, POST, REQUEST
if (!empty($_GET['name_get'])) {
    echo "<p>Obtained through GET: " . htmlspecialchars($_GET['name_get']) . "</p>";
}

if (!empty($_POST['name_post'])) {
    echo "<p>Obtained through POST: " . htmlspecialchars($_POST['name_post']) . "</p>";
}

// $_REQUEST
if (!empty($_REQUEST['name_get'])) {
    $value = $_REQUEST['name_get'];
    if (is_array($value)) $value = implode(", ", $value);
    echo "<p>\$_REQUEST sees GET: " . htmlspecialchars($value) . "</p>";
}

if (!empty($_REQUEST['name_post'])) {
    $value = $_REQUEST['name_post'];
    if (is_array($value)) $value = implode(", ", $value);
    echo "<p>\$_REQUEST sees POST: " . htmlspecialchars($value) . "</p>";
}


// Class-wrapper for GET/POST
class Request
{
    public static function get($key, $default = null)
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public static function post($key, $default = null)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
}

// Wrapper demo
$nameFromWrapperGET = Request::get('name_get', 'empty');

if (is_array($nameFromWrapperGET)) {
    $nameFromWrapperGET = implode(", ", $nameFromWrapperGET);
}

echo "<p>Wrapper GET: $nameFromWrapperGET</p>";

$nameFromWrapperPOST = Request::post('name_post', 'empty');

if (is_array($nameFromWrapperPOST)) {
    $nameFromWrapperPOST = implode(", ", $nameFromWrapperPOST);
}

echo "<p>Wrapper POST: $nameFromWrapperPOST</p>";


// Cookies
if (!isset($_COOKIE['visited'])) {
    setcookie('visited', 1, time() + 3600);
    echo "<p>Cookie set.</p>";
} else {
    echo "<p>Cookie value: " . $_COOKIE['visited'] . "</p>";
}

// Sessions
if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits']++;
}
echo "<p>You have visited this page " . $_SESSION['visits'] . " time(s) in this session.</p>";

?>