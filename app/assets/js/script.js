$(document).ready(function() {
	const main = $("#main").offset();

	const header = $("#echo-header");

	header.on("scroll", function(e) {
	    
	  if (this.scrollTop > main.top) {
	    header.addClass("fixed-top");
	  } else {
	    header.removeClass("fixed-top");
	  }
	  
	});
});