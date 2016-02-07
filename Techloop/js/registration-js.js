/*----------------------Page Script--------------------------*/
$(document).ready(function() {
	tamingselect();
	$("#first-name").focus();
	$(".trigger").css("color", "#93A49F");
	$(".dropdownhidden").click(function () {
		if($("#expert").val()=="other") {
			$(".other").slideDown().animate({"opacity":"1"},{"duration": "100"});
			$("#other").focus();
		}
		else {
			$(".other").animate({"opacity":"0"},{"duration": "100"}).slideUp();
		}
		if($("#expert").val()!="temp") {
			$(".trigger").css("color","#263238");
		}
	});
	$(".trigger").blur(function () {
		if(!expertValidate()) {
			$("#expertB").addClass("activate").addClass("wrong");
		}
	});
	$(".dropdownhidden").click(function () {
		$("#expertB").addClass("activate").removeClass("wrong").addClass("correct");
	});
	$("#other").blur(function () {
		if(!otherValidate()) {
			$("#otherB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#otherB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#other").on("input", function () {
		if(!otherValidate()) {
			$("#otherB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#otherB").removeClass("wrong").addClass("correct");
		}
	});
	$("#first-name, #last-name").blur(function () {
		if(!nameValidate()) {
			$("#nameB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#nameB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#first-name, #last-name").on("input", function () {
		if(!nameValidate()) {
			$("#nameB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#nameB").removeClass("wrong").addClass("correct");
		}
	});
	$("#topic").blur(function () {
		if(!topicValidate()) {
			$("#topicB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#topicB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#topic").on("input", function () {
		if(!topicValidate()) {
			$("#topicB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#topicB").removeClass("wrong").addClass("correct");
		}
	});
	$("#regno").blur(function () {
		if(!regnoValidate()) {
			$("#regnoB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#regnoB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#regno").on("input", function () {
		var reg = $("#regno").val();
		reg = reg.toUpperCase();
		$("#regno").val(reg);
		
		if(!regnoValidate()) {
			$("#regnoB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#regnoB").removeClass("wrong").addClass("correct");
		}
	});
	$("#contact").blur(function () {
		if(!contactValidate()) {
			$("#contactB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#contactB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#contact").on("input", function () {
		if(!contactValidate()) {
			$("#contactB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#contactB").removeClass("wrong").addClass("correct");
		}
	});
	$("#mail").blur(function () {
		if(!mailValidate()) {
			$("#mailB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#mailB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#mail").on("input", function () {
		if(!mailValidate()) {
			$("#mailB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#mailB").removeClass("wrong").addClass("correct");
		}
	});
	$("#date").blur(function () {
		if(!dateValidate()) {
			$("#dateB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#dateB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#date").on("input", function () {
		if(!dateValidate()) {
			$("#dateB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#dateB").removeClass("wrong").addClass("correct");
		}
	});
	$("#prev").blur(function () {
		$("#prevB").addClass("activate").removeClass("wrong").addClass("correct");
	});
	$("#proj").blur(function () {
		$("#projB").addClass("activate").removeClass("wrong").addClass("correct");
	});
	$("#link").one("focusin", function () {
		$("#link").val("http://")
	});
	$("#link").blur(function () {
		if(!linkValidate()) {
			$("#linkB").addClass("activate").removeClass("correct").addClass("wrong");
		}
		else {
			$("#linkB").addClass("activate").removeClass("wrong").addClass("correct");
		}
	});
	$("#link").on("input", function () {
		if(!linkValidate()) {
			$("#linkB").removeClass("correct").addClass("wrong");
		}
		else {
			$("#linkB").removeClass("wrong").addClass("correct");
		}
	});
	$(".form").submit(function() {
		return validateAll();
	});
});

function expertValidate() {
	if($("#expert").val()=="temp") {
		return false;
	}
	else {
		return true;
	}
}

function otherValidate() {
	if($("#expert").val()=="other") {
		if($("#other").val()=="") {
			return false;
		}
		else {
			return true;
		}	
	}
	else {
		return true;
	}
}

function nameValidate() {
	var letters = /^[a-z ,.'-]+$/i;
	var first = $("#first-name").val();
	var last = $("#last-name").val();
	if(letters.test(first) && letters.test(last)) {
		return true;
	}
	else {
		return false;
	}
}

function topicValidate() {
	if($("#topic").val()=="") {
		return false;
	}
	else {
		return true;
	}
}

function regnoValidate() {
	var reg = $("#regno").val();
	var letters = /[a-zA-Z]/;
	var numbers = /[0-9]/;
	var one = reg.charAt(0);
	var two = reg.charAt(1);
	var three = reg.charAt(2);
	var four = reg.charAt(3);
	var five = reg.charAt(4);
	var six = reg.charAt(5);
	var seven = reg.charAt(6);
	var eight = reg.charAt(7);
	var nine = reg.charAt(8);
	
	if(reg.length==9 && one=="1" && numbers.test(two) && letters.test(three) && letters.test(four) && letters.test(five) && numbers.test(six) && numbers.test(seven) && numbers.test(eight) && numbers.test(nine)) {
		return true;	
	}
	else {
		return false;
	}
}

function contactValidate() {
	var numbers = /[^0-9]/;
	var cont = $("#contact").val();
	
	if(cont.length==10 && !numbers.test(cont) && cont.charAt(0)!="0") {
	   return true;
	}
	else {
		return false;
	}
}

function mailValidate() {
	var mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,4}))$/;
	var em = $("#mail").val();
	
	if(mail.test(em)) {
		return true;
	}
	else {
		return false;
	}
}

function dateValidate () {
	var dateV = $("#date").val(); 
	var year = (new Date()).getFullYear();
	var error = false;  
	re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/; 
	if(dateV != '') { 
		if(regs = dateV.match(re)) { 
			if(regs[1] < 1 || regs[1] > 31)  { 
				error = true;
			} else if(regs[2] < 1 || regs[2] > 12) { 
				error = true; 
			} else if((regs[2]==4 || regs[2]==6 || regs[2]==9 || regs[2]==11) && regs[1]==31) { 
				error = true; 	
			} else if (regs[2]==2) {
  				var isleap = (regs[3] % 4 == 0 && (regs[3] % 100 != 0 || regs[3] % 400 == 0));
  				if (regs[1]>29 || (regs[1]==29 && !isleap)) {
   					error = true;
				}
			} else if(regs[3] != year) { 
				error = true; 
			} 
		} else { 
			error = true; 
		} 
	}  
	
	if(error) { 
		return false; 
	}
	else {
		return true;
	} 
}

function prevValidate() {
	return true;
}

function projValidate() {
	return true;
}

function linkValidate () {
	var link = $("#link").val(); 
	var linkV = /^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i; 
	var error = false;
	if(link != '') { 
		if (!linkV.test(link)) { 
			error = true;
		} else { 
			error = false; 
		} 
	}  
	
	if(error) { 
		return false; 
	}
	else {
		return true;
	} 
}

function validateAll () {
	if(!expertValidate()) {
		$("#expertB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!otherValidate()) {
		$("#otherB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!nameValidate()) {
		$("#nameB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!topicValidate()) {
		$("#topicB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!linkValidate()) {
		$("#linkB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!prevValidate()) {
		$("#prevB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!projValidate()) {
		$("#projB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!dateValidate()) {
		$("#dateB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!contactValidate()) {
		$("#contactB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!regnoValidate()) {
		$("#regnoB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	if(!mailValidate()) {
		$("#mailB").addClass("activate").removeClass("correct").addClass("wrong");
	}
	
	if(expertValidate() && otherValidate() && nameValidate() && topicValidate() && linkValidate() && prevValidate() && projValidate() && dateValidate() && contactValidate() && regnoValidate() && mailValidate()) {
		$(".feedback").html("Thanks for registering, We will get back to you soon!")
		return true;
	}
	else {
		$(".feedback").html("Please check the fields once")
		return false;
	}
}

function tamingselect()
{
	if(!document.getElementById && !document.createTextNode){return;}
	var ts_selectclass='turnintodropdown';
	var ts_listclass='turnintoselect';
	var ts_boxclass='dropcontainer';
	var ts_triggeron='activetrigger';
	var ts_triggeroff='trigger';
	var ts_dropdownclosed='dropdownhidden';
	var ts_dropdownopen='dropdownvisible';
	var count=0;
	var toreplace=new Array();
	var sels=document.getElementsByTagName('select');
	for(var i=0;i<sels.length;i++){
		if (ts_check(sels[i],ts_selectclass))
		{
			var hiddenfield=document.createElement('input');
			hiddenfield.name=sels[i].name;
			hiddenfield.type='hidden';
			hiddenfield.id=sels[i].id;
			hiddenfield.value=sels[i].options[0].value;
			sels[i].parentNode.insertBefore(hiddenfield,sels[i])
			var trigger=document.createElement('a');
			ts_addclass(trigger,ts_triggeroff);
			trigger.href='#';
			trigger.onclick=function(){
				ts_swapclass(this,ts_triggeroff,ts_triggeron)
				ts_swapclass(this.parentNode.getElementsByTagName('ul')[0],ts_dropdownclosed,ts_dropdownopen);
				return false;
			}
			trigger.appendChild(document.createTextNode(sels[i].options[0].text));
			sels[i].parentNode.insertBefore(trigger,sels[i]);
			var replaceUL=document.createElement('ul');
			for(var j=0;j<sels[i].getElementsByTagName('option').length;j++)
			{
				var newli=document.createElement('li');
				var newa=document.createElement('a');
				newli.v=sels[i].getElementsByTagName('option')[j].value;
				newli.elm=hiddenfield;
				newli.istrigger=trigger;
				newa.href='#';
				newa.appendChild(document.createTextNode(
				sels[i].getElementsByTagName('option')[j].text));
				newli.onclick=function(){ 
					this.elm.value=this.v;
					ts_swapclass(this.istrigger,ts_triggeron,ts_triggeroff);
					ts_swapclass(this.parentNode,ts_dropdownopen,ts_dropdownclosed)
					this.istrigger.firstChild.nodeValue=this.firstChild.firstChild.nodeValue;
					return false;
				}
				newli.appendChild(newa);
				replaceUL.appendChild(newli);
			}
			ts_addclass(replaceUL,ts_dropdownclosed);
			var div=document.createElement('div');
			div.appendChild(replaceUL);
			ts_addclass(div,ts_boxclass);
			sels[i].parentNode.insertBefore(div,sels[i])
			toreplace[count]=sels[i];
			count++;
		}
	}
	var uls=document.getElementsByTagName('ul');
	for(var i=0;i<uls.length;i++)
	{
		if(ts_check(uls[i],ts_listclass))
		{
			var newform=document.createElement('form');
			var newselect=document.createElement('select');
			for(j=0;j<uls[i].getElementsByTagName('a').length;j++)
			{
				var newopt=document.createElement('option');
				newopt.value=uls[i].getElementsByTagName('a')[j].href;	
				newopt.appendChild(document.createTextNode(uls[i].getElementsByTagName('a')[j].innerHTML));	
				newselect.appendChild(newopt);
			}
			newselect.onchange=function()
			{
				window.location=this.options[this.selectedIndex].value;
			}
			newform.appendChild(newselect);
			uls[i].parentNode.insertBefore(newform,uls[i]);
			toreplace[count]=uls[i];
			count++;
		}
	}
	for(i=0;i<count;i++){
		toreplace[i].parentNode.removeChild(toreplace[i]);
	}
	function ts_check(o,c)
	{
	 	return new RegExp('\\b'+c+'\\b').test(o.className);
	}
	function ts_swapclass(o,c1,c2)
	{
		var cn=o.className
		o.className=!ts_check(o,c1)?cn.replace(c2,c1):cn.replace(c1,c2);
	}
	function ts_addclass(o,c)
	{
		if(!ts_check(o,c)){o.className+=o.className==''?c:' '+c;}
	}
}
/*-----------------------------------------------------------*/
