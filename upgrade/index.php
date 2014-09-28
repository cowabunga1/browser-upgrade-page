<?php
/**
 * /upgrade/index.php
 *
 * @author Eric F (iEFdev)
 * @copyright (c) 2014 Eric F
 * @license MIT License (MIT)
 * @description Just a simple (friendly) way to show the visitors they have an outdated and unsupported browser.
 */

$page_vars = array(
	'year'		=> date('Y'),
	'site'		=> $_SERVER['HTTP_HOST'],
	'new'		=> 'onclick="window.open(this.href); return false;"',
	'ms_link'	=> 'http://support.microsoft.com/lifecycle/search/?sort=PN&alpha=internet+explorer&Filter=FilterNO',
	'ie_min'	=> 9,
);
extract($page_vars);

$text_vars = array(
	'title'				=> 'Oops! &middot; Please, upgrade your browser',
	'header'			=> 'Your browser is too old',

	'intro'				=> 'How did I get here?',
	'intro_exp'			=> 'The server detected that your web browser is too old, and not compatible with the modern websites of today. The web technology is moving <em>(very)</em> fast, and all browsers are releasing new versions from time to time. You should upgrade often.</p>

		<p>On this site, we support <strong>Internet Explorer %1s</strong> and above. Simply because the older versions are not following the web standard in an acceptable way. There are also security issues involved.</p>',

	'intro_comment'		=> 'IE6/7/8 are really old browsers. You can read more about the realese dates <a href="%1s" %2s title="Microsoft Product Lifecycle">here</a>. Now it is <strong>%3s</strong>.',

	'browsers'			=> 'Browsers',
	'browsers_exp'		=> 'Here\'s a small collection of browsers you can use. All are free software. Some are better than others. Only your taste and preferences can decide which one to prefer.',
);
extract($text_vars, EXTR_PREFIX_ALL, 'l');

$l_intro_exp = sprintf($l_intro_exp, (int) $ie_min);
$l_intro_comment = sprintf($l_intro_comment, $ms_link, $new, $year);
$footer = sprintf('&copy; %1s, <a href="//%2s/">%3s</a>', $year, $site, $site);

// the comment line... If you want to add a short note about each browser
$browsers = array(
	'ff' => array(
		'title' => 'Firefox', 'url' => 'https://www.mozilla.org/firefox/',
		'comment' => null,
	),
	'chr_oss' => array(
		'title' => 'Chromium', 'url' => 'http://www.chromium.org/Home',
		'comment' => null,
	),
	'chr' => array(
		'title' => 'Chrome', 'url' => 'https://www.google.com/chrome/browser/',
		'comment' => null,
	),
	'op'	=> array(
		'title' => 'Opera', 'url' => 'http://www.opera.com/',
		'comment' => null,
	),
	'ie' => array(
		'title' => 'Internet Explorer', 'url' => 'http://microsoft.com/ie',
		'comment' => 'For IE9, you must have Windows 7 (or Vista) to run on your computer.',
	),
);

function browserBox()
{
	global $browsers, $new;

	foreach($browsers as $class => $browser)
	{
		extract($browser);
		$comment = (!empty($comment)) ? '<p class="box comment">' . $comment . '</p>' : null;
		echo $box = <<<BOX
		<div class="box {$class}">
			<h3>{$title}</h3>
			<p><a href="{$url}" {$new} title="{$title}: {$url}">{$url}</a></p>
			{$comment}
		</div>

BOX;
	}
}

// Using old doctype for better compability
?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $l_title; ?></title>
<link rel="icon" href="/upgrade/img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/upgrade/img/favicon.ico" type="image/x-icon" />
<style type="text/css">
<!--
/* simple reset */
* { margin: 0; padding: 0; border: 0; outline: none; text-decoration: none; zoom: 1; }

body { padding: 20px; background: #f5f5f5; font-size: 10px; }

div.wrapper {
	width: 600px;
	margin: 20px auto;
	font: normal normal 1.3em/1.2em "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #456;
	padding: 20px;
	background: #f9f9f9;
	border: 1px solid #e1e2e3;
	border-radius: 6px;
	box-shadow: 0 6px 8px -1px rgba(0, 0, 0, .3);
}

h1 {
	font: 100 normal 3em/1.5em "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #567; margin: 20px 0 10px; text-transform: capitalize;
}

h2 {
	font: normal normal 1.5em/1.2em "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #567; margin: 20px 0 10px;
}

h3 {
	font: normal normal 1.2em/1.2em "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #234; margin: 25px 0 5px;
}

p { margin: 0 0 8px; text-align: justify; }
strong { font-weight: bold; }
p.comment, em { font-style: italic; color: #555; }
em.comment { font-size: .9em; }
.err { color: red; }
hr { clear: both; margin: 30px 0; border-top: 1px dashed #789; }
hr.clean { height: 1px; margin: 15px 0; border: none; }

/* Links */
a { color: #69c; }
a:hover { position: relative; text-decoration: underline; }
a:active { color: #369;}

div.box  {
	height: 100px;
	padding: 10px 35px 10px 10px;
	margin: 0 0 20px 0;
	border: 1px solid #e1e2e3;
	border-radius: 4px;
	background: #fff no-repeat 485px 10px;
}

div.box.ff { background-image: url(/upgrade/img/firefox.png); }
div.box.chr_oss { background-image: url(/upgrade/img/chromium.png); }
div.box.chr { background-image: url(/upgrade/img/chrome.png); }
div.box.op { background-image: url(/upgrade/img/opera.png); }
div.box.ie { background-image: url(/upgrade/img/ie.png); }

div.box h3 { margin: 0 0 5px; }
div.box p { width: 400px; }
div.box p.box.comment { margin-top: 25px; font-size: .9em; }

.footer {
	clear: both;
	text-align: center;
	position: relative;
	margin: 20px 0 0;
	padding: 20px 0 5px;
	font: normal normal 1.em/1.1em "Helvetica Neue", Helvetica, Arial, sans-serif;
	border-top: 4px double #ccc;
}
-->
</style>
</head>
<body>
	<div class="wrapper">
		<h1><?php echo $l_header; ?></h1>
		<h2><?php echo $l_intro; ?></h2>
		<p><?php echo $l_intro_exp; ?></p>
		<hr class="clean" />
		<p class="comment"><?php echo $l_intro_comment; ?></p>
		<hr />
		<h2><?php echo $l_browsers; ?></h2>
		<p><?php echo $l_browsers_exp; ?></p>
		<hr class="clean" />
<?php
			browserBox();
?>
		<div class="footer">
			<span><?php echo $footer; ?></span>
		</div>
	</div>
	<!-- Piwik or StatCounter Code -->
</body>
</html>