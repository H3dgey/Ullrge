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
    <!-- Internal CSS -->
    <link href="<?php echo URL; ?>css/external.style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/external.custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL; ?>"><?php echo SITE_NAME; ?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo URL; ?>">Contact</a>
                    </li>
                    <li>
                        <button type="button" class="btn navbar-btn btn-primary bootstrap-iso" data-toggle="modal" data-target="#loginModal">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation END -->
    <!-- Main Display Image. Change image in style.css file. -->
    <?php if ("$_SERVER[REQUEST_URI]" === "/home" || "$_SERVER[REQUEST_URI]" === "/home/index" || "$_SERVER[REQUEST_URI]" === "/") { ?>
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tagline"><?php echo SITE_TAGLINE; ?></h1>
                </div>
            </div>
        </div>
    </header>
    <?php } ?>
    <!-- Main Display Image END -->
    <!-- Main Content Container -->
    <div class="container">
    <hr>  

    <!-- Login Modal -->
    <div id="loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="bootstrap-iso">
             <div class="container-fluid">
              <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="formden_header">
                 <h2>
                  Login
                 </h2>
                 <p>
                 </p>
                </div>
                <form method="post" action="<?php echo URL; ?>home/login">
                 <div class="form-group ">
                  <label class="control-label requiredField" for="email">
                   Email
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="email" name="email" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="password">
                   Password
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="password" name="password" placeholder="Password" type="password"/>
                 </div>
                 <div class="form-group">
                  <div>
                   <button class="btn btn-primary " name="submit" type="submit">
                    Login
                   </button>
                  </div>
                 </div>
                </form>
               </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login Modal END-->