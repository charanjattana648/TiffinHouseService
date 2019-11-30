//validation for user email to send message
$(document).ready(function () {

    $("button#sendBtn_cu").click(function () {
        var user_email = $("input#email_cu").val();
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!mailformat.test(user_email))
        {
            alert("Please enter a valid Email address!!");
            return false;
        }
    });
})
