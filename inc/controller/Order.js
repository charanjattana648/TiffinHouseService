$(document).ready(function(){
    console.log("ready")
    $("i.fa").click(function(){
        var cname=$(this).attr("id");
        alert("x "+cname)
         $.removeCookie(cname, { path: '/' });
       // document.cookie=cname+"=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";       
        // document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        // location.reload();
    })
})

