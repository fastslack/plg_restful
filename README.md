plg_restful
===========

This plugin allow RESTful connections on Joomla CMS

How to use
----------

- Install the plugin into Joomla CMS
- Modify the .htaccess and add this lines

RewriteRule ^api/([^/]*)/([^/]*)$ index.php [L]

RewriteRule ^api/([^/]*)/([^/]*)/([^/]*)$ index.php [L]

- Configure the RestfulCli script and run it
