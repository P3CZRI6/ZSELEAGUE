location.replace( "../");

$(".flp label").each(function(){
	var sop = '<span class="ch">';
	var scl = '</span>';
	$(this).html(sop + $(this).html().split("").join(scl+sop) + scl);
	$(".ch:contains(' ')").html("&nbsp;");
})

var d;
$(".flp input").focus(function(){
	var tm = $(this).outerHeight()/2 *-1 + "px";
	$(this).next().addClass("focussed").children().stop(true).each(function(i){
		d = i*50;
		$(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
	})
})
$(".flp input").blur(function(){
	if($(this).val() == "")
	{
		$(this).next().removeClass("focussed").children().stop(true).each(function(i){
			d = i*50;
			$(this).delay(d).animate({top: 0}, 500, 'easeInOutBack');
		})
	}
})



const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    menuBtn.onclick = ()=>{
      navbar.classList.add("show");
      menuBtn.classList.add("hide");
      body.classList.add("disabled");
    }
    cancelBtn.onclick = ()=>{
      body.classList.remove("disabled");
      navbar.classList.remove("show");
      menuBtn.classList.remove("hide");
    }