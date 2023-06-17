<?php include 'header.php'; ?>

<form class="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
    <h3><i class="fa-solid fa-square-arrow-up-right fa-lg"></i> Apenas Envie</h3>
    <div class="form-group">
        <div class="input-group">
            <label for="files"><i class="fa-solid fa-folder-open fa-2x"></i>Selecione os arquivos...</label>
            <input id="files" type="file" name="files[]" multiple required>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Descrição</span>
            </div>
            <textarea name="description" maxlength="200" class="form-control" aria-label="Descrição" placeholder="Breve descrição do conteúdo dos arquivos."></textarea>
        </div>
        <div class="input-group">
            <div class="progress"></div>
            <button type="submit" class="btn btn-lg btn-secondary btn-block active"><i class="fa-solid fa-file-arrow-up"></i> Enviar arquivos</button>
            <div class="result"></div>
        </div>
    </div>

    <a class="btn btn-info text-left " role="button" data-toggle="collapse" href="#limits" aria-expanded="false" aria-controls="limits">
        <i class="fa-solid fa-triangle-exclamation"></i> Exibir limites
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
</form>




</body>

</html>

<script src="js/upload.js"></script>
<?php include 'footer.php'; ?>