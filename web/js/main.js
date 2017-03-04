//var Transzakaz;new(Transzakaz=function(){function e(){var e=this;!function(){return e.bootstrap()}(jQuery)}return e.prototype.bootstrap=function(){return $("header ul.dropdown-menu").each(function(){var e,t,n;return n=$(this).parent().innerWidth(),t=$(this).innerWidth(),e=n/2-t/2,e+="px",$(this).css("margin-left",e)}),$("#feedbackForm").on("show.bs.modal",function(){return $("#feedbackNote").html(""),$("#feedbackNote").hide()}),$("#feedbackForm").on("shown.bs.modal",function(){return $(this).find("[autofocus]:first").focus()}),$("#requestFeedback").click(function(e){var t,n,o;return"function"==typeof e.preventDefault&&e.preventDefault(),n=$(this).closest(".modal"),t=$("form",n),$("#feedbackLoading").show(),o=$.ajax({type:"POST",url:t.attr("action"),data:t.serialize()}),o.done(function(e){var o;return $("#feedbackLoading").hide(),"OK"===e.trim()?(o="Ваше сообщение было успешно отправлено. Спасибо!",$("#feedbackNote").text(o),$("#feedbackNote").show(),t.hide(),window.setTimeout(function(){return n.modal("hide"),t.show(),t.find("input[type=text]").val("")},2e3)):($("#feedbackNote").html(e),$("#feedbackNote").show())}).fail(function(e,t){return window.setTimeout(function(){return $("#feedbackLoading").hide(),$("#feedbackNote").text("error"===t?"Произошла ошибка, попробуйте отправить запрос позднее.":t),$("#feedbackNote").show()},1e3)}),!1})},e}());


//var Transzakaz;
//new(Transzakaz = function() {
//    function e() {
//        var e = this;
//        ! function() {
//            return e.bootstrap()
//        }(jQuery)
//    }
//    return e.prototype.bootstrap = function() {
//        return $("header ul.dropdown-menu").each(function() {
//            var e, t, n;
//            return n = $(this).parent().innerWidth(), t = $(this).innerWidth(), e = n / 2 - t / 2, e += "px", $(this).css("margin-left", e)
//        }), $("#feedbackForm").on("show.bs.modal", function() {
//            return $("#feedbackNote").html(""), $("#feedbackNote").hide()
//        }), $("#feedbackForm").on("shown.bs.modal", function() {
//            return $(this).find("[autofocus]:first").focus()
//        }), $("#requestFeedback").click(function(e) {
//            var t, n, o;
//            return "function" == typeof e.preventDefault && e.preventDefault(), n = $(this).closest(".modal"), t = $("form", n), $("#feedbackLoading").show(), o = $.ajax({
//                type: "POST",
//                url: t.attr("action"),
//                data: t.serialize()
//            }), o.done(function(e) {
//                var o;
//                return $("#feedbackLoading").hide(), "OK" === e.trim() ? (o = "Ваше сообщение было успешно отправлено. Спасибо!", $("#feedbackNote").text(o), $("#feedbackNote").show(), t.hide(), window.setTimeout(function() {
//                    return n.modal("hide"), t.show(), t.find("input[type=text]").val("")
//                }, 2e3)) : ($("#feedbackNote").html(e), $("#feedbackNote").show())
//            }).fail(function(e, t) {
//                return window.setTimeout(function() {
//                    return $("#feedbackLoading").hide(), $("#feedbackNote").text("error" === t ? "Произошла ошибка, попробуйте отправить запрос позднее." : t), $("#feedbackNote").show()
//                }, 1e3)
//            }), !1
//        })
//    }, e
//}());


