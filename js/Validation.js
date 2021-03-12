$(document).ready(function(){
    $("#email").on('change keydown paste input', function(){
        let email=$(this).val();
        if(email==="") {
            document.getElementById("error").innerText="Email address is required";
            document.getElementById("submit").disabled=true;
        }
        else if(!validateEmail(email)) {
            document.getElementById("error").innerText="Please provide a valid e-mail address";
            document.getElementById("submit").disabled=true;
        }
        else if(email.substring(email.length-3)===".co") {
            document.getElementById("error").innerText="We are not accepting subscriptions from Colombia emails";
            document.getElementById("submit").disabled=true;
        }
        else {
            document.getElementById("submit").disabled=false;
            document.getElementById("error").innerText="";
        }
    });
    $("#tos").change( function() {
        let err=document.getElementById("error");
        if(this.checked && err.innerText==="You must accept the terms and conditions") {
            err.innerText="";
        }
    });
});
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function Validate() {
    let email=document.getElementById("email").value;
    if(email==="") {
        document.getElementById("error").innerText="Email address is required";
        return false;
    }
    else if(!document.getElementById("tos").checked) {
        document.getElementById("error").innerText="You must accept the terms and conditions";
        return false;
    }
    return true;
}