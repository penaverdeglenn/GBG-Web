

$(document).ready(function() {


  //$('.rejectdata').submit(function() {
   //$(document).on('click', '.rejectdatasalesinquiry', function(){
      $('.submituseraccount').click(function() {
   //alert("Test");
   var chker = 0
   var username = $('.username').val();
   var password = $('.password').val();
   var fname = $('.fname').val();
   var lname = $('.lname').val();
   var gender = $('.gender').val();
   var favorite2 = [];
   var dept = $('.dept').val();
   var usertype = $('.usertype').val();
   var atLeastOneIsChecked2 = $('input[name="useraccess[]"]:checked').length > 0;
   var useraccess = [];
           $.each($("input[name='useraccess[]']:checked"), function(){
               favorite2.push($(this).val());
           });
     useraccess =  favorite2.join(",");


   var datastring = "";
   datastring = datastring + "username="+username;
   datastring = datastring + "&password="+password;
   datastring = datastring + "&fname="+fname;
   datastring = datastring + "&lname="+lname;
   datastring = datastring + "&gender="+gender;
   datastring = datastring + "&dept="+dept;
   datastring = datastring + "&usertype="+usertype;
   datastring = datastring + "&useraccess="+useraccess;

   if(username=="")
   {
     alert("Please enter Username.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(password=="")
   {
     alert("Please enter Password.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(fname=="")
   {
     alert("Please enter First Name.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(lname=="")
   {
     alert("Please enter Last Name.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(gender=="none")
   {
     alert("Please select Gender.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(dept=="none")
   {
     alert("Please select Department.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(usertype=="none")
   {
     alert("Please select User Type.");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

   if(atLeastOneIsChecked2==false)
   {
     alert("Please check a user access");
     chker = chker + 1
   }
   else
   {
     chker = chker + 0
   }

  //  alert(chker);

     if(chker == 0)
     {
         //alert(datastring);


         $.ajax({
                         type: "POST",
                         url: "functions/usercheck.php",
                         data: datastring,
                         cache: false,
                         success: function(result)
                         {
                           //alert(result);
                           if(result == 2)
                           {

                             alert("Username already exist");
                             //window.location = "userlist.php";

                           }
                           else if(result == 0)
                           {
                               $.ajax({
                                               type: "POST",
                                               url: "functions/useradd.php",
                                               data: datastring,
                                               cache: false,
                                               success: function(result)
                                               {
                                                 //alert(result);
                                                 if(result == 1)
                                                 {

                                                   alert("User Account Created");
                                                   window.location = "userlist.php";

                                                 }
                                                 else if(result == 0)
                                                 {
                                                   alert("Failed to create User Account");
                                                   window.location = "user.php";

                                                 }
                                               }
                                });

                           }
                         }
          });



     }

      });


});


$(document).ready(function() {


	//$('.rejectdata').submit(function() {
	   //$(document).on('click', '.rejectdatasalesinquiry', function(){
		  $('.rejectsalesorder').click(function() {
		 var qidr = $('.qidr').val();
		 //var reason = $('.reason').val();
		 var reason = $.trim($('#reason').val());
		 var datastring = "";
		 datastring = datastring + "qidr="+qidr;
		 datastring = datastring + "&reason="+reason;
		 //alert(datastring);
		 $.ajax({
									   type: "POST",
									   url: "functions/salesorderreject.php",
									   data: datastring,
									   cache: false,
									   success: function(result)
									   {
											 //alert(result);
											 if(result == 1)
											 {

												 alert("Sales Order Rejected");
												 window.location = "salesorderlist.php";

											 }
											 else if(result == 0)
											 {
												 alert("Failed to reject Sales Order");
												 window.location = "salesorderlist.php";

											 }
									   }
		  });



		});


  });

 $(document).ready(function() {


	//$('.rejectdata').submit(function() {
	   //$(document).on('click', '.rejectdatasalesinquiry', function(){
		  $('.rejectsalesorder2').click(function() {
		 var qidr = $('.qidr').val();
		 //var reason = $('.reason').val();
		 var reason = $.trim($('#reason').val());
		 var datastring = "";
		 datastring = datastring + "qidr="+qidr;
		 datastring = datastring + "&reason="+reason;
		 //alert(datastring);
		 $.ajax({
									   type: "POST",
									   url: "functions/salesorderreject2.php",
									   data: datastring,
									   cache: false,
									   success: function(result)
									   {
											 //alert(result);
											 if(result == 1)
											 {

												 alert("Sales Order Rejected");
												 window.location = "salesorderlist.php";

											 }
											 else if(result == 0)
											 {
												 alert("Failed to reject Sales Order");
												 window.location = "salesorderlist.php";

											 }
									   }
		  });



		});


  });

//sales order assign
$(document).ready(function() {


	$(document).on('click', '.salesorderassign', function(){
	 //   $('.quotassign').click(function() {


		 var qid = $('.qid').val();
		 var assignperson = $('.assignperson').val();
		 var datastring = "";

		 if (assignperson!="none")
		{
		 datastring = datastring + "qid="+qid;
		 datastring = datastring + "&assignedto="+assignperson;
		 $.ajax({
									   type: "POST",
									   url: "functions/salesorderassign.php",
									   data: datastring,
									   cache: false,
									   success: function(result)
									   {
											 //alert(result);
											 if(result == 1)
											 {

												 alert("Sales Order Approval Assigned");
												 window.location = "salesorderlist.php";

											 }
											 else if(result == 0)
											 {
												 alert("Failed to assign Sales Order Approval");
												 window.location = "salesorderlist.php";

											 }
									   }
						 });


		 }
		});


  });

 //sales order approver 1
 $(document).ready(function() {


	$(document).on('click', '.salesorderapprover', function(){
	 //   $('.quotassign').click(function() {


		 var qid = $('.qid').val();
		 var assignperson = $('.assignpersonapprove').val();
		 var datastring = "";
		// alert("test");
		 if (assignperson!="none")
		{
		 datastring = datastring + "qid="+qid;
		 datastring = datastring + "&assignedto="+assignperson;
		 $.ajax({
									   type: "POST",
									   url: "functions/salesorderapprove.php",
									   data: datastring,
									   cache: false,
									   success: function(result)
									   {
											// alert(result);
											 if(result == 1)
											 {

												 alert("Sales Order Approved");
												 window.location = "salesorderlist.php";

											 }
											 else if(result == 0)
											 {
												 alert("Failed to Approved Sales Order");
												 window.location = "salesorderlist.php";

											 }
									   }
						 });


		 }
		});


  });

$(document).ready(function() {


  //$('.rejectdata').submit(function() {
   //$(document).on('click', '.rejectdatasalesinquiry', function(){
      $('.salesordereditbutton').click(function() {
   //alert("Test");
       var qidr = $('.quotation_id').val();
        var soID = $('.soID').val();
   //var reason = $.trim($('#reason').val());

   if(qidr=="")
   {
     alert("Please select a quotation.");
   }
   else
   {
     var custid = $('.cust_id').val();
     var productid = $('.SI_product_id').val();
     var salesinquiryid = $('.sid').val();
     var formtype = $('.salesorderformtype').val();

     var datastring = "";
     datastring = datastring + "soID="+soID;
     datastring = datastring + "&qidr="+qidr;
     datastring = datastring + "&custid="+custid;
     datastring = datastring + "&productid="+productid;
     datastring = datastring + "&salesinquiryid="+salesinquiryid;
     datastring = datastring + "&formtype="+formtype;

     var ponum = $('.ponum').val();
     var podate = $('.podate').val();

     datastring = datastring + "&ponum="+ponum;
     datastring = datastring + "&podate="+podate;


     if(ponum=="")
     {

       alert("Please input PO Number");
     }
     else if(podate=="")
     {

       alert("Please input PO Date");
     }
     else if(formtype=="bag_form")
     {

         var bagsubstrate = $('.bagsubstrate').val();
         var bagqty = $('.bagqty').val();
         var bagwidth = $('.bagwidth').val();
         var baglength = $('.baglength').val();
         var baggusset = $('.baggusset').val();
         var bagsealportion = $('.bagsealportion').val();
         var bagpcsperbundle = $('.bagpcsperbundle').val();
         var bagothers = $('.bagothers').val();
         var bagremarks = $('.bagremarks').val();
         var bagspecinstruction = $('.bagspecinstruction').val();


         datastring = datastring + "&bagsubstrate="+bagsubstrate;
         datastring = datastring + "&bagqty="+bagqty;
         datastring = datastring + "&bagwidth="+bagwidth;
         datastring = datastring + "&baglength="+baglength;
         datastring = datastring + "&baggusset="+baggusset;
         datastring = datastring + "&bagsealportion="+bagsealportion;
         datastring = datastring + "&bagpcsperbundle="+bagpcsperbundle;
         datastring = datastring + "&bagothers="+bagothers;
         datastring = datastring + "&bagremarks="+bagremarks;
         datastring = datastring + "&bagspecinstruction="+bagspecinstruction;

       }
       else if(formtype=="roll_form")
       {

         var rollsubstratesize = $('.rollsubstratesize').val();
         var rollqty = $('.rollqty').val();
         var rollnoofouts = $('.rollnoofouts').val();
         var rollkgs = $('.rollkgs').val();
         var rollslittingwidth = $('.rollslittingwidth').val();
         var rollmeters = $('.rollmeters').val();
         var rollrepeatlength = $('.rollrepeatlength').val();
         var rollpcs = $('.rollpcs').val();
         var rollwindingdirection = $('.rollwindingdirection').val();
         var rollnoofsplice = $('.rollnoofsplice').val();
         var rolltapetouse = $('.rolltapetouse').val();
         var rollremarks = $('.rollremarks').val();
         var rollspecialinstructions = $('.rollspecialinstructions').val();

         datastring = datastring + "&rollsubstratesize="+rollsubstratesize;
         datastring = datastring + "&rollqty="+rollqty;
         datastring = datastring + "&rollnoofouts="+rollnoofouts;
         datastring = datastring + "&rollkgs="+rollkgs;
         datastring = datastring + "&rollslittingwidth="+rollslittingwidth;
         datastring = datastring + "&rollmeters="+rollmeters;
         datastring = datastring + "&rollrepeatlength="+rollrepeatlength;
         datastring = datastring + "&rollpcs="+rollpcs;
         datastring = datastring + "&rollwindingdirection="+rollwindingdirection;
         datastring = datastring + "&rollnoofsplice="+rollnoofsplice;
         datastring = datastring + "&rolltapetouse="+rolltapetouse;
         datastring = datastring + "&rollremarks="+rollremarks;
         datastring = datastring + "&rollspecialinstructions="+rollspecialinstructions;


       }
       else
       {
         alert("Please select a form type");
       }



     if(formtype!="none" && podate!="" && ponum!="")
     {
        // alert(datastring);
         $.ajax({
                         type: "POST",
                         url: "functions/salesorderupdate.php",
                         data: datastring,
                         cache: false,
                         success: function(result)
                         {
                          // alert(result);
                           if(result == 1)
                           {

                             alert("Sales Order Updated");
                             window.location = "salesorderlist.php";

                           }
                           else if(result == 0)
                           {
                             alert("Failed to update Sales Order");
                             window.location = "salesorder.php";

                           }
                         }
          });

     }
   }
      });


});



 $(document).ready(function() {


   //$('.rejectdata').submit(function() {
	  //$(document).on('click', '.rejectdatasalesinquiry', function(){
	     $('.submitsalesorder').click(function() {
		//alert("Test");
        var qidr = $('.quotation_id').val();
		//var reason = $.trim($('#reason').val());

		if(qidr=="")
		{
			alert("Please select a quotation.");
		}
		else
		{
			var custid = $('.cust_id').val();
			var productid = $('.SI_product_id').val();
			var salesinquiryid = $('.sid').val();
			var formtype = $('.salesorderformtype').val();

			var datastring = "";
			datastring = datastring + "qidr="+qidr;
			datastring = datastring + "&custid="+custid;
			datastring = datastring + "&productid="+productid;
			datastring = datastring + "&salesinquiryid="+salesinquiryid;
			datastring = datastring + "&formtype="+formtype;

			var ponum = $('.ponum').val();
			var podate = $('.podate').val();

			datastring = datastring + "&ponum="+ponum;
			datastring = datastring + "&podate="+podate;


			if(ponum=="")
			{

				alert("Please input PO Number");
			}
			else if(podate=="")
			{

				alert("Please input PO Date");
			}
			else if(formtype=="bag_form")
			{

					var bagsubstrate = $('.bagsubstrate').val();
					var bagqty = $('.bagqty').val();
					var bagwidth = $('.bagwidth').val();
					var baglength = $('.baglength').val();
					var baggusset = $('.baggusset').val();
					var bagsealportion = $('.bagsealportion').val();
					var bagpcsperbundle = $('.bagpcsperbundle').val();
					var bagothers = $('.bagothers').val();
					var bagremarks = $('.bagremarks').val();
					var bagspecinstruction = $('.bagspecinstruction').val();


					datastring = datastring + "&bagsubstrate="+bagsubstrate;
					datastring = datastring + "&bagqty="+bagqty;
					datastring = datastring + "&bagwidth="+bagwidth;
					datastring = datastring + "&baglength="+baglength;
					datastring = datastring + "&baggusset="+baggusset;
					datastring = datastring + "&bagsealportion="+bagsealportion;
					datastring = datastring + "&bagpcsperbundle="+bagpcsperbundle;
					datastring = datastring + "&bagothers="+bagothers;
					datastring = datastring + "&bagremarks="+bagremarks;
					datastring = datastring + "&bagspecinstruction="+bagspecinstruction;

				}
				else if(formtype=="roll_form")
				{

					var rollsubstratesize = $('.rollsubstratesize').val();
					var rollqty = $('.rollqty').val();
					var rollnoofouts = $('.rollnoofouts').val();
					var rollkgs = $('.rollkgs').val();
					var rollslittingwidth = $('.rollslittingwidth').val();
					var rollmeters = $('.rollmeters').val();
					var rollrepeatlength = $('.rollrepeatlength').val();
					var rollpcs = $('.rollpcs').val();
					var rollwindingdirection = $('.rollwindingdirection').val();
					var rollnoofsplice = $('.rollnoofsplice').val();
					var rolltapetouse = $('.rolltapetouse').val();
					var rollremarks = $('.rollremarks').val();
					var rollspecialinstructions = $('.rollspecialinstructions').val();

					datastring = datastring + "&rollsubstratesize="+rollsubstratesize;
					datastring = datastring + "&rollqty="+rollqty;
					datastring = datastring + "&rollnoofouts="+rollnoofouts;
					datastring = datastring + "&rollkgs="+rollkgs;
					datastring = datastring + "&rollslittingwidth="+rollslittingwidth;
					datastring = datastring + "&rollmeters="+rollmeters;
					datastring = datastring + "&rollrepeatlength="+rollrepeatlength;
					datastring = datastring + "&rollpcs="+rollpcs;
					datastring = datastring + "&rollwindingdirection="+rollwindingdirection;
					datastring = datastring + "&rollnoofsplice="+rollnoofsplice;
					datastring = datastring + "&rolltapetouse="+rolltapetouse;
					datastring = datastring + "&rollremarks="+rollremarks;
					datastring = datastring + "&rollspecialinstructions="+rollspecialinstructions;


				}
				else
				{
					alert("Please select a form type");
				}



			if(formtype!="none" && podate!="" && ponum!="")
			{
					//alert(datastring);
					$.ajax({
												  type: "POST",
												  url: "functions/salesorderadd.php",
												  data: datastring,
												  cache: false,
												  success: function(result)
												  {
														alert(result);
														if(result == 1)
														{

															alert("Sales Order Added");
															window.location = "salesorderlist.php";

														}
														else if(result == 0)
														{
															alert("Failed to add Sales Order");
															window.location = "salesorder.php";

														}
												  }
					 });

			}
		}
       });


 });






$(document).ready(function() {


$('.podate').datepicker({
		  autoHide: true,
          format: "yyyy-mm-dd"

      });

 });


$(document).ready(function() {


	$('select[name="salesorderformtype"]').on('change', function() {
		var salesorderformtype = $(this).val();
		//alert("Tesst");
		//alert(salesinquiryid);
		$("#quotID").val(quotation_id);
		//$('input[name="salesinquiryID"]').val(salesinquiryid);
		if (salesorderformtype!="none")
	   {

				if (salesorderformtype=="bag_form")
				{


						$('.bagform1').removeClass('hidden');
						$(".bagform1").show();
						$('.bagform2').removeClass('hidden');
						$(".bagform2").show();

						$(".rollform1").hide();
						$(".rollform12").hide();

				}
				else if (salesorderformtype=="roll_form")
				{


						$('.rollform1').removeClass('hidden');
						$(".rollform1").show();
						$('.rollform2').removeClass('hidden');
						$(".rollform2").show();

						$(".bagform1").hide();
						$(".bagform2").hide();


				}

		}
		else
		{
			alert("ERROR: Please select form type.");
			$("#quotationdata").hide();

		}
	});



});


$(document).ready(function() {


	$('select[name="quotation_id"]').on('change', function() {
		var quotation_id = $(this).val();
		//alert("Tesst");
		//alert(salesinquiryid);
		$("#quotID").val(quotation_id);
		//$('input[name="salesinquiryID"]').val(salesinquiryid);
		if (quotation_id!="none")
	   {
			 $.ajax({
				type: "GET",
				url: "functions/getquotation.php",
				data: {qid : quotation_id },
				success: function (data) {
						//alert(data);
						$('.quotationdata').removeClass('hidden');
						//$(".customeradd").addClass('hidden');
						$(".quotationdata").html(data);
						$("#quotationdata").show();
						//alert(data);


				}
			});
		}
		else
		{
			alert("ERROR: Please select sales inquiry.");
			$("#quotationdata").hide();

		}
	});



});

function quotationprint(custid,sid,qid)
{
    //window.location="./quotationprint.php?idno="+idno;
	window.open("./quotationprint.php?custid="+custid+"&sid="+sid+"&qid="+qid+"",'_blank');
    //window.print();
}


function salesinquiryprint(custid,sid,pid)
{
    //window.location="./quotationprint.php?idno="+idno;
	window.open("./salesinquiryprint.php?custid="+custid+"&sid="+sid+"&pid="+pid+"",'_blank');
    //window.print();
}


 $(document).ready(function() {


   //$('.rejectdata').submit(function() {
	  //$(document).on('click', '.rejectdatasalesinquiry', function(){
	     $('.rejectdataquotation').click(function() {
        var qidr = $('.qidr').val();
		//var reason = $('.reason').val();
		var reason = $.trim($('#reason').val());
		var datastring = "";
		datastring = datastring + "qidr="+qidr;
    datastring = datastring + "&reason="+reason;
		//alert(datastring);
		$.ajax({
                                      type: "POST",
                                      url: "functions/quotationreject.php",
                                      data: datastring,
									  cache: false,
                                      success: function(result)
                                      {
											//alert(result);
											if(result == 1)
											{

												alert("Quotation Rejected");
												window.location = "quotationlist.php";

											}
											else if(result == 0)
											{
												alert("Failed to reject Quotation");
												window.location = "quotationlist.php";

											}
                                      }
         });



       });


 });



$(document).ready(function() {


   //$('.approveddata').submit(function() {
	   $('.approvequotation').click(function() {
		   //alert("Test");
        var qid = $('.qidas').val();
		var assignperson =  $('.assignpersonapprove').val();
		var datastring = "";
		datastring = datastring + "qid="+qid;
        datastring = datastring + "&assignperson="+assignperson;
		$.ajax({
                                      type: "POST",
                                      url: "functions/quotationapprove.php",
                                      data: datastring,
                                      success: function(result)
                                      {
											//alert(result);
											if(result == 1)
											{

												alert("Quotation Approved");
												window.location = "quotationlist.php";

											}
											else if(result == 0)
											{
												alert("Failed to approve Quotation");
												window.location = "quotationlist.php";

											}
                                      }
                        });



       });


 });




 $(document).ready(function() {


   $(document).on('click', '.quotassign', function(){
	//   $('.quotassign').click(function() {


        var qid = $('.qid').val();
		var assignperson = $('.assignperson').val();
		var datastring = "";

		if (assignperson!="none")
	   {
        datastring = datastring + "qid="+qid;
        datastring = datastring + "&assignedto="+assignperson;
		$.ajax({
                                      type: "POST",
                                      url: "functions/quotationassign.php",
                                      data: datastring,
                                      cache: false,
                                      success: function(result)
                                      {
											//alert(result);
											if(result == 1)
											{

												alert("Quotation Approval Assigned");
												window.location = "quotationlist.php";

											}
											else if(result == 0)
											{
												alert("Failed to assign Quotation Approval");
												window.location = "quotationlist.php";

											}
                                      }
                        });


		}
       });


 });




$(document).ready(function() {


	$('select[name="salesinquiry"]').on('change', function() {
		var salesinquiryid = $(this).val();
		//alert(salesinquiryid);
		$("#salesinquiryID").val(salesinquiryid);
		//$('input[name="salesinquiryID"]').val(salesinquiryid);
		if (salesinquiryid!="none")
	   {
			 $.ajax({
				type: "GET",
				url: "functions/getsalesinquiry.php",
				data: {sid : salesinquiryid },
				success: function (data) {
					//	alert(data);
						$('.salesinquirydata').removeClass('hidden');
						//$(".customeradd").addClass('hidden');
						$(".salesinquirydata").html(data);
						$("#salesinquirydata").show();
						//alert(data);


				}
			});
		}
		else
		{
			alert("ERROR: Please select sales inquiry.");
			$("#salesinquirydata").hide();

		}
	});



});

$(document).ready(function() {


   //$('.approveddata').submit(function() {
	   $('.approvesalesinquiry').click(function() {
        var sid = $('.sid').val();
		var assignperson =  $('.assignpersonapprove').val();
		var datastring = "";
		datastring = datastring + "sid="+sid;
        datastring = datastring + "&assignperson="+assignperson;
		$.ajax({
                                      type: "POST",
                                      url: "functions/salesinquiryapprove.php",
                                      data: datastring,
                                      success: function(result)
                                      {
											//alert(result);
											if(result == 1)
											{

												alert("Sales Inquiry Approved");
												window.location = "salesinquiryview.php";

											}
											else if(result == 0)
											{
												alert("Failed to approve Sales Inquiry");
												window.location = "salesinquiryview.php";

											}
                                      }
                        });



       });


 });


 $(document).ready(function() {


   //$('.rejectdata').submit(function() {
	  //$(document).on('click', '.rejectdatasalesinquiry', function(){
	     $('.rejectdatasalesinquiry').click(function() {
        var sid = $('.sidr').val();
		//var reason = $('.reason').val();
		var reason = $.trim($('#reason').val());
		var datastring = "";
		datastring = datastring + "sid="+sid;
        datastring = datastring + "&reason="+reason;
		//alert(datastring);
		$.ajax({
                                      type: "POST",
                                      url: "functions/salesinquiryreject.php",
                                      data: datastring,
									  cache: false,
                                      success: function(result)
                                      {
											//alert(result);
											if(result == 1)
											{

												alert("Sales Inquiry Rejected");
												window.location = "salesinquiryview.php";

											}
											else if(result == 0)
											{
												alert("Failed to reject Sales Inquiry");
												window.location = "salesinquiryview.php";

											}
                                      }
         });



       });


 });




 $(document).ready(function() {


   $(document).on('click', '.assignapproversi', function(){
        var sid = $('.sid').val();
		var assignperson = $('.assignperson').val();
		var datastring = "";
        datastring = datastring + "sid="+sid;
        datastring = datastring + "&assignedto="+assignperson;
		$.ajax({
                                      type: "POST",
                                      url: "functions/salesinquiryassign.php",
                                      data: datastring,
                                      cache: false,
                                      success: function(result)
                                      {
											alert(result);
											if(result == 1)
											{

												alert("Sales Inquiry Assigned");
												window.location = "salesinquiryview.php";

											}
											else if(result == 0)
											{
												alert("Failed to assign Sales Inquiry");
												window.location = "salesinquiryview.php";

											}
                                      }
                        });



       });


 });

$(document).ready(function() {





   $('.submitsalesinquiry').click(function() {
	 // $(document).on('click', '.submitsalesinquiry', function(){
        var customer = $('.customerdropdown').val();
		var product = $('.productdropdown').val();
		var checker = 0;
		var atLeastOneIsChecked = $('input[name="chk[]"]:checked').length > 0;
		var favorite = [];
		var form_data = new FormData();
		var fileSelect = document.getElementById('inputfile');
		var files = fileSelect.files;
		//var files = $('input', '#inputfile')[0].files;
		var mfgprocess = [];
            $.each($("input[name='chk[]']:checked"), function(){
                favorite.push($(this).val());
            });
			mfgprocess =  favorite.join(",");

		if(customer=="none")
		{
			alert("Please select customer");
			var checker = checker +1;
		}
		else if(product=="none")
		{
			alert("Please select product");
			var checker = checker +1;
		}
		else if(atLeastOneIsChecked==false)
		{
			alert("Please check a manufacturing process");
			var checker = checker +1;
		}
		else if( document.getElementById("inputfile").files.length == 0 ){
			alert("Please attach an image");
			var checker = checker +1;
		}
		else
		{
			//alert("TEST");
			$.ajax({
			type: "POST",
			url: "salesinquirysession.php",
			cache: false,
			success: function(record)
			{
			  //alert(record);
			  if(record==0)
			  {
				alert("Please add items in material");
				var checker = checker +1;
			  }
			  else
			  {

				  //alert("TEST");
				 for (var i = 0; i < files.length; i++) {
					var file = files[i];
					// Check the file type.
					if (!file.type.match('image.*')) {
						continue;
					}
					// Add the file to the request.
					form_data.append('file[]', files[i]);
				}

				 form_data.append("customer", customer);
				 form_data.append("product", product);
				 form_data.append("mfgprocess", mfgprocess);
				 //alert(form_data);
				 //var sData = "customer=" + customer  + "&product=" + product + "&mfgprocess=" + mfgprocess + "&files=" + form_data;
				 //alert(sData);
				 $.ajax({
                                      type: "POST",
                                      url: "functions/salesinquiryadd.php",
                                      data: form_data,
                                      cache: false,
									  processData: false,
									  contentType: false,
                                      success: function(result)
                                      {

											//alert(result);
											//alert("Sales Inquiry Added");
											if(result == 1)
											{

												alert("Sales Inquiry Added");
                        window.location = "salesinquiryview.php";


											}
											else if(result == 0)
											{
												alert("Failed to add Sales Inquiry");
                        window.location = "salesinquiryview.php";

											}
                                      }
                        });
			  }

			}

			});

		}


       });





$('select[name="customer"]').on('change', function() {
    var customerid = $(this).val();
	if (customerid!="none")
   {
		 $.ajax({
			type: "GET",
			url: "functions/getcustomer.php",
			data: {customerid : customerid },
			success: function (data) {

					$('.customerdata').removeClass('hidden');
					$(".customeradd").addClass('hidden');
					$(".customerdata").html(data);
					$("#customerdata").show();

					$.ajax({
					type: "POST",
					url: "functions/getproduct.php",
					data: {customerid : customerid },
					success: function (data1) {
							$(".productdropdown").html(data1);

					}
					});

			}
		});
	}
    else
    {
        alert("ERROR: Please select customer.");
        $("#customerdata").hide();

    }
});


$('select[name="product"]').on('change', function() {
    var productID = $(this).val();

	if (productID!="none")
   {
		 $.ajax({
			type: "GET",
			url: "functions/getproductdata.php",
			data: {productID : productID },
			success: function (data) {

					$('.productdata').removeClass('hidden');
					$(".productadd").addClass('hidden');
					$(".productdata").html(data);
					$("#productdata").show();

			}
		});
	}
    else
    {
		$("#productdata").hide();
        alert("ERROR: Please select product.");


    }
});







});




$(function() {
       $('.createcust').click(function() {
        $('.customeradd').removeClass('hidden');
		$(".customerdata").addClass('hidden');
       });
   });

  $(function() {
       $('.createprod').click(function() {
        $('.productadd').removeClass('hidden');
		$(".productdata").addClass('hidden');
       });
   });


$(function() {
       $('.btnRight').click(function() {
        var selectedOpts = $(".lstBox1 option:selected");
		if (selectedOpts.length == 0) {
				alert("Nothing to move.");
		}
		$(".lstBox2").append($(selectedOpts).clone());
		$(selectedOpts).remove();
       });

	   $(".btnAllRight").click(function (e) {
		var selectedOpts = $(".lstBox1 option");
		if (selectedOpts.length == 0) {
		  alert("Nothing to move.");
		}
		$(".lstBox2").append($(selectedOpts).clone());
		$(selectedOpts).remove();
	  });

		$(".btnLeft").click(function (e) {
			var selectedOpts = $(".lstBox2 option:selected");
			if (selectedOpts.length == 0) {
			alert("Nothing to move.");
		}
		$(".lstBox1").append($(selectedOpts).clone());
			$(selectedOpts).remove();
		});

		$(".btnAllLeft").click(function (e) {
			var selectedOpts = $(".lstBox2 option");
			if (selectedOpts.length == 0) {
			alert("Nothing to move.");
		}
		$(".lstBox1").append($(selectedOpts).clone());
			$(selectedOpts).remove();
		});


});


   function populateCustomerdropdown(value)
{

    $.get('functions/getdropdowncustomer.php', function(data) {
            $("#customer").html(data);

        });
}



   $(function() {

	$('.materialdata').selectpicker();

/*  var $validator = $("#custadddata").validate({
		debug: true,
		messages: {},
		errorElement : 'div',
		errorLabelContainer: '.errorTxt',
		  rules: {
		    custnameval: {
		      required: true
		    },
		    custrepval: {
		      required: true
		    },
		    custcontval: {
		      required: true,
			  number: true
		    },
		    custaddval: {
		      required: true
		    },
		    custemailval: {
		      required: true
		    }
		  }
		});
	*/
$('#custadddata').submit(function(e){
				e.preventDefault();
				$("#custadddata").validate();
				var values = [];
				var custaddval = $('.custaddval').val();
	  			var custrepval  = $('.custrepval').val();
				var custnameval  = $('.custnameval').val();
				var custcontval  = $('.custcontval').val();
				var custemailval  = $('.custemailval').val();

				values.push(custnameval);
				values.push(custrepval);
				values.push(custemailval);
				values.push(custcontval);
				values.push(custaddval);


				if(custnameval == "" || custrepval == "" || custemailval == "" || custcontval == "" || custaddval == "")
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

					var dataString = 'values='+ values;

						$.ajax({
						  type: "POST",
						  url: "functions/customeradd.php",
						  data: dataString,
						  cache: false,
						  success: function(result)
						  {

							 if(result == 1)
							{

								$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Customer Added!");
								$("#notitext").attr("class","alert alert-danger");
								$("#notif").show('slow');
									setTimeout(function(){
										$('#notif').hide('slow');
									},4000);

										$.ajax({
											type: "POST",
											url: "functions/getdropdowncustomer.php",
											cache: false,
											success: function(data){
												$('.customerdropdown').html(data);

											}
										});




							}
							else if(result == 0)
							{
								$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Please Try Again");
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





$('#prodadddata').submit(function(e){
//$(".prodsubmit").click(function(){
				e.preventDefault();

				//$("#prodadddata").validate();
				var values = [];
				var customerid = $('.customerdropdown option:selected').val()
				var prodnameval = $('.prodnameval').val();
	  			var prodsizeval  = $('.prodsizeval').val();
				var prodmattypeval  = $('.prodmattypeval').val();
				var prodmatval = "Test";
				var prodimgval = "Test";
				var prodmfgval = "Test";


				values.push(customerid);
				values.push(prodnameval);
				values.push(prodmatval);
				values.push(prodsizeval);
				values.push(prodmattypeval);
				values.push(prodimgval);
				values.push(prodmfgval);


			if(customerid == "none")
			{
					$("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Please select a customer first");
					$("#notitext2").attr("class","alert alert-danger");
					$("#notif2").show('slow');
					 setTimeout(function(){
					 $('#notif2').hide('slow');
					},4000)

			}
			else
			{
				if(prodnameval == "" || prodsizeval == "" || prodmattypeval == "")
				{
					$("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Please fill the fields");
					$("#notitext2").attr("class","alert alert-danger");
					$("#notif2").show('slow');
					 setTimeout(function(){
					 $('#notif2').hide('slow');
					},4000);
				}
				else
				{

					var dataString = 'values='+ values;

						$.ajax({
						  type: "POST",
						  url: "functions/productadd.php",
						  data: dataString,
						  cache: false,
						  success: function(result)
						  {

							 if(result == 1)
							{

								$("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Product Added!");
								$("#notitext2").attr("class","alert alert-danger");
								$("#notif2").show('slow');
									setTimeout(function(){
										$('#notif2').hide('slow');
									},4000);

									$.ajax({
										type: "POST",
										url: "functions/getproduct.php",
										data: {customerid : customerid },
										success: function (data1) {

												$(".productdropdown").html(data1);

										}
										});




							}
							else if(result == 0)
							{
								$("#notitext2").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed! Please Try Again");
								$("#notitext2").attr("class","alert alert-danger");
								$("#notif").show('slow');
									setTimeout(function(){
										$('#notif2').hide('slow');
									},4000);


							}
						 }
					});
				}
			}

});



  $(".test").click(function(){

   var selected = $(".materialdata :selected").map((_, e) => e.value).get();


  //alert(selected);
  });



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




$(document).ready(function() {
    $('.selecttable').select2();
});



function addMaterial()
{
  var inv = document.getElementById('inv').value; inv=inv.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
  //var invname =	$('#inv option:selected').text();

  var checker=1;
  if (inv == "")
  {
        document.getElementById("inv").style.border='1px solid red';
		checker=3;
  }
  else
  {
        document.getElementById("inv").style.border='1px solid #c8c8c8';
  }




  document.getElementById('inv').value = "";


  if (checker==1)
  {

		$.get('functions/addmaterial.php?inv='+inv, function(data) {
			//alert(data);
			$(".txtResult1").html(data);

	     });
  }
  else
  {
     alert("ERROR: Item already added.");
  }

}


function deleteMaterial(num)
{



    $.get('functions/deletematerial.php?num='+num, function(data) {

			$(".txtResult1").html(data);

	});

}

$(document).ready(function() {


	//$('.rejectdata').submit(function() {
	 //$(document).on('click', '.rejectdatasalesinquiry', function(){
		$('.submitedituseraccount').click(function() {
	 //alert("Test");
	 var chker = 0
	 //var username = $('.username').val();
	// var password = $('.password').val();
	// var fname = $('.fname').val();
	// var lname = $('.lname').val();
	// var gender = $('.gender').val();
	var id = $('.id').val();
	 var favorite2 = [];
	 var dept = $('.dept').val();
	 var usertype = $('.usertype').val();
	 var atLeastOneIsChecked2 = $('input[name="useraccess[]"]:checked').length > 0;
	 var useraccess = [];
			 $.each($("input[name='useraccess[]']:checked"), function(){
				 favorite2.push($(this).val());
			 });
	   useraccess =  favorite2.join(",");

	 var datastring = "";
	 //datastring = datastring + "username="+username;
	 //datastring = datastring + "&password="+password;
	 //datastring = datastring + "&fname="+fname;
	// datastring = datastring + "&lname="+lname;
	// datastring = datastring + "&gender="+gender;
	 datastring = datastring + "id="+id;
	 datastring = datastring + "&dept="+dept;
	 datastring = datastring + "&usertype="+usertype;
	 datastring = datastring + "&useraccess="+useraccess;


	 if(dept=="none")
	 {
	   alert("Please select Department.");
	   chker = chker + 1
	 }
	 else
	 {
	   chker = chker + 0
	 }

	 if(usertype=="none")
	 {
	   alert("Please select User Type.");
	   chker = chker + 1
	 }
	 else
	 {
	   chker = chker + 0
	 }

	 if(atLeastOneIsChecked2==false)
	 {
	   alert("Please check a user access");
	   chker = chker + 1
	 }
	 else
	 {
	   chker = chker + 0
	 }

	//  alert(chker);

	   if(chker == 0)
	   {
		  // alert(datastring);


		   $.ajax({
						   type: "POST",
						   url: "functions/useredit.php",
						   data: datastring,
						   cache: false,
						   success: function(result)
						   {
							// alert(result);
							 if(result == 1)
							 {

							   alert("User Account Edited");
							   window.location = "userlist.php";

							 }
							 else if(result == 0)
							 {
							   alert("Failed to edit User Account");
							   window.location = "user.php";

							 }
						   }
			});



	   }

		});


  });
