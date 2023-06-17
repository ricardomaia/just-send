<?php
if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $batch_id = md5(uniqid());

    $target_dir = "../uploads/";

    for ($i = 0; $i < count($_FILES['files']['tmp_name']); $i++) {

        if ($_FILES['files']['size'][$i] > 1000000000) {
            exit('O tamanho máximo por aquivo é de 20MB!');
        }

        $file_name = $_FILES['files']['name'][$i];
        $file = $target_dir . $batch_id . '-' . $file_name;
        move_uploaded_file($_FILES['files']['tmp_name'][$i], $file);
    }


    if (isset($_POST['description']) && !empty($_POST['description'])) {
        $description = $_POST['description'];
        file_put_contents($target_dir . $batch_id . '-DESCRIPTION' . '.txt', $description);
    }

    echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> Envio completo!</div>';
    echo '<a href="index.php" class="btn btn-lg btn-link"><span class="glyphicon glyphicon-repeat"></span> Recomeçar</a>';
}
