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

function filter_files(){
}