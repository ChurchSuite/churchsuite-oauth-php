# ChurchApp OAuth Example - PHP

An example implementation of the ChurchApp OAuth flow, using the OAuth2 package from @adoy.

* OAuth2: https://github.com/adoy/PHP-OAuth2

In order to use this script you must add a config.php file to the directory containing:

````php
<?php
define('CLIENT_IDENTIFIER', 'YOUR_CLIENT_ID');
define('CLIENT_SECRET', 'YOUR_CLIENT_SECRET');
define('CLIENT_ENDPOINT', 'https://yourchurch.churchapp.co.uk/oauth');
?>
````

Once your config.php is setup you will be able to view the first page when served by a web server.
