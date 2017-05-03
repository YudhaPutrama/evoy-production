var xmlHttp
function showHint(str){
	xmlHttp = GetXMLHttpObject()
	if (xmlHttp==null){
		
	}
	var url="get_hint.php"
	url = url+"?ID_PULAU="+str
	xmlHttp.onreadystatechange = stateChanged
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChanged() {
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("txtHint").innerHTML=xmlHttp.responseText
	}
}
function GetXMLHttpObject(){
	var xmlHttp=null;
	try {
		xmlHttp = new XMLHttpRequest();
	}
	catch (e){
		try{
		xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}