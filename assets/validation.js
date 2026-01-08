function validateForm() {
    let title = document.getElementById("title").value;
    let category = document.getElementById("category").value;
    let photo = document.getElementById("photo").value;

    if (title.trim() == "") {
        alert("Title must be filled out");
        return false;
    }
    if (category == "") {
        alert("Please select a category");
        return false;
    }
    if (photo == "") {
        alert("Please upload a file");
        return false;
    }
    return true;
}

function validateStoryForm() {
    let files = document.querySelector('input[name="photos[]"]').files;
    if (files.length < 3 || files.length > 10) {
        alert("You must select between 3 and 10 photos for a Story.");
        return false;
    }
    return true;
}