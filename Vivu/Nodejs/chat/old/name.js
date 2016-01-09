 var youname =" Ngu?i L?";
 var myname = " B?n";
 function youName()
 {
    xmlHttp = GetXmlHttpObject();

    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Youname.php?id=" + strangerId;
    xmlHttp.open("POST", url, true);
    xmlHttp.onreadystatechange = name;
    xmlHttp.send(null);
}

function name()
{
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
        no = xmlHttp.responseText;
        if (no!="n"){
            youname=no;
        }
    }
}
                