<!-- Error Modal -->
<?php if ((isset($check_inputs)) || (isset($error))) { ?>
<div id="errorModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" id="errorBtn">&times;</button>
        <?php if (is_array($check_inputs)) {
          foreach($check_inputs as $error){
              echo '<p class="bg-danger">'.$error.'</p>';
            } }else {echo '<p class="bg-danger">'.$error.'</p>';} ?>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Error Modal END -->
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="<?php echo $user->avatar; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        <form class="form-horizontal" role="form" action="<?php echo URL; ?>profile/avatar" method="post">
          <div class="form-group">
            <div class="col-md-12">
              <input class="form-control" value="" placeholder="example: http://url.com/picture.jpg" type="text" name="avatar">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input class="btn btn-primary" value="Change Avatar" name="submit" type="submit">
              <span></span>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" action="<?php echo URL; ?>profile/general" method="post">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user->name_first; ?>" type="text" name="name_first">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user->name_last; ?>" type="text" name="name_last">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user->email; ?>" type="text" name="email" disabled>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Update Profile" name="submit" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>

      <h3>Username</h3>
      <form class="form-horizontal" role="form" action="<?php echo URL; ?>profile/username" method="post">
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?php echo $user->username; ?>" type="text" name="username">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Change Username" name="submit" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>

      <h3>Password</h3>
      <form class="form-horizontal" role="form" action="<?php echo URL; ?>profile/password" method="post">
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="password" name="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="password" name="password_repeat">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Change Password" name="submit" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
