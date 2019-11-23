$(document).ready(function(){
    
    console.log("header ready");
    $("li.planMeal").mouseenter(function(){
        $("ul.planUser").slideDown();
    });

    $("li.planMeal").mouseleave(function(){
        $("ul.planUser").slideUp();
    });

    $("li.menuUser").mouseenter(function(){
        $("ul.menuHover").slideDown();
    });

    $("li.menuUser").mouseleave(function(){
        $("ul.menuHover").slideUp();
    });
})