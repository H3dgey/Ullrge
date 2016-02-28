  </div>
</div>
<!-- Main Content Area END -->
<!-- Sidebar -->
<div class="col-xs-6 col-sm-3 sidebar-offcanvas text-center" id="sidebar">
  <div class="list-group">
    <a href="<?php echo URL.'profile/index/'.$this->UserInfo->user_id; ?>" class="list-group-item"><h4><?php echo $this->UserInfo->username; ?></h4></a>
    <div class="center-block">
        <img src="<?php echo $this->UserInfo->avatar; ?>" class="avatar img-thumbnail list-group-item img-responsive" alt="avatar">
    </div>
    <a href="#" class="list-group-item">
        <strong>Level: </strong><?php echo $this->UserStats->level; ?><br>   
    </a>
    <hr>
    <h6>Energy</h6>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->UserStats->energy_current; ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $this->UserStats->energy_percent; ?>;">
            <?php echo $this->UserStats->energy_percent; ?>
        </div>
    </div>
    <h6>Experiance</h6>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->UserStats->experiance_current; ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $this->UserStats->experiance_percent; ?>;">
            <?php echo $this->UserStats->experiance_percent; ?>
        </div>
    </div>
    <h6>Health</h6>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->UserStats->health_current; ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $this->UserStats->health_percent; ?>;">
            <?php echo $this->UserStats->health_percent; ?>
        </div>
    </div>
  </div>
</div>
<!-- Sidebar END -->
</div>
<hr>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <?php echo SITE_NAME . ' ' . date("Y"); ?> | Ullr Game Engine</p>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
</div>
<!-- Main Content Container END -->
<!-- AJAX URL Setting-->
<script>
    var url = "<?php echo URL; ?>";
</script>
<!-- JQuery -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Internal JavaScript -->
<script src="<?php echo URL; ?>js/offcanvas.js"></script>
<script src="<?php echo URL; ?>js/application.js"></script>
<!-- Error Modal JavaScript -->
<script>$(document).ready(function(){$("#errorModal").modal("show");$("#errorBtn").click(function(){$("#errorModal").modal("hide");});});</script>
<!-- Timed Modal JavaScript -->
<script>$(document).ready(function(){$("#timedModal").modal("show");setTimeout(function(){$("#timedModal").modal("hide");},750);});</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo URL; ?>js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>