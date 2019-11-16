$(document).ready(function(){
    console.log("ready")
    $("i.fa").click(function(){
        var cname=$(this).attr("id");
        alert("deleted "+cname)
        // $.removeCookie(cname, { path: '/' });
       document.cookie=cname+"=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";       
        // document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
         location.reload();
    })

    
    $("#pay_by_card").hide();
    $("input#byCash").click(function(){
        $("#pay_by_card").hide();
    })
    $("input#byCard").click(function(){
        $("#pay_by_card").show();
    })
})

