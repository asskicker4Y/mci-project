﻿<!DOCTYPE html>
<html lang="fr"> 
<?php

    session_start();
if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
  ob_start(null, 0, PHP_OUTPUT_HANDLER_STDFLAGS ^
    PHP_OUTPUT_HANDLER_REMOVABLE);
} else {
  ob_start(null, 0, false);
} 
    if ($_SESSION['adp']==0){
	header("Location: 404.html");
	}
    elseif (!isset($_SESSION['nom'])) {
        header("Location: login.php");
    }
    else {
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
	$service = $_SESSION['ids'];
	$adp=$_SESSION['adp'];
	include_once 'bd.php';
	$servname=$connexion->query("select nom from service where service.id=$service");
	$objser = $servname->Fetch(PDO::FETCH_ASSOC);
	$Sname=$objser['nom'];
	$cs=0;
	$reqa=$connexion->query("select id from utilisateur");
	$nbrcount=$reqa->rowcount();
	$openfrom=0;
?>
<head>
<meta charset="utf-8"/>
<title>MCI | Système Management Intégré</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/typeahead/typeahead.css">
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<style type="text/css">
.auto-style1 {
	font-size: small;
}
.auto-style2 {
	color: #0B6294;
}
.auto-style3 {
	color: #0B6294;
	font-weight: bold;
}
.auto-style4 {
	color: #0B9657;
}
</style>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<?php include_once 'header.php' ?>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
						<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>				
				<li>
					<a href="index.php">
					<i class="fa fa-home"></i>
					<span class="title">Acceuil</span>
					</a>
				</li>
				<?php if($adp!=0) {?>
			
						
						<?php include_once 'menu/administration.php';?>
						
			
				<?php } ?>
				<li>
					<a href="javascript:;">
					<i class="fa fa-folder-open-o"></i>
					<span class="title">Documents</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="PQSE.php">
							<i class="fa fa-file-o"></i>
							Politique QSE</a>
						</li>
						<li>
							<a href="pos.php">
							<i class="fa fa-folder-o"></i>
							Plan d'orientation stratégique</a>
						</li>
						<li>
							<a href="mmi.php">
							<i class="fa fa-book"></i>
							Manuel Management Intégré</a>
						</li>
						
						<?php include_once 'menu/listdoc.php';?>
					</ul>
				</li>					
						<?php include_once 'menu/menu.php';?>
			</ul>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<center><span class="auto-style3">S</span><span class="auto-style2">ystème <b>M</b>anagement <b>I</b>ntégré</span><br>
			<center><small><font color="green">Qualité Sécurité et Environnement</font></small></center>
			</h3>		
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-folder-open-o"></i>
						<a href="javascript:;" id="Acc">Administration</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<i class="fa fa-file-o"></i>
						<a href="javascript:;" id="Acc">Gestion des documents</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<i class="fa fa-plus"></i>
						<a href="javascript:;" id="Acc">Ajouter un nouveau document</a>
						
					</li>
					
				</ul>
				<div class="page-toolbar">
				</div>
			</div>

			<!-- END PAGE HEADER-->
					
	<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						
						<div class="tab-content">
							<div class="tab-pane active" id="tab_2">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-folder-o"></i>Nouveau
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="adddoc.php" class="form-horizontal" method="post" enctype="multipart/form-data">
											<div class="form-body">
												
												
													<div class="form-group">
													<label class="col-md-3 control-label">Document</label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="input-group input-large">
													<div class="form-control uneditable-input span3" data-trigger="fileinput">
														<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
														</span>
													</div>
													<span class="input-group-addon btn default btn-file">
													<span class="fileinput-new">
													<i class="fa fa-file-pdf-o"></i></span>
													<span class="fileinput-exists">
													Changer </span>
													<input type="file" name="fileToUpload" id="fileToUpload">
													</span>
													<a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
													annuler </a>
												</div>
											</div>
										</div>
										</div>
										<div class="form-group">
															<label class="col-md-3 control-label">Etat</label>
															<div class="col-md-4">
																<select name="etat" class="select2me form-control">																	
																	
																	<option value="En cours d'application">En cours d'application</option>
																	<option value="En cours de révision">En cours de révision</option>
																	<option value="Reconduit">Reconduit</option>
																	<option value="Périmé">Périmé</option>
																	<option value="Annulé">Annulé</option>
																
																	 </select>
																<span class="help-block">
																 </span>
															</div>
														</div>
												<div class="form-group has-error">
															<label class="col-md-3 control-label">Type</label>
															<div class="col-md-4">
																<select name="type" class="select2me form-control">
																	<?php
																	include_once 'bd.php';
																	$req2=$connexion->query("select * from Type order by type");
																	$nbr1=$req2->rowcount();
																	if($nbr1!=0){
																	while  ($obj1 = $req2->Fetch(PDO::FETCH_ASSOC)) 
																	{
																	$ret=$obj1['type'];
																	echo '<option value="'.$ret.'">'.$ret.'</option>';
																	?>
																
																	 <?php } } ?>
																	 </select>
																<span class="help-block">
																 </span>
															</div>
														</div>			
												
																								
														<div class="form-group has-error">
															<label class="col-md-3 control-label">Service</label>
															<div class="col-md-4">
																<select name="ser" class="select2me form-control">
																	<?php
																	include_once bd.php;
																	$req1=$connexion->query("select * from service where id!=19 and id!= 20 order by ref");
																	$nbr=$req1->rowcount();
																	if($nbr!=0){
																	while  ($obj = $req1->Fetch(PDO::FETCH_ASSOC)) 
																	{
																	$n=$obj['nom'];
																	echo '<option value="'.$n.'">'.utf8_encode($n).'</option>';
																	?>
																
																	 <?php } } ?>
																	 </select>
																<span class="help-block">
																 </span>
															</div>
														</div>
															<div class="form-group">
															<label class="control-label col-md-3">Date d'application</label>
										<div class="col-md-5"><?php $today = date("Y-n-j");   ?>
											<input class="form-control form-control-inline input-medium date-picker" size="15"  name="app" type="text" value="<?php echo $today ;?>"/>
																					</div>
									
														</div>
														<div class="form-group">
															<label class="col-md-3 control-label">Révision aprés</label>
															<div class="col-md-4">
																<select name="revi" class="select2me form-control">
																	
																	<option value="5ans">5 ans</option>
																	<option value="3ans">3 ans</option>
																	<option value="1000ans">jusqu'a modification</option>															
																</select>
																<span class="help-block">
																 </span>
															</div>
															
														</div>
														<div class="form-group">
															<label class="col-md-3 control-label">Documents associés</label>
															<div class="col-md-4">
																<select name="doca" class="select2me form-control">
																	
																	<option value="0">Aucun document associé</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	<option value="9">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																	<option value="13">13</option>
																	<option value="14">14</option>
																	<option value="15">15</option>
																	<option value="16">16</option>
																	<option value="17">17</option>
																	<option value="18">18</option>
																	<option value="19">19</option>
																	<option value="20">20</option>
																	<option value="21">21</option>
																	<option value="22">22</option>
																	<option value="23">23</option>
																	<option value="24">24</option>
																	<option value="25">25</option>
																	<option value="26">26</option>
																	<option value="27">27</option>
																	<option value="28">28</option>
																	<option value="29">29</option>
																	<option value="30">30</option>
																	<option value="31">31</option>																	
																	<option value="32">32</option>
																	<option value="33">33</option>
																	<option value="34">34</option>
																	<option value="35">35</option>
																	<option value="36">36</option>
																	<option value="37">37</option>
																	<option value="38">38</option>
																	<option value="39">39</option>																		
																</select>
																<span class="help-block">
																 </span>
																
															</div>
															
														</div>
													<!--/span-->
												
												<!--/row-->
											</div>
													<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="valider" class="btn btn-circle blue">Valider</button>
														<button type="reset" class="btn btn-circle default">Annuler</button>
													</div>
												</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
								
										</form>
										<!-- END FORM-->
						</div>	
					</div>
				</div>
			</div>						
			<!-- END PAGE CONTENT-->
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			
			
			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	
	
	<div class="page-footer-inner">
			
		 2015 &copy; M.C.I. Santé Animale.
	</div>
	<div class="clearfix" align="right">
			<img src="../../assets/admin/layout/img/footer-img.png" alt="logo" class="logo-default" width="295"/>
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 

<script src="../../assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../assets/global/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="../../assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/form-samples.js"></script>
<script src="../../assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="../../assets/admin/pages/scripts/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
FormSamples.init();
           ComponentsFormTools.init();
		    ComponentsPickers.init();
        });   
    </script>
