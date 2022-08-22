---
title: Ať Jižák nezamrzne - férový a smysluplný rozvoj
campaignCategoryUid: 2022-komunalni
campaignGroupUid: volby-2022
uid: uzemni-rozvoj
order: 3
garant: josef.kocourek
redmine: 
img: program2022/uzemni-rozvoj2.jpg
intro: >
  Občané si zaslouží moderní a smysluplný rozvoj Jižního Města. Chceme dostavbu center v místech stanic metra, která poskytnou obchody, restaurace a další služby. Po investorech budeme vyžadovat zajištění dostatečných parkovacích míst, maximalizaci zeleně a další investice do veřejného prostoru. Chceme podpořit výstavbu družstevního bydlení s účastí radnice. Dokončíme rekonstrukci ubytovny Sandra, kde vznikde 164 nových městských bytů. 
---

### Budoucnost Jižního Města
V současnosti Jižní Město nemá ucelenou představu o svém rozvoji a pokud dochází ke změnám, tak nejsou navzájem provázané a není jasný jejich výstup. Jednotlivé investice a opravy sice jsou samostatně odůvodnitelné, ale v celkovém pohledu nejsou zcela koncepční.<br>
Piráti chtějí zohlednit názory obyvatel MČ a navrhnout strategii rozvoje Jižního Města a zaměřit se jak na podporu silných stránek (dobrá dopravní dostupnost, velké zelené plochy, dostupnost vzdělávání) tak i řešení problematických témat (bezpečnost, dostupnost kulturního vyžití, zanedbané okolí stanic metra, parkování, absence služeb a volnočasového využití parteru, sportoviště, spolkový život).<br>

###  Chceš stavět? Přispěj!
Investiční záměr vždy vnáší do dané lokality dopady odpovídající velikosti záměru. Proto na hl. m. Praze byla schválena “Kontribuce” která stanovuje pravidla spoluúčasti investora k městu. Chceme aby se investoři více podíleli na rozvoji oblasti, ve které staví. Budeme důsledně dbát na jejich finančním zapojení do rozvoje okolí výstavby, a to jak v oblasti veřejného prostoru jako jsou parky, tak i do okolní infrastruktury (silnice, chodníky, cyklostezky, školy, další veřejná vybavenost).

### Rozvoj přirozených center Jižního Města
Okolí stanic metra tvoří přirozená centra Jižního Města, které se do dnešní doby nepodařilo rozvinou do jejich skutečného potenciálu. <br>
Od zprovoznění linky C se na Jižním Městě do okolí stanic metra neinvestovalo a v současnosti jsou okolí stanic (kromě stanice Chodov a interiéru metra Opatov) ve špatném technickém stavu a nejsou zcela dotvořeny. <br>
Podporujeme dotvoření okolí stanic metra. Tím se vytvoří zázemí pro nové obchody, restaurace, kavárny a další služby a dojde k zatraktivnění Jižního Města pro širokou veřejnost. <br>

### Cesta k dostupnému bydlení
Budeme aktivně podporovat vznik družstevního bydlení. Cílem je přispět k rozšíření možností cenově dostupného bydlení pro obyvatele na území Prahy. <br>
Družstevní bydlení bude výhodné také pro město, které se rovněž stane členem družstva a v realizovaných projektech bude mít dispoziční právo k jedné třetině bytů. Byty bude následně pronajímat občanům. Tímto způsobem Praha obrátí trend dosavadních let, kdy se neustále snižoval počet městských bytů, kterých má město v současnosti velký nedostatek. <br>
Zároveň dokončíme rekonstrukci ubytovny Sandra a budeme pokračovat v opravách městských bytů. Město musí mít dostatečné kapacity bydlení pro ty, kteří jej potřebují. Byty budeme přednostně přidělovat potřebným profesím – učitelům, zdravotníkům, hasičům, policistům a dalším pomáhajícím profesím. <br>

*autoři: Petr Klán, Josef Kocourek*


<div>




### PEPA: bla bla bla


<div class="reseni">
	Řešení:
	AAAA
</div>

<p>Jirka: bla bla bla</p>
<div class="reseni">
	Řešení:
	AAAA
</div>

<p>Zdaněk: bla bla bla</p>
<div class="reseni">
	Řešení:
	AAAA
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>

var _allSolutionVisible = false;
var _cookieAllSolutionVisible = 'AllSolutionVisible';
$(function(){
	
	
	if ($.cookie(_cookieAllSolutionVisible) == 'true') {_allSolutionVisible = true;}

	
	//Show/hide solutions
	$('div.reseni').wrap('<div class="solution_wrapper"></div>');
	if (!_allSolutionVisible)
	{
		$('div.reseni').hide();
		$('div.solution_wrapper').prepend('<div class="control"><a class="showhide">' + _showText + '</a><a class="showhideall">' + _showAllText + '</a></div>');
	}
	else
	{
		$('div.solution_wrapper').prepend('<div class="control"><a class="showhide">' + _hideText + '</a><a class="showhideall">' + _hideAllText + '</a></div>');
	}
	//show hide one
	$('a.showhide').click(function() {
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
	//show hide all
	$('a.showhideall').click(function() {
		if ($(this).text() == _showAllText)
		{//show
			$('div.reseni').slideDown('normal;');
			$('a.showhideall').text(_hideAllText);
			$('a.showhide').text(_hideText);

			//set cookie
			$.cookie(_cookieAllSolutionVisible, 'true', { path: '/', expires: 365 });
		}
		else
		{//hide
			$('div.reseni').slideUp('normal;');
			$('a.showhideall').text(_showAllText);
			$('a.showhide').text(_showText);

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

</script>

<script type="text/javascript">
var _base = 'https://www.priklady.eu/';
var _showText = 'Ukaž řešení';
var _hideText = 'Skryj řešení';
var _showAllText = '';
var _hideAllText = '';
</script>


</div>
