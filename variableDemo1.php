<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $a=12; ?>
</head>
<body>
    <h1>Hello Word</h1>
    <?php echo "<h1>Hello World !!</h1>";   ?>
    <?php echo $a."<br/>";//ok, affiche 12?>
    <?php echo "$a<br/>"; //ok , affiche 12?> 
    <?php echo '$a'; //ok , affiche $a ?> 
</body>
</html>