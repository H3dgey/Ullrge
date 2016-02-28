<!-- Error Modal -->
<?php if (isset($check_inputs)) { ?>
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
<!-- Main Content -->
<div class="row">
  <!-- Join Form -->
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="bootstrap-iso">
     <div class="container-fluid">
       <div class="formden_header">
         <h2>
          Join
         </h2>
         <p>
         </p>
        </div>
        <form method="post" action="<?php echo URL; ?>home/register">
         <div class="form-group ">
          <label class="control-label requiredField" for="name_first">
           First Name
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="name_first" name="name_first" placeholder="John" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label requiredField" for="name_last">
           Last Name
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="name_last" name="name_last" placeholder="Smith" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label requiredField" for="email">
           Email
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="email" name="email" placeholder="john.smith@gmail.com" type="text"/>
          <span class="help-block" id="hint_email">
           Account verification via email required.
          </span>
         </div>
         <div class="form-group ">
          <label class="control-label requiredField" for="password">
           Password
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="password" name="password" placeholder="Password" type="password"/>
          <span class="help-block" id="hint_password">
           Min 6 - Max 20 Characters. (A-Z, a-z, 0-9).
          </span>
         </div>
         <div class="form-group ">
          <label class="control-label requiredField" for="password_repeat">
           Password
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="password_repeat" name="password_repeat" placeholder="Repeat Password" type="password"/>
         </div>
         <div class="form-group">
          <div>
           <button class="btn btn-primary " name="submit" type="submit">
            Join
           </button>
          </div>
         </div>
        </form>
      
     </div>
    </div>
  </div>
  <!-- Join Form END -->
  <!-- Middle Content Area -->
  <div class="col-md-4 col-sm-4 col-xs-12">
    <h3>What is ????</h3>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
  </div>
  <!-- Middle Content Area END -->
  <!-- Right Content Area -->
  <div class="col-md-4 col-sm-4 col-xs-12">
    <h3>What is ????</h3>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
  </div>
  <!-- Right Content Area END -->
</div>
<!-- Main Content END -->