// THIS FUNCTION GENERATES FAKE <A HREF="MAILTO:..."> TAG
function fPrintEmailLink(sUserName, sDomain, linkText, linkTitle, cssClass, sSubject, sBody){

	var sQS=""
	if(!sUserName || !sDomain) return false;
	var sLinkText=linkText||null, sLinkTitle=linkTitle||null, sCssClass=cssClass||null;
	if(!sLinkText) sLinkText=sUserName +"@"+ sDomain;

	if(sSubject || sBody) sQS+="?";
	if(sSubject) sQS+="subject="+ sSubject;
	if(sSubject && sBody) sQS+="&";
	if(sBody) sQS+="body="+ sBody;

	if(sLinkTitle) sLinkTitle=" title='"+ sLinkTitle +"'"
	if(sCssClass) sCssClass=" class='"+ sCssClass +"'"

	document.write("<a "+ sLinkTitle +" "+ sCssClass +" href='m&#97;ilto:"+ sUserName +"&#64;"+ sDomain + sQS +"'>"+ sLinkText +"</a>")
}