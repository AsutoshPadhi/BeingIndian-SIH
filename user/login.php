<!DOCTYPE html>
<html>
    <?php
    require_once __DIR__.'/gplus/vendor/autoload.php';

    const CLIENT_ID = '544991555244-5pemrlfvr778rqql3demuc5qkl05pild.apps.googleusercontent.com';
    const CLIENT_SECRET = 'mrGZsngSYw6bjHcdNPnruup_';
    const REDIRECT_URI = 'http://localhost:80/user/login.php';    

    session_start();

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
            <div class="styleBox">
                <?php
                if (isset($authUrl)) { 
                    $string = 'Location: '.$authUrl;
                    header($string);
                } 
                else {
                    $_SESSION['$name'] = $name;
                    $_SESSION['$fname'] = $fname;
                    $_SESSION['$lname'] = $lname;
                    $_SESSION['$email'] = $email;

                    require('../functions/dataBaseConn.php');
                    $sql = "SELECT user_email from  user WHERE user_email = '".$email."'";
                    $result = $conn->query($sql);

                    $sql = "SELECT * from user";
                    $results = $conn->query($sql);
                    $count = 0;
                    while($count < $results->num_rows){
                        $count++;
                    }
                    $count = $count +1;
                    if($result->num_rows == 0){
                        $sql2 = "INSERT INTO user(user_id,user_email,fname,lname) VALUES($count,'$email','$fname','$lname')";
                        if($conn->query($sql2)){
                        }
                    }
                    header('Location: dashboard.php');
                }
                ?>
            </div>
        </div>
    <body>
</html>

