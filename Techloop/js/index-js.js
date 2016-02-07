/*----------------------Page Script--------------------------*/
$(window).load(function () {
	$(".logo").addClass("logodown");
	setTimeout( function () {
		$(".logo").removeClass("logodown");		
	}, 1500);
	
	var zin = 4;
	$("#one .lines").addClass("animatelines");
	setTimeout(function() {
		$("#one .lines").addClass("animatelinesR");
		$("#one").fadeOut(2000).css("z-index", ++zin);
		$("#two").fadeIn(2000);
		$("#two .lines").addClass("animatelines");
	}, 3000);
	setTimeout(function() {
		$("#two .lines").addClass("animatelinesR");
		$("#two").fadeOut(2000).css("z-index", ++zin);
		$("#three").fadeIn(2000);
		$("#three .lines").addClass("animatelines");
	}, 8000);
	setTimeout(function() {
		$("#three .lines").addClass("animatelinesR");
		$("#three").fadeOut(2000).css("z-index", ++zin);
		$("#four").fadeIn(2000);
		$("#four .lines").addClass("animatelines");
	}, 13000);
	setTimeout(function() {
		$("#four .lines").addClass("animatelinesR");
		$("#four").fadeOut(2000).css("z-index", ++zin);
		$("#one .lines").removeClass("animatelines").removeClass("animatelinesR");
		$("#two .lines").removeClass("animatelines").removeClass("animatelinesR");
		$("#three .lines").removeClass("animatelines").removeClass("animatelinesR");
		$("#four .lines").removeClass("animatelines");
		$("#one").fadeIn(2000);
		$("#one .lines").addClass("animatelines");
	}, 18000);
	setInterval(function() {
		setTimeout(function() {
			$("#four .lines").removeClass("animatelinesR");
			$("#one .lines").addClass("animatelinesR");
			$("#one").fadeOut(2000).css("z-index", ++zin);
			$("#two").fadeIn(2000);
			$("#two .lines").addClass("animatelines");
		}, 3000);
		setTimeout(function() {
			$("#two .lines").addClass("animatelinesR");
			$("#two").fadeOut(2000).css("z-index", ++zin);
			$("#three").fadeIn(2000);
			$("#three .lines").addClass("animatelines");
		}, 8000);
		setTimeout(function() {
			$("#three .lines").addClass("animatelinesR");
			$("#three").fadeOut(2000).css("z-index", ++zin);
			$("#four").fadeIn(2000);
			$("#four .lines").addClass("animatelines");
		}, 13000);
		setTimeout(function() {
			$("#four .lines").addClass("animatelinesR");
			$("#four").fadeOut(2000).css("z-index", ++zin);
			$("#one .lines").removeClass("animatelines").removeClass("animatelinesR");
			$("#two .lines").removeClass("animatelines").removeClass("animatelinesR");
			$("#three .lines").removeClass("animatelines").removeClass("animatelinesR");
			$("#four .lines").removeClass("animatelines");
			$("#one").fadeIn(2000);
			$("#one .lines").addClass("animatelines");
		}, 18000);
	}, 20000);
});

$(document).ready(function () {
    new QueryLoader2(document.querySelector("body"), {
        fadeOutTime: 1000,
        minimumTime: 100,
        maxTime: 60000,
        percentage: true,
        onComplete: function () {}
    });
	var height = $(window).height();
	$(".lines").css("padding-top", (height*35)/100);
	var temp = height - 120;
	$(".carousel").css("height", temp);
	if($(window).width()>=960) {
		$(window).scroll(function() {
			var yPos = -($(window).scrollTop()/2);
			var coords = 'center '+ yPos + 'px';
			$(".image").css({ backgroundPosition: coords });
		});	
	}
});
/*-----------------------------------------------------------*/
