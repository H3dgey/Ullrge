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
<script src="<?php echo URL; ?>js/application.js"></script>
<!-- Error Modal JavaScript -->
<script>$(document).ready(function(){$("#errorModal").modal("show");$("#errorBtn").click(function(){$("#errorModal").modal("hide");});});</script>
</body>
</html>