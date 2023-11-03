<?php include_once("header-user.php"); ?>
<?php include_once("record_counter.php"); ?>
<!DOCTYPE html>
<html>
  <head>
<title>Home</title>
  </head>
  <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-credit-card fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php countrecords("gatepass"); ?></p>
                    <p class="announcement-text"><strong>Gatepass</strong></p>
                  </div>
                </div>
              </div>
              <a href="gatepass_view.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <strong>Details</strong>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-suitcase fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php countrecords("staff"); ?></p>
                    <p class="announcement-text"><strong>Staff</strong></p>
                  </div>
                </div>
              </div>
              <a href="staff_view.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                     <strong>Details</strong>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-user-plus fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php countrecords("individuals"); ?></p>
                    <p class="announcement-text"><strong>Individuals</strong></p>
                  </div>
                </div>
              </div>
              <a href="individuals_view.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                     <strong>Details</strong>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php countrecords("kikundi"); ?></p>
                    <p class="announcement-text"><strong>Group</strong></p>
                  </div>
                </div>
              </div>
              <a href="kikundi_view.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <strong>Details</strong>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->
<!--next row-->
<div class="row">
        <div class="col-lg-3">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-street-view fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php countrecords("gatepass"); ?></p>
                  <p class="announcement-text"><strong>Visits</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-calendar fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement"><h1><?php $today= date("Y"); echo $today; ?></h1></p>
                  <p class="announcement-text"><strong>Year</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                <a href="luggage_view.php" style="text-decoration:none;"><i class="fa fa-suitcase fa-5x"></i></a>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php countrecords("luggage"); ?></p>
                  <p class="announcement-text"><strong>Luggage</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                 <a href="http://localhost/gpmsproject/gatepass_view.php?SortField=&SortDirection=&FilterAnd%5B1%5D=and&FilterField%5B1%5D=13&FilterOperator%5B1%5D=equal-to&FilterValue%5B1%5D=Approved&FilterAnd%5B5%5D=and&FilterAnd%5B9%5D=and&FilterAnd%5B13%5D=and&FilterAnd%5B17%5D=and&FilterAnd%5B21%5D=and&FilterAnd%5B25%5D=and&FilterAnd%5B29%5D=and&FilterAnd%5B33%5D=and&FilterAnd%5B37%5D=and&FilterAnd%5B41%5D=and&FilterAnd%5B45%5D=and&FilterAnd%5B49%5D=and&FilterAnd%5B53%5D=and&FilterAnd%5B57%5D=and&FilterAnd%5B61%5D=and&FilterAnd%5B65%5D=and&FilterAnd%5B69%5D=and&FilterAnd%5B73%5D=and&FilterAnd%5B77%5D=and"><i class="fa fa-thumbs-up fa-5x"></i></a>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php customquery("gatepass","Approved") ?></p>
                  <p class="announcement-text"><strong>Approved</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!--row ends here-->
<!--next row-->
<div class="row">
        <div class="col-lg-3">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-refresh fa-spin fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php customquery("gatepass","Pending") ?></p>
                  <p class="announcement-text"><strong>Pending</strong></p>
                </div>
              </div>
            </div>
          <a href="http://localhost/gpmsproject/gatepass_view.php?SortField=&SortDirection=&FilterAnd%5B1%5D=and&FilterField%5B1%5D=13&FilterOperator%5B1%5D=equal-to&FilterValue%5B1%5D=Pending&FilterAnd%5B5%5D=and&FilterAnd%5B9%5D=and&FilterAnd%5B13%5D=and&FilterAnd%5B17%5D=and&FilterAnd%5B21%5D=and&FilterAnd%5B25%5D=and&FilterAnd%5B29%5D=and&FilterAnd%5B33%5D=and&FilterAnd%5B37%5D=and&FilterAnd%5B41%5D=and&FilterAnd%5B45%5D=and&FilterAnd%5B49%5D=and&FilterAnd%5B53%5D=and&FilterAnd%5B57%5D=and&FilterAnd%5B61%5D=and&FilterAnd%5B65%5D=and&FilterAnd%5B69%5D=and&FilterAnd%5B73%5D=and&FilterAnd%5B77%5D=and">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                   <strong>Details</strong>
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-times-circle fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php customquery("gatepass","Rejected") ?></p>
                  <p class="announcement-text"><strong>Rejected</strong></p>
                </div>
              </div>
            </div>
            <a href="http://localhost/gpmsproject/gatepass_view.php?SortField=&SortDirection=&FilterAnd%5B1%5D=and&FilterField%5B1%5D=13&FilterOperator%5B1%5D=equal-to&FilterValue%5B1%5D=Rejected&FilterAnd%5B5%5D=and&FilterAnd%5B9%5D=and&FilterAnd%5B13%5D=and&FilterAnd%5B17%5D=and&FilterAnd%5B21%5D=and&FilterAnd%5B25%5D=and&FilterAnd%5B29%5D=and&FilterAnd%5B33%5D=and&FilterAnd%5B37%5D=and&FilterAnd%5B41%5D=and&FilterAnd%5B45%5D=and&FilterAnd%5B49%5D=and&FilterAnd%5B53%5D=and&FilterAnd%5B57%5D=and&FilterAnd%5B61%5D=and&FilterAnd%5B65%5D=and&FilterAnd%5B69%5D=and&FilterAnd%5B73%5D=and&FilterAnd%5B77%5D=and">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                   <strong>Details</strong>
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-institution fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php countrecords("gates"); ?></p>
                  <p class="announcement-text"><strong>Gates</strong></p>
                </div>
              </div>
            </div>
            <a href="gates_view.php">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                   <strong>Details</strong>
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-automobile fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?php countrecords("vehicles"); ?></p>
                  <p class="announcement-text"><strong>Vehicles</strong></p>
                </div>
              </div>
            </div>
            <a href="vehicles_view.php">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                   <strong>Details</strong>
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
<!--row ends here-->
<?php include_once('home.php'); ?>
  </div><!-- /#page-wrapper -->
  </div><!-- /#wrapper -->
  </body>
</html>
