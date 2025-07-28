document.addEventListener("DOMContentLoaded", function() {
	// slide
		var index = 0;
		function SlideShow() {
			
			var x = document.getElementsByClassName("slide");
			var dot = document.querySelectorAll(".dot ul li");
			for (var i = 0; i < x.length; i++) {
				x[i].style.display = "none";
				}
			index ++;
			if (index > x.length) {
				index = 1;
			}
			
			x[index - 1].style.display = "block";
			dot[index - 1].classList.add("active");
			for(var j = 0; j < dot.length; j++)
				{
					if(j != index - 1)
						{
							dot[j].classList.remove("active");
						}
					   
				}
				
			var time = setTimeout(SlideShow, 4000);	
			
		}
		SlideShow()
		//cuộn chuột
			
		    var y = document.getElementsByClassName("menulef");
			window.addEventListener("scroll",function(){
				console.log(window.pageYOffset);
				
				if(window.pageYOffset > 175 && window.pageYOffset < 4729)
					y[0].classList.add("di");
				else 
					y[0].classList.remove("di");
			});
		//dk, dn
		document.getElementById("dn").addEventListener("click", function(){
			document.getElementById("background").style.display = ("block");
			document.getElementsByClassName("login")[0].style.display = ("block");
			document.getElementsByClassName("login")[1].style.display = ("none");
		})
		document.getElementById("dk").addEventListener("click", function(){
			document.getElementById("background").style.display = ("block");
			document.getElementsByClassName("login")[0].style.display = ("none");
			document.getElementsByClassName("login")[1].style.display = ("block");
		})
		var close = document.getElementsByClassName("close");
		for(var i = 0; i < close.length; i ++)
			{
				close[i].addEventListener("click", function(){
					document.getElementsByClassName("login")[0].style.display = ("none");
					document.getElementsByClassName("login")[1].style.display = ("none");
					document.getElementById("background").style.display = ("none");
				})
			}
});

		