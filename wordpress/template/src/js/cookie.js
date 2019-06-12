/**
 * This is where you'll find all cookie related functions
 * and those kind of js functions that store cookies.
 */
$(document).ready(function () {
	/**
	 * Cookie information
	 */
	var apCookiePrefix = 'ap-';
	var apCookie = apGetCookie(apCookiePrefix + "cookieinfo");

	if (apCookie !== 'true') {
		$('#ap-cookieinfo').show();
	}

	$('#ap-cookieinfo__close').click(function () {
		var cookie = apGetCookie(apCookiePrefix + "cookieinfo");
		if (cookie !== 'true') {
			apSetCookie(apCookiePrefix + "cookieinfo", true, 180);
		}

		$('#ap-cookieinfo').hide();
	});
});

/**
 * Get cookie
 *
 * @param cname
 * @returns {*}
 */
function apGetCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) === ' ') c = c.substring(1);
		if (c.indexOf(name) !== -1) return c.substring(name.length, c.length);
	}
	return "";
}

/**
 * Set cookie
 *
 * @param cname
 * @param cvalue
 * @param exdays
 */
function apSetCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}