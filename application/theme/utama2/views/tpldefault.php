<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">  
    <title>System Dasar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    
    <link href="<?php echo base_url(); ?>application/theme/utama2/assets/css/style.css" rel="stylesheet">
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/theme/utama2/assets/bootstrap/css/bootstrap2.min.css">
    <!--Datatable-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/theme/utama2/assets/datatables/media/css/datatables.css">
    <!--Font-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/theme/utama2/assets/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!--Alertify-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/theme/utama2/assets/alertify/css/alertify.core.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/theme/utama2/assets/alertify/css/alertify.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/theme/utama2/assets/alertify/css/alertify.default.css">
     
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/js/ant.js"></script>

    <!-- Validation -->
    <script type="text/javascript" src="<?php echo base_url()?>application/theme/utama2/assets/validation/validation.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>application/theme/utama2/assets/validation/jquery.validate.min.js"></script>
    <!--Bootstrap-->
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/bootstrap/js/bootstrap.min.js"></script>
    <!--Datatable-->
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/datatables/media/js/datatables.js"></script>
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/datatables/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
    <!--Alertify-->
    <script src="<?php echo base_url(); ?>application/theme/utama2/assets/alertify/js/alertify.min.js"></script>
    
  </head>
  <body>
      
      <div id="main">
       <div id="header" class="row show-grid">
            <div class="col-xs-12 col-md-12">
                
            <div class="row show-grid">
            <div class="col-md-9">
                <span id="logo"><img src="<?php echo base_url(); ?>assets/img/songbird_bw.png" alt="logo" class="img-rounded"></span>    
                <span id="tittle"> Basic System </span>
            </div>
                <div class="col-md-3"><?php echo $this->session->userdata('username');?> | <a href="<?php echo site_url(); ?>login/logout">Logout</a></div>
            </div>
                
            </div>
       </div>
              
       <div class="row show-grid">
            
           <div id="menu" class="col-xs-12 col-md-3">
           <ul class="accordion">
			
			<li id="modul">

				<a href="#one"><i class="icon-fixed-width icon-briefcase icon-large"></i> Modul</a>

				<ul class="sub-menu">
					
					<li><a href="<?php echo site_url(); ?>usergroup"><i class="icon-fixed-width icon-group"></i> User Group</a></li>
					
					<li><a href="<?php echo site_url(); ?>user"><i class="icon-fixed-width icon-user"></i> User</a></li>

				</ul>

			</li>
                        
                        <li id="grafik">

				<a href="#one"><i class="icon-fixed-width icon-print icon-large"></i> Report</a>

				<ul class="sub-menu">
					
					<li><a href="<?php echo site_url(); ?>report"><i class="icon-fixed-width icon-print"></i> Report Basic</a></li>
					
					<li><a href="<?php echo site_url(); ?>report/template"><i class="icon-fixed-width icon-print"></i> Report Template</a></li>

				</ul>

			</li>
                        
                         <li id="chart">

				<a href="#one"><i class="icon-fixed-width icon-bar-chart icon-large"></i> Report Graphs</a>

				<ul class="sub-menu">
					
					<li><a href="<?php echo site_url(); ?>grafik"><i class="icon-fixed-width icon-bar-chart"></i> Chart Line</a></li>
					
					<li><a href="<?php echo site_url(); ?>grafik/area"><i class="icon-fixed-width icon-bar-chart"></i> Chart Area</a></li>
                                        
                                        <li><a href="<?php echo site_url(); ?>grafik/bar"><i class="icon-fixed-width icon-bar-chart"></i> Chart Bar</a></li>
                                        
                                        <li><a href="<?php echo site_url(); ?>grafik/pie"><i class="icon-fixed-width icon-bar-chart"></i> Chart Pie</a></li>
                                        
                                        <li><a href="<?php echo site_url(); ?>grafik/combination"><i class="icon-fixed-width icon-bar-chart"></i> Chart Combination</a></li>

				</ul>

			</li>
			
			<li id="setting">

				<a href="#four"><i class="icon-fixed-width icon-cogs icon-large"></i> Setting <span>160</span></a>

				<ul class="sub-menu">
					
					<li><a href="#"><i class="icon-fixed-width icon-group"></i> User Group <span>5</span></a></li>
					
					<li><a href="#"><i class="icon-fixed-width icon-user"></i> User <span>135</span></a></li>
                                        
                                        <li><a href="<?php echo site_url(); ?>modul"><i class="icon-fixed-width icon-briefcase"></i> Modul <span>20</span></a></li>
                                        
                                        <li><a href="<?php echo site_url(); ?>privilage"><i class="icon-fixed-width icon-unlock-alt"></i> Privilage</a></li>
                                        
                                        <li><a href="#"><i class="icon-fixed-width icon-wrench"></i> Edit Account</a></li>
                                        
                                        <li><a href="#"><i class="icon-fixed-width icon-signout"></i> Logout</a></li>

				</ul>

			</li>
		
		</ul>
            </div>
            

            <div id="content" class="col-xs-12 col-md-9">

            <div class="panel panel-primary">
                <?php echo $this->load->view($isi);?>	    
              </div>
            </div>
        </div>
       </div>
<!--       <div id="footer" class="row show-grid">
           <div class="col-xs-12">ant &COPY; 2013</div>
       </div>-->
       
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    </body>
</html>