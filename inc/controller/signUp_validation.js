
var phoneNumber=document.getElementById("pNumber");
var email=document.getElementById("email_signUp");
var pCode=document.getElementById("p_Code");
var pass=document.getElementById("psw_signUp");
var confirm_pass=document.getElementById("psw_repeat_signUp");
var btnSubmit=document.getElementById("submit_signUp");
var sel_user_type=document.getElementById("user_type_signUp");
/**Regular Expressions */
var regex_phoneNumber=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
var regex_email= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var regex_pCode=/[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ] ?[0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]$/;
var regex_psw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

/**function to validate user or dealer data */

function validate_Data()
{
    var em=$("#email_signUp").val();
if(!regex_email.test(em))
{
    alert("Please enter valid email address!!");
    return false;
}else if(!regex_phoneNumber.test($("#pNumber").val()))
{
    alert("Please enter valid phone number!!");
    return false;
}else if(!regex_pCode.test($("#p_Code").val()))
{
    alert("Please enter valid postal code!!");
    return false;
}else if(!regex_psw.test($("#psw_signUp").val()))
{
    alert("Password must contain one lowercase ,uppercase and length should be between 6 and 20!!");
    return false;
}else if($("#psw_signUp").val()!=$("#psw_repeat_signUp").val())
{
    alert("Password does not match with confirm password!!");
    return false;
}

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
sel_user_type.onselectionchange=function(){
    alert("hello "+sel_user_type.value)
}
$(document).ready(function(){
    $('#user_type_signUp').change(function(){
        console.log("sel index : "+sel_user_type.value);
        if(sel_user_type.value=="dealer")
        {
            document.getElementById("compName").style.display="block";
            // document.getElementById("comp_name_lbl").style.display="block";
        }else{
            document.getElementById("compName").style.display="none";
            // document.getElementById("comp_name_lbl").style.display="none";
        }
      });
    //   $("form#signUp_form").submit(function(){
    //       console.log("entering validation")
    //       validate_Data();
    //   })
});
