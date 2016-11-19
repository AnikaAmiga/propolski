
<link rel="stylesheet" type="text/css" href="/web/static/css/autorizashko.css" />
<script src="/web/static/js/autorizashko.js"></script>
<?
if (isset($_COOKIE['login']) && isset($_COOKIE['sesson']) 
	&& $_SESSION["login"]==$_COOKIE['login'] && $_SESSION["sesson"]==$_COOKIE['sesson']){
		require_once "profile_view.php"; 
} else {
	if (isset($_GET['route'])) {
		$route = trim(htmlspecialchars(strip_tags($_GET['route'])));
		switch ($route) {
			case 'reg':
				require_once "sign_registrate_view.php"; 
				break;
			case 'rememberPass':
				require_once "sign_rememberPass_view.php";
				break;
			default:
				require_once "sign_auth_view.php";
				break;
		}
	} else {
		require_once "sign_auth_view.php";
	}
}


?>

