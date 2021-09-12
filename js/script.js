/**
 * Ajax Image Upload with jQuery
 * 
 * Copyright 2013, Resalat Haque
 * http://www.w3bees.com/
 *
 * @see jQuery Form Plugin
 * http://malsup.com/jquery/form/
 */

$(document).ready(function() {
	var f = $('form');
	var l = $('#loader'); // loder.gif image
	var b = $('#button'); // upload button
	var p = $('#preview'); // preview area
	
	$("#form").submit(function(e) {
		e.preventDefault();
		  var uploadImage = $('#image').val();
		  var formData = new FormData($(this)[0]);
          var dataString = 'uploadImage='+ uploadImage;
		  var id = $('#images').val();
			formData.append("id", id);
		// implement with ajaxForm Plugin bannerImage

		$.ajax({
            url: "a.ajaxupload.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
                alert(msg)
            },
            cache: false,
            contentType: false,
            processData: false
        });
		
		
											 
											 
	});
});