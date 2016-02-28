  <h1 class="page-header">Crime</h1>
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
        <a href="<?php echo URL; ?>crime/commit/<?php echo $crimes->crime_id; ?>" class="btn btn-primary">Commit</a>
      </div>
    </div>
  </div>
  <?php } ?>
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