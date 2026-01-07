
function validateLogin() {
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (username == "") 
        {
        alert("wrong username ");
        return false;
    }

    if (password == "") 
        {
        alert(" worng password");
        return false;
    }

    return true;
}


function validateSignUp()
{
    var username = document.forms["signupForm"]["username"].value;
    var password = document.forms["signupForm"]["password"].value;
    var email = document.forms["signupForm"]["email"].value;

         if (username == "")
    {
        alert ("Please fill the UserName");
        return false; 
    }
            if (password == "")
    {
        alert ("Please fill the passworde");
        return false ;
    }
        return true;


        
}

function validateExhibition()
{
    var title = document.forms["exhibitionForm"]["title"].value;
    var type = document.forms["exhibitionForm"]["type"].value;
    var deadline = document.forms["exhibitionForm"]["deadline"].value;

         if (title == "")
    {
        alert ("Please fill the title  ");
        return false; 
    }
            if (type == "")
    {
        alert ("Please fill the type ");
        return false ;
    }
     if (deadline == "")
    {
        alert ("Deadline must be filled");
        return false; 
    }
        return true;


        
}


function validateExhibition()
{
    var title = document.forms["exhibitionForm"]["title"].value;
    var type = document.forms["exhibitionForm"]["type"].value;
    var deadline = document.forms["exhibitionForm"]["deadline"].value;

         if (title == "")
    {
        alert ("Please fill the title  ");
        return false; 
    }
            if (type == "")
    {
        alert ("Please fill the type ");
        return false ;
    }
     if (deadline == "")
    {
        alert ("Deadline must be filled");
        return false; 
    }
        return true;


        
}