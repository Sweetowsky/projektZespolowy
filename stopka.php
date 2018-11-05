 </div>
		
    
    
    
    </div>
		
		
    
    <div id="footer">
		Forum stworzone przez grupe Łódzkie anakondy. &copy; Wszelkie prawa zastrzeżone.
    </div>
	
	
<script src="jquery-1.11.3.min.js"></script>
	
<script>

	$(document).ready(function() {
	var NavY = $('#menu').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('#menu').addClass('sticky');
	} else {
		$('#menu').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>
	
</body>
</html>