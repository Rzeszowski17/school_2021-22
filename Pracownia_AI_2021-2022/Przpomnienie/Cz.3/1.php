<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06.09.21</title>
</head>
<body>
    <h1>Form</h1>
    <form method="POST">
    <input type="text" placeholder="Name" name="id1">
    <br>
    <br>
    <input type="text" placeholder="Surname" name="id2">
    <br>
    <br>
    <input type="number" placeholder="Age" name="id3">
    <br>
    <br>
    <input type="submit" id="sub" value="Wyślij">
    </form>
    <?php
    require ('2.php');
    ?>
</body>
</html>