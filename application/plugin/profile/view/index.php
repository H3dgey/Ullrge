  <h1 class="page-header">Profile</h1>
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="<?php echo $user->avatar; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
      </div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3><?php echo $user->username; ?></h3>
      <p><strong>Joined: </strong><?php echo date('m/d/Y', $user->join_date); ?></p>
      <p><strong>Level: </strong><?php echo $stats->level; ?></p>
      <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
          <strong>Health: </strong>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-10">
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $stats->health_current; ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $stats->health_percent; ?>;">
              <?php echo $stats->health_percent; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>