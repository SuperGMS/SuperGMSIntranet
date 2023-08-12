<?php
    require '../includes/steamauth/steamauth.php';
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded
	// unset($_SESSION['steam_uptodate']);

if(!isset($_SESSION['steamid'])) {
    
    loginbutton(); //login button

}  else {
    include ('../includes/steamauth/userInfo.php');

    $uid = $userFetch['id'];
    $SteamName = $steamprofile['personaname'];
    $SteamAvatar = $steamprofile['avatarfull'];
    $Steam_id_dec = $steamprofile['steamid'];
    $Steam_id_hex = 'steam:'.dec2hex($Steam_id_dec);

      $query = $db->query("INSERT INTO user_whitelist (uid, identifier) VALUES (
        '".$uid."',
        '".$Steam_id_dec."')");

        $query .= $db->query("UPDATE users_ws SET avatar = '".$SteamAvatar."' WHERE id = '".$uid."'");
    ?><script>location.href='<?php echo $site; ?>/instellingen';</script><?php
}
?>

