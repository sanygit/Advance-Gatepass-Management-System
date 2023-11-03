<!DOCTYPE html>
<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<?php if(!defined('datalist_db_encoding')) define('datalist_db_encoding', 'UTF-8'); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo ucwords('GPMS'); ?> | <?php echo (isset($x->TableTitle) ? $x->TableTitle : ''); ?></title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Add custom CSS here -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="fa fa-home">GPMS</span></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="gatepass_view.php"><i class="fa  fa-credit-card"></i> <span>Gate Pass</span></a></li>
          <li><a href="staff_view.php"><i class="fa fa-users"></i> <span>Staff</span></a></li>
          <li><a href="individuals_view.php"><i class="fa fa-user-plus"></i> <span>Individual</span></a></li>
          <li><a href="kikundi_view.php"><i class="fa  fa-users"></i> <span>Group</span></a></li>
          <li><a href="vehicles_view.php"><i class="fa fa-truck"></i> <span>Vehicle</span></a></li>
          <li><a href="luggage_view.php"><i class="fa  fa-suitcase"></i> <span>Luggage</span></a></li>
          <li><a href="gates_view.php"><i class="fa  fa-institution"></i> <span>Gates</span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>  More..  <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="http://localhost/gpmsproject/gatepass_view.php?SortField=&SortDirection=&FilterAnd%5B1%5D=and&FilterField%5B1%5D=13&FilterOperator%5B1%5D=equal-to&FilterValue%5B1%5D=Pending&FilterAnd%5B5%5D=and&FilterAnd%5B9%5D=and&FilterAnd%5B13%5D=and&FilterAnd%5B17%5D=and&FilterAnd%5B21%5D=and&FilterAnd%5B25%5D=and&FilterAnd%5B29%5D=and&FilterAnd%5B33%5D=and&FilterAnd%5B37%5D=and&FilterAnd%5B41%5D=and&FilterAnd%5B45%5D=and&FilterAnd%5B49%5D=and&FilterAnd%5B53%5D=and&FilterAnd%5B57%5D=and&FilterAnd%5B61%5D=and&FilterAnd%5B65%5D=and&FilterAnd%5B69%5D=and&FilterAnd%5B73%5D=and&FilterAnd%5B77%5D=and">Pending GPs</a></li>
              <li><a href="http://localhost/gpmsproject/gatepass_view.php?SortField=&SortDirection=&FilterAnd%5B1%5D=and&FilterField%5B1%5D=13&FilterOperator%5B1%5D=equal-to&FilterValue%5B1%5D=Rejected&FilterAnd%5B5%5D=and&FilterAnd%5B9%5D=and&FilterAnd%5B13%5D=and&FilterAnd%5B17%5D=and&FilterAnd%5B21%5D=and&FilterAnd%5B25%5D=and&FilterAnd%5B29%5D=and&FilterAnd%5B33%5D=and&FilterAnd%5B37%5D=and&FilterAnd%5B41%5D=and&FilterAnd%5B45%5D=and&FilterAnd%5B49%5D=and&FilterAnd%5B53%5D=and&FilterAnd%5B57%5D=and&FilterAnd%5B61%5D=and&FilterAnd%5B65%5D=and&FilterAnd%5B69%5D=and&FilterAnd%5B73%5D=and&FilterAnd%5B77%5D=and">Rejected GPs</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">
          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo getLoggedMemberID(); ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo PREPEND_PATH; ?>membership_profile.php"><i class="fa fa-user"></i> My Profile Settings</a></li>
              <!--admin area starts-->
              <li>
               <?php if(getLoggedAdmin()){ ?>
               <a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn btn-sm hidden-xs"><i class="fa fa-cog"></i> <?php echo $Translation['admin area']; ?></a>
               <a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn btn-sm visible-xs btn-sm"><i class="fa fa-cog"></i> <?php echo $Translation['admin area']; ?></a>
               <?php } ?>
               <?php if(!$_GET['signIn'] && !$_GET['loginFailed']){ ?>
               <?php if(getLoggedMemberID() == $adminConfig['anonymousMember']){ ?>
               <p class="navbar-text navbar-right">&nbsp;</p>
               <a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn btn-sm navbar-right"><?php echo $Translation['sign in']; ?></a>
               <p class="navbar-text navbar-right">
                <?php echo $Translation['not signed in']; ?>
              </p>
              <?php }else{ ?>
              <ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
              </ul>
              <ul class="nav navbar-nav visible-xs">
              </ul>
              <?php } ?>
              <?php } ?>
            </li>
            <!--admin area ends-->
            <li class="divider"></li>
            <li><a class="btn navbar-btn btn-primary" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="fa fa-power-off"></i> <?php echo $Translation['sign out']; ?></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>

  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1><small> Gatepass Management System</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.php" style="text-decoration: none;"><i class="icon-dashboard"></i><strong>GPMSa</strong></a></li>
          <li class="active"><i class="icon-file-alt"></i><strong>Dashboard</strong></li>
        </ol>
      </div>
    </div><!-- /.row -->
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
