
function GetXmlHttpObject(handler)
{
   var objXMLHttp=null
   if (window.XMLHttpRequest)
   {
       objXMLHttp=new XMLHttpRequest()
   }
   else if (window.ActiveXObject)
   {
       objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
   }
   return objXMLHttp
}

/************************************************************/

function stateChangedRegion()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResultRegion").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}





function htmlDataRegion(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResultRegion").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChangedRegion;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}

/************************************************************/

function stateChangedShippingCharge()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResultShippingChargeCalculation").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}

function htmlDataShippingCharge(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResultShippingChargeCalculation").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChangedShippingCharge;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}


/************************************************************/

function stateChangedNewsletter()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResultNewsletter").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}

function htmlDataNewsletter(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResultNewsletter").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChangedNewsletter;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}



/************************************************************/

function stateChangedContactUs()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResultContactUs").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}

function htmlDataContactUs(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResultContactUs").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChangedContactUs;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}




/************************************************************/

function stateChanged3()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResult3").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}

function htmlData3(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResult3").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChanged3;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}




/************************************************************/

function stateChangedPack1()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResultPack1").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}

function htmlDataPack1(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResultPack1").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChangedPack1;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}



/************************************************************/

function stateChangedPack2()
{
   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
           document.getElementById("txtResultPack2").innerHTML= xmlHttp.responseText;
   }
   else {
           //alert(xmlHttp.status);
   }
}

function htmlDataPack2(url, qStr)
{
   
   if (url.length==0)
   {
       document.getElementById("txtResultPack2").innerHTML="";
       return;
   }
   xmlHttp=GetXmlHttpObject();
   if (xmlHttp==null)
   {
       alert ("Browser does not support HTTP Request");
       return;
   }

   
   url=url+"?"+qStr;
   url=url+"&sid="+Math.random();
   xmlHttp.onreadystatechange=stateChangedPack2;
   xmlHttp.open("GET",url,true) ;
   xmlHttp.send(null);
}




































function addtocart(counter)
{
    var idkey = "itemid"+counter;
    var itemid = document.getElementById(idkey).value; itemid=itemid.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var idkeyqty = "itemidqty"+counter;
    var itemidqty = document.getElementById(idkeyqty).value; itemidqty=itemidqty.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    
    window.location="./cartadd.php?abc="+itemid+"&def="+itemidqty;
}



function removetocart(counter)
{
    window.location="./cartremove.php?abc="+counter;
}


function addcartinventory(itemid)
{
    var quantity = document.getElementById("quantity").value; quantity=quantity.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    
    window.location="./cartadd.php?abc="+itemid+"&def="+quantity;
}




function loadCountryRegion()
{
   var countryname = document.getElementById("countryname").value; countryname=countryname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   document.getElementById("shippingChargeAmount").value = "0.00";
   var sUrl="cartitemscountryregionload.php";
   var sData = "countryname="+countryname;
   htmlDataRegion(sUrl, sData);
   
}



function loadCountryRegionCheckout()
{
   var countryname = document.getElementById("countryname").value; countryname=countryname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   var sUrl="checkoutcountryregionload.php";
   var sData = "countryname="+countryname;
   htmlDataRegion(sUrl, sData);
   
}

function CalculateEstShippingCharge()
{
   var countryname = document.getElementById("countryname").value; countryname=countryname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var countryregion = document.getElementById("countryregion").value; countryregion=countryregion.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   if (countryregion!="none")
   {
        var sUrl="cartitemshippingchargecalculate.php";
        var sData = "countryname="+countryname+"&countryregion="+countryregion;
        htmlDataShippingCharge(sUrl, sData);
   }
    else
    {
        alert("ERROR: Please select region.");
        document.getElementById("shippingChargeAmount").value = "0.00";
   
    }
    
   
}






function sendnewsletter()
{
   var newsletteremail = document.getElementById("newsletteremail").value; newsletteremail=newsletteremail.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   var checker=1;
   if (newsletteremail == "")
   {
         document.getElementById("newsletteremail").style.border='1px solid red';
         checker=2;
   }
   else if (ValidateEmail(newsletteremail) == 0)
   {
         document.getElementById("newsletteremail").style.border='1px solid red';
         checker=6;
   }
   else
   {
         document.getElementById("newsletteremail").style.border='1px solid #c8c8c8';
   }
   
   if (checker==1)
   {
        var sUrl="sendemailnewsletter.php";
        var sData = "newsletteremail="+newsletteremail;
        
        htmlDataNewsletter(sUrl, sData);
   }
   else if (checker==2)
   {
        alert("ERROR: Please enter email address.");
   }
   else if (checker==6)
   {
        alert("ERROR: Please enter a valid email address.");
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




function sendemailcontact()
{
   var ename = document.getElementById("ename").value; ename=ename.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var eemail = document.getElementById("eemail").value; eemail=eemail.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var esubject = document.getElementById("esubject").value; esubject=esubject.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var emsg = document.getElementById("emsg").value; emsg=emsg.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   var checker=1;
   if (ename == "")
   {
         document.getElementById("ename").style.border='1px solid red';
         checker=2;
   }
   else if (ename.length < 5)
   {
         document.getElementById("ename").style.border='1px solid red';
         checker=2;
   }
   else
   {
         document.getElementById("ename").style.border='1px solid #c8c8c8';
   }
   
   if (eemail == "")
   {
         document.getElementById("eemail").style.border='1px solid red';
         checker=4;
   }
   else if (ValidateEmail(eemail) == 0)
   {
         document.getElementById("eemail").style.border='1px solid red';
         checker=5;
   }
   else
   {
         document.getElementById("eemail").style.border='1px solid #c8c8c8';
   }
   
   
   if (esubject == "")
   {
         document.getElementById("esubject").style.border='1px solid red';
         checker=3;
   }
   else if (esubject.length < 5)
   {
         document.getElementById("esubject").style.border='1px solid red';
         checker=3;
   }
   else
   {
         document.getElementById("esubject").style.border='1px solid #c8c8c8';
   }
   
     
   if (emsg == "")
   {
         document.getElementById("emsg").style.border='1px solid red';
         checker=6;
   }
   else if (emsg.length < 10)
   {
         document.getElementById("emsg").style.border='1px solid red';
         checker=6;
   }
   else
   {
         document.getElementById("emsg").style.border='1px solid #c8c8c8';
   }
   
   
   if (checker==1)
   {
        var sUrl="sendemailcontactus.php";
        var sData = "ename="+ename+"&eemail="+eemail+"&esubject="+esubject+"&emsg="+emsg;
        
        htmlDataContactUs(sUrl, sData);
   }
   else if (checker==2)
   {
        alert("ERROR: Please enter name.");
   }
   else if (checker==4)
   {
        alert("ERROR: Please enter email address.");
   }
   else if (checker==5)
   {
        alert("ERROR: Please enter valid email address.");
   }
   else if (checker==3)
   {
        alert("ERROR: Please enter subject.");
   }
   else if (checker==6)
   {
        alert("ERROR: Please enter message.");
   }
   
   
}









function proceedtocheckout()
{
    
    var countryname = document.getElementById("countryname").value; countryname=countryname.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    var countryregion = document.getElementById("countryregion").value; countryregion=countryregion.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
    
    var checker=1;
    
    if (countryregion == "")
    {
        document.getElementById("countryregion").style.border='1px solid red';
        checker=3;
    }
    else if (countryregion == "none")
    {
        document.getElementById("countryregion").style.border='1px solid red';
        checker=3;
    }
    else
    {
        document.getElementById("countryregion").style.border='1px solid #c8c8c8';
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
        var sData = "countryname="+countryname+"&countryregion="+countryregion;
        htmlData3(sUrl, sData);
    }
    else if (checker==2)
    {
        alert("ERROR: Please select country.");
    }
    else if (checker==3)
    {
        alert("ERROR: Please select Region.");
    }
    else
    {
        alert("ERROR: Please complete all required information.");
    }
    //window.location="./checkoutform.php";
}



function continueshopping()
{
    window.location="./productsmain.php";
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
        
        htmlData3(sUrl, sData);
        
    }
    else
    {
        alert("ERROR: Please complete all information.");
    }
    
}





function loadproductpackage1()
{
   var productpackage1 = document.getElementById("productpackage1").value; productpackage1=productpackage1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var istherepackage1 = document.getElementById("istherepackage1").value; istherepackage1=istherepackage1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var istherepackage2 = document.getElementById("istherepackage2").value; istherepackage2=istherepackage2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   if (productpackage1=="none")
   {
      document.getElementById("istherepackage1").value=0;
      istherepackage1=0;
   }
   else
   {
      document.getElementById("istherepackage1").value=1;
      istherepackage1=1;
   }
   
   
   var sUrl="packagespack1load.php";
   var sData = "productpackage1="+productpackage1;
   htmlDataPack1(sUrl, sData);
   
   
}


function loadproductpackage2()
{
   var productpackage2 = document.getElementById("productpackage2").value; productpackage2=productpackage2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var istherepackage1 = document.getElementById("istherepackage1").value; istherepackage1=istherepackage1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var istherepackage2 = document.getElementById("istherepackage2").value; istherepackage2=istherepackage2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   
   if (productpackage2=="none")
   {
      document.getElementById("istherepackage2").value=0;
      istherepackage2=0;
   }
   else
   {
      document.getElementById("istherepackage2").value=1;
      istherepackage2=1;
   }
   
   
   var sUrl="packagespack2load.php";
   var sData = "productpackage2="+productpackage2;
   htmlDataPack2(sUrl, sData);
}



function proceedtoregistration()
{
   var productpackage1 = document.getElementById("productpackage1").value; productpackage1=productpackage1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var productpackage2 = document.getElementById("productpackage2").value; productpackage2=productpackage2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   var istherepackage1 = document.getElementById("istherepackage1").value; istherepackage1=istherepackage1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var istherepackage2 = document.getElementById("istherepackage2").value; istherepackage2=istherepackage2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   if (istherepackage1==1 && istherepackage2==1)
   {
      var sUrl="packages1.php";
      var sData = "productpackage1="+productpackage1+"&productpackage2="+productpackage2;
      htmlData3(sUrl, sData); 
   }
   else
   {
      alert("Reminder: You have to choose 2 product packages in order to proceed.");
   }
   
}


function proceedtosummary()
{
   var productpackage1 = document.getElementById("productpackage1").value; productpackage1=productpackage1.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var productpackage2 = document.getElementById("productpackage2").value; productpackage2=productpackage2.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   var sUrl="packages2.php";
   var sData = "productpackage1="+productpackage1+"&productpackage2="+productpackage2;
   htmlData3(sUrl, sData);
   
}



/*
function updateOfficialShipping()
{
   var OrderTotalAmount = document.getElementById("OrderTotalAmount").value; OrderTotalAmount=OrderTotalAmount.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   var shippingChargeAmount = document.getElementById("shippingChargeAmount").value; shippingChargeAmount=shippingChargeAmount.replace(/#/ig,"").replace(/&/ig,"").replace(/'"/ig,"");
   
   var shippingChargeAmountTemp = shippingChargeAmount.replace(",","");
   var OrderTotalAmountTemp = OrderTotalAmount.replace(",","");
   
   var totalTemp = (shippingChargeAmountTemp*1)+(OrderTotalAmountTemp*1);
   
   if ((shippingChargeAmountTemp*1)==0)
   {
        document.getElementById("ShippingChargeOfficial").value="For Computation";
   }
   else if ((shippingChargeAmountTemp*1)>0)
   {
        document.getElementById("ShippingChargeOfficial").value=shippingChargeAmount;
        document.getElementById("OrderTotalAmountWithShipping").value=number_format(totalTemp);
        
   }
   
   return 1;
}




function number_format(number)
{
    var decimals =2;
    var dec_point = ".";
    var thousands_sep = ",";
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    
    document.getElementById("iprice").value = ( s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : ""));
}
*/