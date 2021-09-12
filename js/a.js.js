
//gie
$(document).ready(function() {



	$(".imgHref").click(function(e) {
	e.preventDefault();
	var i = $(this).attr("id");
	alert("You have clicked banner "+i);
	i = "id=" + i; 
	
		
		$.ajax({
		type: "POST",
		url: "a.getMainBanner.php",
		data: i,
		cache: false,
			success: function(result){
			
			var res = result.split("|");
					$("#imgName").attr("value",res[3]);//input
					$("#imgDesc").html(res[5]);//textarea
					//selected rank
				if(res[1] == 1)
					{$("#img1").attr('selected','true');}
				else if(res[1] == 2)
					{$("#img2").attr('selected','true');}
				else if(res[1] == 3)
					{$("#img3").attr('selected','true');}
				else if(res[1] == 4)
					{$("#img4").attr('selected','true');}
				else if(res[1] == 5)
					{$("#img5").attr('selected','true');}
				else if(res[1] == 6)
					{$("#img6").attr('selected','true');}
				else if(res[1] == 7)
					{$("#img7").attr('selected','true');}
				else if(res[1] == 8)
					{$("#img8").attr('selected','true');}
				else if(res[1] == 9)
					{$("#img9").attr('selected','true');}
				else if(res[1] == 10)
					{$("#img10").attr('selected','true');}
				else if(res[1] == 11)
					{$("#img11").attr('selected','true');}
				else if(res[1] == 12)
					{$("#img12").attr('selected','true');}
				else if(res[1] == 13)
					{$("#img13").attr('selected','true');}
				else if(res[1] == 14)
					{$("#img14").attr('selected','true');}
				else if(res[1] == 15)
					{$("#img15").attr('selected','true');}
				
				//selected show
				if(res[4] == "yes")
					{$("#yes").attr('selected','true');}
				else if(res[4] == "no")
					{$("#no").attr('selected','true');}
				
				//image
				if(res[2] == "none")//img
				{
					$("#banerImgArea").attr('src','uploads/nobanner.jpg');
					$("#hiddenImgName").attr('value','nobanner.jpg');
					
					
				}
				else
				{
					$("#banerImgArea").attr('src','images/mainbanner/'+res[2]);
					$("#hiddenImgName").attr('value',res[2]);
			
					
				}
				
				
			}	
			});	
		
	});		
				

	$(".delImg").click(function(e) {
		e.preventDefault();
	
		var d = $(this).attr("id");
		d=d.replace("d"," ");
		d = "id=" + d; 
		
		
		$.confirm({
      'title'   : 'Edit Confirmation',
      'message' : 'You are about to save changes that you edit to this item. <br/>Continue?',
      'buttons' : {
        'Yes' : {
          'class' : 'blue',
          'action': function(){
		  
		  
		  
	
										$.ajax({
										type: "POST",
										url: "a.delBanner.php",
										data: d,
										cache: false,
											success: function(result){
													imgRankTbl();
										} 
										});
			}
			},
			'No'  : {
			  'class' : 'gray',
			  'action': function(){}  // Nothing to do in this case. You can as well omit the action property.
			}
		  }
		});
		
		
		
		
	});
	
	
});
  
