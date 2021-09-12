$(document).ready(function() {

	$("#jminsalfield").numeric();
  $("#jmaxsalfield").numeric();
  $("#jminsalfieldedit").numeric();
  $("#jmaxsalfieldedit").numeric();


$('#jobadssubmit').click(function(e) {                                     
    
    


    
     
    $("#notitext").html("");
    var values = [];
   // var tbl = "00_appskills";
    var ncols = $('#ncols').val();
    var ctr;
    var inp;
    
    var ctrcheck = 0;
    var check = 0;
    var paramtbl = $('#settingsTbl').val();
    var paramcond = $('#cond').val();
    var paramlindex = $('#lIndex').val();
    var parampk = $('#pk2').val();
    
    var settingsName = $('#settingsName').val();
  
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#jtitlefield').val());
    values.push($('#jdescfield').val());
    values.push($('#jminsalfield').val());
    values.push($('#jmaxsalfield').val());
    values.push($('#jexpfield').val());
    values.push($('#jtypefield').val());
    values.push($('#jlocfield').val());
    values.push($('#jdressfield').val());
    values.push($('#jbenefitsfield').val());
    values.push($('#jworkhoursfield').val());
    values.push($('#jlangfield').val());
    values.push($('#jexpdate').val());
    //values.push($('#whyjoinfield').val());
    values.push($('#userscode').val());

    var dataString = 'values='+ values + '&tbl=' + paramtbl; 
    
    if($('#jtitlefield').val() == "")
    {
      check++;
    }
    if($('#jminsalfield').val() == "")
    {
      check++;
    }

    if($('#jmaxsalfield').val() == "")
    {
      check++;
    }

    if($('#jexpfield').val()  == "")
    {
      check++;
    }

    if($('#jtypefield').val()  == "")
    {
      check++;
    }


    if($('#jlocfield').val() == "")
    {
      check++;
    }

    if($('#jdescfield').val() == "")
    {
      check++;
    }

    if($('#whyjoinfield').val() =="")
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
         
          $("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Success");
          $("#notitext2").attr("class","alert alert-success");
          $("#notif2").show('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               url = "jobads.php";
               $( location ).attr("href", url);
               },2000);
          
          
          
        }
        else
        { 
          
          $("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed!");
            $("#notitext2").attr("class","alert alert-danger");
            $("#notif2").show('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               url = "jobads.php";
               $( location ).attr("href", url);
               },2000);

          
        }
        
      }
      });

    }
    
    //always close div and clear fields regardless success or failed insert............   
    $('#jtitlefield').val(""); 
    $('#jminsalfield').val(""); 
    $('#jmaxsalfield').val("");
    $('#jexpfield').val(""); 
    $('#jlocfield').val(""); 
    $('#jdescfield').val("");
    $('#whyjoinfield').val("");


    
  }); 


  $('.jobadsedit').click(function(e) {                                     
    
    


    
     
    $("#notitext").html("");
    var values = [];
    var columns = [];
   // var tbl = "00_appskills";
    var ncols = $('#ncols').val();
    var ctr;
    var id = $(this).attr('id');
    var ctrcheck = 0;
    var check = 0;
    var tbl = "00_jobadvertisment";
    var idedit = "jobadvid";
    
    var settingsName = $('#settingsName').val();
  
    var errormsg = [];
    var errorcheck = false;
    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#jtitlefieldedit').val());
    values.push($('#jdescfieldedit').val());
    values.push($('#jminsalfieldedit').val());
    values.push($('#jmaxsalfieldedit').val());
    values.push($('#jexpfieldedit').val());
    values.push($('#jtypefield').val());
    values.push($('#jlocfieldedit').val());
    values.push($('#jdressfieldedit').val());
    values.push($('#jbenefitsfieldedit').val());
    values.push($('#jworkhoursfieldedit').val());
    values.push($('#jlangfieldedit').val());
    values.push($('#jexpdateedit').val());
    //values.push($('#whyjoinfieldedit').val());


    columns.push("jobadvtitle");
    columns.push("jobadvdesc");
    columns.push("jobadvminsal");
    columns.push("jobadvmaxsal");
    columns.push("jobadvexp");
    columns.push("jobadvtype");
    columns.push("jobadvworklocation");
    columns.push("jobadvdresscode");
    columns.push("jobadvbenefits");
    columns.push("jobadvworkinghours");
    columns.push("jobadvlanguage");
    columns.push("jobadvexpdate");
    //columns.push("jobadvwhyjoinus");


    var fruits = values.join('|');
    var fruits2 = columns.join('|');


    var dataString = 'id='+ id + '&tbledit=' + tbl + '&idedit=' + idedit + '&values=' + fruits + '&columns=' + fruits2;
    
    if($('#jtitlefieldedit').val() == "")
    {
      check++;
    }
    if($('#jminsalfieldedit').val() == "")
    {
      check++;
    }

    if($('#jmaxsalfieldedit').val() == "")
    {
      check++;
    }

    if($('#jexpfieldedit').val()  == "")
    {
      check++;
    }

    if($('#jtypefieldedit').val()  == "")
    {
      check++;
    }


    if($('#jlocfieldedit').val() == "")
    {
      check++;
    }

    if($('#jdescfieldedit').val() == "")
    {
      check++;
    }

    if($('#whyjoinfieldedit').val() == "")
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
      url: "functions/edit.php",
      data: dataString,
      cache: false,
      success: function(result)
      { 
        if(result == 1)
        { 
         
          $("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Successful!");
          $("#notitext2").attr("class","alert alert-success");
          $("#notif2").show('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               url = "jobads.php";
               $( location ).attr("href", url);
               },2000);
          
          
          
        }
        else
        { 
          
          $("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Please try again");
            $("#notitext2").attr("class","alert alert-danger");
            $("#notif2").show('slow');
               setTimeout(function(){
               $('#notif2').hide('slow');
               url = "jobads.php";
               $( location ).attr("href", url);
               },2000);

          
        }
        
      }
      });

    }
    
    //always close div and clear fields regardless success or failed insert............   
    $('#jtitlefieldedit').val(""); 
    $('#jminsalfieldedit').val(""); 
    $('#jmaxsalfieldedit').val("");
    $('#jexpfieldedit').val(""); 
    $('#jlocfieldedit').val(""); 
    $('#jdescfieldedit').val("");
    $('#whyjoinfieldedit').val("");


    
  }); 


   // init bootpag



});

    function showJobList(tbl,cond,ctr,pk)
  {
  var all = "";

  all = all + "v1=" + tbl;
  all = all + "&v2=" + cond;
  all = all + "&v3=" + ctr;
  all = all + "&v4=" + pk;
   
  $.get('functions/showjoblist.php?'+all, function(data) {
    $("#dataTable").html(data);
    
  });
  
  
  

  }