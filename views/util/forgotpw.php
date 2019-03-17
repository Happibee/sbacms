<?php 
include 'header.php'
?>

 <div class="form-gap">
<div class="container">
	<div class="row">
  <!--Left Space-->
  <div class='col-sm-3'><!--Left Space-->
    </div>
		<div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Please enter your verified email</p>
                  <div class="panel-body">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                      <div class="form-group">
                        <div class="input-group">
                          <input id="email" name="email" placeholder="Email Address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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