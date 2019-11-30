$(document).ready(function () {

    var cookie_index = 0;
    var cookie_data_array = (document.cookie).split("; ")
    for (var i = 0; i < cookie_data_array.length; i++) {
        if (cookie_data_array[i].match(/^item/)) {
            console.log("" + cookie_data_array[i]);
            var cookieItemIndx = cookie_data_array[i].indexOf("=");
            var index = cookieItemIndx - 1;
            cookie_index = Number(cookie_data_array[i].trim().slice(4, cookieItemIndx)) + 1;

        }
    }


    console.log("ready ")
    $("button.do_item").click(function () {
        var itemObj = {};

        var price = $(this).parent().prev().prev().html();
        var itemName = $(this).parent().prev().html();
        var companyName = $(this).parent().prev().attr("id");
        //tdeal_name
        itemObj.itemName = itemName;
        itemObj['qty'] = "1";
        itemObj['price'] = price + "";
        itemObj['companyName'] = companyName;


        console.log("" + $(this).attr("id") + "---- " + JSON.stringify(itemObj));
        var d = new Date();
        d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
        var expires = ";expires=" + d.toUTCString();
        document.cookie = "item" + cookie_index + "=" + JSON.stringify(itemObj) + expires + "path=/";
        alert(itemName + " added to cart!!");

    })
})