<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Philippe PERECHODOV">
    <title>Tests - OCR</title>

</head>

<body>
    <p>Test n° 1 - Résultats attendus :</p>
    <p>parseToRoman(4); // === "IV"<br>
        parseToRoman(37); // === "XXXVII"<br>
        parseToRoman(143); // === "CXLIII"<br>
        parseToRoman(1234); // === "MCCXXXIV"<br></p>

        <?php $myNumber = 1999; ?>

    <p>Ma réponse :</p>
    <?php parseToRomain($myNumber); ?>
    <p>Solution OCR (adaptée du JS) et amélioré pour faire les IV (4), IX (9), XL (40), XC (90), CD (400) & CM (900):</p>
    <?php parseToRoman($myNumber);?>
    
    <?php
        // Ma réponse

            function parseToRomain(int $number) {

                define('ROMAIN', array('I', 'V', 'X', 'L', 'C', 'D', 'M'));

                // Les milliers
                if (substr($number, 0, -3) !== null && substr($number, 0, -3) > 0) {
                    $mil = str_repeat(ROMAIN[6], (substr($number, 0, -3)));
                } else {
                    $mil = null;
                }

                // Les centaines
                if (substr($number, -3, 1) !== null && substr($number, 0, -2) > 0) {
                    if (substr($number, -3, 1) < 4) {
                        $cent = str_repeat(ROMAIN[4], (substr($number, -3, 1)));
                    } elseif (substr($number, -3, 1) == 4) {
                        $cent = ROMAIN[4] . ROMAIN[5];
                    } elseif (substr($number, -3, 1) == 9) {
                        $cent = ROMAIN[4] . ROMAIN[6];
                    } else {
                        $cent = ROMAIN[5] . str_repeat(ROMAIN[4], (substr($number, -3, 1)) - 5);
                    }
                } else {
                    $cent = null;
                }
                
                // Les dizaines
                if (substr($number, -2, 1) !== null && substr($number, 0, -1) > 0) {
                    if (substr($number, -2, 1) < 4) {
                        $diz = str_repeat(ROMAIN[2], (substr($number, -2, 1)));
                    } elseif (substr($number, -2, 1) == 4) {
                        $diz = ROMAIN[2] . ROMAIN[3];
                    } elseif (substr($number, -2, 1) == 9) {
                        $diz = ROMAIN[2] . ROMAIN[4];
                    } else {
                        $diz = ROMAIN[3] . str_repeat(ROMAIN[4], (substr($number, -2, 1)) - 5);
                    }
                } else {
                    $diz = null;
                }

                // Les unités
                if (substr($number, -1, 1) !== null && $number > 0) {
                    if (substr($number, -1, 1) < 4) {
                        $unit = str_repeat(ROMAIN[0], (substr($number, -1, 1)));
                    } elseif (substr($number, -1, 1) == 4) {
                        $unit = ROMAIN[0] . ROMAIN[1];
                    } elseif (substr($number, -1, 1) == 9) {
                        $unit = ROMAIN[0] . ROMAIN[2];
                    } else {
                        $unit = ROMAIN[1] . str_repeat(ROMAIN[0], (substr($number, -1, 1)) - 5);
                    }
                } else {
                    $unit = null;
                }
                
                echo $mil . $cent . $diz . $unit;
            };

        // Solution OCR (adaptée du JS) mais ne fait pas le IV (4) ou IX (9)

        function parseToRoman(int $number) {

            define('ROMAN', array("M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"));
            define('DECIMAL', array(1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1));
            $result ="";

            for ($i = 0; $i < count(DECIMAL); $i++) { 
                while ($number%DECIMAL[$i] < $number) {
                    $result .= ROMAN[$i];
                    $number -= DECIMAL[$i];
                }
            }
            echo $result;
        };
    ?>

    <p>Test n° 2 - Résultats attendus :</p>
        <p>toRot13('URYYB JBEYQ'); // HELLO WORLD <br>
            toRot13('BCRAPYNFFEBBZF'); // OPENCLASSROOMS<br>
            toRot13('PRPV RFG ZBA PBQR FRPERG'); // CECI EST MON CODE SECRET<br></p>

            <?php $myString = "TEST SPACE"; ?>

        <p>Ma réponse :</p>
        <?php transformeToRot13($myString); ?>
        <p>Solution OCR (à venir) :</p>
        <!-- <?php // transformToRot13($myString);?> -->
        
        <?php
            // Ma réponse  

            function transformeToRot13($stringToTransform) {

                // Tableau de l'alphabet
                $alpha = range("A","Z");
                // foreach ($alpha as $value) {
                //     echo $value;
                // }

                // Test de la string en tableau
                // foreach (str_split($stringToTransform) as $value) {
                //     echo $value . "r";
                // }
                
                // Test avec une bouche for
                for ($i=0; $i < count(str_split($stringToTransform)); $i++) { 
                    echo $stringToTransform[$i] . "1";
                }
            }
            
        ?>

</body>
</html>