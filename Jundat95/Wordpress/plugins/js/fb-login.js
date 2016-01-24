function getUserData() {
    FB.api('/me',{fields: 'id,name,email'},function(response) {
        document.getElementById('response').innerHTML = 'Xin Chao: ' + response.name +'<br>' +'Dia chi email la: ' +response.email;
        //console.log(response);
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
    },{scope: 'email,public_profile,user_friends'});
};

//load the JavaScript SDK
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//add event listener to login button
//document.getElementById('loginBtn').addEventListener('click', function() {
//    //do the login
//    FB.login(function(response) {
//        if (response.authResponse) {
//            //user just authorized your app
//            document.getElementById('loginBtn').style.display = 'none';
//            getUserData();
//        }
//    }, {scope: 'email,public_profile,user_friends'});
//}, false);

function FBlogin()
{
    FB.login(function(response) {
        if (response.authResponse) {
            //user just authorized your app
            document.getElementById('loginBtn').style.display = 'none';
            getUserData();
        }
    }, {scope: 'email,public_profile,user_friends'});
}
// Load thong tin vao php

    jQuery(document).ready(function($)
    {
        var data = {
            'action': 'fblogin',
            'email': 'jundat'
        };

        $.post("wp-admin/plugins/DemoRegister.php", data, function(response) {
            alert('Server response from the AJAX URL ' + response);
        });
    })

