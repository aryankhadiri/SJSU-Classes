<html>
    <body>
<?php

function isPrime($num){
    $flag = TRUE;
    for ($i = 2; $i<=sqrt($num); $i++){
        if ($num%$i == 0){
            $flag = FAlSE;
        }          
    }
    return $flag;
}
function prime_function($num){
    if ($num<=1){
        echo 'There are no prime prior to '.$num;
        echo '<br>';
    }
    if($num==2){
        echo 'There are no prime number prior to '.$num; 
        echo '<br>';
    }
    else{
        $primes = array();
        $j = 0;   
        for ($i = 2; $i <$num ; $i++){
            if (isPrime($i)){
                $primes[$j] = $i;
                $j++;
            }
        }
        echo "The prime numbers prior to the ".$num." are: ";
        echo "<br>";
        $arraylength = count($primes);
        for ($x = 0; $x<$arraylength-1; $x++){
            echo $primes[$x].", ";
        }
        echo $primes[$arraylength-1];
        echo '<br>'; 
    }
}
function test_prime_function(){
    $input = 10;
    echo 'All the prime numbers before '.$input.' is:';
    echo '<br>';
    prime_function($input);
    echo '<br>';
    $input2 = 2;
    echo 'All the prime numbers before '.$input2.' is:';
    echo '<br>';
    prime_function($input2);
    echo '<br>';
    $input3 = 100;
    echo 'All the prime numbers before '.$input3.' is:';
    echo '<br>';
    prime_function($input3);
    echo '<br>';
    $input4 = 239;
    echo 'All the prime numbers before '.$input4.' is:';
    echo '<br>';
    prime_function($input4);
    echo '<br>';
    
}

?>
 <h1>Prime Numbers before the input</h1>
    <form name = "input" action = "assignment1.php" method = "post">
        <label for = "input" name = "input">Input</label>
        <input id = "input" name = "theinput" type = "text">
        <input type = "Submit" value = "Calculate" name = 'submit'>
        
    </form>   
<form action = "assignment1.php">
<input type = "Submit" name = "return" value = "Clear">
</form>
<?php 
if (isset($_POST['submit'])){
    $input = $_POST['theinput'];
    prime_function($input);
}
?>
</body>
</html>