//companyInfo
 
 //update
 
  function companyUpdateInfo()
 {
	var id = document.getElementById("id").value;
		id=id.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var name = document.getElementById("companyName").value;
		name=name.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var shortname = document.getElementById("companySName").value;
		shortname=shortname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var address = document.getElementById("companyAddress").value;
		address=address.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var city = document.getElementById("companyCity").value;
		city=city.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var country = document.getElementById("companyCountry").value;
		country=country.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var conNo = document.getElementById("conNo").value;
	var email = document.getElementById("email").value;
		
		
	var checker=1;
	if (name == "")  { document.getElementById("companyName").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("companyName").style.border='1px solid #c8c8c8'; }
	if (shortname == "")  { document.getElementById("companySName").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("companySName").style.border='1px solid #c8c8c8'; }
	if (address == "")  { document.getElementById("companyAddress").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("companyAddress").style.border='1px solid #c8c8c8'; }
	if (city == "")  { document.getElementById("companyCity").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("companyCity").style.border='1px solid #c8c8c8'; }
	if (country == "")  { document.getElementById("companyCountry").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("companyCountry").style.border='1px solid #c8c8c8'; }
	if (conNo == "")  { document.getElementById("conNo").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("conNo").style.border='1px solid #c8c8c8'; }
	if (email == "")  { document.getElementById("email").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("email").style.border='1px solid #c8c8c8'; }


	 
	if (checker==1)
    {
      window.location="a.processprofileUpdate.php?&id=" + id + "&name=" + name  + "&shortname=" + shortname   + "&address=" + address  + "&city=" + city + "&country=" + country + "&conNo=" + conNo + "&email=" + email;
   }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
		
 }
 
  function socialUpdateInfo()
 {
	var idno = document.getElementById("idno").value;
		idno=idno.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var fb = document.getElementById("fb").value;
		fb=fb.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var ig = document.getElementById("ig").value;
		ig=ig.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var tw = document.getElementById("tw").value;
		tw=tw.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
		
	var checker=1;
	if (fb == "")  { document.getElementById("fb").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("fb").style.border='1px solid #c8c8c8'; }
	if (ig == "")  { document.getElementById("ig").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("ig").style.border='1px solid #c8c8c8'; }
	if (tw == "")  { document.getElementById("tw").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("tw").style.border='1px solid #c8c8c8'; }

	 
	if (checker==1)
    {
      window.location="a.processsocialUpdate.php?&idno=" + idno + "&fb=" + fb  + "&ig=" + ig   + "&tw=" + tw;
   }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
		
 }
 
 //MESSAGE
 
   function messageAddInfo()
 {
	var msgby = document.getElementById("msgby").value;
		msgby=msgby.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var msg = document.getElementById("msg").value;
		msg=msg.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var itemNum = document.getElementById("itemNum").value;
		itemNum=itemNum.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var show = document.getElementById("show").value;
		show=show.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
		
	var checker=1;
	if (msgby == "") { document.getElementById("msgby").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("msgby").style.border='1px solid #c8c8c8'; }
	if (msg == "")  { document.getElementById("msg").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("msg").style.border='1px solid #c8c8c8'; }
	if (itemNum == "")  { document.getElementById("itemNum").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("itemNum").style.border='1px solid #c8c8c8'; }
	if (show == "")  { document.getElementById("show").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("show").style.border='1px solid #c8c8c8'; }

	 
	if (checker==1)
    {
      window.location="a.processmessage1.php?&msgby=" + msgby  + "&msg=" + msg + "&itemNum=" + itemNum + "&show=" + show;
   }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
		
 }
 
 
  function bannerAddInfo()
 {
	
	var bannerImage = document.getElementById("bannerImage").value;
		bannerImage=bannerImage.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var hiddenImgName = document.getElementById("hiddenImgName").value;
		hiddenImgName=hiddenImgName.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var imgRank = document.getElementById("imgRank").value;
		imgRank=imgRank.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var show = document.getElementById("show").value;
		show=show.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var imgName = document.getElementById("imgName").value;
		imgName=imgName.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var imgDesc = document.getElementById("imgDesc").value;
		imgDesc=imgDesc.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
		
	var checker=1;
	if ((bannerImage == "")&&(hiddenImgName == ""))  { document.getElementById("bannerImgArea").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("banerImgArea").style.border='1px solid #c8c8c8'; }
	if (imgRank == "")  { document.getElementById("imgRank").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("imgRank").style.border='1px solid #c8c8c8'; }
	if (show == "")  { document.getElementById("show").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("show").style.border='1px solid #c8c8c8'; }
	if (imgName == "")  { document.getElementById("imgName").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("imgName").style.border='1px solid #c8c8c8'; }
	if (imgDesc == "")  { document.getElementById("imgDesc").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("imgDesc").style.border='1px solid #c8c8c8'; }
		
	bannerImage = bannerImage.split("\\");
	
	 if (checker==1)
     {
      window.location="a.processbanner.php?&imgName=" + imgName + "&imgDesc=" + imgDesc  + "&imgRank=" + imgRank   + "&show=" + show  + "&bannerImage=" + bannerImage[2] + "&hiddenImg=" + hiddenImgName;
	 }
	 else
	 {
       alert("ERROR: Please make sure all values entered are correct.");
	 }
		
 }
 
 //company profile
 
 
  function companyprofileInfo()
 {
	
	var idpc = document.getElementById("idpc").value;
		idpc=idpc.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
	var profileImg = document.getElementById("profileImg").value;
		profileImg=profileImg.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var hiddenImgPath = document.getElementById("hiddenImgPath").value;
		hiddenImgPath=hiddenImgPath.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
		
	var compprof1 = document.getElementById("compprof");
	var compprof = compprof1.innerHTML;
		
		
	var checker=1;
	if ((profileImg == "")&&(hiddenImgPath == "")) { document.getElementById("profileImg").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("profileImg").style.border='1px solid #c8c8c8'; }
	if (compprof == "")  { document.getElementById("compprof").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("compprof").style.border='1px solid #c8c8c8'; }
	

	var profileImg = profileImg.split("\\");
	if (checker==1)
    {
		if(profileImg[2] == undefined)
		{
			profileImg[2] = hiddenImgPath;
		}
		
		 var dataString = "&idpc=" + idpc + "&profileImg=" + profileImg[2] + "&compprof=" + compprof;
		 
			$.ajax({
					type: "POST",
					url: "a.companyprofileprocess.php",
					data: dataString,
					cache: false,
					success: function(result){

						window.location=result;
					}
					
					});//ajax end
					
		// window.location="a.companyprofile.php?&idpc=" + idpc + "&profileImg=" + profileImg[2] + "&compprof=" + compprof;
	}
    else
    {
      alert("ERROR: Please make sure all values entered are correct.");
    }
 
 }
 
 
   function missionvisioninfo()
 {
		
	var idmv = document.getElementById("idmv").value;
		idmv=idmv.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
	var mvImg = document.getElementById("mvImg").value;
		mvImg=mvImg.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var hiddenImgPath = document.getElementById("hiddenImgPath").value;
		hiddenImgPath=hiddenImgPath.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
		
	var vision1 = document.getElementById("vision");
	var vision = vision1.innerHTML;
		
	var mission1 = document.getElementById("mission");
	var mission = mission1.innerHTML;
		

	var checker=1;
	if ((mvImg == "")&&(hiddenImgPath == "")) { document.getElementById("mvImg").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("mvImg").style.border='1px solid #c8c8c8'; }
	if (vision == "")  { document.getElementById("vision").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("vision").style.border='1px solid #c8c8c8'; }
	if (mission == "")  { document.getElementById("mission").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("mission").style.border='1px solid #c8c8c8'; }
	 
	var mvImg = mvImg.split("\\");
	
	if (checker==1)
    {
		if(mvImg[2] == undefined)
		{
			mvImg[2] = hiddenImgPath;
			
		}
		
		var dataString = "&idmv=" + idmv + "&mvImg=" + mvImg[2] + "&vision=" + vision + "&mission=" + mission;

			$.ajax({
					type: "POST",
					url: "a.missionvisionprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
		
						window.location=result;
					}
					
					});//ajax end
					
		// window.location="a.missionvisionprocess.php?&idmv=" + idmv + "&mvImg=" + mvImg[2] + "&vision=" + vision + "&mission=" + mission;
	}
    else
    {
      alert("ERROR: Please make sure all values entered are correct.");
    }
 
 
 }
 
 
 //useful links
 
   function companypolicy()
 {
	
	var idcp = document.getElementById("idcp").value;
		idcp=idcp.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
	
	var description1 = document.getElementById("description");
	var description = description1.innerHTML;

	var checker=1;
	if (description == "")  { document.getElementById("description").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("description").style.border='1px solid #c8c8c8'; }
	 
	if (checker==1)
    {
		var dataString = "&idcp=" + idcp + "&description=" + description;

			$.ajax({
					type: "POST",
					url: "a.companypolicyprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
					
						window.location=result;

					}
					});//ajax end
	  }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
		
 }  

 function privacyandsecurity()
 {
	
	var idp = document.getElementById("idp").value;
		idp=idp.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
	
	var description1 = document.getElementById("description");
	var description = description1.innerHTML;

	var checker=1;
	if (description == "")  { document.getElementById("description").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("description").style.border='1px solid #c8c8c8'; }
	 
	if (checker==1)
    {
	 var dataString = "&idp=" + idp + "&description=" + description;
			$.ajax({
					type: "POST",
					url: "a.privacyprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
		
						window.location=result;
					}
					
					});//ajax end
      // window.location="a.privacyprocess.php?&idp=" + idp + "&description=" + description;
	  }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
 
 }
 
   function termofuse()
 {
	
	var idt = document.getElementById("idt").value;
		idt=idt.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
	
	var description1 = document.getElementById("description");
	var description = description1.innerHTML;
	
	var checker=1;
	if (description == "")  { document.getElementById("description").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("description").style.border='1px solid #c8c8c8'; }
	 
	if (checker==1)
    {
	 var dataString = "&idt=" + idt + "&description=" + description;
			$.ajax({
					type: "POST",
					url: "a.termprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
		
						window.location=result;
					}
					
					});//ajax end
      // window.location="a.termprocess.php?&idt=" + idt + "&description=" + description;
	  }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
 
 }
 
  
   function legal()
 {
	
	var idl = document.getElementById("idl").value;
		idl=idl.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 

	var description1 = document.getElementById("description");
	var description = description1.innerHTML;
	
	var checker=1;
	if (description == "")  { document.getElementById("description").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("description").style.border='1px solid #c8c8c8'; }
	 
	if (checker==1)
    {
	 var dataString = "&idl=" + idl + "&description=" + description;

			$.ajax({
					type: "POST",
					url: "a.legalprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
		
						window.location=result;
					}
					
					});//ajax end
      // window.location="a.legalprocess.php?&idl=" + idl + "&description=" + description;
	  }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
 
 }
 
    function disclaimer()
 {
	
	var idd = document.getElementById("idd").value;
		idd=idd.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
	
	var description1 = document.getElementById("description");
	var description = description1.innerHTML;

	var checker=1;
	if (description == "")  { document.getElementById("description").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("description").style.border='1px solid #c8c8c8'; }
	 
	if (checker==1)
    {
	 var dataString = "&idd=" + idd + "&description=" + description;

			$.ajax({
					type: "POST",
					url: "a.disclaimerprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
		
						window.location=result;
					}
					
					});//ajax end
      // window.location="a.disclaimerprocess.php?&idd=" + idd + "&description=" + description;
	 
	 }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
 
 }

     function prodpolicy()
 {
	
	var idpdp = document.getElementById("idpdp").value;
		idpdp=idpdp.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,""); 
		
	var product1 = document.getElementById("product");
	var product = product1.innerHTML;

	var distributor1 = document.getElementById("distributor");
	var distributor = distributor1.innerHTML;

	var checker=1;
	if (product == "")  { document.getElementById("product").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("product").style.border='1px solid #c8c8c8'; }
	if (distributor == "")  { document.getElementById("distributor").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("distributor").style.border='1px solid #c8c8c8'; }
	 
	if (checker==1)
    {
	 var dataString = "&idpdp=" + idpdp + "&product=" + product + "&distributor=" + distributor;

			$.ajax({
					type: "POST",
					url: "a.productpolicyprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
		
						window.location=result;
					}
					
					});//ajax end
      // window.location="a.productpolicyprocess.php?&idpdp=" + idpdp + "&product=" + product + "&distributor=" + distributor;
	  }
   else
   {
      alert("ERROR: Please make sure all values entered are correct.");
   }
 
 }
 
 
 //image table

  function imgRankTbl()
 {

 	$.get('a.settingsImgList.php?', function(data) {
		$("#imgBannerList").html(data);
	});
}


  
  
  //message table
  
   function msgTbl()
 {

 	$.get('a.settingsMsgList.php?', function(data) {
		$("#msgTblList").html(data);
	});
	}
