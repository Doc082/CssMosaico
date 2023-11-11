<html>
<head>
    <title>Pagina Build</title>
    <link rel="stylesheet" href="css/style-proj.css">
</head>
<body>
<div style="text-align: center;">
    <h1>Elaborazione terminata</h1>
    <a class="button" href="test.html"><b>Clicca per vedere il risultato</b></a>
</div>

<?php
$height=$_POST['height'];
$width=$_POST['width'];
$pixel =$_POST['pix_mosaico'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Controlla che sia un immagine vera
if(isset($_POST["submit"])) {
    $uploadOk = 1;
}

// Controlla se il file esiste già
if (file_exists($target_file)) {
    echo "<p class='error'>Ops, il file esiste già, prova a ricaricarlo con un nome diverso</p>";
    $uploadOk = 0;
}

// Controlla la dimensione del file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<p class='error'>Ops, il file è troppo grande</p>";
    $uploadOk = 0;
}

// Controlla il formato del file
if($imageFileType != "raw") {
    echo "<p class='error'>Ops, il file che hai caricato non è in formato RAW</p>";
    $uploadOk = 0;
}

//Carica il file
if ($uploadOk == 0) {
    echo "<p class='error'>Ops, il tuo file non è stato caricato</p>";
} else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>\n";
        } else {
            echo "Ops, il server è bloccato. Riprova più tardi";
        }
}
//apre il file caricato in lettura
$filename = "uploads/".htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
$handler = fopen($filename, 'r+');
//imposta il nome del file css dove verrà salvato il mosaico
$output_css = "uploads/style.css";

if (false === $handler) {
    printf('Impossibile aprire il file %s', $filename);
}

//decodifica il file in formato esadecimale
$hex = unpack("H*", file_get_contents($filename));
$hex = current($hex);

//prepara il file css
$lenght = strlen($hex);
$start=0;
$line=0;
$x=0;
$y=0;
$css_content= "";
$css_content = "body {\n";
$css_content .= "\tbackground: black;\n";
$css_content .= "}\n\n";
$css_content .= ".mosaico {\n";
$css_content .= "\tposition: absolute;\n";
$css_content .= "\ttop: 150px;\n";
$css_content .= "\tleft: 50%;\n";
$css_content .= "\tmargin-left: -200px;\n";
$css_content .= "\twidth: 0;\n";
$css_content .= "\theight: 0;\n";
$css_content .= "\n";
$css_content .= "\tbox-shadow:";

//Inizia a creare il css
echo "<hr/><br/>";
echo "box-shadow:<br>\n";
echo "<pre>\n";
while($start < ($lenght-1)){

    if(($x < $width)){
        if($start) $css_content .= ",\n";
        echo "\t".$x."px ".$y."px 1px 1px #".substr($hex, $start, 6).";<br>";
        $css_content .= "\t\t".$x."px ".$y."px 1px 1px #".substr($hex, $start, 6);
        $x += $pixel;
        $start = $start+($pixel * 6);
    } else {
        echo "<br>\n";
        $x = 0;
        $y += $pixel;
        $start = $start + (($width * 6)*($pixel-1));
    }


}
echo "</pre>";
$css_content .= ";\n";
$css_content .= "}";
file_put_contents($output_css ,$css_content);

fclose($handler);
?>
</body>
</html>
