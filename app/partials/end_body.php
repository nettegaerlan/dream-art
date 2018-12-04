	<script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/slick/slick.min.js"></script>
    <script type="text/javascript">
    	$('.echo-feature-slider').slick({
		  infinite: true,
		  autoplay: true,
		  slidesToShow: 3,
		  slidesToScroll: 3,
		  dots: true,
		  responsive: [
		  	{
		  		breakpoint: 480,
		  		settings: {
		  			slidesToShow: 1,
		  			slidesToScroll: 1,
		  			arrows: false,
		  			dots: false,
		  			centerMode: true,
		  			centerPadding: '60px',
		  			slidedToShow: 3
		  		}
		  	}
		  ]
		});
    </script>
    <script type="text/javascript" src="../assets/js/filter_by_category.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>