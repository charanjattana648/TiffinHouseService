
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

