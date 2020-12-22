<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Philippe PERECHODOV">
    <title>Tests - OCR</title>

</head>

<body>
    <p>
        <?php

        // Résultats attendus
            // parseToRoman(4); // === "IV"
            // parseToRoman(37); // === "XXXVII"
            // parseToRoman(143); // === "CXLIII"
            // parseToRoman(1234); // === "MCCXXXIV"

        // Ma réponse
            parseToRoman(1234);

            function parseToRoman(int $number) {

                define('ROMAIN', array('I', 'V', 'X', 'L', 'C', 'D', 'M'));

                if (substr($number, 0, -3) !== null && substr($number, 0, -3) > 0) {
                    $mil = str_repeat(ROMAIN[6], (substr($number, 0, -3)));
                } else {
                    $mil = null;
                }

                if (substr($number, -3, 1) !== null && substr($number, 0, -2) > 0) {
                    if (substr($number, -3, 1) < 4) {
                        $cent = str_repeat(ROMAIN[4], (substr($number, -3, 1)));
                    } elseif (substr($number, -3, 1) == 4) {
                        $cent = ROMAIN[4] . ROMAIN[5];
                    } else {
                        $cent = ROMAIN[5] . str_repeat(ROMAIN[4], (substr($number, -3, 1)) - 5);
                    }
                } else {
                    $cent = null;
                }
                
                if (substr($number, -2, 1) !== null && substr($number, 0, -1) > 0) {
                    if (substr($number, -2, 1) < 4) {
                        $diz = str_repeat(ROMAIN[2], (substr($number, -2, 1)));
                    } elseif (substr($number, -2, 1) == 4) {
                        $diz = ROMAIN[2] . ROMAIN[3];
                    } else {
                        $diz = ROMAIN[3] . str_repeat(ROMAIN[4], (substr($number, -2, 1)) - 5);
                    }
                } else {
                    $diz = null;
                }

                if (substr($number, -1, 1) !== null && $number > 0) {
                    if (substr($number, -1, 1) < 4) {
                        $unit = str_repeat(ROMAIN[0], (substr($number, -1, 1)));
                    } elseif (substr($number, -1, 1) == 4) {
                        $unit = ROMAIN[0] . ROMAIN[1];
                    } else {
                        $unit = ROMAIN[1] . str_repeat(ROMAIN[0], (substr($number, -1, 1)) - 5);
                    }
                } else {
                    $unit = null;
                }
                
                echo $mil . $cent . $diz . $unit;
            };
        ?>
    </p>

</body>
</html>