$(document).ready(function() {  

      $(".dmainclass").change(function() {
        //$(this).after('<div id="loader"><img src="images/ajax-loader.gif" alt="loading subcategory" /></div>');
        populateDropdown2($(this).val());
      });
	//$('#bcontent').wysihtml5();
	$('#bcontentedit').wysihtml5();

      $("#quantity0").numeric({
        allowMinus   : false,
        allowDecSep         : false
    });
       $("#quantity").numeric({
        allowMinus   : false,
        allowDecSep         : false
    });

    $("#conno").numeric({
        allowMinus   : false
    });
    $("#postalcode").numeric({
        allowMinus   : false
    });

$('#prodmodal').click(function(e) {  

    // $('#modalAddDiv').modal('show');
    
    // $("#modalAddDiv").css("z-index", "1500");
    $('#signinmodal').appendTo("body").modal('show');
    $('#signinmodal').appendTo("body");
  }); 


$('#prodmodallogin').click(function(e) {   
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
          url: "functions/prodfunctionlogin.php",
          data: all,
          cache: false,
          success: function(result)
          {   
            //alert(result);
                var check = result.split('|');
                //alert(check);
                //alert(result);
                       if(check[0] == 1)
                       {  
              
                        
                        $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Login Successfull");
                          $("#notitext").attr("class","alert alert-success");
                          $('#fname').val(check[1]);
                          $('#lname').val(check[2]);
                          $('#email').val(check[3]);
                          $('#conno').val(check[4]);
                          $('#address1').val(check[5]);
                          //$('#postalcode').val(check[6]);
                          //$('#countryname').val(check[7]);
                          //$('#countryregion').val(check[6]);
                          $("#notif").show('slow');
                          $('#checktext').hide('slow');
                          $('#checktext2').hide('slow');
                          $('#ss').load("cartitems.php"); 
                          $.get('checkoutform.php', function(data) {
                          $("#txtResult3").html(data);
            

                          }); 
                          $('#signinmodal').appendTo("body").modal('hide');
                             setTimeout(function(){
                               $('#notif').hide('slow');
                             },4000);         
                        //var url = "../dashboard.php";    
                        //$(location).attr('href',url);
                        
                        
                      }
                      else if(check[0] == 0)
                      { 
                        
                        $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Wrong Username or Password");
                          $("#notitext").attr("class","alert alert-danger");
                          $("#notif").show('slow');
                          $('#signinmodal').appendTo("body").modal('hide');
                             setTimeout(function(){
                               $('#notif').hide('slow');
                             },4000);
                        
                        
                      }
                      else if(check[0] == 2)
                      {

                        $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Access Restricted");
                        $("#notitext").attr("class","alert alert-danger");
                        $("#notif").show('slow');
                        $('#signinmodal').appendTo("body").modal('hide');
                         setTimeout(function(){
                         $('#notif').hide('slow');
                        },4000);
                        
                      }         
          }
        });
  }
});





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


      $("#prodimgxl").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#prodimgxlprev").attr("src", this.result);
            }
        }
    });
  $("#prodimglg").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#prodimglgprev").attr("src", this.result);
            }
        }
    });
      $("#prodimgmd").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#prodimgmdprev").attr("src", this.result);
            }
        }
    });


      $('#productformxl').submit(function(e) {
  e.preventDefault();

  var imagename = $('#imagenamexl').val();
  
  var formData = new FormData($(this)[0]);
  formData.append("id", imagename);
  formData.append("fileid", "prodimgxl");
  $.ajax({
    url: "functions/uploadimg.php",
    type: "POST",
    data: formData,
    async: false,
    success: function (result) {
    
     },
    cache: false,
    contentType: false,
    processData: false
  });
});
$('#productformlg').submit(function(e) {
  e.preventDefault();
  
  var imagename = $('#imagenamelg').val();
  
  var formData = new FormData($(this)[0]);  
  formData.append("id", imagename);
  formData.append("fileid", "prodimglg");
  $.ajax({
    url: "functions/uploadimg.php",
    type: "POST",
    data: formData,
    async: false,
    success: function (result) {
       },
    cache: false,
    contentType: false,
    processData: false
  });
});
$('#productformmd').submit(function(e) {
  e.preventDefault();
  
  var imagename = $('#imagenamemd').val();
  
  var formData = new FormData($(this)[0]);
  formData.append("id", imagename);
  formData.append("fileid", "prodimgmd");
  $.ajax({
    url: "functions/uploadimg.php",
    type: "POST",
    data: formData,
    async: false,
    success: function (result) {
    
     },
    cache: false,
    contentType: false,
    processData: false
  });
});


