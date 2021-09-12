$(document).ready(function() {

  $("#ratingfield").numeric();
  $("#ratingfieldedit").numeric();
	 var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });



    $('#modaladdworkexp').click(function(e) {                                     
    e.preventDefault();                                                      
                                             
    $('#modalworkexp').modal('show');

   
    });

    $('#modalskillsadd').click(function(e) {                                     
    e.preventDefault();                                                      
                                             
    $('#modalskills').modal('show');

   
    });

  $('#modaladdeduc').click(function(e) {                                     
    e.preventDefault();                                                      
                                             
    $('#modaleducadd').modal('show');

   
    });


 $("[rel='tooltip']").tooltip();    
 
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 


    $("#countryDropDown").change(function() {
        //$(this).after('<div id="loader"><img src="images/ajax-loader.gif" alt="loading subcategory" /></div>');
        populateDropdown($(this).val());
    });

      $("#positionfield").change(function() {
        //$(this).after('<div id="loader"><img src="images/ajax-loader.gif" alt="loading subcategory" /></div>');
        populateDropdownSkills($(this).val(),"skillsfield");
    });
    $("#positionfieldedit").change(function() {
        //$(this).after('<div id="loader"><img src="images/ajax-loader.gif" alt="loading subcategory" /></div>');
        populateDropdownSkills($(this).val(),"skillsfieldedit");
    });


     $('#tabs a').click(function (e) {
            e.preventDefault()
         $(this).tab('show')
     });


