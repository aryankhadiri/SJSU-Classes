<?php
require_once('../login.php');
global $dbc;
$dbc = @mysqli_connect(Host, Username, Password, Databasename) or die("There was an error".
mysqli_connect_error());
echo <<< _END
    <html>
    <head><title>Assignment5</title></head>
    <body>
    <form action = "index.php" method = "post" enctype = 'multipart/form-data'>
        <label for "uploadedfile"><strong>Upload Your File</strong></label><br>
        <input name = "uploadedfile" type = "file" value = "Upload"><br>
        <label for "name class = "labelforname" ><strong>Pick a Name for your file:</strong></label>
        <input name = "nameinput" type = "text" class = "name" required><br>
        <p>*The data will be stored by this name, the file also will be stored by this name</p>
        <input type = 'submit' name = "upload" value = 'Upload'>

    </form>
_END;
if (isset($_POST['upload'])){
    $namepicked = $_POST['nameinput'];
}
if($_FILES){
    $name = $_FILES['uploadedfile']['name'];
    $type = $_FILES['uploadedfile']['type'];
    $size = $_FILES['uploadedfile']['size'];
    $error = $_FILES['uploadedfile']['error'];
    $temporary_name = $_FILES['uploadedfile']['tmp_name'];
    if ($type == 'text/plain'){
        $ext = 'txt';
        if($error === 0){
            if ($size == 0){
                echo '<p><span style = "color:red;">The file uploaded is empty!</span></p>';
            }
            else if($size>1000000){
                echo '<p><span style="color:red;">The file is bigger than 1mb.</span></p>';
            }
            else{
                $newName = "$namepicked.$ext";
                #change the name 
                $fileDestionation = "Uploads/".$newName;
                move_uploaded_file($temporary_name, $fileDestionation);
                echo '<p><span style = "color:blue;"><em>The uploading has been successful!</em></span></p>';
                echo "<br>";
                insertintosql($newName);
            }
        }
        else{
            echo '<p> <span style="color:red;">There was an error uploading your file</span></p>';
        } 
    }
    else{
        echo '<p> <span style="color:red;">The file selected is not the correct type</span></p>';
    }
}


function insertintosql($newfilename){
    $fileopened = fopen("Uploads/$newfilename", 'r');
    $readdata = "";
    while (! feof($fileopened)){
        //till end of the file
    $readdata .= trim(fgetc($fileopened));
        //reads each line and add it to the variable $data. The trim function eliminates the newLine and space characters
        //because our function does not allow any character other than integers as it's parameter.
    }
    fclose($fileopened);
    $query1 = "INSERT INTO datas(name, Content) VALUES('$newfilename', '$readdata')";
    $response1 = @mysqli_query($GLOBALS['dbc'], $query1);
    if($response1){
        echo "Insertion was successful";
    }
    else{
        echo "you suck!";
    }
}

$query = 'SELECT id, name, content FROM datas';
$response = @mysqli_query($dbc, $query);
if(!$response){
    die("There was an error loading the data base".mysqli_connect_error());
}
echo <<< _END
    <table border = "solid, 2px" cellpadding = "8">
    <tr><td><strong>ID</strong></td>
    <td><strong>NAME</strong></td>
    <td><strong>CONTENT</strong></td>
    </tr>
_END;
$rows = mysqli_num_rows($response);
for ($i = 0; $i<$rows; $i++){
    mysqli_data_seek($response, $i);
    echo '<tr><td>'.mysqli_fetch_assoc($response)['id'].'</td>';
    mysqli_data_seek($response, $i);
    echo '<td>'.mysqli_fetch_assoc($response)['name'].'</td>';
    mysqli_data_seek($response, $i);
    echo '<td>'.mysqli_fetch_assoc($response)['content'].'</td>';
}
echo '</table>';

?>