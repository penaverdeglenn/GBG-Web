$(document).ready(function() {
		


		$(".username").alphanum();
		$(".password").alphanum();
 
/*-----------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------*/
function imguploadformsubmit(thisid,imgname,fileid)
{
		

		var formData = new FormData($(thisid)[0]);
		   formData.append("id",imgname);
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



$("#sealform").submit(function() {
	var filename = $('#inp0').val();
	filename = filename.split('.');
	imguploadformsubmit("#sealform",filename[0],"sealfile");
	return false;	
});

function readImage(file) {

    var reader = new FileReader();
    var image  = new Image();

    reader.readAsDataURL(file);  
    reader.onload = function(_file) {
	
	
	$('#sealimgadd').attr('src',_file.target.result);
	$('#sealimgedit').attr('src',_file.target.result);
	
	};
}

	$('.sealfile').change(function() {  
		if(this.disabled) return alert('File upload not supported!');
		var F = this.files;
		if(F && F[0]) for(var i=0; i<F.length; i++) readImage(F[i]);
		var filepath = $(this).val();
		filename = filepath.split("\\");
		$('#inp0').val(filename[2]);
		$('#einp0').val(filename[2]);
	});

	$('.modalAddButton').click(function(e) {  
		$.ajax({
		type: "POST",
		url: "functions/generateusercode.php",
		data: "",
		cache: false,
		success: function(result)
		{	
			if(settingsName == "Users")
			{
				$("#usercodelabelid").html(result);
				$("#inp3").val(result);
			}
		}
		});
		
		// $('#modalAddDiv').modal('show');
		
		// $("#modalAddDiv").css("z-index", "1500");
		$('#modalAddDiv').appendTo("body").modal('show');
		$('#modalAddDiv').appendTo("body");
	}); 

 
    $('#addNewData').click(function(e) {                                     
		
		

		
		
		$("#notitext").html("");
		var values = [];
		var tbl = $('#settingsTbl').val();
		var tblwj = $('#settingsTblWJoin').val();
		var ncols = $('#ncols').val();
		var ctr;
		var inp;
		var ownid = "1 = 1"
		
		var ctrcheck = 0;
		var check = 0;
		var paramtbl = $('#settingsTblWJoin').val();
		var paramcond = $('#cond').val();
		var paramlindex = $('#lIndex').val();
		var parampk = $('#pk').val();
		
		var settingsName = $('#settingsName').val();
	
		var errormsg = [];
		var errorcheck = false;
		var paramidentifier = $('#identifier').val();
		var getExplodedResult = paramidentifier.split("|");
		
		for (ctr=0;ctr<ncols;ctr++)
		{
			
			inp = $('#inp'+ctr).val();
			if(settingsName == "Users" && ctr == 3)
			{
				if($('#inp0').val() == "Employers")
				{
					inp	= "C" + inp.trim();	
				}
				else
				{
					inp	= "E" + inp.trim();

				}
		
			}
			values.push(inp);
			if (values[ctr] == "") 
			{
				check++;
			}	
		
		}

		var dataString = 'values='+ values + '&tbl=' + tbl;	

		//checking duplicate and empty fields.................................................
		if(check > 0)
		{    
			errorcheck = true;
			errormsg.push("Please fill in the fields</br>");			
		}
		if(checkdupli(paramtbl,paramcond,paramlindex,values[0],getExplodedResult,ownid) == 1)
		{
			errorcheck = true;
			errormsg.push("Duplicate entry</br>");							
		}
		
		//end of checking duplicate and empty fields.................................................
		
		//unique trappings based of settingsname.....................................................
		if(settingsName == "Users")
		{
			if(!isValidEmailAddress( values[1] ))
			{
				ctrcheck++;
				errorcheck = true;
				errormsg.push("Invalid Format of Email Address</br>");				
			}
			
			if(values[2].length < 6)
			{
				ctrcheck++;
				errorcheck = true;				
				errormsg.push("Minimum Length of Password is 6 Characters</br>");
			}
			if(checkdupli(paramtbl,paramcond,paramlindex,values[1],getExplodedResult,ownid) == 1)
			{
				errorcheck = true;
				errormsg.push("Duplicate entry</br>");							
			}

		}
		else if(settingsName == "Currency")
		{
			if(values[0].length < 3)
			{
				errorcheck = true;				
				errormsg.push("Minimum Length of Currency Code is 3 Characters</br>");				
			}
		}
		else if(settingsName == "Exchange Rate")
		{	
			
			if(checkdupli(paramtbl,paramcond,paramlindex,values,getExplodedResult,ownid) == 1)
			{
				errorcheck = true;
				errormsg.push("Duplicate entry</br>");	
			}
			if(checkdupli(paramtbl,paramcond,paramlindex,values,getExplodedResult,ownid) == 1)
			{
				errorcheck = true;
				errormsg.push("Duplicate entry</br>");	
			}
			
		}
		else  if(settingsName == "City")
		{
			
		}
		else  if(settingsName == "Country")
		{
			
		}
		else if (settingsName == "Seals")
		{
			$("#sealform").submit();
	
		}
		else if (settingsName == "Shipping Cost")
		{
	
			if(checkdupli(paramtbl,paramcond,paramlindex,values,getExplodedResult,ownid) == 1)
			{
				errorcheck = true;
				errormsg.push("Duplicate entry</br>");	
			}
	
		}
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

					showsettingstbl(paramtbl,paramcond+"|1",paramlindex,parampk);
					$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Success");
					$("#notitext").attr("class","alert alert-success");
					$("#notif").show('slow');
							 setTimeout(function(){
							 $('#notif').hide('slow');
						   },8000);
					
					
				  
				}
				else
				{	
					showsettingstbl(paramtbl,paramcond+"|1",paramlindex,parampk);
					$("#notitext").html(" <button class='close' data-dismiss='alert'  type='button'>&times;</button>Failed!");
						$("#notitext").attr("class","alert alert-danger");
						$("#notif2").show('slow');
							 setTimeout(function(){
							 $('#notif').hide('slow');
						   },8000);
					
				}
				
			}
			});

		}
		
		//always close div and clear fields regardless success or failed insert............
		$('#modalAddDiv').modal('hide');		
		for (ctr=0;ctr<ncols;ctr++)
		{
			$('#inp'+ctr).val("");	
			if (settingsName == "Seals")
			{
				$('#sealimgadd').attr('src',"uploads/seals/noimg.png");
			}
			
		}
		
		
	}); 








 







}); 

    function showsettingstbl(tbl,cond,ctr,pk)
	{
	var all = "";
	all = all + "v1=" + tbl;
	all = all + "&v2=" + cond;
	all = all + "&v3=" + ctr;
	all = all + "&v4=" + pk;
	
	$.get('functions/showsettingstbl.php?'+all, function(data) {
		$("#dataTable").html(data);
		
	});
	
	
	

	}




	function checkdupli(tbl,cond,ctr,pk,identifier,ownid)
	{
		var all = "";
		all = all + "v1=" + tbl;
		all = all + "&v2=" + cond;
		all = all + "&v3=" + ctr;
		all = all + "&v4=" + pk;
		all = all + "&v5=" + identifier;
		all = all + "&v6=" + ownid;
		
		var jqXHR  =	 $.ajax({
										  type: "POST",
										  url: "functions/checkduplicate.php",
										  data: all,
										  cache: false,
										  async: false,
												 success: function(result)
												{		
													
												}
						});
		return jqXHR.responseText;
		

	}

	function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};


