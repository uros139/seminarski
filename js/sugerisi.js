var xmlHttp
function sugestija(naziv){ 
if (naziv.length==0){ 
 document.getElementById("livesearch").innerHTML="";
 document.getElementById("livesearch").style.border="0px";
 return
 }

xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser ne podrzava HTTP Zahtev");
 return;
 }
 
var url="suggest.php";
url=url+"?unos="+naziv;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged; 
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}
function stateChanged(){ 

if (xmlHttp.readyState==4){ 
 document.getElementById("livesearch").innerHTML=xmlHttp.responseText;
 document.getElementById("livesearch").style.border="2px solid";
 document.getElementById("livesearch").style.display="block";
 } 
}
function GetXmlHttpObject(){
var xmlHttp=null;
try {
 
 xmlHttp=new XMLHttpRequest();
 } catch (e) {
 
 try {
  
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
