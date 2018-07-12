<?php include_once('includes/config.php'); ?>
<?php
    $get_upload_types = $db->prepare('SELECT upload_type_id, upload_type_name FROM upload_types');
    $get_upload_types->execute();
?>

<div id="upload_file_form" class="modal-window">
    <div class="modal-window-content">
        <div class="modal-window-body sm-body">
            <div class="modal_header">
					<span class="close" id="upload_modal_close">&times;</span>
					<div class="modal-title">Загрузка файла</div>
            </div>
            <div class="modal_text_lines">
                <p>Максимальное число файлов, загруженных пользователем за все время: 30</p>
                <p>Размер файла не должен превышать 2 Мегабайта</p>
                <p>Допустимые расширения: jpeg, jpg, png, pdf, doc, docx</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

                <table id="file_upload_table">
                    <tr>
                        <th>Файл</th>
                        <th>Дата</th>
                        <th>Вид</th>
                        <th>Название</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" id="user_file">
                        </td>
                        <td>
                            <input type="date" id="user_file_date" class="upload_file_input">
                        </td>
                        <td>
                            <select id="user_file_type" class="upload_file_input">   
                            <?php
                                while($upload_type_row = $get_upload_types->fetch(PDO::FETCH_ASSOC)){
                                    echo '<option value="'.$upload_type_row['upload_type_id'].'">'.$upload_type_row['upload_type_name'].'</option>';
                                }
                            ?>
                            </select> 
                        </td>
                        <td>
                            <input type="text" id="user_file_name" class="upload_file_input" maxlength="50">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <span id="error_msg">Заполните данные о файле</span><br>

                <input type="button" id="user_file_submit" value="Загрузить">
            </form>
        </div>
    </div>
</div>