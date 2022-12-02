<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 

function sum(...$nums){
$sum =0;

foreach ($nums as $num) {
    # code...
    $sum = $sum + $num;
}
return $sum;
}
echo sum(1, 2, 3, 4, 5, 6, 7);
?>
</body>
</html>