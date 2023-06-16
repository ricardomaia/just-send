<?php
if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $target_dir = "../uploads/";

    for ($i = 0; $i < count($_FILES['files']['tmp_name']); $i++) {

        if ($_FILES['files']['size'][$i] > 20000000) {
            exit('O tamanho máximo por aquivo é de 20MB!');
        }

        $file_name = $_FILES['files']['name'][$i];
        $tmp = explode('.', $file_name);
        $file_extension = end($tmp);
        $file = $target_dir . md5(uniqid()) . '.' . $file_name . '.' . $file_extension;
        move_uploaded_file($_FILES['files']['tmp_name'][$i], $file);
    }

    echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> Envio completo!</div>';
    echo '<a href="index.php" class="btn btn-lg btn-link"><span class="glyphicon glyphicon-repeat"></span> Recomeçar</a>';
}
