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

    parseToRoman(1234);

// Ma réponse
    function parseToRoman(int $number) {
        
        $I = "I";
        $V = "V";
        $X = "X";
        $L = "L";
        $C = "C";
        $D = "D";
        $M = "M";

        if (substr($number, 0, -3) !== null && substr($number, 0, -3) > 0) {
            $mil = str_repeat($M, (substr($number, 0, -3)));
        } else {
            $mil = null;
        }

        if (substr($number, -3, 1) !== null && substr($number, 0, -2) > 0) {
            if (substr($number, -3, 1) < 4) {
                $cent = str_repeat($C, (substr($number, -3, 1)));
            } elseif (substr($number, -3, 1) == 4) {
                $cent = $C . $D;
            } else {
                $cent = $D . str_repeat($C, (substr($number, -3, 1)) - 5);
            }
        } else {
            $cent = null;
        }
        
        if (substr($number, -2, 1) !== null && substr($number, 0, -1) > 0) {
            if (substr($number, -2, 1) < 4) {
                $diz = str_repeat($X, (substr($number, -2, 1)));
            } elseif (substr($number, -2, 1) == 4) {
                $diz = $X . $L;
            } else {
                $diz = $L . str_repeat($C, (substr($number, -2, 1)) - 5);
            }
        } else {
            $diz = null;
        }

        if (substr($number, -1, 1) !== null && $number > 0) {
            if (substr($number, -1, 1) < 4) {
                $unit = str_repeat($I, (substr($number, -1, 1)));
            } elseif (substr($number, -1, 1) == 4) {
                $unit = $I . $V;
            } else {
                $unit = $V . str_repeat($I, (substr($number, -1, 1)) - 5);
            }
        } else {
            $unit = null;
        }
        
        echo $result = $mil . $cent . $diz . $unit;
    };

?>
</p>

</body>
</html>