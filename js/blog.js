$(document).ready(function() {


	//$('#bcontent').wysihtml5();
	$('#bcontentedit').wysihtml5();
  CKEDITOR.replace( 'bcontent' );
  CKEDITOR.replace( 'bcontent2' );
  CKEDITOR.replace( 'packingcontent' );
  
    $("#blogthumbmail").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#blogthumbprev").attr("src", this.result);
            }
        }
    });

    $("#blogbanner").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#blogbannerprev").attr("src", this.result);
            }
        }
    });

$('#blogform').submit(function(e) {
     e.preventDefault();
     var imagename = $('#imagename').val();
     var formData = new FormData($(this)[0]);
     var id = $('#userscode').val();
     var idedit = $('#idedit').val();
     var newimg = $("#blogthumbmail").val();
     var ob = document.getElementById('blogthumbmail');
     var newimg2 = newimg.split("\\");
     formData.append("id", imagename);
     formData.append("fileid", "blogthumbmail");

    
     
    $("#notitext").html("");
    var values = [];
    var values2 = [];
    var columns = [];
   // var tbl = "00_appskills";
    var ncols = $('#ncols').val();
    var submittype = $('#submittype').val();
    
    var pkedit = $('#idedit').val();
    var ctr;
    var inp;
    var bcontent = CKEDITOR.instances.bcontent.getData(); 
   // var bcontent = $('#bcontent').val(); 
    var ctrcheck = 0;
    var check = 0;
    var paramtbl = $('#settingsTbl').val();
    var paramcond = $('#cond').val();
    var paramlindex = $('#lIndex').val();
    var parampk = $('#pk2').val();
    var settingsName = $('#settingsName').val();
    var tbl = "00_blogs";
    var idedit = "blogid";
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#btitlefield').val());
    values.push(bcontent);
     if(newimg2 == "" || newimg2 == "noimg.png")
     {
       
     }
     else
     {
      values.push(imagename+".png");
     } 

    var dataString = 'values='+ values + '&tbl=' + paramtbl; 

    values2.push($('#btitlefield').val());
    values2.push(bcontent);
    if(newimg2 == "" || newimg2 == "noimg.png")
     {
       values2.push("");
     }
     else
     {
      values2.push(imagename+".png");
     } 
    //values.push($('#whyjoinfieldedit').val());


    columns.push("blogtitle");
    columns.push("blogcontent");
    columns.push("blogthumbimage");

      if(newimg2 == "" || newimg2 == "noimg.png")
     {

     }
     else
     {
      columns.push("blogthumbimage");
     } 
    //columns.push("jobadvwhyjoinus");


    var fruits = values.join('|');
    var fruits2 = columns.join('|');


    var dataString2 = 'id='+ pkedit + '&tbledit=' + tbl + '&idedit=' + idedit + '&values=' + fruits + '&columns=' + fruits2;
    
    
    if($('#btitlefield').val() == "")
    {
      check++;
    }
    if($('#bcontent').val() == "")
    {
      check++;
    }
    
    //checking duplicate and empty fields.................................................
    if(check > 0)
    {    
      errorcheck = true;
      errormsg.push("Please fill in the fields</br>");      
    }
    //end of checking duplicate and empty fields.................................................
    

    //end of unique trappings based of settingsname.....................................................
    
    
    
    //if there is error, show notif div else continue insert to database........................................
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
      },2000);
      $("#notitext").append("");
    }
    else if(errorcheck == false)
    {  

    	      $.ajax({
                url: "functions/uploadimg.php",
                type: "POST",
                data: formData,
                async: false,
                success: function (result) {
                  if(submittype == "add" )
                  { 
              
                        
                             
                                         
                                            $.ajax({
                                            type: "POST",
                                            url: "functions/settingsadd.php",
                                            data: dataString,
                                            cache: false,
                                             success: function(result){ 
                                              if(result == 1)
                                              { 
              
                        
                             
                                         
                                         $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Successfully Added!");
                                         $("#notitext").attr("class","alert alert-success");
                                         $("#notif").show('slow');

                                             setTimeout(function(){
                                              $('#notif').hide('slow');
                                               $("#notitext").html("");
                                               url = "bloglist.php";
               								   $( location ).attr("href", url);
                                              },2000);                                                                                                                               
                         
                                              }
                                              else if(result == 0)
                                              { 
                                                  $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Error! Please Try Again");
                                                  $("#notitext").attr("class","alert alert-danger");
                                                  $("#notif").show('slow');
                                                    setTimeout(function(){
                                                      $('#notif').hide('slow');
                                                      url = "bloglist.php";
               										  $( location ).attr("href", url);
                                                    },2000);
                                                            
                                                            
                                             }         

                                        }

                                    });                                                                                                                   
 
                      }
                      else if(submittype == "edit")
                      { 
                          
                                  

                          $.ajax({
                                            type: "POST",
                                            url: "functions/edit.php",
                                            data: dataString2,
                                            cache: false,
                                             success: function(result){ 
                                              if(result == 1)
                                              { 
              
                        
                             
                                         
                                         $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Successfull!");
                                         $("#notitext").attr("class","alert alert-success");
                                         $("#notif").show('slow');

                                             setTimeout(function(){
                                              $('#notif').hide('slow');
                                               $("#notitext").html("");
                                               url = "bloglist.php";
               									$( location ).attr("href", url);
                                              },2000);                                                                                                                               
                         
                                              }
                                              else if(result == 0)
                                              { 
                                                  $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Error! Please Try Again");
                                                  $("#notitext").attr("class","alert alert-danger");
                                                  $("#notif").show('slow');
                                                    setTimeout(function(){
                                                      $('#notif').hide('slow');

                                                      url = "bloglist.php";
               										  $( location ).attr("href", url);
                                                    },2000);
                                                            
                                                            
                                             }         

                                        }

                                    });                  













                                    
                     }
                      else
                      { 
                          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>" + result);
                          $("#notitext").attr("class","alert alert-danger");
                          $("#notif").show('slow');
                            setTimeout(function(){
                              $('#notif').hide('slow');
                              url = "bloglist.php";
               				  $( location ).attr("href", url);
                            },2000);
                                    
                                    
                     }         
                   
                },
                cache: false,
                contentType: false,
                processData: false
            });

    }
    
    //always close div and clear fields regardless success or failed insert............   




    
  }); 



  $('.blogeditsubmit').click(function(e) {                                     
    
    


    
     
    $("#notitext").html("");
    var values = [];
    var columns = [];
   // var tbl = "00_appskills";
    var ncols = $('#ncols').val();
    var ctr;
    var id = $(this).attr('id');
    var ctrcheck = 0;
    var check = 0;
    var tbl = "00_blogs";
    var idedit = "blogid";
    
    var settingsName = $('#settingsName').val();
  
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#btitlefieldedit').val());
    values.push($('#bcontentedit').val());
    //values.push($('#whyjoinfieldedit').val());


    columns.push("blogtitle");
    columns.push("blogcontent");
    //columns.push("jobadvwhyjoinus");


    var fruits = values.join('|');
    var fruits2 = columns.join('|');


    var dataString = 'id='+ id + '&tbledit=' + tbl + '&idedit=' + idedit + '&values=' + fruits + '&columns=' + fruits2;
    
    if($('#btitlefield').val() == "")
    {
      check++;
    }
    if($('#bcontent').val() == "")
    {
      check++;
    }



    //checking duplicate and empty fields.................................................
    if(check > 0)
    {    
      errorcheck = true;
      errormsg.push("Please fill in the fields</br>");      
    }
    //end of checking duplicate and empty fields.................................................
    

    //end of unique trappings based of settingsname.....................................................
    
    
    
    //if there is error, show notif div else continue insert to database........................................
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
      url: "functions/edit.php",
      data: dataString,
      cache: false,
      success: function(result)
      { 
      	
        if(result == 1)
        { 
         
          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Successful!");
          $("#notitext").attr("class","alert alert-success");
          $("#notif").show('slow');
               setTimeout(function(){
               $('#notif').hide('slow');
               url = "bloglist.php";
               $( location ).attr("href", url);
               },2000);
          
          
          
        }
        else
        { 
          
          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Please try again");
            $("#notitext").attr("class","alert alert-danger");
            $("#notif").show('slow');
               setTimeout(function(){
               $('#notif').hide('slow');
               url = "bloglist.php";
               $( location ).attr("href", url);
               },2000);

          
        }
        
      }
      });

    }
    
    //always close div and clear fields regardless success or failed insert............   
    $('#btitlefield').val(""); 
    $('#bcontent').val(""); 



    
  }); 


});


/*
function getBlogList(usercode)
{	
					
				
					var getDataString = "";
					getDataString = getDataString + "col=*";
					getDataString = getDataString + "&tbl=00_users";
					getDataString = getDataString + "&cond=userstatus = 1";
					$.ajax({
						type: "POST",
						url: "functions/get.php",
						data: getDataString,
						cache: false,
						success: function(result)
						{
							var data;
							var z = [];
							var recarr = result.split('`');               
							for(recctr=0;recctr<recarr.length;recctr++)
							{
								data = recarr[recctr];
								dataarr = data.split('|');
								for(datactr=0;datactr<dataarr.length;datactr++)
								{

									z.push(dataarr[datactr]);								
									$("#dataTable").html(z);

								}
							}
							
												
							
						}
					});

}
*/


   function showBlog(tbl,cond,ctr,pk)
  {
	  var all = "";
	  all = all + "v1=" + tbl;
	  all = all + "&v2=" + cond;
	  all = all + "&v3=" + ctr;
	  all = all + "&v4=" + pk;
	  
	  $.get('functions/showblog.php?'+all, function(data) {
	    $("#dataTable").html(data);
	  });
  
  }