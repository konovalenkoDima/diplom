$( function() {
    $(".toggle-btn").on("click",function (){
        $(".side-bar").toggleClass("active");
    });
    $(".show-add-admin-btn").on("click",function (){
        $(".add-admin").toggleClass("showed");
        $(".side-bar").toggleClass("unactive");
    });
    $(".hide-add-admin-btn").on("click",function (){
        $(".add-admin").toggleClass("showed");
        $(".side-bar").toggleClass("unactive");
    });
    $(".show-add-btn").on("click",function (){
        $(".add").toggleClass("show-w");
        $(".side-bar").toggleClass("unactive");
    });
    $(".hide-add-btn").on("click",function (){
        $(".add").toggleClass("show-w");
        $(".side-bar").toggleClass("unactive");
    });
});
