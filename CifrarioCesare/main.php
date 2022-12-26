<?php

$_lettere_maiuscole = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$_lettere_minuscole = "abcdefghijklmnopqrstuvwxyz";
$_caratteri_speciali = "#$%&*/<=>@\^_|";
$_punteggiatura = "!()+,-.:;?[]{}";
$_cifre = "0123456789";
$msg = $_POST['testo-originale'];
$chiave = $_POST['chiave'];
$msg_copia = $msg;
$chars = str_split($msg);

function cifra($chiave, $array, $char)
{
    $pos_cs = strpos(strval($array), strval($char));

    if (str_contains(strval($array), strval($char))) {
        $index = $pos_cs + $chiave;
        for ($j = 0; $j < 3; $j++) {
            if ($index > strlen($array) - 1) {
                $index = $index - strlen($array);
            }
        }
        $char = $array[$index];
        return strval($char);
    } else {
        return null;
    }
}

function decifra($chiave, $array, $char)
{
    $pos_cs = strpos(strval($array), strval($char));

    if (str_contains(strval($array), strval($char))) {
        $index = $pos_cs - $chiave;
        for ($j = 0; $j < 3; $j++) {
            if ($index < 0) {
                $index = strlen($array) + $index;
            }
        }
        $char = $array[$index];
        return strval($char);
    } else {
        return null;
    }
}

if ($msg == "" || $chiave == "") {
    header("location: http://127.0.0.1:5500/index.html");
}

if ($_POST['action'] == 'Cifra') {
    if (isset($msg) && isset($chiave)) {
        if (isset($_POST['rdb-spazi-vuoti'])) {
            $msg = str_replace(' ', '', $msg);
        }
        foreach ($chars as $char) {
            $pos = strpos(strval($msg), strval($char));
            $modified = false;
            if (isset($_POST['rdb-lettere-maiuscole']) && str_contains($_lettere_maiuscole, strval($char))) {
                $risultato_lettere_maiuscole = cifra($chiave, $_lettere_maiuscole, $char);
                $msg[$pos] = $risultato_lettere_maiuscole;
                $modified = true;
                continue;
            }
            if (isset($_POST['rdb-lettere-minuscole']) && str_contains($_lettere_minuscole, strval($char))) {
                $risultato_lettere_minuscole = cifra($chiave, $_lettere_minuscole, $char);
                $msg[$pos] = $risultato_lettere_minuscole;
                $modified = true;
                continue;
            }
            if (isset($_POST['rdb-caratteri-speciali']) && str_contains($_caratteri_speciali, strval($char))) {
                $risultato_caratteri_speciali = cifra($chiave, $_caratteri_speciali, $char);
                $msg[$pos] = $risultato_caratteri_speciali;
                $modified = true;
                continue;
            }
            if (isset($_POST['rdb-punteggiatura']) && str_contains($_punteggiatura, strval($char))) {
                $risultato_punteggiatura = cifra($chiave, $_punteggiatura, $char);
                $msg[$pos] = $risultato_punteggiatura;
                $modified = true;
                continue;
            }
            if (isset($_POST['rdb-numeri']) && str_contains($_cifre, strval($char))) {
                $risultato_numero = cifra($chiave, $_cifre, $char);
                $msg[$pos] = $risultato_numero;
                $modified = true;
                continue;
            }
            if (isset($_POST['rdb-elimina-non-cifrati']) && $modified == false) {
                if ($char == ' ') {
                    continue;
                } else {
                    $msg = substr_replace($msg, '', $pos, 1);
                }
            }
        }
    }
} else if ($_POST['action'] == 'Decifra') {
    if (isset($_POST['rdb-spazi-vuoti'])) {
        $msg = str_replace(' ', '', $msg);
    }
    foreach ($chars as $char) {
        $pos = strpos(strval($msg), strval($char));
        $modified = false;
        if (isset($_POST['rdb-lettere-maiuscole']) && str_contains($_lettere_maiuscole, strval($char))) {
            $risultato_lettere_maiuscole = decifra($chiave, $_lettere_maiuscole, $char);
            $msg[$pos] = $risultato_lettere_maiuscole;
            $modified == true;
            continue;
        } else if (isset($_POST['rdb-lettere-minuscole']) && str_contains($_lettere_minuscole, strval($char))) {
            $risultato_lettere_minuscole = decifra($chiave, $_lettere_minuscole, $char);
            $msg[$pos] = $risultato_lettere_minuscole;
            $modified == true;
            continue;
        } else if (isset($_POST['rdb-caratteri-speciali']) && str_contains($_caratteri_speciali, strval($char))) {
            $risultato_caratteri_speciali = decifra($chiave, $_caratteri_speciali, $char);
            $msg[$pos] = $risultato_caratteri_speciali;
            $modified == true;
            continue;
        } else if (isset($_POST['rdb-punteggiatura']) && str_contains($_punteggiatura, strval($char))) {
            $risultato_punteggiatura = decifra($chiave, $_punteggiatura, $char);
            $msg[$pos] = $risultato_punteggiatura;
            $modified == true;
            continue;
        } else if (isset($_POST['rdb-numeri']) && str_contains($_cifre, strval($char))) {
            $risultato_numero = decifra($chiave, $_cifre, $char);
            $msg[$pos] = $risultato_numero;
            $modified == true;
            continue;
        }
        if (isset($_POST['rdb-elimina-non-cifrati']) && $modified == false) {
            if ($char == ' ') {
                continue;
            } else {
                $msg = substr_replace($msg, '', $pos, 1);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Algoritmo di Cesare</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: medium;
            padding-left: 30px;
        }

        h5 {
            font-size: 1.6rem;
            line-height: 110%;
            margin: 1.68rem 0 1.68rem 0;
        }

        input[type="text"][disabled] {
            background-color: white;
            color: black;
            border-color: lightgray;
        }

        input[type="number"][disabled] {
            background-color: white;
            color: black;
            border-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="form-group">
        <div>
            <h5 class="title">ALGORITMO DI CESARE</h5>
        </div>
        <form method="post">
            <label class="label">Chiave/Offset</label>
            <input type="number" name="chiave" min="0" max="26" class="input" value="<?php echo $chiave ?>"
                style="width:250px" disabled><br><br>
            <label class="label">Testo Originale</label>
            <input type="text" name="testo-originale" class="input" value="<?php echo $msg_copia ?>" style="width:250px"
                disabled><br><br>
            <label class="label">Risultato</label>
            <input type="text" class="input" value="<?php echo $msg ?>" style="width:250px" disabled><br><br>
            <a class="icon-text" href="index.html" style="color:#3e8ed0">
                <span class="icon">
                    <i class="bi bi-house-door-fill"></i>
                </span>
                <span><b>Torna Indietro</b></span>
            </a>
        </form>
    </div>
</body>

</html>