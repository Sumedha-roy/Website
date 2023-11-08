<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar q</title>
</head>
<body>
    <form method ="post">
        <label>Search your favourite music here</label>
        <input type="text" name="search">
        <input type="submit" name="submit">


</body>
</html>
<?php
$con = new PDO("mysql:host=localhost;dbname=musicsearch",'root','');
if (!$con){
    die("Connection failed: ".mysqli_connect_error());
}
if (isset($_POST["submit"])){
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT *  FROM `music` WHERE name='$str'");
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    if($row=$sth->fetch())
    {
?>
<br>
        <table>
            <tr>
                <th>Name</th>
    </tr>
    <tr>
        <td><a href="play.php"><?php echo $row->name;?></a></td>

        <td><a href="play.php"><?php echo $row->location;?></a></td>
    </tr>
    </table>
    <?php
    }
    else{
        echo "Name does not exist.";
    }
}
?>