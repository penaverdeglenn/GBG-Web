$(document).ready(function() {

	$("#forgotpassword").click(function(e) {
    
        
            
            var errormsg = [];
			var errorcheck = false;
			var ctrcheck = 0;
			var check = 0;
            var forgotemail = $('#forgotemail').val();
            if(check > 0)
			{    
				errorcheck = true;
				errormsg.push("Please fill in the fields</br>");			
			}
			if(checkdupli('00_users','userstatus = 1','1',forgotemail,'username') == 0)
			{
				errorcheck = true;
				errormsg.push("Email not found please signup now!!");							
			}
			var dataString = 'forgotemail='+ forgotemail;

			if(errorcheck == true)
			{
				$("#notitext").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
				for (k=0;k<=ctrcheck;k++)
				{
					$("#notitext").append(errormsg[k]);
					
				}
				$("#notitext").attr("class","alert alert-danger");
				$("#notif").show('slow');
				setTimeout(function(){
					$('#notif').hide('slow');
					$("#notitext").html("");
				},8000);
				$("#notitext").append("");
			}
			else if(errorcheck == false)
			{ 
	            $.ajax({
	                type: "POST",
	                url: "functions/forgotpasswordfunctions.php",
	                data: dataString,
	                cache: false,
	                 success: function(result){ 
	                             if(result == 1)
	                            {   
	                               $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>New Password has been sent to your email!");
	                               $("#notitext").attr("class","alert alert-success");
	                               $("#notif").show('slow');
	                                   setTimeout(function(){
	                                    $('#notif').hide('slow');;
	                                    },4000);                    
	                                                                    
	                                                                    
	                                                                        
	                                                                  
	                                }
	                             else if(result == 0)
	                             {   
	                                                                    
	                               $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Error! Please Try again");
	                               $("#notitext").attr("class","alert alert-danger");
	                               $("#notif").show('slow');
	                               setTimeout(function(){
	                               $('#notif2').hide('slow');
	                                 },4000);
	                                                                    
	                                                                    
	                              }
	                              else if(result == 3)
	                              {   
	                                                                    
	                               $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Invalid Email Format");
	                               $("#notitext").attr("class","alert alert-danger");
	                               $("#notif").show('slow');
	                               setTimeout(function(){
	                               $('#notif2').hide('slow');
	                                 },4000);
	                                                                    
	                                                                    
	                              } 
	                              else
	                              {   
	                                                                    
	                               $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Error! Please Try again");
	                               $("#notitext").attr("class","alert alert-danger");
	                               $("#notif").show('slow');
	                               setTimeout(function(){
	                               $('#notif2').hide('slow');
	                                 },4000);
	                                                                    
	                                                                    
	                              }   

	                }

           		 });
            
          	}  
          	  
            e.preventDefault();
        
                                             
                                             
        }); 







});