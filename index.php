<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style-proj.css">
</head>
<body>
<div class="head">
    <h1 class="head-text">Trasforma la tua foto in un mosaico usando solo CSS</h1>
</div>
<div class="form-div">
    <form action="build.php" method="post" enctype="multipart/form-data">
        <label class="form-label">Carica la tua foto qui (Solo formato RAW)</label>
        <div class="form-input"><input type="file" name="fileToUpload" id="fileToUpload"/></div>
        <div class="form-input" style="padding: 10px;">
            <label class="form-label">Scegli la grandezza dei pixel del mosaico</label>
            <br>
            <br>
            <input type="radio" id="1" name="pix_mosaico" value="1">
            <label class="form-label" for="1">1px</label><br>
            <input type="radio" id="2" name="pix_mosaico" value="2">
            <label class="form-label" for="2">2px</label><br>
            <input type="radio" id="5" name="pix_mosaico" value="5" checked="checked">
            <label class="form-label" for="5">5px</label>
        </div>
        <div class="form-input" style="padding: 10px;">
        <label class="form-label">Inserisci la grandezza dell'immagine</label>
            <br>
            <label class="form-label">Larghezza</label>
            <input class="form-tx-input" type="number" value="370" id="width" name="width" />pixel
            <label class="form-label">Altezza</label>
            <input class="form-tx-input" type="number" value="370" id="height" name="height" />pixel
        </div>
        <input class="button" style="margin-left: 90px;" type="submit" value="Upload Foto" name="submit"/>
    </form>

</div>
</body>
</html>
