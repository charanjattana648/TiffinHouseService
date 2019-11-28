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

    var regexEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var regexPostalCode=/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    var regexCardNumber=/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|(222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11}|62[0-9]{14})$/;
    
    if($(".paymentType").val()=="Card")
    {
        console.log("entered order jsssss");
        $("#pay_by_card").show();
    }

    $("#pay_by_card").hide();
    $("input#byCash").click(function(){
        $("#pay_by_card").hide();
    })
    $("input#byCard").click(function(){
        $("#pay_by_card").show();
    })
    $(".btncheckout").click(function(){
       
    })

    $(document).on('submit','form#payment_form',function(){
        var x=validate_Data();
      //  alert("Data is "+x);
        return  x;
     });

    function validate_Data(){
        console.log("entered order jsfghjjhjhghhgssss");
    if (!regexEmail.test($("#email").val()))
    {
        alert("Please add Valid email Address!!")
        return false;
    }else if(!regexPostalCode.test($("#zip").val()))
    {
        alert("Please add Valid postal code!!")
        return false;
    }else if($(".paymentType").val()=="Card")
    {
        if(!$("#cname").val())
        {
            alert("Please card holder name!!")   
            return false;
        }else if(!$("#ccnum").val() || !regexCardNumber.test($("#ccnum").val()))
        {
            alert("Please check card number!!")   
            return false;
        }
        else if(!$("#expmonth").val())
        {
            alert("Please enter month");
            return false;
        }
        else if(!$("#expyear").val() || !Number($("#expyear").val()) || Number($("#expyear").val())<2019)
        {
            alert("Not valid year");
            return false;
        }else if(!$("#cvv").val() || !Number($("#cvv").val()) || !/[0-9]{3}/.test($("#cvv").val()))
        {
            alert("Not valid cvv");
            return false;
        }
       
    }
    return true;

    }

})

