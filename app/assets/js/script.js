$(document).ready(function() {
	const main = $("#main");
	const mainOffset = main.offset();

	const header = $("#echo-header");

	$(window).on("scroll", function(e) {
	  if ($(this).scrollTop() > mainOffset.top + 200) {
	    header.addClass("fixed-top");
	    main.addClass("fixed-void");
	  } else {
	    header.removeClass("fixed-top");
	    main.removeClass("fixed-void");
	  }
	  
	});


  /*IMAGE PREVIEW*/
    $("#img_item").on('change', function () {

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "svg") {
         if (typeof (FileReader) != "undefined") {

             var img_holder = $("#img_holder");
             img_holder.empty();

             var reader = new FileReader();
             reader.onload = function (e) {
                 $("<img />", {
                  "id": "img_preview",
                     "src": e.target.result,
                     "class": "img-fluid d-block mx-auto"
                 }).appendTo(img_holder);

             }
             img_holder.show();
             reader.readAsDataURL($(this)[0].files[0]);
         } else {
             alert("This browser does not support FileReader.");
         }
     }
  });

    $(this).on("blur", ".qty-field", function() {
        var input = $(this);
        var value = parseInt($(this).val());

        if (value < 0 || isNaN(value)) {
        input.val(0);
        } else if (value > 100) {
        input.val(100);
        }
        });

});





