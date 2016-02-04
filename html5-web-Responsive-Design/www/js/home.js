var time = "";
var index = 1;
$(function () {
    showimg(index);
    //鼠标移入移出
    $(".imgnum span").hover(function () {
        clearTimeout(time);
        var icon=$(this).text();
        $(".imgnum span").removeClass("onselect").eq(icon-1).addClass("onselect");
        $("#banner_img li").hide().stop(true,true).eq(icon-1).fadeIn("slow");
    }, function () {
        index=$(this).text()> 4 ? 1 :parseInt($(this).text())+1;
        time = setTimeout("showimg(" + index + ")", 5000);
    });
});
function showimg(num) {
    index = num;
    $(".imgnum span").removeClass("onselect").eq(index-1).addClass("onselect");
    $("#banner_img li").hide().stop(true,true).eq(index-1).fadeIn("slow");
    index = index + 1 > 5 ? 1 : index + 1;
    time = setTimeout("showimg(" + index + ")", 5000);
}
function ShowMenu(){
    var height_str=$('#navMain').css('height');
    if(height_str=='40px'){
        $('#navMain').css('height','0px');
    }else{
        $('#navMain').css('height','auto');
    }

}
//语言选择
function ChangeLanguage(lang,country_code){
    $.cookie('think_language',lang);
    $.cookie('Country_Code',country_code);
    window.location.href = window.location.href;
}
//产品详情选择站点
function set_active(o,is_exsits){
    if(is_exsits){
        var as = document.getElementById('market_list').getElementsByTagName('A');
        for(var i=0;i<as.length;i++){
            var as_class = as[i].getAttribute("class");
            if(as_class=="ec hover"){
                as[i].setAttribute("class","ec");
                break;
            }
        }
        o.setAttribute("class","ec hover");
        var buynow = document.getElementById('buynow');
        buynow.setAttribute('href',"javascript:;");
        buynow.setAttribute('onclick',"turn_url(this)");
        return;
    }
}