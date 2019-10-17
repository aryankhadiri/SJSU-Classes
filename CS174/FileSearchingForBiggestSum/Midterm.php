<?php
    echo <<< _END
        <html>
            <head>
            <title>PHP Form Upload</title>
            <head>
            <body>
                <h1>Upload the file</h1>
                <form method = "post" action = "Midterm1.php" enctype = 'multipart/form-data'>
                    <label for = "input"><strong>Upload</strong></label>
                    <input type = "file" name = "filename" size = '20'>
                    <input type = 'submit' name = "upload" value = 'Upload'>
                </form>
         
    _END;
/*
    if (isset($_POST['upload'])){
        tester_function();
    }
    */    
function factorial($num){
    if ($num == 0){
        return 1;
    }
    else{
        return $num*factorial($num-1);
        
    }
}
function indexesOfNumbers($numbers){
    //returns the 4 adjecent numbers which their product is the largest in every direction. LEFT RIGHT DIAGN
    if (strlen($numbers)!=400){
        echo "There is not 400 numbers in the file";
        die();
    }
    
    $arrayOfData = array();
    for ($row = 0; $row<20; $row++){
        for($col = 0; $col<20; $col++){
            $indexOfNumbers = ($row*20)+$col;
            $arrayOfData[$row][$col] = $numbers[$indexOfNumbers];  
        }
    }
    $biggestOfDiag = 0;
    $biggestOfDiag1 = 0;
    $biggestOfDiag2 = 0;
    $biggestOfCols = 0;
    $biggestOfRows = 0;
    for ($r = 0; $r<20; $r++){
        for($c = 0; $c<17; $c++){
            $multipicated = 1;
            if(($c>0 and $c<=16 and $arrayOfData[$r][$c-1]<$arrayOfData[$r][$c+3]) or ($c == 0)){
                /*using this algorithm, we will eliminate the $j Loop below if we know that 
                the next set of 5 numbers are going to be smaller. That will significantly boost
                up our execution time.
                */        
                for ($j = $c; $j<$c+4;$j++){
                    if(!is_numeric($arrayOfData[$r][$j])){
                        //tests to make sure that each digit is a number and not a letter or etc.
                        echo "Wrong data exist in the file. One or more of the characters are not numbers!";
                        die(0);
                    }
                    $multipicated *= (int)$arrayOfData[$r][$j];
                }
                if ($multipicated>=$biggestOfRows){
                    $biggestOfRows = $multipicated;
                    $arrayOfIndexesRow = array();
                    array_push($arrayOfIndexesRow, ($r*20)+$c, ($r*20)+$c+1,($r*20)+$c+2 ,($r*20)+$c+3);
                }
            }
        }
    }
    for ($co = 0; $co<20; $co++){
        for ($ro = 0; $ro <17; $ro++){
            $multipicated1 = 1;
            if(($ro>0 and $ro<=16 and $arrayOfData[$ro-1][$co]<$arrayOfData[$ro+3][$co]) or ($ro==0)){
                for ($j=$ro; $j<$ro+4;$j++){
                    if(! is_numeric($arrayOfData[$j][$co])){
                        //tests to make sure that each digit is a number and not a letter or etc.
                        echo "Wrong data exist in the file. One or more of the characters are not numbers!";
                        die(0);
                    }
                    $multipicated1*=(int)$arrayOfData[$j][$co];
                }
                if ($multipicated1>=$biggestOfCols){
                    $biggestOfCols = $multipicated1;
                    $arrayOfIndexesCol = array();
                    array_push($arrayOfIndexesCol, ($ro*20)+$co, (($ro+1)*20)+$co,(($ro+2)*20)+$co,(($ro+3)*20)+$co);
                }   
            }
        }
    }
    for ($roww=0; $roww<17; $roww++){
        for ($coll=0; $coll<17; $coll++){
            $multipicated2 = 1;
            $multipicated3 = 1;
            $multipicated2 *= $arrayOfData[$roww][$coll]*$arrayOfData[$roww+1][$coll+1]* $arrayOfData[$roww+2][$coll+2]* $arrayOfData[$roww+3][$coll+3];
            $multipicated3 *= $arrayOfData[$roww][$coll+3]*$arrayOfData[$roww+1][$coll+2]* $arrayOfData[$roww+2][$coll+1]* $arrayOfData[$roww+3][$coll];
            if ($multipicated2>=$multipicated3 and $multipicated2>=$biggestOfDiag){
                $biggestOfDiag = $multipicated2;
                $arrayOfIndexDiag = array();
                array_push($arrayOfIndexDiag, ($roww*20)+$coll, (($roww+1)*20)+$coll+1, (($roww+2)*20)+$coll+2, (($roww+3)*20)+$coll+3);
            }
            elseif($multipicated3>$multipicated2 and $multipicated3>$biggestOfDiag){
                $biggestOfDiag = $multipicated3;
                $arrayOfIndexDiag = array();
                array_push($arrayOfIndexDiag, ($roww*20)+$coll+3, (($roww+1)*20)+$coll+2, (($roww+2)*20)+$coll+1, (($roww+3)*20)+$coll);
            }
        }
    }
    if ($biggestOfCols>= $biggestOfRows and $biggestOfCols >=$biggestOfDiag){
        return $arrayOfIndexesCol;
    }
    elseif($biggestOfRows>=$biggestOfCols and $biggestOfRows >=$biggestOfDiag){
        return $arrayOfIndexesRow;
    }
    elseif ($biggestOfDiag>= $biggestOfRows and $biggestOfDiag>=$biggestOfCols){
        return $arrayOfIndexDiag;
    }
    else{
        echo "YOU SUCK!";
    }
 
}   

