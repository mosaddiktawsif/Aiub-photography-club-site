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