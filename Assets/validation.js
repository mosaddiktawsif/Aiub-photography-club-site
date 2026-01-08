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