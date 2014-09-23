browser-upgrade-page
--------------------

Just a simple (friendly) way to show the visitors they have an outdated and unsupported browser, because it may/may not be compatible with the site. Target is Internet Explorer.

It will redirect the visitors to a custom page (`upgrade.php`), where they will be told to upgrade their browser. A list of a few browser are presented below. It's a stand alone page with all code on the same page, so you can easlily use it where ever you want.

Affected browsers are Internet Explorer 5-8, but it's easy to edit that.



### Installation:

Open `upgrade.php` and change any text, if you want or need to.

Then upload the file + the folder (to your `{root}/`).

Edit your `.htaccess` file (...if you have one)

	Options All -Indexes +FollowSymLinks

	# Using IE=edge & chrome=1 in the example
	<IfModule mod_setenvif.c>
		<IfModule mod_headers.c>
			BrowserMatch MSIE ie
			Header set X-UA-Compatible "IE=edge,chrome=1" env=ie
		</IfModule>
	</IfModule>
	<IfModule mod_headers.c>
		Header append Vary User-Agent
	</IfModule>

	# Redirecting IE5/6/7/8 to a custom "upgrade page".
	RewriteEngine on
	RewriteCond %{HTTP_USER_AGENT} MSIE\ [5-8]
	# We allow IE9+ to pretend it's IE7/8 (IE7/8 + Trident/5.0) (eg F12 - dev/compat mode)
	RewriteCond %{HTTP_USER_AGENT} !(MSIE\ [7-8]).*(Trident\/5)
	RewriteCond %{REQUEST_URI} !/upgrade.php
	RewriteCond %{REQUEST_URI} !/upgrade/
	RewriteRule ^(.*)$ /upgrade.php [L]


If you don't have an `.htaccess` file already? Upload the included file (`_.htaccess`) to your server, and rename it.

	_.htaccess -> .htaccess



### Screenshot

![](https://raw.githubusercontent.com/iEFdev/browser-upgrade-page/master/screenshot.png)