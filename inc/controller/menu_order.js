$(document).ready(function(){
   
    
    $('input[type="submit"]').click(function(){
        var oVal=$(this).prev().prev().val();
        $(this).prev().val(oVal);
        $("input#order_val").val(oVal);
        console.log("order button ready : "+oVal);
    })

})