$('#resumeskills').click(function(e) {                                     
    
    


    
     
    $("#notitext").html("");
    var values = [];
    var tbl = "00_appskills";
    var ncols = $('#ncols').val();
    var ctr;
    var inp;
    
    var ctrcheck = 0;
    var check = 0;
    var paramtbl = $('#settingsTbl').val();
    var paramcond = $('#cond2').val();
    var paramlindex = $('#lIndex').val();
    var parampk = $('#pk2').val();
    
    var settingsName = $('#settingsName').val();
  
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#positionfield').val());
    values.push($('#skillsfield').val());
    values.push($('#ratingfield').val());
    values.push($('#userscode').val());


    var dataString = 'values='+ values + '&tbl=' + tbl; 

    if($('#positionfield').val() == "")
    {
      check++;
    }
    if($('#skillsfield').val() == "")
    {
      check++;
    }

    if($('#ratingfield').val() == "")
    {
      check++;
    }

    if($('#ratingfield').val() > 10)
    {
      errorcheck = true;
      errormsg.push("Ratings are from 1 to 10 only</br>");   
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
      $("#notitext2").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
      for (k=0;k<=ctrcheck;k++)
      {
        $("#notitext2").append(errormsg[k]);
        
      }
      $("#notitext2").attr("class","alert alert-danger");
      $("#notif2").show('slow');
      setTimeout(function(){
        $('#notif2').hide('slow');
        $("#notitext2").html("");
      },8000);
      $("#notitext2").append("");
    }
    else if(errorcheck == false)
    {  
      $.ajax({
      type: "POST",
      url: "functions/settingsadd.php",
      data: dataString,
      cache: false,
      success: function(result)
      { 
        
        if(result == 1)
        { 
          showskills("00_appskills",paramcond,5,"appskillsstatus");
          $("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Success");
          $("#notitext2").attr("class","alert alert-success");
          $("#notif2").show('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               },8000);
          
          
          
        }
        else
        { 
          showskills("00_appskills",paramcond,5,"appskillsstatus");
          $("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed!");
            $("#notitext2").attr("class","alert alert-danger");
            $("#notif2").show('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               },8000);
          
        }
        
      }
      });

    }
    
    //always close div and clear fields regardless success or failed insert............
    $('#modalskills').modal('hide');    
    $('#skillsfield').val(""); 
    $('#ratingfield').val(""); 
    $('#positionfield').val("");
    
  }); 






$('#resumeeduc').click(function(e) {                                     
    
    


    
     
    $("#notitext").html("");
    var values = [];
    var tbl = "00_education";
    var ncols = $('#ncols').val();
    var ctr;
    var inp;
    
    var ctrcheck = 0;
    var check = 0;
    var paramtbl = $('#settingsTbl').val();
    var paramcond = $('#cond3').val();
    var paramlindex = $('#lIndex').val();
    var parampk = $('#pk2').val();
    
    var settingsName = $('#settingsName').val();
    var usercode = $('#usercode').val();
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#schoolfield').val());
    values.push($('#coursefield').val());
    values.push($('#degreefield').val());
    values.push($('#yearsfieldfrom').val());
    values.push($('#yearsfieldto').val());
    values.push($('#userscode').val());


    var dataString = 'values='+ values + '&tbl=' + tbl; 

    if($('#schoolfield').val() == "")
    {
      check++;
    }

    if($('#coursefield').val() == "")
    {
      check++;
    }

    if($('#degreefield').val()  == "")
    {
      check++; 
    }

    if($('#yearsfieldfrom').val() == "")
    {
      check++;
    }

    if($('#yearsfieldto').val()  == "")
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
      $("#notitext2").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
      for (k=0;k<=ctrcheck;k++)
      {
        $("#notitext2").append(errormsg[k]);
        
      }
      $("#notitext2").attr("class","alert alert-danger");
      $("#notif2").show('slow');
      setTimeout(function(){
        $('#notif2').hide('slow');
        $("#notitext2").html("");
      },8000);
      $("#notitext2").append("");
    }
    else if(errorcheck == false)
    {  
      $.ajax({
      type: "POST",
      url: "functions/settingsadd.php",
      data: dataString,
      cache: false,
      success: function(result)
      { 
        
        if(result == 1)
        { 
          showeduc("00_education",paramcond,5,"eduid");
          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Success");
          $("#notitext").attr("class","alert alert-success");
          $("#notif").show('slow');
               setTimeout(function(){
               $('#notif').hide('slow');
               },8000);
          
          
          
        }
        else
        { 
          showeduc("00_education",paramcond,5,"eduid");
          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed!");
            $("#notitext").attr("class","alert alert-danger");
            $("#notif2").hide('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               },8000);
          
        }
        
      }
      });

    }
    
    //always close div and clear fields regardless success or failed insert............
    $('#modaleducadd').modal('hide');    
    $('#schoolfield').val(""); 
    $('#coursefield').val(""); 
    $('#degreefield').val(""); 
    $('#yearsfieldfrom').val(""); 
    $('#yearsfieldto').val(""); 
  
    
  }); 




   $('#resumeworkexpsavee').click(function(e) {                                     
    
    


    
    
    $("#notitext").html("");
    var values = [];
    var tbl = "00_workexperience";
    var ncols = $('#ncols').val();
    var ctr;
    var inp;
    
    var ctrcheck = 0;
    var check = 0;
    var paramtbl = $('#settingsTbl').val();
    var paramcond = $('#cond').val();
    var paramlindex = $('#lIndex').val();
    var parampk = $('#pk').val();
    var settingsName = $('#settingsName').val();
  
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#userscode').val());
    values.push($('#workexppos').val());
    values.push($('#workexpcomp').val());
    values.push($('#workexpfrom').val());
    values.push($('#workexpto').val());
    values.push($('#workexpdesc').val());

    var dataString = 'values='+ values + '&tbl=' + tbl; 

    if($('#workexppos').val() == "")
    {
      check++;
    }

    if($('#workexpcomp').val() == "")
    {
      check++;
    }

    if($('#workexpfrom').val() == "")
    {
      check++;
    }

    if($('#workexpto').val() == "")
    {
      check++;
    }
    if($('#workexpdesc').val() == "")
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
      url: "functions/settingsadd.php",
      data: dataString,
      cache: false,
      success: function(result)
      { 
        
        if(result == 1)
        { 
          showworkexp(paramtbl,paramcond,paramlindex,parampk);
          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Success");
          $("#notitext").attr("class","alert alert-success");
          $("#notif").show('slow');
               setTimeout(function(){
               $('#notif').hide('slow');
               },8000);
          
          
          
        }
        else
        { 
          showworkexp(paramtbl,paramcond,paramlindex,parampk);
          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed!");
            $("#notitext").attr("class","alert alert-danger");
            $("#notif2").hide('slow');
               setTimeout(function(){
               $('#notif').hide('slow');
               },8000);
          
        }
        
      }
      });

    }
    
    //always close div and clear fields regardless success or failed insert............
    $('#modalworkexp').modal('hide');    
    $('#workexppos').val(""); 
    $('#workexpcomp').val(""); 
    $('#workexpfrom').val(""); 
    $('#workexpto').val("");      
    $('#workexpdesc').val("");    
    
  }); 



    $("#apppicture").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#compiconimg").attr("src", this.result);
            }
        }
    });

    $("#poslevelDropDown").change(function () {
            var end = this.value;
            var errormsg = [];
            var errorcheck = false;
            var ctrcheck = 0;
            var check = 0;
            var values = [];
            var columns = [];
            var tbl = "00_applicant";
            var idedit = "appcode";
            var id = $('#userscode').val();
            values.push(end);



            columns.push("appposlevel");


            var fruits = values.join('|');
            var fruits2 = columns.join('|');


            var dataString = 'id='+ id + '&tbledit=' + tbl + '&idedit=' + idedit + '&values=' + fruits + '&columns=' + fruits2;
          $.ajax({
                                            type: "POST",
                                            url: "functions/edit.php",
                                            data: dataString,
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
                                              },4000);                                                                                                                               
                         
                                              }
                                              else if(result == 0)
                                              { 
                                                  $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Error! Please Try Again");
                                                  $("#notitext").attr("class","alert alert-danger");
                                                  $("#notif").show('slow');
                                                    setTimeout(function(){
                                                      $('#notif').hide('slow');
                                                    },8000);
                                                            
                                                            
                                             }         

                                        }

                                    }); 
    });



     $("#contfield").numeric();
     $("#emecontnofield").numeric();

     $("#resumeform").submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);

            var errormsg = [];
            var errorcheck = false;
            var bdayfield = $('#bdayfield').val();
            var newimg = $("#apppicture").val();
            var ob = document.getElementById('apppicture');
            var newimg2 = newimg.split("\\");
            var ctrcheck = 0;
            var check = 0;
            
            var values = [];
            var columns = [];
            var tbl = "00_applicant";
            var idedit = "appcode";
            var id = $('#userscode').val();
            formData.append("id", id);
            formData.append("fileid", "apppicture");
            values.push($('#fnamefield').val());
            values.push($('#mnamefield').val());
            values.push($('#lnamefield').val());
            values.push($('#addressfield').val());
            values.push($('#countryDropDown').val());
            values.push($('#cityDropDown').val());
            values.push($('#contfield').val());
            values.push($('#emailfield').val());
            values.push($('#bdayfield').val());
            values.push($('#genderfield').val());
            if(newimg2 == "" || newimg2 == "user.png")
            {
              values.push("user.png");
            }
            else
            {
              values.push(id+".png");
            }            
            values.push($('#civstatusfield').val());
            values.push($('#dependantsfield').val());
            values.push($('#emecontnamefield').val());
            values.push($('#emecontnofield').val());
            values.push($('#emecontaddrfield').val());
            values.push($('#emecontrelfield').val());


            columns.push("appfname");
            columns.push("appmname");
            columns.push("applname");
            columns.push("appaddr");
            columns.push("appcountry");
            columns.push("appcity");
            columns.push("appcontno");
            columns.push("appemail");
            columns.push("appdbdate");
            columns.push("appgender");
            columns.push("apppicture");
            columns.push("appcivstat");
            columns.push("appnoofdependants");
            columns.push("appemecontname");
            columns.push("appemecontno");
            columns.push("appemeaddr");
            columns.push("appemerelation");

            var fruits = values.join('|');
            var fruits2 = columns.join('|');


            var dataString = 'id='+ id + '&tbledit=' + tbl + '&idedit=' + idedit + '&values=' + fruits + '&columns=' + fruits2;
          if (calcAge(bdayfield) >=18){
              $("#notitext").html(" ");
          }
          else
          {
              
            errorcheck = true;
            errormsg.push("Sorry! Your age is below 18 years old.</br>");       
                          
          }
            
          if($('#fnamefield').val() == "")
          {
            check++;
          }
          if($('#mnamefield').val() == "")
          {
            check++;
          }

          if($('#lnamefield').val() == "")
          {
            check++;
          }

          if($('#addressfield').val() == "")
          {
            check++;
          }
          if($('#countryDropDown').val() == "")
          {
            check++;
          }

          if($('#cityDropDown').val() == "")
          {
            check++;
          }
          if($('#contfield').val() == "")
          {
            check++;
          }
          if($('#emailfield').val() == "")
          {
            check++;
          }

          if($('#bdayfield').val() == "")
          {
            check++;
          }

          if($('#genderfield').val() == "")
          {
            check++;
          }
          if($('#civstatusfield').val() == "")
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
            },4000);
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
                 
                  if(result == 1)
                  { 
              
                        
                             
                                         
                                            $.ajax({
                                            type: "POST",
                                            url: "functions/edit.php",
                                            data: dataString,
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
                                              },4000);                                                                                                                               
                         
                                              }
                                              else if(result == 0)
                                              { 
                                                  $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Error! Please Try Again");
                                                  $("#notitext").attr("class","alert alert-danger");
                                                  $("#notif").show('slow');
                                                    setTimeout(function(){
                                                      $('#notif').hide('slow');
                                                    },8000);
                                                            
                                                            
                                             }         

                                        }

                                    });                                                                                                                   
 
                      }
                      else if(result == "")
                      { 
                          
                                  

                          $.ajax({
                                            type: "POST",
                                            url: "functions/edit.php",
                                            data: dataString,
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
                                              },4000);                                                                                                                               
                         
                                              }
                                              else if(result == 0)
                                              { 
                                                  $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Error! Please Try Again");
                                                  $("#notitext").attr("class","alert alert-danger");
                                                  $("#notif").show('slow');
                                                    setTimeout(function(){
                                                      $('#notif').hide('slow');
                                                    },8000);
                                                            
                                                            
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
                            },8000);
                                    
                                    
                     }         
                   
                },
                cache: false,
                contentType: false,
                processData: false
            });


           
          }    
            
            
        
                                             
                                             
        }); 



  /*    $("#resumeform2").click(function(e) {
  
                
            var values2 = [];
            var columns2 = [];
            var tbl2 = "00_education";
            var idedit2 = "eduappcode";
            var id = $('#userscode').val();
            values2.push($('#schoolfield').val());
            values2.push($('#coursefield').val());
            values2.push($('#degreefield').val());
            values2.push($('#yearsfieldfrom').val());
            values2.push($('#yearsfieldto').val());
            

            
            columns2.push("eduschool");
            columns2.push("educourse");
            columns2.push("edudegree");
            columns2.push("eduyearsattendedfrom");
            columns2.push("eduyearsattendedto");

            var fruits = values2.join('|');
            var fruits2 = columns2.join('|');

            var dataString2 = 'id='+ id + '&tbledit=' + tbl2 + '&idedit=' + idedit2 + '&values=' + fruits + '&columns=' + fruits2;
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
                                              $('#notif').hide('slow');;
                                              },4000);                                                                                                                               
                                    
                      }
                      else if(result == 0)
                      { 
                          $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Error! Please Try Again");
                          $("#notitext").attr("class","alert alert-danger");
                          $("#notif").show('slow');
                            setTimeout(function(){
                              $('#notif').hide('slow');
                            },8000);
                                    
                                    
                     }         

                }
            });
            
            
            
            e.preventDefault();
        
                                             
                                             
        }); 


*/








});