$('#blogaddsubmit').click(function(e) {
      $('#productformxl').submit();
      $('#productformlg').submit();
      $('#productformmd').submit();
   
  var imagenamexl = $('#imagenamexl').val();
  var imagenamelg = $('#imagenamelg').val();
  var imagenamemd = $('#imagenamemd').val();
  

  
  var newimgxl2 = imagenamexl.split('\\');
  
  var newimglg2 = imagenamelg.split('\\');

  var newimgmd2 = imagenamemd.split('\\');
  

  var id = $('#userscode').val();
  var idedit = $('#idedit').val();
    $("#notitext").html("");
    var values = [];
    var values2 = [];
    var values4 = [];
    var columns = [];
    var columns2 = [];
   // var tbl = "00_appskills";
    var ncols = $('#ncols').val();
    var submittype = $('#submittype').val();
    
    var pkedit = $('#idedit').val();
    var sealedit = $('#sealedit').val();
    var ctr;
    var inp;
    var bcontent = CKEDITOR.instances.bcontent.getData(); 
    var bcontent2 = CKEDITOR.instances.bcontent2.getData(); 
    var packingcontent = CKEDITOR.instances.packingcontent.getData(); 
    var bcontentval = escape(bcontent);
    var bcontent2val = escape(bcontent2);
    var packingcontentval = escape(packingcontent);
   // var bcontent = $('#bcontent').val(); 
    var ctrcheck = 0;
    var check = 0;
    var paramtbl = $('#settingsTbl').val();
    var paramcond = $('#cond').val();
    var paramlindex = $('#lIndex').val();
    var parampk = $('#pk2').val();
    var settingsName = $('#settingsName').val();
    var tbl = "00_products";
    var idedit = "productid";
    var errormsg = [];
    var errorcheck = false;
    var checkcount = $(":checkbox:checked").length;
    var checkedValue = new Array();
    var fruits4 = "";
    var fruits3 = [];
    var fruits5 = [];
    $('.seal:checked').each(function() {
    values4 = [];
    values4.push($('#prodtypefield').val());
    values4.push(this.value); 
    fruits4 = values4.join('|');
    fruits3.push(fruits4); 
    fruits4 = ""; 

    });
   
    fruits5 = fruits3.join('`');


    var paramidentifier = $('#identifier').val();
    var getExplodedResult = paramidentifier.split("|");
    values.push($('#prodtypefield').val());
    values.push($('#btitlefield').val());
    values.push(bcontentval);
    values.push(bcontent2val);
    values.push(packingcontentval);
    values.push($('#prodcatfield').val());
    values.push("1");
     if(
   (newimgxl2 == "") || 
   (newimgxl2 == "noimgxl.png") ||
   (newimglg2 == "") || 
   (newimglg2 == "noimglg.png") ||
   (newimgmd2 == "") || 
   (newimgmd2 == "noimgmd.png")
   )
     {
       values.push("noimgxl.png,noimglg.png,noimgmd.png");
     }
     else
     {
      values.push(imagenamexl+".png"+","+imagenamelg+".png"+","+imagenamemd+".png");
     } 

    values.push("1");
    var items = values.join('|');
    var dataString = 'values='+ items + '&tbl=' + paramtbl; 
    values2.push($('#prodtypefield').val());
    values2.push($('#btitlefield').val());
    values2.push(bcontentval);
    values2.push(bcontent2val);
    values2.push(packingcontentval);
    values2.push($('#prodcatfield').val());
    if(
   (newimgxl2 == "") || 
   (newimgxl2 == "noimgxl.png") ||
   (newimglg2 == "") || 
   (newimglg2 == "noimglg.png") ||
   (newimgmd2 == "") || 
   (newimgmd2 == "noimgmd.png")
    )
     {
      
     }
     else
     {
      values2.push(imagenamexl+".png"+","+imagenamelg+".png"+","+imagenamemd+".png");
     } 
    //values.push($('#whyjoinfieldedit').val());


    columns.push("productcode");
    columns.push("productname");
    columns.push("productdesc1");
    columns.push("productdesc2");
    columns.push("productpacking");
    columns.push("productcategoryid");
  
      if(
   (newimgxl2 == "") || 
   (newimgxl2 == "noimgxl.png") ||
   (newimglg2 == "") || 
   (newimglg2 == "noimglg.png") ||
   (newimgmd2 == "") || 
   (newimgmd2 == "noimgmd.png")
    )
     {
       
     }
     else
     {
      columns.push("productpicture");
     } 
    //columns.push("jobadvwhyjoinus");
    columns2.push("productid");
    columns2.push("sealsid");

    var fruits = values2.join('|');
    var fruits2 = columns.join('|');
    var fruits7 = columns2.join('|');

    var dataString2 = 'id='+ pkedit + '&tbledit=' + tbl + '&idedit=' + idedit + '&values=' + fruits + '&columns=' + fruits2;

    var dataString4 = 'values='+ fruits5 + '&tbl=00_productseals'; 
    
    var dataString6 = 'id='+ pkedit + '&tbledit=00_productseals&idedit=' + idedit + '&values=' + fruits5 + '&columns=' + fruits7;
    var dataString5 = 'id='+ sealedit + '&tbl=00_productseals&pk=productid&uniquecol=' + identifier + '&childtbls=' + childtbls;
    if($('.btitlefield').val() == "")
    {
      check++;
      errormsg.push("Please fill in the Product Title</br>");
    }
    if($('.bcontent').val() == "")
    {
      check++;
      errormsg.push("Please fill in the First Descriptions</br>");
    }

    if($('.bcontent2').val() == "")
    {
      check++;
      errormsg.push("Please fill in the Second Description</br>");
    }

    if($('.packingcontent').val() == "")
    {
      check++;
      errormsg.push("Please fill in the Packing</br>");
    }

    if($('.prodtypefield').val() == "")
    {
      check++;
      errormsg.push("Please fill in the Product</br>");
    }
    if($('.prodcatfield').val() == "")
    {
      check++;
      errormsg.push("Please fill in the Product Category</br>"); 
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
          
            
                  if(submittype == "add")
                  { 
              
                        
                             
                                         
                                            $.ajax({
                                            type: "POST",
                                            url: "functions/add.php",
                                            data: dataString,
                                            cache: false,
                                             success: function(result){
                                              
                                              if(result == 1)
                                              { 
                                                      $.ajax({
                                                    type: "POST",
                                                    url: "functions/add.php",
                                                    data: dataString4,
                                                    cache: false,
                                                     success: function(result){
                                                       
                                                       }
                                                      }); 
                                                     
                                                   $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Successfully Added!");
                                                   $("#notitext").attr("class","alert alert-success");
                                                   $("#notif").show('slow');

                                                       setTimeout(function(){
                                                        $('#notif').hide('slow');
                                                         $("#notitext").html("");
                                                         url = "prodlist.php";
                                                        $( location ).attr("href", url);
                                                        },4000);                                                                                                                               
                         
                                              }
                                              else
                                              { 
                                                  $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Error! Please Try Again " + result);
                                                  $("#notitext").attr("class","alert alert-danger");
                                                  $("#notif").show('slow');
                                                    setTimeout(function(){
                                                      $('#notif').hide('slow');
                                                     // url = "prodlist.php";
                                                    // $( location ).attr("href", url);
                                                    },24000);
                                                            
                                                            
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
              

                                                 $.ajax({
                                                  type: "POST",
                                                  url: "functions/delete.php",
                                                  data: dataString5,
                                                  cache: false,
                                                    success: function(result)
                                                  { 
                                                   
    
                                                        $.ajax({
                                                        type: "POST",
                                                        url: "functions/add.php",
                                                        data: dataString4,
                                                        cache: false,
                                                         success: function(result){ 
                                                          
                                                         }

                                                          }); 


                                                  
                                                }
               

                                                   }); 
                                                   
                                         
                                                     $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Successfull!");
                                                     $("#notitext").attr("class","alert alert-success");
                                                     $("#notif").show('slow');

                                                     setTimeout(function(){
                                                      $('#notif').hide('slow');
                                                       $("#notitext").html("");
                                                       url = "prodlist.php";
                                                      $( location ).attr("href", url);
                                                      },3000);                                                                                                                               
                             
                                                  }
                                                  else if(result == 0)
                                                  { 
                                                      $("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Update Error! Please Try Again");
                                                      $("#notitext").attr("class","alert alert-danger");
                                                      $("#notif").show('slow');
                                                        setTimeout(function(){
                                                          $('#notif').hide('slow');

                                                          url = "prodlist.php";
                                                         $( location ).attr("href", url);
                                                        },3000);
                                                                
                                                                
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
                              url = "prodlist.php";
                        $( location ).attr("href", url);
                            },2000);
                                    
                                    
                     }         
                   
               

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

    $("#countryname").change(function() {
        //$(this).after('<div id="loader"><img src="images/ajax-loader.gif" alt="loading subcategory" /></div>');
        //populateDropdown($(this).val());

        populateDropdownBossCarl($(this).val());
        //populateDropdown3($(this).val());
    });



    $("#shippingtotal").change(function() {
   
        var total2 = $("#shippingtotal").val();
        numberformat(total2,'OrderTotalAmountWithShipping');
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

  function cartfunction(itemid,type)
  {

      var itemidqty = $("#quantity").val();
         
      window.location="functions/cartfunction.php?abc="+itemid+"&def="+itemidqty+"&carttype="+type;
  }


function cartfunction2(itemid,newqty,type)//for update
{
  window.location="functions/cartfunction.php?abc="+itemid+"&def="+newqty+"&carttype="+type;
}
 
function updatecartfunction(itm)
{
  

  
  var imtarr = itm.split("|");
  var qtyarr = [];
  
  for(a=0;a<imtarr.length;a++)
  {
    // if(imtarr[a]!=0)
    // {qtyarr.push($("#quantity"+a).val());}
    // else
    // {qtyarr.push('0');}
    // alert(imtarr[a]);
  
    // cartfunction2(imtarr[a],$("#quantity"+a).val(),'edit');
    var datas = "";
    
    datas = datas + "abc=" + imtarr[a];
    datas = datas + "&def=" + $("#quantity"+a).val();
    datas = datas + "&carttype=edit";
    
    $.ajax({
      url: "functions/cartfunction.php",
      type: "GET",
      data: datas,
      cache: false,
      async: true,
      success: function (msg) {
         location.reload();
      }
    });
  }
  
  
  
}




function populateDropdown2(value)
{

    $.get('functions/getcountrymain.php?country=' + value, function(data) {
    
            $(".tdclass").val(data); 
        }); 
      //$('#countryregion').val("none").trigger('change');
}

  function populateDropdown(value)
{

    $.get('functions/getregion.php?country=' + value, function(data) {
            $("#countryregion").html(data);
        }); 
}

  function populateDropdown3(value)
{

    $.get('functions/getcity.php?country=' + value, function(data) {
            $("#countrycity").html(data);

        }); 
}

function populateDropdownBossCarl(value)
{

    $.get('functions/getcitybosscarl.php?country=' + value, function(data) {
            $("#countrycity").html(data);
          
        }); 
}

  function numberformat(value,result)
{

      $.get('functions/getnumberformat.php?number=' + value, function(data) {
            $("#" + result).val(data);

        }); 
}


function CalculateEstShippingCharge()
{
   var countryname = $("#countryname").val();
   var countryregion = $("#countryregion").val();
   var OrderTotalAmount = $("#OrderTotalAmount").val();

   var number1 = Number(OrderTotalAmount.replace(/[^0-9\.]+/g,""));
   var number2 = 0;
   var total = 0;
   var supertotal = 0;
   if (countryregion!="none")
   {
        var sUrl="functions/cartitemshippingchargecalculate.php";
        var sData = "?countryname="+countryname+"&countryregion="+countryregion;
         $.get('functions/cartitemshippingchargecalculate.php' + sData, function(data) {
            $("#shippingChargeAmount").val(data);
            number2 = Number(data.replace(/[^0-9\.]+/g,""));
            total = Number(number1) + Number(number2); 

            $("#ShippingChargeOfficial").val(data);
            $("#shippingtotal").val(total).trigger('change');
   
      


        });

   }
    else
    {
        alert("ERROR: Please select region.");
        document.getElementById("shippingChargeAmount").value = "0.00";
   
    }
    
   
}


function CalculateEstShippingChargeGlenn()
{
   var countryname = $("#countryname").val();
   var countrycity = $("#countrycity").val();
   var OrderTotalAmount = $("#OrderTotalAmount").val();

   var number1 = Number(OrderTotalAmount.replace(/[^0-9\.]+/g,""));
   var number2 = 0;
   var total = 0;
   var supertotal = 0;
   if (countrycity!="none")
   {
        var sUrl="functions/cartitemshippingchargecalculateGlenn.php";
        var sData = "?countryname="+countryname+"&countrycity="+countrycity;
         $.get('functions/cartitemshippingchargecalculateGlenn.php' + sData, function(data) {
            $("#shippingChargeAmount").val(data);
            number2 = Number(data.replace(/[^0-9\.]+/g,""));
            total = Number(number1) + Number(number2); 
            $("#ShippingChargeOfficial").val(data);
            $("#shippingtotal").val(total).trigger('change');
            
      


        });

   }
    else
    {
        alert("ERROR: Please select city.");
        document.getElementById("shippingChargeAmount").value = "0.00";
   
    }
    
   
}



function proceedtocheckout()
{
    
    var countryname = document.getElementById("countryname").value; countryname=countryname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var countrycity = document.getElementById("countrycity").value; countrycity=countrycity.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    
    var checker=1;
    
    if (countrycity == "")
    {
        document.getElementById("countrycity").style.border='1px solid red';
        checker=3;
    }
    else if (countrycity == "none")
    {
        document.getElementById("countrycity").style.border='1px solid red';
        checker=3;
    }
    else
    {
        document.getElementById("countrycity").style.border='1px solid #c8c8c8';
    }
    
    if (countryname == "")
    {
        document.getElementById("countryname").style.border='1px solid red';
        checker=2;
    }
    else if (countryname == "none")
    {
        document.getElementById("countryname").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("countryname").style.border='1px solid #c8c8c8';
    }
    
    if (checker==1)
    {
        var sUrl="checkoutform.php";
        var sData = "?countryname="+countryname+"&countryregion="+countrycity;
        $.get('checkoutform.php' + sData, function(data) {
          $("#txtResult3").html(data);
            

        });
    }
    else if (checker==2)
    {

         $("#notitext").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
         $("#notitext").append("ERROR: Please select country.</br>");
          $("#notitext").attr("class","alert alert-danger");
          $("#notif").show('slow');
          setTimeout(function(){
            $('#notif').hide('slow');
            $("#notitext").html("");
          },3000);
          $("#notitext").append("");
    }
    else if (checker==3)
    {

         $("#notitext").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
         $("#notitext").append("ERROR: Please select City.</br>");
          $("#notitext").attr("class","alert alert-danger");
          $("#notif").show('slow');
          setTimeout(function(){
            $('#notif').hide('slow');
            $("#notitext").html("");
          },3000);
          $("#notitext").append("");
    }
    else
    {
         $("#notitext").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
         $("#notitext").append("ERROR: Please complete all required information.</br>");
          $("#notitext").attr("class","alert alert-danger");
          $("#notif").show('slow');
          setTimeout(function(){
            $('#notif').hide('slow');
            $("#notitext").html("");
          },3000);
          $("#notitext").append("");
    }
    //window.location="./checkoutform.php";
}


function gotopay()
{
    var fname = document.getElementById("fname").value; fname=fname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var lname = document.getElementById("lname").value; lname=lname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var email = document.getElementById("email").value; email=email.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var conno = document.getElementById("conno").value; conno=conno.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");   
    var companyname = document.getElementById("companyname").value; companyname=companyname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var address1 = document.getElementById("address1").value; address1=address1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var address2 = document.getElementById("address2").value; address2=address2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var postalcode = document.getElementById("postalcode").value; postalcode=postalcode.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var countryname = document.getElementById("countryname").value; countryname=countryname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var countryregion = document.getElementById("countryregion").value; countryregion=countryregion.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var checker=1;
    if (fname == "")
    {
        document.getElementById("fname").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("fname").style.border='1px solid #c8c8c8';
    }
    
    if (lname == "")
    {
        document.getElementById("lname").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("lname").style.border='1px solid #c8c8c8';
    }
    
    if (email == "")
    {
        document.getElementById("email").style.border='1px solid red';
        checker=2;
    }
    else if (ValidateEmail(email) == 0)
    {
        document.getElementById("email").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("email").style.border='1px solid #c8c8c8';
    }
    
    if (conno == "")
    {
        document.getElementById("conno").style.border='1px solid red';
        checker=2;
    }
    else if (conno.length < 7)
    {
        document.getElementById("conno").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("conno").style.border='1px solid #c8c8c8';
    }
    
    if (address1 == "")
    {
        document.getElementById("address1").style.border='1px solid red';
        checker=2;
    }
    else if (address1.length < 5)
    {
        document.getElementById("address1").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("address1").style.border='1px solid #c8c8c8';
    }
    
    if (postalcode == "")
    {
        document.getElementById("postalcode").style.border='1px solid red';
        checker=2;
    }
    else
    {
        document.getElementById("postalcode").style.border='1px solid #c8c8c8';
    }
    
    if (checker == 1)
    {
        var sUrl="checkoutformpay.php";
        
        var sData = "fname="+fname+"&lname="+lname+"&email="+email+"&conno="+conno
        +"&companyname="+companyname+"&address1="+address1+"&address2="+address2
        +"&postalcode="+postalcode+"&countryname="+countryname+"&countryregion="+countryregion;
       $.get('checkoutformpay.php?' + sData, function(data) {
          $("#txtResult3").html(data);
            

        });
        
    }
    else
    {

          $("#notitext").append("<button class='close' data-dismiss='alert'  type='button'>&times;</button>");
          $("#notitext").append("ERROR: Please complete all information.</br>");
          $("#notitext").attr("class","alert alert-danger");
          $("#notif").show('slow');
          setTimeout(function(){
            $('#notif').hide('slow');
            $("#notitext").html("");
          },3000);
          $("#notitext").append("");
    }
    
}

function ValidateEmail(inputText)
{
   var atpos=inputText.indexOf("@");
   var dotpos=inputText.lastIndexOf(".");
   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=inputText.length)
   {
      return 0;
   }
   else
   {
      return 1;
   }
}

function proceedtoproduct()
{
   var countrychosen = document.getElementById("countrychosen").value; countrychosen=countrychosen.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var num=1;
   
   if (countrychosen=="none")
   {
      num=2;
   }
   
   if (num==1)
   {
      var sUrl="products1.php";
      var sData = "countrychosen="+countrychosen;
      //htmlData3(sUrl, sData); 

      $.get('products1.php?' + sData, function(data) {
              $("#txtResult3").html(data);
      }); 
      //window.location="./products1.php?countrychosen=" + countrychosen;
   }
   else
   {
      alert("NOTE: Please choose you country.");
   }
   
}


