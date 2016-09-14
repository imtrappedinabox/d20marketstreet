//bmi.js

function processregisterform()
{
    var registerFormObj = document.getElementById("registerForm");
    if (validateInput(registerFormObj))
    {
        return true;
    }
    else{
        alert("Please redo the form and try again");
        return false;
    }
}

function validateInput(registerFormObj)
{
    var user = registerFormObj.username.value;
    var email = registerFormObj.email.value;
    var password = registerFormObj.password.value;
    var retype = registerFormObj.retype.value;
    var state = registerFormObj.state.value;
    var zipcode = registerFormObj.zip.value;
    var userOK, passOK, emailOK, stateOK, zipOK;

    userOK = validateUser(user);
    if(password === retype){
        passOK = validatePass(password);
    }
    else{
        passOK = false;
        alert("Error: You have mistyped your password");
    }
    emailOK = validateEmail(email);
    stateOK = state !== "...";
    if(!stateOK)
        alert("Error: please choose a state");
    zipOK = validateZIP(zipcode);
    
    return userOK && passOK && emailOK && stateOK && zipOK;
}

function validateUser(user)
{
    var p = user.search(/^([0-9a-zA-Z]).{4,20}$/);
    if (p === 0){
        return true;
    }
    else
    {
        alert("Error: Name unacceptable length or contains special characters");
        return false;
    }
}

function validatePass(password)
{
    var p = password.search(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/);
    if (p === 0){
        return true;
    }
    else
    {
        alert("Error: Password does not meet requirements");
        return false;
    }
}

function validateEmail(address)
{
    var p = address.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})$/);
    if (p === 0)
        return true;
    else
    {
        alert("Error: Invalid e-mail address.");
        return false;
    }
}

function validateZIP(zip)
{
    var p = zip.search(/^\d{5}(-\d{4})?$/);
    if (p === 0)
        return true;
    else
    {
        alert("Error: Invalid ZIP code.");
        return false;
    }
}