$(document).ready(function() {

		$(".msgHref").click(function(e){
		e.preventDefault();
		var msg = $(this).attr("id");
		msg = "id=" + msg; 
		
		$.ajax({
		type: "POST",
		url: "a.getMainMessage.php",
		data: msg,
		cache: false,
			success: function(result){
			
			var res = result.split("|");
					$("#msgby").attr("value",res[2]);//input
					$("#msg").html(res[3]);//textarea
					
					//selected rank
			if(res[1] == 1)
					{$("#msg1").attr('selected','true');}
				else if(res[1] == 2)
					{$("#msg2").attr('selected','true');}
				else if(res[1] == 3)
					{$("#msg3").attr('selected','true');}
				else if(res[1] == 4)
					{$("#msg4").attr('selected','true');}
				else if(res[1] == 5)
					{$("#msg5").attr('selected','true');}

				//selected show
				if(res[4] == "yes")
					{$("#yes").attr('selected','true');}
				else if(res[4] == "no")
					{$("#no").attr('selected','true');}
				
				//image
			}	});	
			
		});		
					


	$(".delMsg").click(function(e) {
		var m = $(this).attr("id");
		m=m.replace("m"," ");
		m = "id=" + m; 
		e.preventDefault();
		
		$.confirm({
      'title'   : 'Edit Confirmation',
      'message' : 'You are about to save changes that you edit to this item. <br/>Continue?',
      'buttons' : {
        'Yes' : {
          'class' : 'blue',
          'action': function(){
		  
						$.ajax({
						type: "POST",
						url: "a.delMessage.php",
						data: m,
						cache: false,
							success: function(result){

								msgTbl();	
								alert("Item deleted");
				  
				} });
				
				
				
				}
				},
				'No'  : {
				  'class' : 'gray',
				  'action': function(){}  // Nothing to do in this case. You can as well omit the action property.
				}
			  }
			});
	
	
	
	
	
	
	});
	
	
	
});
//blogs

  function companybloginfo()
 {
	
	var image1 = document.getElementById("image1").value;
		image1=image1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	// var image2 = document.getElementById("image2").value;
		// image2=image2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");	
	var hiddenImgName = document.getElementById("hiddenImgName").value;
		hiddenImgName=hiddenImgName.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");	
	// var hiddenImgName1 = document.getElementById("hiddenImgName1").value;
		// hiddenImgName1=hiddenImgName1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var blogNum = document.getElementById("blogNum").value;
		blogNum=blogNum.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
	var blogshow = document.getElementById("blogshow").value;
		blogshow=blogshow.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");	
	var blogname = document.getElementById("blogname").value;
		blogname=blogname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
		
	var blogdesc1 = document.getElementById("blogdesc");
	var blogdesc = blogdesc1.innerHTML;

	var checker=1;
	if ((image1 == "")&&(hiddenImgName == ""))  { document.getElementById("bannerImgArea").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("banerImgArea").style.border='1px solid #c8c8c8'; }
	// if ((image2 == "")&&(hiddenImgName == ""))  { document.getElementById("bannerImgArea").style.border='1px solid red'; checker=2; }
	 // else { document.getElementById("banerImgArea1").style.border='1px solid #c8c8c8'; }
	if (blogNum == "")  { document.getElementById("blogNum").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("blogNum").style.border='1px solid #c8c8c8'; }
	if (blogshow == "")  { document.getElementById("blogshow").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("blogshow").style.border='1px solid #c8c8c8'; }
	if (blogname == "")  { document.getElementById("blogname").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("blogname").style.border='1px solid #c8c8c8'; }
	if (blogdesc == "")  { document.getElementById("blogdesc").style.border='1px solid red'; checker=2; }
	 else { document.getElementById("blogdesc").style.border='1px solid #c8c8c8'; }

	image1 = image1.split("\\");	
	// image2 = image2.split("\\");
	
	 if (checker==1)
     {
	 
	 var dataString = "&blogname=" + blogname + "&blogdesc=" + blogdesc  + "&blogNum=" + blogNum  + "&blogshow=" + blogshow  + "&image1=" + image1[2] + "&hiddenImgName=" + hiddenImgName;

			$.ajax({
					type: "POST",
					url: "a.blogprocess.php",
					data: dataString,
					cache: false,
					success: function(result){
						
						window.location=result;
					}
					
					});//ajax end
					
      // window.location="a.blogprocess.php?&blogname=" + blogname + "&blogdesc=" + blogdesc  + "&blogNum=" + blogNum   + "&blogshow=" + blogshow  + "&image2=" + image2[2] + "&image1=" + image1[2] + "&hiddenImgName1=" + hiddenImgName1 + "&hiddenImgName=" + hiddenImgName;
	  
	 }
	 else
	 {
       alert("ERROR: Please make sure all values entered are correct.");
	 }
		
 }
 


