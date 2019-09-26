<?php
    echo <<< _END
        <html>
            <head>
            <title>PHP Form Upload</title>
            <head>
            <body>
                <h1>Upload the file</h1>
                <form method = "post" action = "1000numbers.php" enctype = 'multipart/form-data'>
                    <label for = "input"><strong>Upload</strong></label>
                    <input type = "file" name = "filename" size = '20'>
                    <input type = 'submit' name = "upload" value = 'Upload'>
                </form>
         
    _END;

    if (isset($_POST['upload'])){
        tester_function();
    }    
function factorial($num){
    if ($num == 0){
        return 1;
    }
    else{
        return $num*factorial($num-1);
        
    }
}
function indxsOfNumbers($numbers){
    //returns the 5 adjecent numbers which their product is the largest
    if (strlen($numbers)<1000){
        echo "There is less than 1000 numbers in the file";
        die();
    }
    $big = 0;
    for ($i = 0 ;$i<strlen($numbers)-4; $i++){
        $multiplied = 1;
        if(($i>0 and $i<=strlen($numbers)-5 and $numbers[$i-1]<$numbers[$i+4]) 
        or ($i==0)){
            /*using this algorithm, we will eliminate the $j Loop below if we know that 
            the next set of 5 numbers are going to be smaller. That will significantly boost
            up our execution time.
            */
            for ($j = $i; $j<$i+5; $j++){
                if(!is_numeric($numbers[$j])){
                    //tests to make sure that each digit is a number and not a letter or etc.
                    echo "Wrong data exist in the file. One or more of the numbers are invalid";
                    die(0);
                }
                $multiplied *= (int)$numbers[$j];
            }
            if ($multiplied >= $big){
                $big = $multiplied;
                $indexes = array();
                array_push($indexes, $i, $i+1, $i+2, $i+3, $i+4);
            }
        }
    }
    return $indexes;
    /*$indexes is the array which includes the indexes of the 5 numbers 
    we are looking for */
}
function sumOffactorials($numbers){
    /*it returns the sum of the factorials of the digits of the 
    product of the 5 adjacent numbers which
    their product was the largest.
    ex: number = 12345 -- > 1*2*3*4*5 = 120
    result(number) = 1! + 2! + 0! = 4*/
    
    
    $arrayOfPositions = indxsOfNumbers($numbers);
    $multipicated = 1;
    foreach ($arrayOfPositions as $value){
        $multipicated *= $numbers[$value];
    }
    $sum = 0;
    $stringOfMultipicated = (string)$multipicated;
    for($i=0;$i<strlen($stringOfMultipicated);$i++){
        $sum+=factorial($stringOfMultipicated[$i]);
    }
    return $sum;

}
if($_FILES){
    $name = $_FILES['filename']['name'];
    $type = $_FILES['filename']['type'];
    $size = $_FILES['filename']['size'];
    $error = $_FILES['filename']['error'];
    $temporary_name = $_FILES['filename']['tmp_name'];
    if ($type == 'text/plain'){
        $ext = 'txt';
        if($error === 0){
            if ($size == 0){
                echo ' The file uploaded is empty!';
                die();
            }
            else if($size>1000000){
                echo 'The file is bigger than 1mb.';
                die();
            }
            else{
                $newName = "1000Numbers.$ext";
                #change the name 
                $fileDestionation = "Uploads/".$newName;
                move_uploaded_file($temporary_name, $fileDestionation);
                echo '<em>The uploading has been successful!</em>';
                echo "<br>";        
            }
        }
        else{
            echo 'There was an error uploading your file';
        } 
    }
    else{
        echo 'The file selected is not the correct type';
        die();
    }
    
}
if($_FILES){
    $fh = fopen("Uploads/$newName", 'r');
    $data = "";
    while(! feof($fh)){
        //till end of the file
    $data .= trim(fgets($fh));
        //reads each line and add it to the variable $data. The trim function eliminates the newLine and space characters
        //because our function does not allow any character other than integers as it's parameter.

    }
    fclose($fh);
    $arrayOfIndexes = indxsOfNumbers($data);
    $result = sumOffactorials($data);
    echo "<h4>The sum of the factorials of the largest multiple of 5 adjacent numbers is: ".$result."</h4>";
    echo "<br>";
    echo "<strong>Position"."---->number</strong>"."<br>";
    foreach($arrayOfIndexes as $index){
        echo $index." -------------> ".$data[$index];
        echo "<br>";
    }
    echo "<br>";
    echo $data[$arrayOfIndexes[0]]."x".$data[$arrayOfIndexes[1]]."x".$data[$arrayOfIndexes[2]]."x".$data[$arrayOfIndexes[3]]."x".$data[$arrayOfIndexes[4]]."=";
    $multipication = $data[$arrayOfIndexes[0]]*$data[$arrayOfIndexes[1]]*$data[$arrayOfIndexes[2]]*$data[$arrayOfIndexes[3]]*$data[$arrayOfIndexes[4]];
    echo $multipication;
    echo "<br>";
    echo "The sum of the factorials of each digit in ".$multipication. " is:"."<br>" ;
    echo $result;
    echo "<br>";

    
}
function tester_function(){
    echo <<<_END
        <h3>TESTER FUNCTION:</h3>
        <h4>
     Is output from an empty file "The file uploaded is empty!"? if yes, test passed!<br>
     Is output from a file which includes letter and other characters instead of positive integers "Wrong data exist in the file. One or more of the numbers are invalid"?
    if yes, test passed!<br>
     Is output from a file uploaded which is anything other than text document "The file selected is not the correct type"? If yes, test passed!<br>
     Is output from a file uploaded which includes less than 1000 numbers "There is less than 1000 numbers in the file"? If yes, test passed!<br>
     Is output from an unsuccessful upload "There was an error uploading your file?"If yes, test passed!<br>

     </h4>
_END;
}

    echo "</body></html>";
    
?>
