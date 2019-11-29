var company_Name=document.getElementById("company_Name");
var about_Company=document.getElementById("about_Company");

/** validating whether company name is selected or not and whether some information about company is added or not before adding or editing information*/

function validateAboutUsData()
{
    if(company_Name.value=="")
    {
        alert("Please select Company name from table by clicking edit");
        return false;
    }else if(about_Company.value=="")
    {
        alert("please enter something about company!!");
        return false;
    }
}


document.getElementById("add_aboutUs").onclick=function(){
    validateAboutUsData();
}
document.getElementById("update_aboutUs").onclick=function(){
    validateAboutUsData();
}
/** after validating when document is ready ,the information is added or edited */
$(document).ready(function(){
    console.log("entering --------");
    $("a.edit_aboutUs").click(function(){
        console.log("entering")
        var cName=$(this).attr("id");
        $("tr#row_about td").each(function(){
            console.log("entering")
            if($(this).attr("id")=="aCompany")
            {
                company_Name.value=cName;
                about_Company.value=$(this).html();

            }

        })
    })
})
