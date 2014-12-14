window.fbAsyncInit = function() {
	FB.init({
		appId : '384067238423389',
		xfbml : true,
		version : 'v2.2'
	});

	checkLoginState();
};
 
(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {
			return;
		}
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

function checkLoginState() {
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			FB.api('/me', function(response) {
				//Go to app index
				window.location.href = "http://cs.newpaltz.edu/~telesduf1/2014Fall/playground/login_index";
			});
		} else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.
			console.log('not_authorized');
		} else {
			// The person is not logged into Facebook, so we're not sure if
			// they are logged into this app or not.
			window.location.href = "http://cs.newpaltz.edu/~telesduf1/2014Fall/playground/login_index";
			console.log('Not Logged in');
		}
	});
}