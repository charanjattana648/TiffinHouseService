
var company_Name=document.getElementById("company_name");
var companyImage=document.getElementById("company_image");
var phoneNumber=document.getElementById("phone_number");
var email=document.getElementById("d_email");
var address=document.getElementById("d_address");
var city=document.getElementById("d_city");
var province=document.getElementById("d_province");
var country=document.getElementById("d_country");
var postalCode=document.getElementById("postal_code");

var btn_add=document.getElementById("add_Profile");
var btn_update=document.getElementById("update_Profile");
var btn_delete=document.getElementById("delete_Profile");

function validateCompanyProfile()
{
    if(companyName.value=="")
    {
        throw "CompanyName is Empty";
      
    }else if(phoneNumber.value=="")
    {
        throw "please add phoneNumber";
    }else if(email.value)
    {
        throw "please add email";
    }else if(address.value=="")
    {
        throw "please add address";
    }else if(city.value=="")
    {
        throw "please add city";
    }else if(province.value=="")
    {
        throw "please select province.";
    }else if(country.value=="")
    {
        throw "please select country.";
    }else if(postalCode.value=="")
    {
        throw "please add postalCode.";
    }
}

function add_company_profile(){
    try{
       validateDealerMenu();
    if(companyImage.value=="")
    {
        throw "please add companyImage";
    }
    }catch($err){
        alert("Error : "+$err);
        return false;
    }
}
function add_company_profile(){
    try{
       validateDealerMenu();
    if(companyImage.value=="")
    {
        throw "please add companyImage";
    }
    }catch($err){
        alert("Error : "+$err);
        return false;
    }
}
btn_add.onclick=function(){
    add_Ingredient();
    return false;
};
btn_update.onclick=function(){
    try{
        validateDealerMenu();
     }catch($err){
         alert("Error : "+$err);
         return false;
     }
 };
btn_delete.onclick=function(){
    try{
     if(companyName.value=="")
     {
         throw "please add companyName";
     }
     }catch($err){
         alert("Error : "+$err);
         return false;
     }
};
// alert ("hello");
// document.getElementById("a#edit_menu").onclick=function(){
//     console.log("hello click click");  
// }

$(document).ready(function(){
    console.log("hello jquery");
    $("a.edit_cprofile").click(function(){
       
        var cName=$(this).attr("id");
       $('.'+cName+' td').each(function() {
     
           if($(this).attr('id')=="companyName")
           {
            company_Name.value=$(this).html();
            alert("hello : "+company_Name.value)
           }else if($(this).attr('id')=="phoneNumber")
           {
            phoneNumber.value=$(this).html();
           }else if($(this).attr('id')=="email")
           {
            email.value=$(this).html();
           }else if($(this).attr('id')=="address")
           {
            address.value=$(this).html();
           }else if($(this).attr('id')=="city")
           {
            city.value=$(this).html();
           }else if($(this).attr('id')=="province")
           {
            province.value=$(this).html();
           }else if($(this).attr('id')=="country")
           {
            country.value=$(this).html();
           }else if($(this).attr('id')=="postalCode")
           {
            postalCode.value=$(this).html();
           }
        
    });
    })
})