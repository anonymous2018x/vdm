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
            <div id="firebaseui-auth-container" class="" style="margin-top: 30px;"></div>

            <!-- create group -->
            <div id="register-group" class="">
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
            <div id="register-user" class="">
			<?php include("membership_signup.php");?>
            </div>
          </div>

        </div>
      </div>
    </div>