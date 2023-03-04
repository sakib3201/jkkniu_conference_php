const nameErr = getId('name_err');
// const usernameErr = getId('username_err');
const emailErr = getId('email_err');
const passwordErr = getId('password_err');
const confirmPasswordErr = getId('confirm_password_err');
const contactErr = getId('contact_err');

function validateName() {
    const name = getId('name').value;
    if(name.length===0){
        innerHtml(nameErr,"Name is required");
        return false;
    }
    if(!name.match(/[a-zA-Z\s]{3,35}/)){
        innerHtml(nameErr,"Invalid name");
        return false;
    }
    innerHtml(nameErr,"Success");
    return true;
}

// function validateUsername() {
//     const username = getId('username').value;
//     if(username.length===0){
//         innerHtml(usernameErr,"Username is required");
//         return false;
//     }
//     if(!username.match(/^[\w]{5,15}$/)){
//         innerHtml(usernameErr,"Invalid username");
//         return false;
//     }
//     innerHtml(usernameErr,"Success");
//     return true;
// }

function validateEmail() {
    const email = getId('email').value;
    if(email.length===0){
        innerHtml(emailErr,"Email is required");
        return false;
    }
    if(!email.match(/[\w]{5,15}([-.]\w)*@[\w]+\.[\w]{2,3}/)){
        innerHtml(emailErr,"Invalid email");
        return false;
    }
    innerHtml(emailErr,"Success");
    return true;
}

function validatePassword() {
    const password = getId('password').value;
    if(password.length===0){
        innerHtml(passwordErr,"Password is required");
        return false;
    }
    if(!password.match(/(?!.*\s).{4,10}/)){
        innerHtml(passwordErr,"Password must be 4 to 10 characters long");
        return false;
    }
    innerHtml(passwordErr,"Success");
    return true;
}

function validateConfirmPassword() {
    const password = getId('password').value;
    const confirm_password = getId('confirm_password').value;
    if(confirm_password.length===0){
        innerHtml(confirmPasswordErr,"Confirm Password is required");
        return false;
    }
    if(!confirm_password.match(/(?!.*\s).{4,10}/)){
        innerHtml(confirmPasswordErr,"Invalid confirm password");
        return false;
    }
    if(password!==confirm_password){
        innerHtml(confirmPasswordErr,"Password does not match!");
        return false;
    }
    innerHtml(confirmPasswordErr,"Success");
    return true;
}

function validateContact() {
    const contact = getId('contact').value;
    if(contact.length===0){
        innerHtml(contactErr,"Contact is required");
        return false;
    }
    if(!contact.match(/01[3-9]{1}[0-9]{8}/)){
        innerHtml(contactErr,"Invalid contact");
        return false;
    }
    innerHtml(contactErr,"Success");
    return true;
}



function getId(name){
    const id = document.getElementById(name);
    return id;
}

function innerHtml(name,text){
    name.innerHTML = text;
}


function formData(){
    if(!validateName() || !validateEmail() || !validatePassword() || !validateConfirmPassword() || !validateContact())
        return false;
    else return true;
}


function loginFormData(){
    if(!validateEmail() || !validatePassword())
        return false;
    else return true;
}