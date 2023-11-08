<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music uploader</title>
    <?php
        include("config.php");
        if (isset($_POST['btn_uploaded'])){
            $maxsize = 104857600;
            $name =$_FILES['file']['name'];
            $target_dir ="songs/guru";
            $target_file = $target_dir . $_FILES["file"]["name"];
            $musicFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr=array("mp3");
            if(in_array($musicFileType,$extensions_arr))
            {
                if(($_FILES['file']['size']>=$maxsize)|| ($_FILES["file"]['size']==0)){
                    echo "File too large.File must be less than 5MB.";
                }
                else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        $query = "INSERT INTO music(name,location) VALUES('".$name."','".$target_file."')";
                        mysqli_query($con,$query);
                        echo "upload successfully.";
                    }
                }
            }
            else{
                    echo"Invalid file extension.";
            }
        }
    ?>
</head>
<body>
    <form action ="" method="post"entype="multipart/form-data" style="padding-left:30%;color:red;">
    <input type='file' name='file'>
    <input type ="submit" name="btn_upaload" value="upload Music">
    </form>
</body>
</html>