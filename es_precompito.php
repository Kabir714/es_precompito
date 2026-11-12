<?php
error_reporting(0);

$numero1 = $_POST["a"];
$numero2 = $_POST["b"];
$operazione = $_POST["op"];

$risultato_finale = "";

if ($_POST["calcola"] == "Calcola") {
    
    if ($operazione == "somma") {
        $risultato_finale = $numero1 + $numero2;
    }
    
    if ($operazione == "differenza") {
        $risultato_finale = $numero1 - $numero2;
    }
    
    if ($operazione == "prodotto") {
        $risultato_finale = $numero1 * $numero2;
    }
    
    if ($operazione == "quoziente") {
        if ($numero2 == 0) {
            $risultato_finale = "Errore: non si può dividere per zero.";
        } else {
            $risultato_finale = $numero1 / $numero2;
        }
    }

    if ($_POST["assoluto"] == "on") {
        if ($risultato_finale < 0) {
            $risultato_finale = $risultato_finale * -1;
        }
    }
    
    if ($_POST["quadrato"] == "on") {
        $risultato_finale =$risultato_finale * $risultato_finale;
    }
    
    if ($_POST["arrotonda"] == "on") {
        $risultato_finale = round($risultato_finale, 2);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Calcolatrice</title>
</head>
<body>

<h1>Calcolatrice</h1>

<form method="POST">
    a: <input type="text" name="a" value="<?php echo $numero1; ?>"><br>
    b: <input type="text" name="b" value="<?php echo $numero2; ?>"><br><br>

    <fieldset>
        <legend>Operazione</legend>
        <input type="radio" name="op" value="somma"> somma<br>
        <input type="radio" name="op" value="differenza"> differenza<br>
        <input type="radio" name="op" value="prodotto"> prodotto<br>
        <input type="radio" name="op" value="quoziente"> quoziente
    </fieldset><br>

    <fieldset>
        <legend>Opzioni</legend>
        <input type="checkbox" name="assoluto"> valore assoluto<br>
        <input type="checkbox" name="quadrato"> quadrato<br>
        <input type="checkbox" name="arrotonda"> arrotonda a 2 decimali
    </fieldset><br>

    <input type="submit" name="calcola" value="Calcola">
</form>

<p>
<?php 
if ($risultato_finale != "") {
    echo "Risultato: " . $risultato_finale; 
}
?>
</p>

</body>
</html>