var tatlilar;




var basket = [];


$(document).ready(function(){
    var count = 6;
    $(".navbar li").click(function(){
        if(!$(this).hasClass("active")){

            $(".navbar li").removeClass("active");
            $(this).addClass("active");

            $(".page").removeClass("active");
            $(".page").addClass("inactive");
            $("#"+this.id+"Wrapper").removeClass("inactive");
            $("#"+this.id+"Wrapper").addClass("active");

            if(this.id=="main"){
              $("#mainBack").css('left','0');
              $("#aboutBack").css('left','100%');
              $("#offerBack").css('left','200%');
            }
            if(this.id=="about"){
              $("#mainBack").css('left','-100%');
              $("#aboutBack").css('left','0');
              $("#offerBack").css('left','100%');
            }
            if(this.id=="offer"){
              $("#mainBack").css('left','-200%');
              $("#aboutBack").css('left','-100%');
              $("#offerBack").css('left','0');
            }
        }
    });
    $("#imageContainer div").click(function(){
        if ($(this).hasClass("left")){
            var n = circleNum(parseInt($("#photoNum").val())-1,count);
            $("#photoNum").val(n);
            $($("#mainWrapper li")[4]).css("background-image",$($("#mainWrapper li")[3]).css("background-image"));
            $($("#mainWrapper li")[3]).css("background-image",$($("#mainWrapper li")[2]).css("background-image"));
            $($("#mainWrapper li")[2]).css("background-image",$($("#mainWrapper li")[1]).css("background-image"));
            $($("#mainWrapper li")[1]).css("background-image",$($("#mainWrapper li")[0]).css("background-image"));
            $($("#mainWrapper li")[0]).css("background-image","url(content/"+circleNum(parseInt($("#photoNum").val())-2,count)+".jpg)");
            $("#imageContainer img").attr("src","content/"+$("#photoNum").val()+".jpg");
        }
        if ($(this).hasClass("right")){
            var n = circleNum(parseInt($("#photoNum").val())+1,count);
            $("#photoNum").val(n);
            $($("#mainWrapper li")[0]).css("background-image",$($("#mainWrapper li")[1]).css("background-image"));
            $($("#mainWrapper li")[1]).css("background-image",$($("#mainWrapper li")[2]).css("background-image"));
            $($("#mainWrapper li")[2]).css("background-image",$($("#mainWrapper li")[3]).css("background-image"));
            $($("#mainWrapper li")[3]).css("background-image",$($("#mainWrapper li")[4]).css("background-image"));
            $($("#mainWrapper li")[4]).css("background-image","url(content/"+circleNum(parseInt($("#photoNum").val())+2,count)+".jpg)");
            $("#imageContainer img").attr("src","content/"+$("#photoNum").val()+".jpg");
        }
    });   
    $("#mainWrapper li").click(function(){
        var l = parseInt($("#photoNum").val());
        var n = circleNum(l-2+$("#mainWrapper li").index(this),count);
        $("#photoNum").val(n);
        $($("#mainWrapper li")[4]).css("background-image","url(content/"+circleNum(n+2,count)+".jpg)");
        $($("#mainWrapper li")[3]).css("background-image","url(content/"+circleNum(n+1,count)+".jpg)");
        $($("#mainWrapper li")[2]).css("background-image","url(content/"+circleNum(n,count)+".jpg)");
        $($("#mainWrapper li")[1]).css("background-image","url(content/"+circleNum(n-1,count)+".jpg)");
        $($("#mainWrapper li")[0]).css("background-image","url(content/"+circleNum(n-2,count)+".jpg)");
        $("#imageContainer img").attr("src","content/"+$("#photoNum").val()+".jpg");
    });
    

    $("#offeropen").click(function(){
        if($("#offerlist").hasClass("active")){
            $("#offerlist").removeClass("active");
            $("#offeropen").removeClass("active");
            $("#offeropen").html("▲");
        }
        else {
            $("#offerlist").addClass("active");
            $("#offeropen").addClass("active");
            $("#offeropen").html("▼");
        }
    });


    $.post(
        "gettatli.php",
        {},
        function(data){
            tatlilar = JSON.parse(data);
            for( var i=0;i<tatlilar.length;i++){
                $("#offerselect").html($("#offerselect").html()+"<div class='item' style='background-image: url(content/"+tatlilar[i].image+")'><div class='iteminfo'><a class='itemtitle'>"+tatlilar[i].name+"</a><a class='itemprice'>"+tatlilar[i].price+"тг</a><div class='clear'></div><a class='itemdetail'>"+tatlilar[i].detail+"</a><div class='itembuy'> Add to basket</div></div></div>");
            }
            $(".itembuy").on("click",function(){
                var index = $(".itembuy").index(this);
                basket.push(tatlilar[index]);
                $("#offerquantity").html(basket.length);
                var totalsum=0;
                for (var i =0;i<basket.length;i++){
                    totalsum+=parseInt(basket[i].price);
                }
                $("#offerprice").html(totalsum+"тг");
                $("#offerlist").html("");
                for(var i=0;i<basket.length;i++){
                    $("#offerlist").html($("#offerlist").html()+"<li>"+basket[i].name+"</li>");
                }
             });
        }
    );
    
    
    
    
    $(".openpopup").click(function(){
        $("#buywindow").css("display","block");
        if(basket.length==0)$("#basketgetall").html("<li>No orders yet</li>");
        else $("#basketgetall").html("");
        var basketform = []; 
        for(var i=0;i<basket.length;i++){
            $("#basketgetall").html($("#basketgetall").html()+"<li>"+basket[i].name+"    "+basket[i].price+"тг</li>");
            basketform.push(parseInt(basket[i].id));    
        } 
        $("#formBasket").val(JSON.stringify(basketform));
    });
    $("#buywindowback").click(function(){
        $("#buywindow").css("display","none");
        $("#buywindowpopup").css("display","block");
        $("#buysuccess").css("display","none");
    });

    $("#basketform").submit(function(){
        if ($("#formName").val()=="" ||
            $("#formNumber").val()=="" ||
            $("#formEmail").val()==""||
            $("#formBasket").val()==""){
            alert("Fill all blanks!");
        }
        else if($("#formBasket").val()=="[]"){
            alert("You can't send order without orders");
        }
        else{
            $.post(
                "makeorder.php",
                {"name":$("#formName").val(),
                 "phone":$("#formNumber").val(),
                 "email":$("#formEmail").val(),
                 "order":$("#formBasket").val()},
                 function(data){
                    console.log(data);
                    if(data=="success"){
                        $("#buywindowpopup").css("display","none");
                        $("#buysuccess").css("display","block");
                        basket=[];
                        $("#formName").val("");
                        $("#formNumber").val("");
                        $("#formEmail").val("");
                        $("#formBasket").val("");
                        $("#offerquantity").html("0");
                        $("#offerprice").html("0тг");
                        $("#offerlist").html("");
                    }
                 }
            );
        }
        return false;
    });
    $(document).on('click',".footButt",function(){
        var v = $(this).find("input").val();
        $("#"+v).click();

    });
    
});
function circleNum(num,count){
    num%=count;
    if(num<0)num=count+num;
    if(num>=0 && num<count)return num;
    else return circleNum(num,count);
}


