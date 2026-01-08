function validateExhibition(){
    let title = document.getElementById('title').value;
    let type = document.getElementById('type').value;
    let deadline = document.getElementById('deadline').value;
    if(title === "" || type === "" || deadline === ""){
        document.getElementById('js-error').innerText = "All fields required (JS)";
        return false;
    }
    return true;
}

function validateUpload(){
    let file = document.getElementById('photo').files[0];
    if(!file){
        document.getElementById('js-error').innerText = "Select a file";
        return false;
    }
    if(file.size > 2 * 1024 * 1024){
        document.getElementById('js-error').innerText = "File > 2MB (JS)";
        return false;
    }
    return true;
}