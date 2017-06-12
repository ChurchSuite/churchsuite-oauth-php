<?php
require_once('oauth2/Client.php');
require_once('oauth2/GrantType/IGrantType.php');
require_once('oauth2/GrantType/AuthorizationCode.php');

require_once('config.php');

$client = new OAuth2\Client(CLIENT_IDENTIFIER, CLIENT_SECRET);

if (isset($_GET['auth'])) {
	//no code and no token so redirect user to log in
	$auth_url = $client->getAuthenticationUrl(CLIENT_ENDPOINT.'/authorize', '');
	header('Location: '.$auth_url);
	exit;

} elseif (isset($_GET['code'])) {

	//we have a code so use it to get an access token
	$response = $client->getAccessToken(
		CLIENT_ENDPOINT.'/token',
		'authorization_code',
		array('code' => $_GET['code'], 'redirect_uri' => '')
	);

	$token = $response['result']['access_token'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ChurchSuite OAuth PHP Example</title>
	<meta content="index,follow" name="robots" />
	<meta charset="utf-8" />
	<link href="/style.css" rel="stylesheet" />
</head>
<body>
	<?php if (!isset($token)) : ?>
	<h1>Test Application</h1>
	<p><a href="?auth=true">Authorize App</a></p>
	<?php else : ?>
		<?php echo 'Access Token: '.$token; ?>
	<?php endif; ?>
</body>
</html>
