<?php
$databases = file_get_contents("data.txt");
$total = 0;
$i = 0;

function calculate_total_amount()
{
    global $databases, $total, $i;
    $temp = array();
    $j = 0;
    
    if (empty($databases) || $i >= strlen($databases)) {
        return $total; }
    
    if ($databases[$i] == "\n")
        $i++;
    
    if ($i < strlen($databases)) {
        while ($i < strlen($databases) && $databases[$i] != '+' && $databases[$i] != '|' && $databases[$i] != "\n")
        {
            $temp[$j] = $databases[$i];
            $i++;
            $j++;
        }
        
        // Skip to the end of the current line
        while ($i < strlen($databases) && $databases[$i] != "\n")
            $i++;
        
        if (!empty($temp)) {
            $total = $total + intval(implode('', $temp));
        }
    }
    calculate_total_amount();
    return $total;
}

$result = calculate_total_amount();

echo "You Spent " . $result . " On Total";
?>
