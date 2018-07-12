function view_user_upload(filepath){
    window.open(filepath);
}

function delete_user_upload(filepath, filename, demo){
    if (confirm("Вы действительно хотите удалить '" + filename + "'?"))
    {
        if(demo){
            alert("Это действие недоступно в демо режиме!");
        }
        else{
            window.location.href = 'user_upload_management.php?delete_file=' + filepath;
        }
    }
}

function get_zip(folder){
    window.location.href = 'user_upload_management.php?get_zip_files=' + folder;
}

function add_file(demo){
    if(demo){
        alert("Это действие недоступно в демо режиме!");
    }
    else{
        $("#upload_file_form").css('display', 'block');
    }
}

function send_file(fd, callback){
    $.ajax({
        type: 'POST',
        url: 'user_upload_management.php',
        data: fd,
        processData: false,
        contentType: false,
        success: callback,
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            $("#error_msg").text(msg);
        }
    });
}

function process_ajax_answer(data){
    if(data != "ОК"){
        $("#error_msg").text(data);
    }
    else{
        alert(data);        
    }
}

function upload_file(){
    var $file_input = $("#user_file");
    var date_input = $("#user_file_date").val();
    var type_input = $("#user_file_type").val();
    var name_input = $("#user_file_name").val();
    if($file_input.prop('files').length == 0){
        $("#error_msg").text("Файл не выбран!");
    }
    else if($file_input.prop('files').length > 1){
        $("#error_msg").text("Можно загружать только один файл за раз!");
    }
    else if(date_input === ""){
        $("#error_msg").text("Введите дату!");
    }
    else if(name_input === ""){
        $("#error_msg").text("Введите название!");
    }
    else{        
        var fd = new FormData;
        fd.append('user_file', $file_input.prop('files')[0]);
        fd.append('user_file_date', date_input);
        fd.append('user_file_type', type_input);
        fd.append('user_file_name', name_input);
        send_file(fd, process_ajax_answer);
    }
}

function filter_files(){
    var type = $('#upload_search_type').val();
    var date = $('#upload_search_date').val();
    var title = $('#upload_search_title').val().toLowerCase();

    if(date){
        date = new Date(date);
        var options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
          };
          
          date = date.toLocaleString("ru", options);
          date = date.substring(0, date.length - 3);
    }

    var files = document.getElementsByClassName('file_row');
    var cur_type, cur_date, cur_title;
    for(var i = 0; i < files.length; i++){
        var file = files[i];
        for(var j = 0; j < file.children.length; j++){
            if(file.children[j].className == "document-date"){
                cur_date = file.children[j].innerText;
            }
            else if(file.children[j].className == "document-type"){
                cur_type = file.children[j].innerText;
            }
            else if(file.children[j].className == "document-name"){
                cur_title = file.children[j].innerText.toLowerCase();
            }
        }
        if ((cur_type.indexOf(type) > -1) || (type == "Показать все")){
            if(cur_title.indexOf(title) > -1){
                if(cur_date.indexOf(date) > -1){
                    file.style.display = "";                
                }
                else{
                    file.style.display = "none";
                }
            }
            else{
                file.style.display = "none";
            }
        }
        else{
            file.style.display = "none";
        }
    }
}

$(document).ready(function(){
    $("#user_file_submit").click(function(e) { 
        e.preventDefault();
        upload_file();
    });

    $("#upload_modal_close").click(function (e) {
        e.preventDefault();
        $("#upload_file_form").css('display', 'none');
    });

    window.onclick = function(event) {
        var modal = document.getElementById('upload_file_form');
        if (event.target == modal) {
            $("#upload_file_form").css({'display':'none'});
        }
    }
});