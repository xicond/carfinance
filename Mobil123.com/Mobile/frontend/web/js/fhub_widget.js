$(document).ready(function(){
    calculate_fcost();
    calculate_pcost();

    $('#deposit_amount, #car_price, #interest_rate, #repayment_period').keyup(function() {
        delay(function(){
            calculate_fcost();
        }, 200 );
    });

    $('#market_price').keyup(function() {
        delay(function(){
            calculate_pcost();
        }, 200 );
    });

});

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();


function calculate_fcost(){
    var car_price = $("#car_price").val();
    var deposit_amount = $("#deposit_amount").val();
    var interest_rate = $("#interest_rate").val();
    var repayment_period = $("#repayment_period").val();
    $("#fcost_error").css("display","none");
    if(car_price != "" && deposit_amount != "" && interest_rate != "" && repayment_period != ""){
        $.ajax({
            type: "GET",
            url: $("#fhub_finance_url").val() + "&car_price="+car_price+"&deposit_amount="+deposit_amount+"&interest_rate="+interest_rate+"&repayment_period="+repayment_period,
            dataType: "json",
            timeout: 75000, // 5 seconds
            success: function(result){
                if(result.status == "OK"){

                    $("#fcost, #fcost2").text(result.msg);
                    $("#fcost_error").css("display","none");

                }
                else if (result.status == "NOTOK"){
                    $("#fcost_error p").text(result.msg);
                    $("#fcost_error").css("display","block");
                }

            },
            error: function(msg){
                $("#fcost_error p").text($("#fe3").val());
                $("#fcost_error").css("display","block");

            }
        });
    }
    return false;
}


function calculate_pcost(){
    var market_price = $("#market_price").val();
    var coverage_type = $('input[name=coverage_type]:checked').val();
    var location = $('input[name=location]:checked').val();
    var engine_capacity = $("#engine_capacity").val();
    var no_claims_disc = $("#no_claims_disc").val();
    $("#pcost_error").css("display","none");
    if(market_price != "" && coverage_type != "" && location != "" && engine_capacity != "" && no_claims_disc != ""){
        $.ajax({
            type: "GET",
            url: $("#fhub_insurance_url").val() + "&market_price="+market_price+"&coverage_type="+coverage_type+"&location="+location+"&engine_capacity="+engine_capacity+"&no_claims_disc="+no_claims_disc,
            dataType: "json",
            timeout: 75000, // 5 seconds
            success: function(result){
                if(result.status == "OK"){

                    $("#pcost, #pcost2").text(result.msg);
                    $("#pcost_error").css("display","none");

                }
                else if (result.status == "NOTOK"){
                    $("#pcost_error p").text(result.msg);
                    $("#pcost_error").css("display","block");
                }

            },
            error: function(msg){
                $("#pcost_error p").text($("#fe3").val());
                $("#pcost_error").css("display","block");

            }
        });
    }
    return false;
}

function change_feed(id){
    var owl = $('#more_articles');
    owl.owlCarousel({
        loop: false,
        margin:0,
        nav:true,
        mouseDrag: false,
        items: 1
    });
    if(id == 'f'){
        $("#ntitle").text($("#nt1").val());
        $("#f_news").html($("#finance_featured_news").html());
        //$("#more_articles").html($("#finance_news").html());
        var content = $("#finance_news").html();
        owl.trigger('insertContent.owl',content);
    }
    else{
        $("#ntitle").text($("#nt2").val());
        $("#f_news").html($("#insurance_featured_news").html());
        //$("#more_articles").html($("#insurance_news").html());
        var content = $("#insurance_news").html();
        owl.trigger('insertContent.owl',content);
    }
}