/*----------------------Main Script--------------------------*/
$(document).ready(function () {	
	var timeID;
	$(".menu").click(function () {
		clearTimeout(timeID);
		$(".navlist").fadeToggle("fast");
		timeID = setTimeout(function () {$(".navlist").fadeOut("fast"); }, 3000);
	});
	
	var s = $(".navbar");
    var pos = s.position();                   
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        if (windowpos >= pos.top) {
            s.css({"position": "fixed", "top": "0px"});
			$(".banner").css({"height": "120px"});
			$(".small-logo").addClass("logoS");
        } else {
            s.css({"position": "relative"});
			$(".banner").css({"height": "70px"});
			$(".small-logo").removeClass("logoS");
        }
    });
	
	$(".search").keypress(function (e) {
		var key = e.which;
		if(key == 13)
		{
			window.location.href = "sessions.php" 
		}
	});

    $('.dialog-box-shade').height($(window).height());
    $('.dialog-box .close-button').on('click', function() {
        $(".dialog-box-container").fadeOut();
    });

    $(".subscribe input").keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            subscriberValidate();
        }
    });

    $(".submitSubscriber").on('click', function() {
        subscriberValidate();
    });

    function subscriberValidate() {
        var letters = /^[a-z ,.'-]+$/i;
        var name = $("#subscriberName").val();
        var mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,4}))$/;
        var em = $("#subscriberEmail").val();

        if(name != "" && em != "") {
            if(letters.test(name) && mail.test(em)) {
                $(".dialog-box-container").fadeIn();
                $.post("subscribe.php", {name: name, email: em});
                return true;
            } else if (!letters.test(name)){
                $(".subscriberFeedback").html("Invalid Name");
                return false;
            } else {
                $(".subscriberFeedback").html("Invalid Email");
                return false;
            }
        } else if (name == ""){
            $(".subscriberFeedback").html("Enter your name");
            return false;
        } else {
            $(".subscriberFeedback").html("Enter your email");
            return false;
        }
    }
});
/*-----------------------------------------------------------*/
