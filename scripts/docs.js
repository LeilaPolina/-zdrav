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
}

function filter_files(){
    
}