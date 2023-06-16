<?php include 'header.php'; ?>

<form class="upload-form" action="upload.php" method="post" enctype="multipart/form-data">

    <h1>Apenas Envie</h1>
    <p id="instructions">Tamanho máximo 20 MB</p>

    <label for="files"><i class="fa-solid fa-folder-open fa-2x"></i>Selecione os arquivos...</label>
    <input id="files" type="file" name="files[]" multiple>

    <div class="progress"></div>

    <button type="submit" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Enviar</button>

    <div class="result"></div>

</form>
</body>

</html>

<script src="js/upload.js"></script>
<?php include 'footer.php'; ?>