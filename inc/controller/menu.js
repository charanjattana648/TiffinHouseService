var qty=document.getElementById("qty_item");
var btn_menu_item=document.getElementsByName("mi_to_cart");
$(document).ready(function(){

    console.log("ready")
    $("button").click(function(){
        var qty=$(this).prev().prev().val();
        var item_id=$(this).attr("id");
        id=item_id.split("_");
        var item_name="";
        for(var i=0;i<id.length;i++)
        {
            item_name+=id[i]+" ";
        }
        item_name=item_name.trim();
        var price=$("div.hover_menu_img").children("p."+item_id).html();       
        console.log(item_name+" val "+qty+" price "+price+" id "+item_id);
        var date=new Date();
        date.setTime(date.getTime()+(7*24*60*60*1000));
        var expires=";expires="+date.toUTCString();
        var cartObject={};
        cartObject.itemName=item_name;
        cartObject.qty=qty;
        cartObject.price=price;
        var cart_data=JSON.stringify(cartObject);        
        var cookie_data_array=(document.cookie).split("; ")
        var index=cookie_data_array.length;
        document.cookie = "item"+index+"="+cart_data+";"+
                            expires+";path=/";  
                            alert(item_name+" added to cart!");
                           
    })
    console.log(document.cookie)

})
