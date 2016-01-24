// Function transfer data from Js to Php
function load_my_ajax(id,fullname,email){
    jQuery.ajax({
        url: my_ajax_url.ajax_url,
        type: 'post',
        data: {
            action: 'my_ajax_function',
            id: id,
            fullname: fullname,
            email: email
        },
        dataTye:'text',
        success: function(response)
        {
            jQuery('#response').html(response);
            //console.log(response);
        }

    });
}
// Facebook SDK
function getUserData() {
    FB.api('/me',{fields: 'id,name,email'},function(response) {
        //document.getElementById('response').innerHTML = 'Xin Chao: ' + response.name +'<br>' +'Dia chi email la: ' +response.email;
        load_my_ajax(response.id,response.name,response.email);
        console.log(response);
    });
}

window.fbAsyncInit = function() {
    //SDK loaded, initialize it
    FB.init({
        appId      : '1670622749883548',
        xfbml      : true,
        version    : 'v2.2'
    });

    //check user session and refresh it
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //user is authorized
            document.getElementById('loginBtn').style.display = 'none';
            getUserData();
        } else {
            //user is not authorized
        }
    },{scope: 'email,public_profile'});
};

//load the JavaScript SDK
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function FBlogin()
{
    FB.login(function(response) {
        if (response.authResponse) {
            //user just authorized your app
            document.getElementById('loginBtn').style.display = 'none';
            getUserData();
        }
    }, {scope: 'email,public_profile'});
}