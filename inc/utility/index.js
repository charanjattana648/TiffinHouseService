$(document).ready(function(){
    var index=1;
    var cookie_data=(document.cookie).split(";");
    cookie_data.forEach(function(value){
      var cookie_name=value.split("=");
      cookie_name.forEach(function(key){
        key=key.trim();
        if(key.match(/^item.*/))
        {
            index=parseInt(key.slice(4))+1;
        }
      })
    })


    console.log("ready ")
    $("button.do_item").click(function(){
        var itemObj={};
        
      var price=  $(this).parent().prev().prev().html();
      var itemName=  $(this).parent().prev().html();
      itemObj.itemName=itemName;
      itemObj.qty=1;
      itemObj.price=price;
      

        console.log(""+$(this).attr("id")+"---- "+price);
        var d=new Date();
        d.setTime(d.getTime()+(7*24*60*60*1000));
        var expires=";expires="+d.toUTCString();
        document.cookie="item"+index+"="+JSON.stringify(itemObj)+expires+"path=/";

    })
})