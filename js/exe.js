
$("document").ready(function(){

    $(".reply").hide();
    //投稿　返信フォームを隠す
    $(".reply_form").hide();   
});


//返信の表示切替
$(".reply_check").click(function(){
    $(".reply").toggle();
})

$(".form_btn").click(function(){
    $(".post_form").fadeToggle("fast","linear");
    $(".reply_form").fadeToggle("fast","linear");
});

