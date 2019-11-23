var qty=document.getElementById("qty_item");
var btn_menu_item=document.getElementsByName("mi_to_cart");
$(document).ready(function(){

    $("section.vegMenu").hide();
    $("a#menu_items").click(function(event){
      var itemName=$(this).attr("href");
      $("section.vegMenu").hide();
      itemName=itemName.replace(" ","");
    $("section"+itemName).show();
    });
    console.log("ready")
    $("button.mi_to_cart").click(function(){
        var qty=$(this).prev().val();
        if(Number(qty)<=0)
        {
            alert("Please add Quantity!!")
            return;

        }
        var item_id=$(this).attr("id");
        id=item_id.split("_");
        var item_name="";
        for(var i=0;i<id.length;i++)
        {
            item_name+=id[i]+" ";
        }
        item_name=item_name.trim();
        var price=$("div.hover_menu_img").children("p."+item_id).html();  
        var companyNamehead=$("h2.menuHead").text();   
        var startIndex=companyNamehead.indexOf(":");
        var endIndex=companyNamehead.indexOf("Menu");
        //doing
        var companyName=companyNamehead.substring(startIndex+1, endIndex).trim();
        console.log(item_name+" val "+qty+" price "+price+" id "+item_id+" company : "+companyName);
        var date=new Date();
        date.setTime(date.getTime()+(7*24*60*60*1000));
        var expires=";expires="+date.toUTCString();
        var cartObject={};
        cartObject.itemName=item_name;
        cartObject.qty=qty;
        cartObject.price=price;
        cartObject.companyName=companyName;
        var cart_data=JSON.stringify(cartObject);        
        var cookie_index=getCookieIndex();
        
        // console.log("result is :"+cookie_data_array.toString()+"--- "+cookie_index);
        // var index=cookie_data_array.length;
        document.cookie = "item"+cookie_index+"="+cart_data+";"+
                            expires+";path=/";  
         alert(item_name+" added to cart!");
                           
    })



    $("button#mealPlan_cart").click(function(){        
        console.log("add to cart");
        var qty=$(this).parent().prev().val();
        if(qty=="" || Number(qty)<=0)
        {
            alert("Please add Quantity!!");
            return false;
        }else if (Number(qty)>100)
        {
            alert("Please contact admin for large order than 100 Items!!");
            return false;
        }
        var companyName=$("h1#mealplan_heading").text();
        var sType=$(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
        var tiffinType=$(this).parent().prev().prev().prev().prev().prev().text();
        var item_name=sType+"_"+tiffinType;
        
        var price=$(this).parent().prev().prev().prev().prev().text();
       // var price=$(this).parent().find(".price").text();
    
       // alert("item added !!!"+companyName);
        console.log("cname : "+companyName);
        console.log("itemName : "+item_name);
        console.log("qty : "+qty);
        console.log("price : "+price);

        var date=new Date();
        date.setTime(date.getTime()+(7*24*60*60*1000));
        var expires=";expires="+date.toUTCString();
        var cartObject={};
        cartObject.itemName=item_name;
        cartObject.qty=qty;
        cartObject.price=price;
        cartObject.companyName=companyName;
        var cart_data=JSON.stringify(cartObject);        
        var cookie_index=getCookieIndex();
        document.cookie = "item"+cookie_index+"="+cart_data+";"+
                            expires+";path=/";  
         alert(item_name+" added to cart!");
                           
    
        })

        function getCookieIndex()
        {
            var cookie_index=0;
        var cookie_data_array=(document.cookie).split("; ")
        for(var i=0;i<cookie_data_array.length;i++)
        {
            if(cookie_data_array[i].match(/^item/))
            {
                console.log(""+cookie_data_array[i]);
                var cookieItemIndx=cookie_data_array[i].indexOf("=");
                var index=cookieItemIndx-1;
                cookie_index=Number(cookie_data_array[i].trim().slice(4,cookieItemIndx))+1;
    
            }
        }
        return cookie_index;
        }

})
