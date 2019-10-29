var phoneNumber=document.getElementById("pNumber");
var email=document.getElementById("email_signUp");
var pCode=document.getElementById("pCode");
var pass=document.getElementById("psw_signUp");
var confirm_pass=document.getElementById("psw_repeat_signUp");
var btnSubmit=document.getElementById("submit_signUp");
/**Regular Expressions */
var regex_phoneNumber="//";
var regex_email="//";
var regex_pCode="//";
var regex_psw="//"

/**function to validate user or dealer data */
function validate_Data()
{

}

btnSubmit.onclick=function(){
    try{
        validate_Data();
    }catch(err)
    {
        alert(err);
        return false;
    }
}