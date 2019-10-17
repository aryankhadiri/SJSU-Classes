<!DOCTYPE html>
<html>
<head>
<link href = "assignment2.css" rel = "stylesheet" type = "text/css">

<title>Roman Numeral Converter</title>
</head>
<body>
    <header>
    <h1>Welcome!</h1>
    <h2>Roman Numeral Converter</h2>;
    
    </header>
    <h2>A little Background:</h2>
    <p>
        Roman numerals are a numeral system that originated in ancient Rome and remained the usual way of
        writing numbers throughout Europe well into the Late Middle Ages. 
        Numbers in this system are represented by combinations of letters from the 
        Latin alphabet. Modern usage employs seven symbols, each with a fixed integer value.<br><br>
    </p>
    <p class = "table">    
        <strong>Symbol</strong>	I	V	X	L	C	D	M<br>
        <strong>Value</strong>	1	5 	10	50	100	500	1,000
    </p><br>
    <div class = "Inputs">
        <form  action = "Roman-Numeral.php" method = "post">
            <label for = "input"><strong>Input</strong></label>
            <input type = "text" name = "RomanNumeral">
            <input type = "Submit" name = "Converter" Value = "Convert">
            <input type = "Submit" name = "Clear" Value = "Clear" >
        </form>
    </div>
<?php
function value($char){
    switch ($char){
        case 'I': return 1;
        case 'V': return 5;
        case 'X': return 10;
        case 'L': return 50;
        case 'C': return 100;
        case 'D': return 500;
        case 'M': return 1000;
        default: return Null;
    }
}
function converter($string)
//convert the string to decimal numbers in an array
{
    $res = 0;
    
    for ($i = 0; $i< strlen($string); $i++){
        if(value($string[$i]) != Null){
            $s1 = value($string[$i]);
            if ($i+1<strlen($string)){
                if(value($string[$i+1]) != Null){
                    $s2 = value($string[$i+1]);
                    if ($s2>$s1){
                        $res = $res + $s2 - $s1;
                        $i++;
                    }
                    else{
                        $res = $res+$s1;
                    
                    }
                }
                else{break;}    
            }
            else{
                $res = $res + $s1;
            }
        }
        else{
            echo "Wrong entry. The Entered number is not valid";
            echo "<br>";
            break;
        }    
    }
   return $res;
}
?>
    <div class = "function_result">
        <h3><?php
if (isset($_POST['Converter'])){
    $input = $_POST['RomanNumeral'];
    $result = converter($input);
    echo "The Value of the entered Roman Numeral in intgeres is: ";
    if ($result == 0){
        echo "NONE";
        echo '<br>';
    }
    else{
    echo $result;
    echo '<br>';
    }

}
        ?>
    </h3>
</div>
<?php
function tester_function(){
    $input = "IV";
    if (converter($input)== 4){echo "The function test for input ".$input." returned 4. Passed!".'<br>';}
    else{echo "function for input ".$input."returned ".converter($input).". Therefore did not pass!".'<br>';}
    $input = "MDCLXVI";
    if (converter($input)== 1666){echo "The function test for input ".$input." returned 1666. Passed!".'<br>';}
    else{echo "function for input ".$input."returned ".converter($input).". Therefore did not pass!".'<br>';}
    $input = "MCMIV";
    if (converter($input)== 1904){echo "The function test for input ".$input." returned 1904. Passed!".'<br>';}
    else{echo "function for input ".$input."returned ".converter($input).". Therefore did not pass!".'<br>';}
    $input = "Xf";
    if (converter($input)== 0){echo "The function test for input ".$input." returned ERROR. Passed!".'<br>';}
    else{echo "function for input ".$input."returned ".converter($input).". Therefore did not pass!".'<br>';}
}
?>
</body>
</html>