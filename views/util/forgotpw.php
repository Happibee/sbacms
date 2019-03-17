<?php 
  include '../includes/header.php';

  require '../../assets/phpmailer/class.smtp.php';
  require '../../assets/phpmailer/class.phpmailer.php';

  $database = new Database();
  $db = $database->getConnection();

  $customer = new Customer($db);

  if(isset($_POST['submit'])){
    $code = md5(rand());

    $customer->emailAdd = $_POST['emailAdd'];
    $customer->pass_code = $code;

    //verifies if email exists or not. if it exists, send something to that email
    if($customer->existingEmail()){
      $base_url = "http://localhost/sbacms/";
      $mail_body = "
      <h1>Hello!</h1>
      <h3>Want to change your password?</h3>

      <p>Please click the link to change your password.</p> <br/>".$base_url."changepass.php?verify=".$code."
      <p>Regards, <br />SBACMS Team</p>";
      //echo "Email Exists";

      $mail = new PHPMailer(true);

      $mail->IsSMTP();
      $mail->IsHTML(true);

      //checks error messages and stuff
      //$mail->SMTPDebug = 1;  

      $mail->Host = 'smtp.gmail.com';
      $mail->Port = '465';
      $mail->SMTPAuth = true;
      $mail->Username = 'sysanacloud@gmail.com';
      $mail->Password = 'cloudsysana';
      $mail->SMTPSecure = 'ssl';
      $mail->SetFrom = 'sysanacloud@gmail.com';

      $mail->FromName = 'Salon De Bliss';
      $mail->WordWrap = 50;

      $mail->AddAddress($_POST['emailAdd']);

      $mail->Subject = 'Salon De Bliss | Change Password';
      $mail->Body = $mail_body;

      if($mail->Send()){
        $message = "Please click on the link that has been sent to your email to change your password.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: index.php");
      }
      else{
        $message = "Email not sent.";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      
    }

    else{
      echo "Email Does not Exist here :'((";
    }
  }

?>

<div class="form-gap">
<div class="container">
	<div class="row">
  <!--Left Space-->
  <div class='col-sm-3'>
    <!--Left Space-->
  </div>
		<div class="col-md-6">
      <div class="panel panel-default">
          <div class="panel-body">
            <div class="text-center">
              <h2 class="text-center">Forgot Password?</h2>
                <p>Please enter your verified email to reset your password.</p>
                  <div class="panel-body">
                    <form action='forgotpw.php' method="post">
                      <div class="form-group">
                        <div class="input-group">
                          <input name="emailAdd" placeholder="Email Address" class="form-control"  type="email">
                        </div>
                      </div>
                      <!--Button to send stuff to email-->
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit">
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                  </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>