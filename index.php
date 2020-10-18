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
            <input value=0 type="number" name="shift" min=0 max=26>
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
        for($i = 0; $i < strlen($textToChange); $i++) {
            $letter = ord($textToChange[$i]);
            if ($letter == $SPACEBAR_CODE || $letter == $DOT_CODE || $letter == $COMMA_CODE) {
                echo chr($letter);
            } else {
                if ($letter < 91) {
                $sum = $letter + $shiftNumber;
                $difference = $GREAT_LETTER_MAX_NUMBER - $sum;
                if($difference > 0) {
                    $letterToPrint = chr($letter + $shiftNumber);
                    echo $letterToPrint;
                } else {
                    if($difference == 0) {
                        $letterToPrint = chr($letter);
                        echo $letterToPrint;
                    } else {
                        $letterToPrint = chr($GREAT_LETTER_MIN_NUMBER - ($difference + 1));
                        echo $letterToPrint;
                    }
                }
            } else {
                $sum = $letter + $shiftNumber;
                $difference = $SMALL_LETTER_MAX_NUMBER - $sum;
                if($difference > 0) {
                    $letterToPrint = chr($letter + $shiftNumber);
                    echo $letterToPrint;
                } else {
                    if($difference == 0) {
                        $letterToPrint = chr($letter);
                        echo $letterToPrint;
                    } else {
                        $letterToPrint = chr($SMALL_LETTER_MIN_NUMBER - ($difference + 1));
                        echo $letterToPrint;
                    }
                }
            }  
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