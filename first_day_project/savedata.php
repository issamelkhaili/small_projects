<?php
$datalist = $_POST["amount"] . "+|+|+" . $_POST["category"] . "+|+|+" . $_POST["date"] . "+|+|+" . $_POST["description"];

if (empty($_POST["amount"]) && empty($_POST["category"]) && empty($_POST["date"]) && empty($_POST["description"])) {
    echo "<h1>Invalid input ('No input')</h1><style>h1{color:red};</style>";
    exit();
}

if (strpos($_POST["amount"], '+') !== false || strpos($_POST["category"], '+') !== false || strpos($_POST["date"], '+') !== false || strpos($_POST["description"], '+') !== false) {
    echo "<body><h1>Invalid input (+)</h1></body><style>h1{color:red};body{background-color:black};</style>";
    exit();
}

if (strpos($_POST["amount"], '|') !== false || strpos($_POST["category"], '|') !== false || strpos($_POST["date"], '|') !== false || strpos($_POST["description"], '|') !== false) {
    echo "<body><h1>Invalid input (|)</h1></body><style>h1{color:red};body{background-color:black};</style>";
    exit();
}
if (!$_POST["amount"] || !$_POST["category"] || !$_POST["date"] || !$_POST["description"]){
    echo "<body><h1>Invalid input (+)</h1></body><style>h1{color:red};body{background-color:black};</style>";
    exit();
}

file_put_contents("data.txt", $datalist . "\n", FILE_APPEND);
echo "<h1>Data saved successfully!</h1><style>h1{color:green};</style>";
?>
