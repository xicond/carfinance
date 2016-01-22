$(document).ready(function(){
    $("#flead_button").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            if( validate_lead_form("f") == true){
                submit_lead_form("f");

            }
        }
    );


    $("#ilead_button").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            if( validate_lead_form("i") == true){
                submit_lead_form("i");

            }
        }
    );
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


function validate_lead_form(id){
    if( check_lead_name(id) == false || check_lead_email(id) == false || check_lead_phone(id) == false || check_tos(id) == false){
        return false;
    }
    else{

        return true;
    }

}


function check_lead_name(id){
    var field = $("#"+id+"_your_name");
    var ediv = $("#"+id+"_name_error");
    var name    =   field.val();
    name = name.replace(/[^\w\s]/gi, '');
    field.val(name);
    if( name == ""){
        ediv.fadeOut();
        $("#"+id+"_name_error p").text($("#nme").val());
        ediv.fadeIn();
        return false;
    }
    else{
        ediv.fadeOut('slow');
        return true;
    }
}


function check_lead_phone(id){
    var field = $("#"+id+"_your_phone");
    var ediv = $("#"+id+"_phone_error");
    var phone    =   field.val();
    phone = phone.replace(/[^\d\-\+]/gi, '');
    field.val(phone);
    if( phone == ""){
        ediv.fadeOut();
        $("#"+id+"_phone_error p").text($("#phe").val());
        ediv.fadeIn();
        return false;
    }
    else{
        ediv.fadeOut('slow');
        return true;
    }
}


function check_lead_email(id){
    var email    =   $('#'+id+'_your_email').val();
    var ediv = $("#"+id+"_email_error");
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (email == '' || !re.test(email)){
        ediv.fadeOut();
        $("#"+id+"_email_error p").text($("#eme").val());
        ediv.fadeIn();
        return false;
    }
    else{
        ediv.fadeOut('slow');
        return true;
    }
}


function check_tos(id){
    var ediv = $("#"+id+"_agreement_error");
    if( $("#"+id+"_agreement").is(':checked')){
        ediv.fadeOut('slow');
        return true;
    }
    else{
        ediv.fadeOut();
        $("#"+id+"_agreement_error p").text($("#tce").val());
        ediv.fadeIn();
        return false;
    }
}


function submit_lead_form(id){
    var button = $("#"+id+"lead_button");
    button.attr('disabled','disabled');
    //button.html($("#sd").val()+"  <img src='img/spinner.gif' style='vertical-align: middle;'>");
    //button.html($("#sd").val());
    $.ajax({
        type: "GET",
        url: "index.php?r=carfinance/flead_signup&type="+id+"&ref_url="+$("#ref_url").val(),
        data: $("#"+id+"lead-form").serialize(), // serializes the form's elements.
        dataType: "json",
        timeout: 75000, // 5 seconds
        success: function(result){

            if(result.status === "OK"){
                $("#"+id+"lead-form").trigger("reset");
                $("#"+id+"con").html(result.msg);

            }
            else if(result.status === "NOTOK"){
                $("#"+id+"error p").text(result.msg);
                $("#"+id+"error").fadeIn();
                $("#"+id+"lead_button").removeAttr('disabled');
            }
            else{
                $("#"+id+"error p").text($("#fe1").val()).fadeIn('slow');
            }
        },
        error: function(msg){
            $("#"+id+"error p").text($("#fe2").val()).fadeIn('slow');
        }
    });


}


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

                    $("#fcost").text(result.msg);
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

                    $("#pcost").text(result.msg);
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