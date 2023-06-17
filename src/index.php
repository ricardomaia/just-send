<?php include 'header.php'; ?>

<form class="upload-form" action="upload.php" method="post" enctype="multipart/form-data">

    <h1>Apenas Envie</h1>
    <p id="instructions">Tamanho máximo 1 GB</p>

    <label for="files"><i class="fa-solid fa-folder-open fa-2x"></i>Selecione os arquivos...</label>
    <input id="files" type="file" name="files[]" multiple required><br>
    <textarea id="description" name="description" placeholder="Descrição (opcional)" maxlength="200"></textarea>

    <div class="progress"></div>

    <button type="submit" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Enviar</button>

    <div class="result"></div>


    <a class="btn btn-danger" role="button" data-toggle="collapse" href="#limits" aria-expanded="false" aria-controls="limits">
        Exibir limites
    </a>

    <div class="collapse" id="limits">
        <div class="list-group">
            <a href="#" class="list-group-item"><?php echo ini_get('upload_max_filesize'); ?> é o tamanho máximo permitido por arquivo.</a>
            <a href="#" class="list-group-item"><?php echo ini_get('post_max_size'); ?> é o tamanho máximo permitido por envio.</a>
            <a href="#" class="list-group-item"><?php echo ini_get('max_file_uploads'); ?> é o número máximo de arquivos permitidos por envio.</a>
            <a href="#" class="list-group-item"><?php echo ini_get('max_input_time'); ?> segundos é o tempo máximo permitido para envio.</a>
            <a href="#" class="list-group-item"><?php echo ini_get(('max_execution_time')); ?> segundos é o tempo máximo permitido para execução.</a>
            <a href="#" class="list-group-item"><?php echo ini_get(('memory_limit')); ?> é o tamanho máximo permitido para memória.</a>
        </div>
    </div>



    </div>

</form>
</body>

</html>

<script src="js/upload.js"></script>
<?php include 'footer.php'; ?>