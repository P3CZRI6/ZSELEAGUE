//breakdown the labels into single character spans
$(".flp label").each(function(){
	var sop = '<span class="ch">'; //span opening
	var scl = '</span>'; //span closing
	//split the label into single letters and inject span tags around them
	$(this).html(sop + $(this).html().split("").join(scl+sop) + scl);
	//to prevent space-only spans from collapsing
	$(".ch:contains(' ')").html("&nbsp;");
})

var d;
//animation time
$(".flp input").focus(function(){
	//calculate movement for .ch = half of input height
	var tm = $(this).outerHeight()/2 *-1 + "px";
	//label = next sibling of input
	//to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
	$(this).next().addClass("focussed").children().stop(true).each(function(i){
		d = i*50;//delay
		$(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
	})
})
$(".flp input").blur(function(){
	//animate the label down if content of the input is empty
	if($(this).val() == "")
	{
		$(this).next().removeClass("focussed").children().stop(true).each(function(i){
			d = i*50;
			$(this).delay(d).animate({top: 0}, 500, 'easeInOutBack');
		})
	}
})




var d;
//animation time
$(".flp textarea").focus(function(){
	//calculate movement for .ch = half of input height
	var tm = $(this).outerHeight()/8 *-0.9 + "px";
	//label = next sibling of input
	//to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
	$(this).next().addClass("focussed").children().stop(true).each(function(i){
		d = i*50;//delay
		$(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
	})
})
$(".flp textarea").blur(function(){
	//animate the label down if content of the input is empty
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