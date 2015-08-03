MVC Framework 
=============

In house crafted framework on MVC architecture


Completed
---------
1. URL processing
2. Model
3. Controller

To DO
-----
1. Database Connection usind PDO
2. Additional Requirnments as per required


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