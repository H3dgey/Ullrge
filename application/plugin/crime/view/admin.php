<h1 class="page-header">Crime | Admin</h1>
<div class="row">
<h3>Add</h3>
<form class="form-horizontal" role="form" action="<?php echo URL; ?>crime/admin" method="post">
  <div class="form-group">
    <label class="col-md-3 control-label">Name:</label>
    <div class="col-md-3">
      <input class="form-control" value="" type="text" name="name">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label">Description:</label>
    <div class="col-md-8">
      <input class="form-control" value="" type="text" name="description">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label">Energy Cost:</label>
    <div class="col-md-1">
      <input class="form-control" value="" type="text" name="energy_cost">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label"></label>
    <div class="col-md-8">
      <input class="btn btn-primary" value="Add" name="submit" type="submit">
      <span></span>
      <input class="btn btn-default" value="Cancel" type="reset">
    </div>
  </div>
</form>
</div>
<hr/>
<div class="row">
<h3>Edit</h3>
<?php $linecolor = 1; foreach ($crime as $crimes) { ?>
<form class="form-inline" role="form" action="<?php echo URL; ?>crime/admin" method="post">
  <div class="form-group">
    <label>Name:</label>

      <input class="form-control" value="<?php echo $crimes->name; ?>" type="text" name="name">

  </div>
  <div class="form-group">
    <label>Description:</label>

      <input class="form-control" value="<?php echo $crimes->description; ?>" type="text" name="description">

  </div>
  <div class="form-group">
    <label>Energy Cost:</label>

      <input class="form-control" value="<?php echo $crimes->energy_cost; ?>" type="text" name="energy_cost">

  </div>
  <input class="form-control" value="<?php echo $crimes->crime_id; ?>" type="hidden" name="crime_id" hidden>
  <div class="form-group">
    <label></label>

      <input class="btn btn-primary" value="Edit" name="submit" type="submit">

  </div>
</form>

<?php } ?>
<hr/>
<div class="row">
<h3>Delete</h3>
<?php $linecolor = 1;
  foreach ($crime as $crimes) { ?>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 linecolor<?php echo ($linecolor++ % 2); ?>">
      <div class="col-md-4 col-sm-4 col-xs-6">
        <?php echo $crimes->name; ?>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-0">
        <?php echo $crimes->description; ?>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-3">
        <?php echo $crimes->energy_cost; ?>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-3">
        <form class="form-inline" role="form" action="<?php echo URL; ?>crime/admin" method="post">
        <input class="form-control" value="<?php echo $crimes->crime_id; ?>" type="hidden" name="crime_id">
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-danger" value="Delete" name="submit" type="submit">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php } ?>
  <hr/>
</div>
</div>
  <!-- Timed Modal -->
<?php if (isset($message)) { ?>
<div id="timedModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <?php if ($error === false) {
              echo '<p class="bg-success">'.$message.'</p>';
            } elseif ($error === true) {
              echo '<p class="bg-danger">'.$message.'</p>';
            }?>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Timed Modal END -->