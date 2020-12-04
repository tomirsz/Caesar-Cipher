<!DOCTYPE HTML>
<html>

<head>
</head>

<body>
    <div class="cipher-box">
        <h1>Szyfruj jak Cezar</h1>
        <form class="cipher-form" action="" method="post">
            <p>Tekst do przetworzenia</p>
            <textarea placeholder="Wpisz tekst..." type="text" name="text" rows="10"></textarea>
            <p>Przesunięcie</p>
            <input value=0 type="number" name="shift">
            <button class="cipher-button" type="" name="submit">Prześlij</button>
            <?php
    if(isset($_POST['submit'])) {
        cipher();
    }
    function cipher() {
        $GREAT_LETTER_MIN_NUMBER = 65;
        $GREAT_LETTER_MAX_NUMBER = 90;
        $SMALL_LETTER_MIN_NUMBER = 97;
        $SMALL_LETTER_MAX_NUMBER = 122;
        $SPACEBAR_CODE = 32;
        $DOT_CODE = 46;
        $COMMA_CODE = 44;

        $textToChange =  $_POST['text'];
        $shiftNumber =  $_POST['shift'];

        echo "Tekst wyjściowy: <br>";
        if($shiftNumber > 26 || $shiftNumber < -26) {
            $shiftNumber = $shiftNumber % 26;
        }
        for($i = 0; $i < strlen($textToChange); $i++) {
            $letter = ord($textToChange[$i]);
            if ($letter == $SPACEBAR_CODE || $letter == $DOT_CODE || $letter == $COMMA_CODE || $shiftNumber == 0) {
                echo chr($letter);
            } else {
                if ($letter < 91) {
                    if($shiftNumber > 0) {
                        printLetter($letter, $shiftNumber, $GREAT_LETTER_MIN_NUMBER, $GREAT_LETTER_MAX_NUMBER);
                    } else {
                        printLetterInNegativeCase($letter, $shiftNumber, $GREAT_LETTER_MIN_NUMBER, $GREAT_LETTER_MAX_NUMBER);
                    }
                } else {
                    if($shiftNumber > 0) {
                        printLetter($letter, $shiftNumber, $SMALL_LETTER_MIN_NUMBER, $SMALL_LETTER_MAX_NUMBER);
                    } else {
                    printLetterInNegativeCase($letter, $shiftNumber, $SMALL_LETTER_MIN_NUMBER, $SMALL_LETTER_MAX_NUMBER);
                    }
                }  
            }   
        }
    }

    function printLetter($letter, $shiftNumber, $min_number, $max_number) {
        $sum = $letter + $shiftNumber;
        $difference = $max_number - $sum;
        if($difference > 0) {
            $letterToPrint = chr($letter + $shiftNumber);
            echo $letterToPrint;
        } else {
            if($difference == 0) {
                $letterToPrint = chr($max_number);
                echo $letterToPrint;
            } else {
                $letterToPrint = chr($min_number - ($difference + 1));
                echo $letterToPrint;
            }
        }
    }

    function printLetterInNegativeCase($letter, $shiftNumber, $min_number, $max_number) {
        $sum = $letter + $shiftNumber;
        $difference = $min_number - $sum;
        if($difference < 0) {
            $letterToPrint = chr($letter + $shiftNumber);
            echo $letterToPrint;
        } else {
            if($difference == 0) {
                $letterToPrint = chr($min_number);
                echo $letterToPrint;
            } else {
                $letterToPrint = chr($max_number - ($difference - 1));
                echo $letterToPrint;
            }
        }
    }
    
?>
        </form>
    </div>
</body>
<style>
 html, body {
        margin: 0;
        padding: 30px;
        border-radius: 50px;
        height: 100vh;
        background: #c4c3e4;
        font-family: 'roboto'
    }

    .cipher-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        border-radius: 50px;
        background: #c4c3e4;
        box-shadow:  20px 20px 60px #a7a6c2, 
                    -20px -20px 60px #e1e0ff;
    }

    h1 {
        margin-bottom: 30px;
    }

    .cipher-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 50%;
        padding: 50px;
        border-radius: 50px;
        background: #c4c3e4;
        box-shadow:  20px 20px 60px #a7a6c2, 
                    -20px -20px 60px #e1e0ff;
    }

    .cipher-button {
        margin: 20px 0;
        padding: 20px;
        width: 25%;
        border: none;
        border-radius: 50px;
        background: linear-gradient(145deg, #d2d1f4, #b0b0cd);
        box-shadow:  20px 20px 60px #a7a6c2, 
             -20px -20px 60px #e1e0ff;
    }

    </style>

</html>