<!-- END JAVASCRIPTS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script>
</body>
<!-- END BODY -->
<?php
if (isset($_POST['type'])){
	include_once 'bd.php';
	$ser=utf8_encode($_POST['ser']);
	$type=$_POST['type'];
	$etat=$_POST['etat'];
	$app=$_POST['app'];
	$date = date_create($_POST['app']);

	if($_POST['revi']=="5ans")
	{
	date_add($date, date_interval_create_from_date_string('5 years'));
	$ravi=date_format($date, 'Y-m-d');
	}
	elseif($_POST['revi']=="3ans") {
	date_add($date, date_interval_create_from_date_string('3 years'));
	$ravi=date_format($date, 'Y-m-d');
	}
	elseif($_POST['revi']=="1000ans") {
	 $testd = new DateTime('10/10/2099');
	 $ravi=date_format($testd, 'Y-m-d');
	}
	
	$target_dir = "../Documents/".$ser."/".$type."/";
	$file_name= basename($_FILES["fileToUpload"]["name"]);
	$file_name=utf8_decode($file_name);
	$file=$_FILES["fileToUpload"]["name"];
	$filetemp=$_FILES["fileToUpload"]["tmp_name"];
	$target_file = $target_dir . basename($file);
	$target_file = "../Documents/".$ser."/".$type."/".$file_name;
	$uploadOk = 1;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$file_name2=$connexion->quote($file_name);
	$tst=$connexion->query("SELECT id from document WHERE document.nom=$file_name2");
	$nbr=$tst->rowcount();	
			if($nbr!=0){
					echo '<script language="javascript" type="text/javascript">
       alert("le fichier déjà existant s\'il ne s\'agit pas du même fichier penser à le renommer avant de l\'ajouter");</script>';		
							}	
		else{
			if ($_FILES["fileToUpload"]["size"] > 5000000) { 
	echo '<script language="javascript" type="text/javascript">
       alert("Un ou plusieurs champs sont vides");</script>';	
	}
	if( $FileType != "pdf" && $FileType != "PDF") {      
	   echo '<script language="javascript" type="text/javascript">
       alert("Seuls les fichiers de type PDF sont autorisés");</script>';	
	}
	else {
		
		$target_file = "../Documents/".$ser."/".$type."/".$file_name;
		
		if (move_uploaded_file($filetemp, $target_file)) {			
			include_once 'bd.php';
			
			$target_file =$connexion->quote($target_file);
			$file_names=utf8_encode($file_name);
		
			$file_name=$connexion->quote($file_name);
			
			$req1=$connexion->query("SELECT id from service WHERE service.nom='$ser'");
			$nbr=$req1->rowcount();			
			$obj = $req1->Fetch(PDO::FETCH_ASSOC);
			$r2=$obj['id'];
			$r3=$connexion->quote(utf8_decode($etat));
			
			$result=$connexion->exec("INSERT INTO Document VALUES(null,'$r2',$file_name,'$type','$FileType',$target_file,$r3,'$app','$ravi',$adp)");
			if($result!=0){
				$str=urlencode($file_names);
				$nda=$_POST['doca'];
						if($nda!=0){
							header("Location: anx2.php?file=$str&ser=$ser&type=$type&doca=$nda");
									}
								else{
					$str=urlencode($file_names);
					header("location: diffusion.php?file=$str&ser=$ser&type=$type&doca=$nda");
									}
							}
			
			else {
					echo '<script language="javascript" type="text/javascript">
       alert("ERROR");</script>';	
				}
									
		}
		}
			
			
			}
	}
	

	}

 ?>
</html>