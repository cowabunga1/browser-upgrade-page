<?php
// extracted parts from upgrade.php
$page_vars = array(
	'year'		=> date('Y'),
	'site'		=> $_SERVER['HTTP_HOST'],
);
extract($page_vars);

$text_vars = array(
	'title'				=> 'Index :: Dummy',
	'header'			=> 'Index',
	'intro_exp'			=> 'Just a dummy page&hellip;',
);
extract($text_vars, EXTR_PREFIX_ALL, 'l');

$footer = sprintf('&copy; 2014-%1s, <a href="//%2s/">%3s</a>', $year, $site, $site);
?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $l_title; ?></title>
<link rel="icon" href="./upgrade/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="./upgrade/favicon.ico" type="image/x-icon" />
<style type="text/css">
<!--
/* simple reset */
* {	margin: 0; padding: 0; border: 0; outline: none; text-decoration: none; zoom: 1; }

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
p { margin: 0 0 8px; text-align: justify; }
/* Links */
a { color: #39e; }
a:hover { position: relative; text-decoration: underline; }
a:active { color: #369;}

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
		<p><?php echo $l_intro_exp; ?></p>
		<div class="footer">
			<span><?php echo $footer; ?></span>
		</div>
	</div>
	<!-- Piwik or StatCounter Code -->
</body>
</html>