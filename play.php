<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play music page</title>
    <style media="screen">
        video{
            float: left;

        }
</head>
<body>
    <div>
        <?php
        $festchmusic = mysqli_query($con,"SELECT * FROM videos ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($festchmusic)){
            $localhost = $row['location'];
            echo "<div>";
            echo "<music src='".$location."' controls width='500px' height='300px'>";
            echo "</div>";
        }
        ?>
        <a href ="search.php">HOME</a>
    </div>
</body>
</html>