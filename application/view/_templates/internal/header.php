<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Hedge - h3dge.com">
    <title><?php echo SITE_NAME; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- Form Specific CSS -->
    <link href="https://formden.com/static/cdn/bootstrap-iso12.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo URL; ?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Internal CSS -->
    <link href="<?php echo URL; ?>css/internal.style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/internal.custome.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
  <!-- Navigation -->
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL; ?>explore"><?php echo SITE_NAME; ?></a>
        </div>
        <!-- Stats -->
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="#"><strong>Cash: </strong>$<?php echo $this->UserCurrency->cash; ?></a>
            </li>
            <li>
              <a href="#"><strong>Points: </strong><?php echo $this->UserCurrency->points; ?></a>
            </li>
            <li>
              <a href="#"><strong>Credits: </strong><?php echo $this->UserCurrency->credits; ?></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo URL; ?>explore/logout"><strong>Logout</strong></a>
            </li>
          </ul>
        </div>
        <!-- Stats END -->
      </div>
    </nav>
    <!-- Navigation END -->
    <!-- Main Content Area -->
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
<div class="row">