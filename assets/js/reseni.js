var _allSolutionVisible = false;
var _cookieAllSolutionVisible = 'AllSolutionVisible';
$(function(){
	
	
	if ($.cookie(_cookieAllSolutionVisible) == 'true') {_allSolutionVisible = true;}

	
	//Show/hide solutions
	$('div.reseni').wrap('<div class="solution_wrapper"></div>');
	if (!_allSolutionVisible)
	{
		$('div.reseni').hide();
		$('div.solution_wrapper').prepend('<div class="control show"><button class="showhide">' + _showText + '</button><br><br><a class="showhideall">' + _showAllText + '</a></div>');
	}
	else
	{
		$('div.solution_wrapper').prepend('<div class="control hide"><button class="showhide">' + _hideText + '</button><br><br><a class="showhideall">' + _hideAllText + '</a></div>');
	}
	//show hide one
	$('button.showhide').click(function() {
		if ($(this).parent().parent().children('div.reseni').is(':hidden'))
		{
			$(this).parent().parent().children('div.reseni').slideDown('normal;');
			$(this).text(_hideText);

		}
		else
		{
			$(this).parent().parent().children('div.reseni').slideUp('normal;');
			$(this).text(_showText);

		}
	});
	
	
	
	
	
	
	//Show/hide solutions
	$('div.reseni2').wrap('<div class="solution_wrapper"></div>');
	if (!_allSolutionVisible)
	{
		$('div.reseni2').hide();
		$('div.reseni2 div.solution_wrapper').prepend('<div class="control show"><button class="showhide2">' + _showText2 + '</button><br><br><a class="showhideall">' + _showAllText + '</a></div>');
	}
	else
	{
		$('div.reseni2 div.solution_wrapper').prepend('<div class="control hide"><button class="showhide2">' + _hideText2 + '</button><br><br><a class="showhideall">' + _hideAllText + '</a></div>');
	}
	//show hide one
	$('div.reseni2 button.showhide2').click(function() {
		if ($(this).parent().parent().children('div.reseni2').is(':hidden'))
		{
			$(this).parent().parent().children('div.reseni2').slideDown('normal;');
			$(this).text(_hideText2);

		}
		else
		{
			$(this).parent().parent().children('div.reseni2').slideUp('normal;');
			$(this).text(_showText2);

		}
	});
	
	

	
	
	//show hide all
	$('button.showhideall').click(function() {
		if ($(this).text() == _showAllText)
		{//show
			$('div.reseni').slideDown('normal;');
			$('div.reseni2').slideDown('normal;');
			$('a.showhideall').text(_hideAllText);
			$('a.showhide').text(_hideText);
			$('a.showhide2').text(_hideText2);

			//set cookie
			$.cookie(_cookieAllSolutionVisible, 'true', { path: '/', expires: 365 });
		}
		else
		{//hide
			$('div.reseni').slideUp('normal;');
			$('div.reseni2').slideUp('normal;');
			$('a.showhideall').text(_showAllText);
			$('a.showhide').text(_showText);
			$('a.showhide2').text(_showText2);

			//set cookie
			$.cookie(_cookieAllSolutionVisible, 'false', { path: '/', expires: 365 });
		}
	});	

	
	
});



/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

/**
 * Create a cookie with the given name and value and other optional parameters.
 *
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Set the value of a cookie.
 * @example $.cookie('the_cookie', 'the_value', { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Create a cookie with all available options.
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Create a session cookie.
 * @example $.cookie('the_cookie', null);
 * @desc Delete a cookie by passing null as value. Keep in mind that you have to use the same path and domain
 *       used when the cookie was set.
 *
 * @param String name The name of the cookie.
 * @param String value The value of the cookie.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the value of a cookie with the given name.
 *
 * @example $.cookie('the_cookie');
 * @desc Get the value of a cookie.
 *
 * @param String name The name of the cookie.
 * @return The value of the cookie.
 * @type String
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};


var _base = 'https://praha11.pirati.cz/';
var _showText = '+ Navrhovaná opatření';
var _showTest2 = '+ Co už jsme udělali';
var _hideText = '- Navrhovaná opatření';
var _hideText2 = '- Co už jsme udělali';
var _showAllText = '';
var _hideAllText = '';
