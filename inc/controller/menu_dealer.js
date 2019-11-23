
// alert("connected");
var item_ingredients=[];
var day=document.getElementById("day");
var itemName=document.getElementById("itemName");
var itemPrice=document.getElementById("itemPrice");
var itemImage=document.getElementById("itemImage");
var itemDetail=document.getElementById("itemDetail");
var ingredient=document.getElementById("ingredient");
var btn_ingredient=document.getElementById("add_ingredient");
var btn_item=document.getElementById("add_item");
var menu_id=document.getElementById("itemId");
var rad_regular=document.getElementById("regular");
var rad_offer=document.getElementById("onDiscount");




//rad_regular.onselectionchange
function validateDealerMenu()
{
    if(day.value=="")
    {
        throw "please select day";
      
    }else if(itemName.value=="")
    {
        throw "please add item name";
    }else if(itemPrice.value=="")
    {
        throw "please add item price";
    }else if(isNaN(itemPrice.value))
    {
        throw "Item price is number";
    }else if(itemImage.value=="")
    {
        throw "please add item image";
    }else if(itemDetail.value=="")
    {
        throw "please add item detail";
    }else if(item_ingredients.length==0)
    {
        throw "please add ingredients.";
    }
}
function add_Ingredient()
{    
    if(ingredient.value=="")
    {
        throw "please enter ingredient";
    }else{
        item_ingredients.push(ingredient.value);
        document.getElementById("ing_data").value=item_ingredients.join(",");
        console.log("Ingredient are :"+item_ingredients.join(","))

    }    
}

function add_item(){
    try{
       validateDealerMenu();
        var ingredients=item_ingredients.join(",");
    }catch($err){
        alert("Error : "+$err);
        return false;
    }
}
btn_ingredient.onclick=function(){

    add_Ingredient();
    return false;
};
btn_item.onclick=function(){
    add_item();
};
// alert ("hello");
// document.getElementById("a#edit_menu").onclick=function(){
//     console.log("hello click click");  
// }

$(document).ready(function(){
    console.log("hello jquery");
    $("a.edit_menu").click(function(){
        var mId=$(this).attr("id");
       $('tr.'+mId+' td').each(function() {
           if($(this).attr('id')=="menuId")
           {
           // $("input#itemPrice").val($(this).html());
            menu_id.value=$(this).html();
           }else if($(this).attr('id')=="day")
           {
            $("select#day").val($(this).html()+":"+$(this).attr("class"));
           // day.value=$(this).html()+":"+$(this).attr("class");;
           console.log($(this).html()+":"+$(this).attr("class"));
           }else if($(this).attr('id')=="itemName")
           {
               $("input#itemName").val($(this).html());
               console.log("hello"+$(this).html());
           // itemName.value=$(this).html();
           }else if($(this).attr('id')=="itemPrice")
           {
            $("input#itemPrice").val($(this).html());
            //itemPrice.value=$(this).html();
           }else if($(this).attr('id')=="itemDetail")
           {
            $("input#itemDetail").val($(this).html());
            //itemDetail.value=$(this).html();
           }else if($(this).attr('id')=="ingredient")
           {
            $("input#ingredient").val($(this).html());
            //ingredient.value=$(this).html();
           }
        
    });
    })

    $("#onDiscount").change(function(){
        $("select#day").css("display","none");
        $("#add_ingredient").css("display","none");
        $("input#ingredient").css("display","none");
        $("label#ing_l").css("display","none");

    })
    $("#regular").change(function(){
        $("select#day").css("display","block");
        $("#add_ingredient").css("display","block");
        $("input#ingredient").css("display","block");
        $("label#ing_l").css("display","block");

    })
})