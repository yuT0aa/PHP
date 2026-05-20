<?php
$result = "";
$factorial = 1;
$number = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['t1'])) {
        $number = $_POST['t1'];
        if (is_numeric($number) && $number == (int)$number && $number >= 0) {
            $number = (int)$number; 
            if ($number == 0 || $number == 1) {
                $factorial = 1;
            } else {
                for ($i = 2; $i <= $number; $i++) {
                    $factorial *= $i;
                }
            }
            $calculationSteps = "";
            for ($i = $number; $i >= 1; $i--) {
                $calculationSteps .= $i;
                if ($i > 1) {
                    $calculationSteps .= " * ";
                }
            }
            $result = "Factorial of $number = $calculationSteps = $factorial";
        } else {
            $error = "entrer a positive integer.";
        }
    } else {
        $error = "empty";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat</title>
</head>
<body>
    <h2>Résultat</h2>
    
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($result): ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>

    <br>
    <a href="p1.html">Retour au formulaire</a>
</body>
</html>