function arrayPrint($numbers){
    if (strlen($numbers)!=400){
        echo "There are not 400 numbers in the file";
        die();
    }
    $arrayOfData = array();
    for ($row = 0; $row<20; $row++){
        for($col = 0; $col<20; $col++){
            $indexOfNumbers = ($row*20)+$col;
            $arrayOfData[$row][$col] = $numbers[$indexOfNumbers];  
        }
    }
    echo "The Data has been inserted in a 20x20 matrix shown below:"."<br>";
    echo "NOTE: Spaces and new lines are allowed within the file."."<br>";       
    echo "<br>"; 

    for ($i = 0; $i<20;$i++){
        for ($j = 0; $j<20;$j++){
            echo $arrayOfData[$i][$j]."";
        }
        echo "<br>";
    }
}
function sumOffactorials($numbers){
    /*it returns the sum of the factorials of the digits of the 
    product of the 4 adjacent numbers which
    their product was the largest.
    ex: number = 12345 -- > 1*2*3*4*5 = 120
    result(number) = 1! + 2! + 0! = 4*/
    
    
    $arrayOfPositions = indexesOfNumbers($numbers);
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
    tester_function();
    $fh = fopen("Uploads/$newName", 'r');
    $data = "";
    while (! feof($fh)){
        //till end of the file
    $data .= trim(fgetc($fh));
        //reads each line and add it to the variable $data. The trim function eliminates the newLine and space characters
        //because our function does not allow any character other than integers as it's parameter.
    }
    fclose($fh);
    arrayPrint($data);
    $arrayOfIndexes = indexesOfNumbers($data);

    $result = sumOffactorials($data);
    echo "<h4>The sum of the factorials of the largest multiple of 4 adjacent numbers is: ".$result."</h4>";
    echo "<br>";
    echo "<strong>Position"."---->number</strong>"."<br>";
    foreach($arrayOfIndexes as $index){
        echo $index." -------------> ".$data[$index];
        echo "<br>";
    }
    echo "<br>";
    echo $data[$arrayOfIndexes[0]]."x".$data[$arrayOfIndexes[1]]."x".$data[$arrayOfIndexes[2]]."x".$data[$arrayOfIndexes[3]]."=";
    $multipication = $data[$arrayOfIndexes[0]]*$data[$arrayOfIndexes[1]]*$data[$arrayOfIndexes[2]]*$data[$arrayOfIndexes[3]];
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
     Is output from a file which includes letter and other characters instead of positive integers "Wrong data exist in the file. One or more of the characters are not numbers!"?
    if yes, test passed!<br>
     Is output from a file uploaded which is anything other than text document "The file selected is not the correct type"? If yes, test passed!<br>
     Is output from a file uploaded which includes less than 1000 numbers "There is less than 1000 numbers in the file"? If yes, test passed!<br>
     Is output from an unsuccessful upload "There was an error uploading your file?"If yes, test passed!<br>

     </h4>
_END;
}

echo "</body></html>";
    
?>
