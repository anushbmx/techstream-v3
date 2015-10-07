The Backend script that runs http://techstream.org

MVC Framework 
=============

In house crafted framework on MVC architecture

Settings
========


In Nginx add the following to 'default' file inside sites-avalible

	location /x/public/ {
		if (!-e $request_filename)
		{
		    rewrite ^/x/public/(.+)$ /x/public/index.php?url=$1 last;
		}
		error_page 404 /index.php;
	}

For Apache Server
	Options -MultiViews
	RewriteEngine on
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]

Configuring
===========

Create a file <code>settings-local.php</code> and copy the contents inside settings-local.sample. Fill in the values and hit run.