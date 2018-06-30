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
        //window.location.href = 'user_upload_management.php?upload_file=' + '';
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