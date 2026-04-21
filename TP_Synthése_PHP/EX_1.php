<!--Contexte
Vous travaillez sur une liste de notes d’étudiants.
$notes = [12, 5, 18, 9, 14, 20, 7, 11, 16, 8];
Travail demandé
• Filtrer les notes >= 10 avec array_filter()
• Extraire les notes supérieures ou égales à 15
• Identifier les notes < 10 (échec)
• Créer une fonction de filtrage réutilisable-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrage intelligent de données</title>
</head>
<body>
    <?php
    $notes=[12,5,18,9,14,20,7,11,16,8];

    $notesSup10=array_filter($notes,function($notes){
        return $notes>=10;
    });
    print_r($notesSup10);
    echo"<br/>";

    $notesSup15=array_filter($notes,function($notes){
        return $notes>=15;
    });
    print_r($notesSup15);
    echo"<br/>";

    $notesInf10=array_filter($notes,function($notes){
        return $notes<10;
    });
    print_r($notesInf10);
    echo"<br/>";

    function filtrerNotes($notes,$seuil,$comparaison){
        return array_filter($notes,function($note) use ($seuil,$comparaison){
            switch($comparaison){
                case '>=':
                    return $note>=$seuil;
                case '<':
                    return $note<$seuil;
                default:
                    return false;
            }
        });
    }
    
    $notesSup12=filtrerNotes($notes,12,'>=');
    print_r($notesSup12);
    echo"<br/>";
    $notesInf12=filtrerNotes($notes,12,'<');
    print_r($notesInf12);
    ?>
</body>
</html>