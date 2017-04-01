<!--Institute login modal--> 
<!DOCTYPE html>
<html>
<head>

</head>
<body>

 <?php
 echo "
 
 <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true>
 <div class='panel-body'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 style='text-align:center'>Login Form</h4>
                                        </div>
                                        <div class='modal-body'>
                                         <div class='fullpage' id='i1'>
  <form action='login3.php' method='post'>
  <div class='container'>
    <label><b>Email</b></label>
    <input type='email' placeholder='Enter Email' name='username' required>
    <br><br>
    <label><b>Password</b></label>
    <input type='password' placeholder='Enter Password' name='password' required maxlength=9>
    <br><br>
    <input type='submit' value='LOGIN' name='loginuser' class='login'>
    <br><br>
    <input type='checkbox' checked='checked'> Remember me
  </div>
</form>
    <div style='top:160px;text-align:right'>
    <span class='psw'>Forgot <a href='#''>password?</a></span>
    </div>
  </div>
  </div>

                                                                                    </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            </div>";
                            ?>
                            </body>
                            </html>