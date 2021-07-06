$( function() {
    $(".toggle-btn").on("click",function (){
        $(".side-bar").toggleClass("active");
    });
    $(".show-add-btn").on("click",function (){
        $(".adda-worker").toggleClass("active-form");
        $(".side-bar").toggleClass("unactive");
    });
    $(".hide-add-btn").on("click",function (){
        $(".add-worker").toggleClass("active-form");
        $(".side-bar").toggleClass("unactive");
    });
});
