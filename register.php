   <!-- Modal  signup-->
   <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">WELCOME TO VDM</h5>
            <button type="button" class="close" id="signup-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- the start -->
              <div id="register-start">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-subtitle mb-2 text-muted">For you to continue you must have atleast one group</h4>
                      <a id="register-start-new_group"  class="btn btn-sm btn-info col-sm-4">Create one</a>
                      <a id="register-start-join_group"  class="btn btn-sm btn-success col-sm-4">Join existing</a>
                  </div>
                </div>
              </div>
            <!-- auth phone -->
            <div id="firebaseui-auth-container" class="hidden" style="margin-top: 30px;"></div>

            <!-- create group -->
            <div id="register-group" class="hidden">
                <div class="form-group">
                  <div class="alert alert-info" role="alert">
                    NOTE: When we notice other groups from your location with same proposal, we will marge together.
                  </div>
                  <label for="name">Group name</label>
                  <input type="text" class="form-control" id="grp-name" placeholder="Enter Group name">
                </div>
                
                <div class="form-group">
                  <label for="description">Short description</label>
                  <textarea class="form-control rounded-0" id="grp-description" rows="10"></textarea>
                </div>

                <button id="register-group-btn" class="btn btn-lg btn-primary">Next</button>

            </div>

            <!-- register user details -->
            <div id="register-user" class="hidden">
            <?php
              // drop-down of groups allowing self-signup
	            $groupsDropDown = preg_replace('/<option.*?value="".*?><\/option>/i', '', htmlSQLSelect('groupID', "select groupID, concat(name, if(needsApproval=1, ' *', ' ')) from membership_groups where allowSignup=1 order by name", ($cg == 1 ? sqlValue("select groupID from membership_groups where allowSignup=1 order by name limit 1") : 0 )));
              $groupsDropDown = str_replace('<select ', '<select class="form-control" ', $groupsDropDown);
            ?>
            <?php if(!$noSignup){ ?>
            		 
            					<h3 class=""><strong><?php echo $Translation['sign up here']; ?></strong></h3>

            					<form method="post" action="membership_signup.php">
                        			<div class="form-group">
            							<label for="phone" class="control-label">Phone</label>
            							<input class="form-control" type="text"  id="phone" name="phone" readonly>
                        			</div>

                        			<<div class="form-group">
										<label for="group" class="control-label"><?php echo $Translation['group']; ?></label>
										<?php echo $groupsDropDown; ?>
										<span class="help-block"><?php echo $Translation['groups *']; ?></span>
									</div>
                        
            						<div class="form-group">
            							<label for="username" class="control-label"><?php echo $Translation['username']; ?></label>
            							<input class="form-control input-lg" type="text" required="" placeholder="<?php echo $Translation['username']; ?>" id="username" name="newUsername">
            							<span id="usernameAvailable" class="help-block hidden pull-left"><i class="glyphicon glyphicon-ok"></i> <?php echo str_ireplace(array("'", '"', '<memberid>'), '', $Translation['user available']); ?></span>
            							<span id="usernameNotAvailable" class="help-block hidden pull-left"><i class="glyphicon glyphicon-remove"></i> <?php echo str_ireplace(array("'", '"', '<memberid>'), '', $Translation['username invalid']); ?></span>
            							<div class="clearfix"></div>
            						</div>

            						<div class="row">
            							<div class="col-sm-6">
            								<div class="form-group">
            									<label for="password" class="control-label"><?php echo $Translation['password']; ?></label>
            									<input class="form-control" type="password" required="" placeholder="<?php echo $Translation['password']; ?>" id="password" name="password">
            								</div>
            							</div>
            							<div class="col-sm-6">
            								<div class="form-group">
            									<label for="confirmPassword" class="control-label"><?php echo $Translation['confirm password']; ?></label>
            									<input class="form-control" type="password" required="" placeholder="<?php echo $Translation['confirm password']; ?>" id="confirmPassword" name="confirmPassword">
            								</div>
            							</div>
            						</div>

            						<div class="form-group">
            							<label for="email" class="control-label"><?php echo $Translation['email']; ?></label>
            							<input class="form-control" type="text" required="" placeholder="<?php echo $Translation['email']; ?>" id="email" name="email">
            						</div>

            						<?php
            							if(!$adminConfig['hide_custom_user_fields_during_signup']){
            								for($cf = 1; $cf <= 4; $cf++){
            									if($adminConfig['custom'.$cf] != ''){
            										?>
            										<div class="row form-group">
            										   <div class="col-sm-3"><label class="control-label" for="custom<?php echo $cf; ?>"><?php echo $adminConfig['custom'.$cf]; ?></label></div>
            										   <div class="col-sm-9"><input class="form-control" type="text" placeholder="<?php echo $adminConfig['custom'.$cf]; ?>" id="custom<?php echo $cf; ?>" name="custom<?php echo $cf; ?>"></div>
            										</div>
            										<?php
            									}
            								}
            							}
            						?>

            						<div class="row">
            							<div class="col-sm-offset-3 col-sm-6">
            								<button class="btn btn-primary btn-lg btn-block" value="signUp" id="submit" type="submit" name="signUp"><?php echo $Translation['sign up']; ?></button>
            							</div>
            						</div>
                        
            					</form>
            	<script>
            		$j(function() {
            			$j('#username').focus();
                
            			$j('#usernameAvailable, #usernameNotAvailable').click(function(){ /* */ $j('#username').focus(); });
            			$j('#username').on('keyup blur', checkUser);
                
            			/* password strength feedback */
            			$j('#password').on('keyup blur', function(){
            				var ps = passwordStrength($j('#password').val(), $j('#username').val());
                  
            				if(ps == 'strong'){
            					$j('#password').parents('.form-group').removeClass('has-error has-warning').addClass('has-success');
            					$j('#password').attr('title', '<?php echo html_attr($Translation['Password strength: strong']); ?>');
            				}else if(ps == 'good'){
            					$j('#password').parents('.form-group').removeClass('has-success has-error').addClass('has-warning');
            					$j('#password').attr('title', '<?php echo html_attr($Translation['Password strength: good']); ?>');
            				}else{
            					$j('#password').parents('.form-group').removeClass('has-success has-warning').addClass('has-error');
            					$j('#password').attr('title', '<?php echo html_attr($Translation['Password strength: weak']); ?>');
            				}
            			});
                
            			/* inline feedback of confirm password */
            			$j('#confirmPassword').on('keyup blur', function(){
            				if($j('#confirmPassword').val() != $j('#password').val() || !$j('#confirmPassword').val().length){
            					$j('#confirmPassword').parents('.form-group').removeClass('has-success').addClass('has-error');
            				}else{
            					$j('#confirmPassword').parents('.form-group').removeClass('has-error').addClass('has-success');
            				}
            			});
                
            			/* inline feedback of email */
            			$j('#email').on('change', function(){
            				if(validateEmail($j('#email').val())){
            					$j('#email').parents('.form-group').removeClass('has-error').addClass('has-success');
            				}else{
            					$j('#email').parents('.form-group').removeClass('has-success').addClass('has-error');
            				}
            			});
                
            			/* validate form before submitting */
            			$j('#submit').click(function(e){ /* */ if(!jsValidateSignup()) e.preventDefault(); })
            		});
              
            		var uaro; // user availability request object
            		function checkUser(){
            			// abort previous request, if any
            			if(uaro != undefined) uaro.abort();
                
            			reset_username_status();
                
            			uaro = $j.ajax({
            					url: 'checkMemberID.php',
            					type: 'GET',
            					data: { 'memberID': $j('#username').val() },
            					success: function(resp){
            						var ua=resp;
            						if(ua.match(/\<!-- AVAILABLE --\>/)){
            							reset_username_status('success');
            						}else{
            							reset_username_status('error');
            						}
            					}
            			});
            		}
              
            		function reset_username_status(status){
            			$j('#usernameNotAvailable, #usernameAvailable')
            				.addClass('hidden')
            				.parents('.form-group')
            				.removeClass('has-error has-success');
                
            			if(status == undefined) return;
            			if(status == 'success'){
            				$j('#usernameAvailable')
            					.removeClass('hidden')
            					.parents('.form-group')
            					.addClass('has-success');
            			}
            			if(status == 'error'){
            				$j('#usernameNotAvailable')
            					.removeClass('hidden')
            					.parents('.form-group')
            					.addClass('has-error');
            			}
            		}
              
            		/* validate data before submitting */
            		function jsValidateSignup(){
            			var p1 = $j('#password').val();
            			var p2 = $j('#confirmPassword').val();
            			var email = $j('#email').val();
                
            			/* user exists? */
            			if(!$j('#username').parents('.form-group').hasClass('has-success')){
            				modal_window({ message: '<div class="alert alert-danger"><?php echo html_attr($Translation['username invalid']); ?></div>', title: "<?php echo html_attr($Translation['error:']); ?>", close: function(){ /* */ $j('#username').focus(); } });
            				return false;
            			}
                
            			/* passwords not matching? */
            			if(p1 != p2){
            				modal_window({ message: '<div class="alert alert-danger"><?php echo html_attr($Translation['password no match']); ?></div>', title: "<?php echo html_attr($Translation['error:']); ?>", close: function(){ /* */ $j('#confirmPassword').focus(); } });
            				return false;
            			}
                
            			if(!validateEmail(email)){
            				modal_window({ message: '<div class="alert alert-danger"><?php echo html_attr($Translation['email invalid']); ?></div>', title: "<?php echo html_attr($Translation['error:']); ?>", close: function(){ /* */ $j('#email').focus(); } });
            				return false;
            			}
                
            			return true;
            		}
            	</script>

            	<style>
            		#usernameAvailable,#usernameNotAvailable{ cursor: pointer; }
              </style>

            <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>