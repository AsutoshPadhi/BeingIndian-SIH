<!DOCTYPE html>
<html>

    <head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../functions/ajax.js"></script>
    <script src="urlGenerator.js"></script>
    <script src="tabs.js"></script>

    <title>Better India!</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Social Buttons CSS -->
    <link href="../vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' id='bbp-default-css'  href='style.css' type='text/css'/>
        <link rel='stylesheet' id='bbp-default-css'  href='styleHowTo.css' type='text/css'/>
        <title>How To? User</title>
		
		<style>
			button.accordion {
				background-color: #eee;
				color: #444;
				cursor: pointer;
				padding: 18px;
				width: 100%;
				border: none;
				text-align: left;
				outline: none;
				font-size: 15px;
				transition: 0.4s;
			}

			button.accordion.active, button.accordion:hover {
				background-color: #ddd; 
			}

			div.panel {
				padding: 0 18px;
				display: none;
				background-color: white;
			}
			h1 { color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px; font-weight: normal; line-height: 48px; margin: 0; }
		</style>
    </head>

    <body>
        <div class="headMain">
            <h1>User Guide for Better India!</h1>
        </div>

		<button class="accordion">Searching an Issue</button>
		<div class="panel">
		  <p>To search for a particular issue, the user has to enter the state and district and may also add the locality and pincode. Adding keywords or the issuecodes also gives us the particular problem in the result.</p>
		</div>

		<button class="accordion">Upvoting an Issue</button>
		<div class="panel">
		  <p>To upvote an issue, the user may click on the upvote button and their vote will be counted. The user has to sign up and log in to upvote an issue. Once the number of votes reach our threshold, they are displayed to the institutes and experts in that area. </p>
		</div>

		<button class="accordion">Adding an Issue</button>
		<div class="panel">
		  <p>To add an issue, user has to sign up and login. The new issue added goes in the pool of existing issues, and can now be upvoted by the users. </p>
		</div>
		
		<button class="accordion">Updating User Profile</button>
		<div class="panel">
		  <p>Once the user has logged in using their email id, they can now update and add details to their profile, including the locality where they live. After this, they are shown the issues in their area, However, they may choose to view and upvote issues of different areas as well.</p>
		</div>
		
		<button class="accordion">Checking User History</button>
		<div class="panel">
		  <p>To simplify the process for the user, he can view the history for: </p>
		  <ul>
		  <li>  The issues added by the user. </li>
		  <li>  The issues upvoted by the user. </li>
		  </ul>
		  <p> This can be done by viewing the 'History' section in the dashboard.</p>
		</div>

		<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].onclick = function(){
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			}
		}
		</script>
        <!--<div class="index">
            <a href="#search">Search an Issue</a>
            <a href="#upvote">Upvote an Issue</a>
            <a href="#add">Add an Issue</a>
            <a href="#profile">Update Profile</a>
            <a href="#history">Check History</a>
        </div>
        <div class="container">
            <div class="head" id="search">
                Searching an Issue
            </div>
            <div class="text">
                This section will tell user how to search with some images and stuff.
            </div>
            <div class="head" id="upvote">
                Upvoting an Issue
            </div>
            <div class="text">
                This section will tell user how to upvote with some images and stuff.
            </div>
            <div class="head" id="add">
                Adding an Issue
            </div>
            <div class="text">
                This section will tell user how to add an Issue with some images and stuff.
            </div>
            <div class="head" id="profile">
                Updating user profile
            </div>
            <div class="text">
                This section will tell user how to update user profile with some images and stuff.
            </div>
            <div class="head" id="history">
                Checking user history
            </div>
            <div class="text">
                This section will tell user how to see user's' previous engagements with some images and stuff.
            </div>
        </div>-->
    </body>

</html>