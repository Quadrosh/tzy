function actionTimer () {
    var time=new Date();
    var dateAttrObj = document.getElementById('dateObj');
    var dateAttr = dateAttrObj.getAttribute('data-days');

    var year = time.getFullYear();
    var month = time.getMonth();
    var day = time.getDate()+ parseInt(dateAttr);

    var tillTo=new Date(year,month,day,18);
    var totalRemains=(tillTo.getTime()-time.getTime());

    if (totalRemains>1){
        var RemainsSec = (parseInt(totalRemains/1000));
        var RemainsFullDays=(parseInt(RemainsSec/3600/24));

        var RemainsFullSec=(parseInt(RemainsSec));
        var RemainsFullMin=(parseInt(RemainsFullSec/60));
        var RemainsFullHours=(parseInt(RemainsFullMin/60));

        var hoursInLastDay = RemainsFullHours % 24;
        var minInLastHour = RemainsFullMin % 60;
        var secInLastMinute= RemainsFullSec % 60;


        if (hoursInLastDay<10){
            hoursInLastDay="0"+hoursInLastDay;
        };
        if (minInLastHour<10){
            minInLastHour="0"+minInLastHour;
        };
        if (secInLastMinute<10){
            secInLastMinute="0"+secInLastMinute;
        };


        document.getElementById("RemainsDays").innerHTML=  RemainsFullDays;
        document.getElementById("RemainsHours").innerHTML=  hoursInLastDay;
        document.getElementById("RemainsMinutes").innerHTML=  minInLastHour;
        document.getElementById("RemainsSeconds").innerHTML=  secInLastMinute;
        setTimeout('actionTimer()',1000)
    }

    else {
        document.getElementById("clock").innerHTML="Поздравляем с Новой Эрой!";
    }
}
actionTimer();

window.onload = function(){
    var actionOrderButton = document.getElementById('actionOrderButton');
    var actionName = actionOrderButton.getAttribute('data-action');

    function extractContent(s, space) {
        var span= document.createElement('span');
        span.innerHTML= s;
        if(space) {
            var children= span.querySelectorAll('*');
            for(var i = 0 ; i < children.length ; i++) {
                if(children[i].textContent)
                    children[i].textContent+= ' ';
                else
                    children[i].innerText+= ' ';
            }
        }
        return [span.textContent || span.innerText].toString().replace(/ +/g,' ');
    };


    var orderSection = document.getElementById('mainOrderSection');
    if(actionOrderButton.addEventListener){
        actionOrderButton.addEventListener('click',
            function(){
                orderSection.scrollIntoView();
                document.getElementById('mainOrderForm-text').value='Заказ по акции - '+ '"'+extractContent(actionName)+ '"';
            }
        );
    } else {
        actionOrderButton.onclick = function(){
            orderSection.scrollIntoView();
            document.getElementById('mainOrderForm-text').value='Заказ по акции - '+ '"'+extractContent(actionName)+ '"';
        };
    }

    var go2order =  function(){
        var attr = this.getAttribute('data-action');
        //alert(attr);
        orderSection.scrollIntoView();
        document.getElementById('mainOrderForm-text').value='Заказ машины - '+attr;
    }

    var garageOrderBtns = document.getElementsByClassName('garageOrderButton');
    if(garageOrderBtns[0].addEventListener){
        for (var i = 0; i < garageOrderBtns.length; i++) {
            garageOrderBtns[i].addEventListener('click',go2order,false);
        }
    } else {
        for (var i = 0; i < garageOrderBtns.length; i++) {
            garageOrderBtns[i].onclick = go2order;
        }
    }
};





$(document).ready(function() {


    $("#services-call2action").on("afterValidate", function () {
        yaCounter30134129.reachGoal("callMe");
        ga("send","event","feedback","call","callMe");
    });
    $("#howWeWork_call2action").on("afterValidate", function () {
        yaCounter30134129.reachGoal("callMe");
        ga("send","event","feedback","call","callMe");
    });
    $("#mainOrderForm").on("afterValidate", function () {
        yaCounter30134129.reachGoal("preorderSend");
        ga("send","event","feedback","order","sendOrder");
    });



    //function getOffsetRect(elem) {
    //
    //    var box = elem.getBoundingClientRect();
    //    var body = document.body;
    //    var docElem = document.documentElement;
    //    var scrollTop = window.pageYOffset || docElem.scrollTop || body.scrollTop;
    //    var scrollLeft = window.pageXOffset || docElem.scrollLeft || body.scrollLeft;
    //    var clientTop = docElem.clientTop || body.clientTop || 0;
    //    var clientLeft = docElem.clientLeft || body.clientLeft || 0;
    //    var top  = box.top +  scrollTop - clientTop;
    //    var left = box.left + scrollLeft - clientLeft;
    //    return Math.round(top);
    //    //return { top: Math.round(top), left: Math.round(left) }
    //}


    //var numSection = document.getElementById('numberSection');
    //var numbersToTop = numSection.offsetTop - window.innerHeight;

    //var getTop = getOffsetRect(numSection);

    var numbersToTop = parseInt($('#numberSection').offset().top - window.innerHeight);


    // 3715 - 757 = 2957 (scrollTop)
    // 757
    // 5662
    // actionToTop 2547
    // numbersToTop 4905

    // поскольку высота верхней секции изменяется построением карусельки
    var topSectionHeight = 600;
    var actionToTop = parseInt($('#actionSection').offset().top);

    var numCountGo = null;
    $(window).scroll(function(){
        //if($(window).scrollTop() > numbersToTop){
        if($(window).scrollTop() > numbersToTop - actionToTop + topSectionHeight){
            if (numCountGo == null) {
                numCountGo = true;
                $('.numbers_num').each(function () {
                    var $this = $(this);
                    jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
            }
        }
    });

    //Slick
    $('.garageSlick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        easing:'easeInOutSine',
        prevArrow:'.garagePrev',
        nextArrow:'.garageNext',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
        //appendArrows:'.popularItems',
    });
    $('.doneProjects').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        easing:'easeInOutSine',
        prevArrow:'.slickPrev',
        nextArrow:'.slickNext'
        //appendArrows:'.popularItems',
    });


    $('.reviewsCarousel').slick({
            infinite: true,
            arrows: true,
            draggable: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            easing:'easeInOutSine',
            prevArrow:'.slickReviewsPrev',
            nextArrow:'.slickReviewsNext',
            responsive: [
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ],
            //appendArrows:'.reviewsCarousel',
        })
    ;

    $('.caruMagLink').magnificPopup({
        type: 'image',
        image: {
            markup: '<div class="mfp-figure">'+
            '<div class="mfp-close"></div>'+
            '<div class="mfp-img"></div>'+
            '<div class="mfp-bottom-bar">'+
            '<div class="mfp-title"></div>'+
            '<div class="mfp-counter"></div>'+
            '</div>'+
            '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button

            cursor: null,
            verticalFit: false,

            tError: '<a href="%url%">Изображение</a> не может быть загружено.' // Error message
        },
        gallery: {
            enabled: false,
        },
        fixedContentPos: true,
        overflowY:true,
    })
    ;

    //$("#actionOrderButton").on('click',function(){
    //   var orderSection = document.getElementById('mainOrderSection');
    //    orderSection.scrollIntoView();
    //    document.getElementById('mainOrderForm-text').value='Заказ по акции "Страховка первой отправки в подарок"';
    //});






});