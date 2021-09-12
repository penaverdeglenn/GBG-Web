$(document).ready(function() {

	$("#updateCompanyProfile").click(function(e) {		
	
		e.preventDefault();
		
			var fullDate = new Date();
			var dateToday = fullDate.getFullYear() + "-" + (fullDate.getMonth() + 1) + "-" + fullDate.getDate();
			
			var col = [];
			var val = [];
			var usercode = $('#usercode').val();
			
			col.push('compinfoname');
			col.push('compinfobrand');
			col.push('compinfocontactno');
			col.push('compinfoemail');
			col.push('compinfocontactperson');
			col.push('compinfoaddr');
			col.push('compinfoyearsinbus');
			col.push('compinfocompstruid');
			col.push('compinfotranddate');
			col.push('compinfouser');
			
			var joinedcol = col.join("|");

			val.push($('#compinfoname').val());
			val.push($('#compinfobrand').val());
			val.push($('#compinfocontactno').val());
			val.push($('#compinfoemail').val());
			val.push($('#compinfocontactperson').val());
			val.push($('#compinfoaddr').val());
			val.push($('#yrsbus').val());
			val.push($('#compstruc').val());
			val.push(dateToday);
			val.push(usercode);
			
			var joinedval = val.join("|");
		
			var dataString = "id="+usercode;
			dataString = dataString + "&tbledit=00_companyinfo";
			dataString = dataString + "&idedit=compinfocode";
			dataString = dataString + "&values="+joinedval;
			dataString = dataString + "&columns="+joinedcol;
		
			
			$.ajax({
				url: "functions/edit.php",
				type: "POST",
				data: dataString,
				cache: false,
				success: function (result) {
					
				}
			});
		
			
			
			
			col = [];
			val = [];
			
			col.push('compdetoverview');
			col.push('compdetvision');
			col.push('compdetmission');
			col.push('compdetindustry');
			col.push('compdetlocationsites');
			col.push('compdetotherinfo');
			col.push('compdetnoofemployee');
			col.push('compdetcountryofoperation');
			col.push('compdetbanner');
			col.push('compdeticon');
			col.push('compdetimg1');
			col.push('compdetimg2');
			col.push('compdetimg3');
			col.push('compdetimg4');
			col.push('compdetimg5');
			col.push('compdetimg6');
			col.push('compdetimg7');
			col.push('compdetimg8');
			col.push('compdetimg9');
			col.push('compdetimg10');
			col.push('compdetvid1');
			col.push('compdetvid1title');
			col.push('compdetvid2');
			col.push('compdetvid2title');
			col.push('compdettrandate');
			col.push('compdetuser');
			
			
			
			var joinedcol = col.join("|");
			
		
			
			val.push($('#compoverview').val());
			val.push($('#compvision').val());
			val.push($('#compmission').val());
			val.push($('#industry').val());
			val.push($('#compdetlocationsites').val());
			val.push($('#compdetotherinfo').val());
			val.push($('#noEmp').val());
			var countryofoperation1 = $('#countryofoperation').val();
			var countryofoperation2 = countryofoperation1.split(',');
			var countryofoperationarr = countryofoperation2.join("^");
			val.push(countryofoperationarr);
			if($('#compbannername').val()=="nobanner.png")
			{val.push($('#compbannername').val());}
			else
			{val.push(usercode+'banner.png');}

			if($('#compiconname').val()=="noicon.png")
			{val.push($('#compiconname').val());}
			else
			{val.push(usercode+'icon.png');}

			for(a=0;a<10;a++)
			{
				if($('#compimg'+a+'name').val()=="noimg.png")
				{val.push($('#compimg'+a+'name').val());}
				else
				{val.push(usercode+'img'+(a+1)+'.png');}
			}

			


		


			val.push($('#compvid1title').val());
			val.push($('#compvid1').val());
			val.push($('#compvid2title').val());
			val.push($('#compvid2').val());
			val.push(dateToday);
			val.push(usercode);

			
			
			var joinedval = val.join("|");
		
			var dataString = "id="+usercode;
			dataString = dataString + "&tbledit=00_companydetails";
			dataString = dataString + "&idedit=compdetcompinfocode";
			dataString = dataString + "&values="+joinedval;
			dataString = dataString + "&columns="+joinedcol;
		
			
			$.ajax({
				url: "functions/edit.php",
				type: "POST",
				data: dataString,
				cache: false,
				success: function (result) {
					
					$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Success");
					$("#notitext").attr("class","alert alert-success");
					$("#notif").show('slow');
					setTimeout(function(){
						$('#notif').hide('slow');
					},8000);

				}
			});			
	
		$("#compiconform").submit();	
		$("#compbannerform").submit();	
		$("#compimg0form").submit();	
		$("#compimg1form").submit();	
		$("#compimg2form").submit();	
		$("#compimg3form").submit();	
		$("#compimg4form").submit();	
		$("#compimg5form").submit();	
		$("#compimg6form").submit();	
		$("#compimg7form").submit();	
		$("#compimg8form").submit();	
		$("#compimg9form").submit();	
		
		
		
		
		
		
	});	
	
	
	
	
	
	$("#compiconform").submit(function() {
		imguploadformsubmit("#compiconform","icon","compicon");
		return false;	
	});	
		
	$("#compbannerform").submit(function() {
		imguploadformsubmit("#compbannerform","banner","compbanner");
		return false;
	});	
	
	$("#compimg0form").submit(function() {
		imguploadformsubmit("#compimg0form","img1","compimg0");
		return false;
	});	
	
	$("#compimg1form").submit(function() {
		imguploadformsubmit("#compimg1form","img2","compimg1");
		return false;
	});
	
	$("#compimg2form").submit(function() {
		imguploadformsubmit("#compimg2form","img3","compimg2");
		return false;
	});
	
	$("#compimg3form").submit(function() {
		imguploadformsubmit("#compimg3form","img4","compimg3");
		return false;
	});
	
	$("#compimg4form").submit(function() {
		imguploadformsubmit("#compimg4form","img5","compimg4");
		return false;
	});
	
	$("#compimg5form").submit(function() {
		imguploadformsubmit("#compimg5form","img6","compimg5");
		return false;
	});
	
	$("#compimg6form").submit(function() {
		imguploadformsubmit("#compimg6form","img7","compimg6");
		return false;
	});
	
	$("#compimg7form").submit(function() {
		imguploadformsubmit("#compimg7form","img8","compimg7");
		return false;
	});
	
	$("#compimg8form").submit(function() {
		imguploadformsubmit("#compimg8form","img9","compimg8");
		return false;
	});
	
	$("#compimg9form").submit(function() {
		imguploadformsubmit("#compimg9form","img10","compimg9");
		return false;
	});
	
	
	

	
	



	
		
	$("#removeicon").click(function() {
		$('#compicon').val("");
		$('#compiconname').val("noicon.png");
		$('#compiconimg').attr('src',"uploads\\company\\images\\noicon.png");
	});	
	$("#removebanner").click(function() {
		$('#compbanner').val("");
		$('#compbannername').val("nobanner.png");
		$('#compbannerimg').attr('src',"uploads\\company\\images\\nobanner.png");
	});	
	
	
	$("#removeimg0").click(function() {
		$('#compimg0name').val("noimg.png");
		removeimg('compimg0','compimg0img');
	});
	$("#removeimg1").click(function() {
		$('#compimg1name').val("noimg.png");
		removeimg('compimg1','compimg1img');
	});
	$("#removeimg2").click(function() {
		$('#compimg2name').val("noimg.png");
		removeimg('compimg2','compimg2img');
	});
	$("#removeimg3").click(function() {
		$('#compimg3name').val("noimg.png");
		removeimg('compimg3','compimg3img');
	});
	$("#removeimg4").click(function() {
		$('#compimg4name').val("noimg.png");
		removeimg('compimg4','compimg4img');
	});
	$("#removeimg5").click(function() {
		$('#compimg5name').val("noimg.png");
		removeimg('compimg5','compimg5img');
	});
	$("#removeimg6").click(function() {
		$('#compimg6name').val("noimg.png");
		removeimg('compimg6','compimg6img');
	});
	$("#removeimg7").click(function() {
		$('#compimg7name').val("noimg.png");
		removeimg('compimg7','compimg7img');
	});
	$("#removeimg8").click(function() {
		$('#compimg8name').val("noimg.png");
		removeimg('compimg8','compimg8img');
	});
	$("#removeimg9").click(function() {
		$('#compimg9name').val("noimg.png");
		removeimg('compimg9','compimg9img');
	});

	


	
});

function removeimg(hiddenid,imgid)
{
	$('#'+hiddenid).val("");
	$('#'+imgid).attr('src',"uploads\\company\\images\\noimg.png");
}

function imguploadformsubmit(thisid,imgtype,fileid)
{
		

		var formData = new FormData($(thisid)[0]);
		var id = $('#usercode').val();
		   formData.append("id", id+imgtype);
		   formData.append("fileid", fileid);


		$.ajax({
			url: "functions/uploadimg.php",
			type: "POST",
			data: formData,
			cache: false,
			async: false,
			contentType: false,
			processData: false,	
			success: function (msg) {
				
			}
		});
		
}