function blogTbl()
{

 	$.get('a.bloglist.php?', function(data) {
		$("#blogTblList").html(data);
	});
}
$(document).ready(function() {


	    $("#image1").on("change", function()
	    {
	        var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
	 
	        if (/^image/.test( files[0].type)){ // only image file
	            var reader = new FileReader(); // instance of the FileReader
	            reader.readAsDataURL(files[0]); // read the local file;
	            reader.onloadend = function(){ // set image data as background of div
	                $("#hiddenImgName").val(files[0].name);
	            }
	        }
	    });

	    $("#bannerImage").on("change", function()
	    {
	        var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
	 
	        if (/^image/.test( files[0].type)){ // only image file
	            var reader = new FileReader(); // instance of the FileReader
	            reader.readAsDataURL(files[0]); // read the local file;
	            reader.onloadend = function(){ // set image data as background of div
	                $("#hiddenImgName").val(files[0].name);
	            }
	        }
	    });




		$(".blogHref").click(function(){
		var msg = $(this).attr("id");
		msg = "id=" + msg; 
		$(".bootstrapimg").attr('style','z-index:-1');
		$(".fileupload-preview").attr('style','z-index:-1');
		
		var id = $(".note-editable").parent().prev().attr('id');
		// $("#"+id).html(thistext);
		$("#"+id).removeAttr("id");
		$(".note-editable").attr("id",id);

		$.ajax({
		type: "POST",
		url: "a.blogGetList.php",
		data: msg,
		cache: false,
		success: function(result){
			
			var res = result.split("|");
					$("#blogname").attr("value",res[3]);//input
					$("#blogdesc").html(res[4]);//textarea
			
					//selected rank
			if(res[1] == 1)
					{$("#b1").attr('selected','true');}
				else if(res[1] == 2)
					{$("#b2").attr('selected','true');}
				else if(res[1] == 3)
					{$("#b3").attr('selected','true');}
				else if(res[1] == 4)
					{$("#b4").attr('selected','true');}


				//selected show
				if(res[5] == "yes")
					{$("#yes").attr('selected','true');}
				else if(res[5] == "no")
					{$("#no").attr('selected','true');}
				
				//image

				if(res[2] == "none")//img
				{
					$("#banerImgArea").attr('src','uploads/noimage.jpg');
					$("#hiddenImgName").attr('value','noimage.jpg');
					
					
				}
				else
				{
					$("#banerImgArea").attr('src','images/blogs/'+res[2]);
					$("#hiddenImgName").attr('value',res[2]);
					
					
				}
				
	
			}	});	
		});		
					


	$(".delblog").click(function(e) {
	
	var m = $(this).attr("id");
	// m=m.replace("m"," ");
	m = "id=" + m; 
				
	e.preventDefault();
	 $.confirm({
      'title'   : 'Edit Confirmation',
      'message' : 'You are about to save changes that you edit to this item. <br/>Continue?',
      'buttons' : {
        'Yes' : {
          'class' : 'blue',
          'action': function(){
	
			$.ajax({
					type: "POST",
					url: "a.blogDelete.php",
					data: m,
					cache: false,
					success: function(result){
						blogTbl();	
					} });
			
		}
        },
        'No'  : {
          'class' : 'gray',
          'action': function(){}  // Nothing to do in this case. You can as well omit the action property.
        }
      }
    });
	
	
	
	
	});







});
	
	