function populateDropdown(value)
{

    $.get('functions/getcity.php?country=' + value, function(data) {
            $("#cityDropDown").html(data);
        }); 
}

function populateDropdownSkills(value,dropdown)
{


    var dataString = 'skills='+ value;

    $.ajax({
          type: "GET",
          url: "functions/getskills.php",
          data: dataString,
          async: false,
          cache: false,
          success: function(result)
          {
            $("#" + dropdown).html(result);
          }
          });




}



 function showworkexp(tbl,cond,ctr,pk)
  {
  var all = "";
  all = all + "v1=" + tbl;
  all = all + "&v2=" + cond;
  all = all + "&v3=" + ctr;
  all = all + "&v4=" + pk;
  
  $.get('functions/showworkexp.php?'+all, function(data) {
    $("#workexpbody").html(data);
  });
  
  
  

  }

  function showskills(tbl,cond,ctr,pk)
  {
  var all = "";
  all = all + "v1=" + tbl;
  all = all + "&v2=" + cond;
  all = all + "&v3=" + ctr;
  all = all + "&v4=" + pk;
  
  $.get('functions/showskills.php?'+all, function(data) {
    $("#skillsbody").html(data);
  });
  
  
  

  }

    function showeduc(tbl,cond,ctr,pk)
  {
  var all = "";
  all = all + "v1=" + tbl;
  all = all + "&v2=" + cond;
  all = all + "&v3=" + ctr;
  all = all + "&v4=" + pk;
  
  $.get('functions/showeduc.php?'+all, function(data) {
    $("#educbody").html(data);
  });
  
  
  

  }

  function showall(usercode)
  {

    showworkexp("00_workexperience","workexpappcode = %27" + usercode + "%27 AND workexpstatus = 1",5,"workexpid");
    showskills("00_appskills","appskillsappcode = %27" + usercode + "%27 AND appskillsstatus = 1",5,"appskillsid");
    showeduc("00_education","eduappcode = %27" + usercode + "%27 AND edustatus = 1",5,"eduid");


  }

  function calcAge(dateString) {
  var birthday = +new Date(dateString);
  return~~ ((Date.now() - birthday) / (31557600000));
}

