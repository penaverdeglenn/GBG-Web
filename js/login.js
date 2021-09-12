$(document).ready(function() {


/*		$("#loginModal").vide({
		    mp4: "video/ocean.mp4",
		    webm: "video/ocean.webm",
		    ogv: "video/ocean.ogv",
		    poster: "video/ocean.jpg"
		}, {
		volume: 1,
	    playbackRate: 1,
	    muted: true,
	    loop: true,
	    autoplay: true,
	    position: "50% 50%", // Similar to the CSS `background-position` property.
	    posterType: "detect" // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
		}); */




		$('.datepicker').datepicker({autoclose: true});
		$("#ccontfield").numeric();
		

	$.validator.addMethod(
	    "mydate",
	    function(value, element) {
	        return value.match(/^\d\d\d\d-\d\d?\-\d\d?\$/);
	    },
	    "Please enter a date in the format yyyy-dd-mm"
	    );


		var $validator = $("#loginforms").validate({
		errorPlacement: function(label, element) {
        label.addClass('label label-danger');
        label.insertAfter(element);
   		 },
    	wrapper: 'div',
		  rules: {
		    regtype: {
		      required: true,
		    },
		    usernamefield: {
		      required: true,
		      minlength: 6
		    },
		    passwordfield: {
		      required: true,
		      minlength: 6,
		    },
		    passwordfield2: {
		      required: true,
		      minlength: 6,
		      equalTo: "#passwordfield"
		    },
		    firstnamefield: {
		      required: true
		    },
		    middlenamefield: {
		      required: true
		    },
		    lastnamefield: {
		      required: true
		    },
		    emailfield: {
		      required: true,
     		  email: true
		    },
		    bdayfield: {
		      required: true,
		      date: true
		    },
		    genderfield: {
		      required: true
		    },
		    ccontfield: {
		      required: true
		    },
		    cpasswordfield: {
		      required: true,
		      minlength: 6,
		    },
		    cpasswordfield2: {
		      required: true,
		      minlength: 6,
		      equalTo: "#cpasswordfield"
		    },
		    compaynamefield: {
		      required: true,
		    },
		    companycont: {
		      required: true,
		    },
		    cemailfield: {
		      required: true,
		      email: true
		    }
		  }
		});	

		$('#rootwizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onFinish': function(tab, navigation, index) {

	  			var $valid = $("#loginforms").valid();
	  			var regtype = $('#regtype').val();
	  			var passwordfield = $('#passwordfield').val();
				var passwordfield2 = $('#passwordfield2').val();				
				var firstnamefield = $('#firstnamefield').val();
				var middlenamefield = $('#middlenamefield').val();
				var lastnamefield = $('#lastnamefield').val();
				var emailfield = $('#emailfield').val();
				var bdayfield = $('#bdayfield').val();
				var genderfield = $('#genderfield').val();

				var compaynamefield = $('#compaynamefield').val();
				var companycont = $('#companycont').val();
				var cemailfield = $('#cemailfield').val();
				var cpasswordfield = $('#cpasswordfield').val();
				var ccontfield = $('#ccontfield').val();
				var userscode = $('#userscode').val();
				
	  			if(regtype == "Customer")
	  			{
	  				$("#employee").attr("style","display:block");
	  				$("#employers").attr("style","display:none");
	  				$(".employee").attr("style","display:block");
	  				$(".employers").attr("style","display:none");


					if(checkdupli("00_users","userstatus=1","3",emailfield,"username") == 1)
					{
							 								
							 		$(".duplicate").html("<strong class='label label-danger'>Email Address already exists.</strong>");
							 		return false;
							 								
				 	}
				 	else
				 	{
				 		$(".duplicate").html(" ");
				 	}

				 	if (!bdayfield){
								$(".datecheck").html("<strong class='label label-danger'>This field is required.</strong>");
							    return false;             
					}
					else
				 	{
				 		$(".datecheck").html(" ");
				 	}

				 	if (calcAge(bdayfield) >=18){
						$(".datecheck").html(" ");
					}
					else
				 	{
				 		
				 		$(".datecheck").html("<strong class='label label-danger'>Sorry 18 and above only are allowed to register.</strong>");
						return false; 
				 	}


	  				
	  			}
	  			else if(regtype == "Employers")
	  			{
	  				$("#employers").attr("style","display:block");
	  				$("#employee").attr("style","display:none");
	  				
	  				$(".employers").attr("style","display:block");
	  				$(".employee").attr("style","display:none");


	  				if(checkdupli("00_users","userstatus=1","3",cemailfield,"username") == 1)
					{
							 								
							 		$(".duplicate").html("<strong class='label label-danger'>Email Address already exists.</strong>");
							 		return false;
							 								
				 	}
				 	else
				 	{
				 		$(".duplicate").html(" ");
				 	}





	  			}




	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
	  			else
	  			{



	  				var values = [];
					var values2 = [];
					var values3 = [];
					var tbl2 = "";
					
					var values3 = [];
					var tbl3 = "";


					if(regtype == "Customer")
		  			{
		  				
		  				userscode = "E" + userscode;
		  				values.push(regtype);
						values.push(emailfield);
						values.push(passwordfield);
						values.push(userscode);
		  				
		  			}
		  			
				var tbl = "00_users";
			
				var dataString = 'values='+ values + '&tbl=' + tbl;	
	
				$.ajax({
					  type: "POST",
					  url: "functions/settingsadd.php",
					  data: dataString,
					  cache: false,
					  success: function(result)
					  {		
						 alert(result);
						 if(result == 1)
						{	
							
							$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Registration Successfull!");
					 		$("#notitext").attr("class","alert alert-danger");
							$("#notif").show('slow');
								setTimeout(function(){
									$('#notif').hide('slow');
								},4000);						
							
											
												
											  
						}
						else if(result == 0)
						{	
							$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Registration Error! Please Try Again");
					 		$("#notitext").attr("class","alert alert-danger");
							$("#notif").show('slow');
								setTimeout(function(){
									$('#notif').hide('slow');
								},4000);
												
												
						}					
				 	 }
				});






	  				
	  		}

	  			
	  				
					


				
			
	  		},
	  		onTabShow: function(tab, navigation, index) {
				var totals = navigation.find('li').length;
				var currents = index+1;
				var percents = (currents/totals) * 100;
				$('#rootwizard').find('.bar').attr("style","width:" +percents + "%");
			},
			onTabClick: function(tab, navigation, index) {
				
				return false;
			}



	  	});	


		





$('#loginbutton').click(function(e) {   
	var all = "";

	var loginuser = $('#loginuser').val();
	var loginpass = $('#loginpass').val();
	all = all + "loginuser=" + loginuser;
	all = all + "&loginpass=" + loginpass;
	if(loginuser == "" || loginpass == "")
	{
		$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Please fill the fields");
		$("#notitext").attr("class","alert alert-danger");
		$("#notif").show('slow');
		 setTimeout(function(){
		 $('#notif').hide('slow');
		},4000);
	}
		
	else
	{ 
	 	 		 $.ajax({
				  type: "POST",
				  url: "functions/loginfunction.php",
				  data: all,
				  cache: false,
				  success: function(result)
				  {		
		
											 if(result == 1)
											 {	
							
												
												$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Login Successfull");
					 						    $("#notitext").attr("class","alert alert-success");
											  	$("#notif").show('slow');
														 setTimeout(function(){
													     $('#notif').hide('slow');
													   },4000);					
												var url = "dashboard.php";    
												$(location).attr('href',url);
												
											  
											}
											else if(result == 0)
											{	
												
												$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Wrong Username or Password");
					 								$("#notitext").attr("class","alert alert-danger");
													$("#notif").show('slow');
														 setTimeout(function(){
													     $('#notif').hide('slow');
													   },4000);
												
												
											}
											else if(result == 2)
											{

												$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Access Restricted");
												$("#notitext").attr("class","alert alert-danger");
												$("#notif").show('slow');
												 setTimeout(function(){
												 $('#notif').hide('slow');
												},4000);
												
											}					
				  }
				});
	}
});



/*	
$('#registermodal').click(function(e) {  
		$("#loginModal").hide('slow'); 
		$("#registermod").show('slow');

	});

	$('#loginmod').click(function(e) {  
		$("#registermod").hide('slow');
		$("#loginModal").show('slow'); 
		

	});
 	
*/
	
});

function RegisterOption(regtype)
{
				$("#loginbody").show();
				if(regtype == "Customer")
	  			{
	  				$("#employee").attr("style","display:block");
	  				$("#employers").attr("style","display:none");
	  				$(".employee").attr("style","display:block");
	  				$(".employers").attr("style","display:none");	

	  				$("#loginModal").hide('slow'); 
					$("#registermod").show('slow');   				
	  			}
	  			else if(regtype == "Login")
	  			{
	  				$("#registermod").hide('slow');
					$("#loginModal").show('slow'); 
	  			}
}

function calcAge(dateString) {
  var birthday = +new Date(dateString);
  return~~ ((Date.now() - birthday) / (31557600000));
}