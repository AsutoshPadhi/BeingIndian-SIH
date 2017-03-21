flag = true;
$(document).ready(function(){
    $("#historyButton").click(function(){
        $("#one").toggle(300);
        $("#two").toggle(400);
        $("#three").toggle(500);
        if(flag){
            $(this).css("background-image","url('../user/image/up.png')");
            flag = !flag;
        }
        else{
            $(this).css("background-image","url('../user/image/down.png')");
            flag = !flag;
        }
    });
    $("#historyButtonPhone").click(function(){
        $("#onePhone").toggle(300);
        $("#twoPhone").toggle(400);
        $("#threePhone").toggle(500);
        if(flag){
            $(this).css("background-image","url('../user/image/up.png')");
            flag = !flag;
        }
        else{
            $(this).css("background-image","url('../user/image/down.png')");
            flag = !flag;
        }
    });
    $(".stickyitem").click(function(){
        $(".topnav").toggle(300);
    });
});