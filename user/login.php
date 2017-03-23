<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/styleLogin.css">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="544991555244-56l58k2od6ib7ahfm1bup3ea78q1g3gg.apps.googleusercontent.com">
    </head>
    <?php
    require_once __DIR__.'/gplus/vendor/autoload.php';

    const CLIENT_ID = '544991555244-5pemrlfvr778rqql3demuc5qkl05pild.apps.googleusercontent.com';
    const CLIENT_SECRET = 'mrGZsngSYw6bjHcdNPnruup_';
    const REDIRECT_URI = 'http://localhost:80/user/login.php';

    $client = new Google_Client();
    $client->setClientId(CLIENT_ID);
    $client->setClientSecret(CLIENT_SECRET);
    $client->setRedirectUri(REDIRECT_URI);
    $client->setScopes('email');

    $plus = new Google_Service_Plus($client);

    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
        $me = $plus->people->get('me');

        $id = $me['id'];
        $name = $me['displayName'];
        $fname = $me['name']['givenName'];
        $lname = $me['name']['familyName'];
        $email =  $me['emails'][0]['value'];
        $profile_image_url = $me['image']['url'];
        $cover_image_url = $me['cover']['coverPhoto']['url'];
        $profile_url = $me['url'];

    } else {
    // get the login url   
        $authUrl = $client->createAuthUrl();
    }


    ?>
    <body>
        <div class="mainBox">
            <div class="loginText">
                User Login
            </div>
            <div class="styleBox">
                <?php
                if (isset($authUrl)) { ?>
                    <!--echo "<a href='" . $authUrl . "'><img class='loginButton_gplus' src='gplus/signin_button.png' height='50px'/></a>";-->
                    <a class="btn btn-block btn-social btn-google-plus" href='<?php echo $authUrl ?>'>
                        <i class="fa fa-google-plus"></i> Sign in with Google
                    </a>
                <?php
                } 
                else {
                    session_start();
                    $_SESSION['$name'] = $name;
                    $_SESSION['$fname'] = $fname;
                    $_SESSION['$lname'] = $fname;
                    $_SESSION['$email'] = $email;
                    header('Location: dashboard.php');
                    // echo "<a href='?logout'><img src='gplus/signout_button.png' height='50px'/></a></a>";
                }
                ?>
            </div>
        </div>
    <body>
</html>

