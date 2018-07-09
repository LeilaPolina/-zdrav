<?php
    include_once('includes/config.php');

    $get_upload_types = $db->prepare('SELECT upload_type_name FROM upload_types');
    $get_upload_types->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Документы - загрузить</title>
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/docs.js"></script>
</head>

<body>
    <p>Размер файла не должен превышать 2 Мегабайта</p>
    <p>Допустимые расширения: jpeg, jpg, png, svg, gif, pdf, doc, docx</p>
    <form action="" method="post" enctype="multipart/form-data">
        <span class="search-text">Выберите файл</span><br>
        <input type="file" id="user_file"><br><br>

        <span class="search-text">Дата</span><br>
        <input type="date" id="user_file_date"><br><br>

        <span class="search-text">Вид</span><br>
        <select id="user_file_type">            
        <?php
            while($upload_type_row = $get_upload_types->fetch(PDO::FETCH_ASSOC)){
                echo '<option>'.$upload_type_row['upload_type_name'].'</option>';
            }
        ?>
        </select><br><br>

        <span class="search-text">Название файла</span><br>
        <input type="text" id="user_file_name"><br><br>

        <span id="error_msg"></span><br>

        <input type="button" id="user_file_submit" value="Загрузить">
    </form>
</body>