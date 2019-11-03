var company_Name=document.getElementById("company_Name");
var about_Company=document.getElementById("about_Company");

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

$(document).ready(function(){
    $("a.edit_aboutUs").click(function(){
        
        var cName=$(this).attr("id");
        $("tr."+cName+" td").each(function(){
            if($(this).attr("id")=="aCompany")
            {
                alert("hello");
                company_Name.value=cName;
                about_Company.value=$(this).html();

            }

        })
    })
})
