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
	$ser=$_GET['ser'];
	$type=$_GET['type'];
	$var=$_GET['doca'];
	$adp=$_SESSION['adp'];
	include_once 'bd.php';
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

			<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
										<i class="fa fa-plus"></i><?php echo $_GET['file'] ; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
								
								<form action="anx2.php?file=<?php echo urlencode($_GET['file']) ; ?>&type=<?php echo $type;?>&ser=<?php echo $ser;?>&doca=0" class="form-horizontal" method="POST"">
											<div class="form-body">
										
											<div class="form-group">
											<label class="col-md-5 control-label">Choix des Documents associés</label>
															<div class="col-md-6">
																
										<?php
											$i=0;
												while($i<$var){$rv=addslashes($_GET['file']);
													$re=$connexion->query("SELECT nom as nom from document where document.nom!='".$rv."' and document.Etat!='annule' and document.Etat!='perime' ");
													echo'<select name="doc[]" class="select2me form-control">';	
													while($ose2 = $re->Fetch(PDO::FETCH_ASSOC)){
														$nom=$ose2['nom'];
														echo'<option value="'.utf8_encode($nom).'">'.utf8_encode($nom).'</option>';
														}		echo'</select></br>';
													$i++;
}
											
												?>
										</div>									
										</div>									
												<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="valider" class="btn btn-circle blue">Valider</button>
														<button type="submit" name="annule" class="btn btn-circle default" >Annuler</button>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
						</div>	
					</div>
				</div>
			</div>						
			<!-- END PAGE CONTENT-->
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
<!-- END PAGE LEVEL PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/form-samples.js"></script>
<script src="../../assets/admin/pages/scripts/components-form-tools.js"></script>
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
        });   
    </script>
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
        var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };
    </script>
<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR"></script>
<!-- END GOOGLE RECAPTCHA -->
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
	if (isset($_POST['annule'])){
		include_once 'bd.php';
		$file=$_GET['file'];
		$req2=$connexion->query('SELECT id from document WHERE document.nom="'.utf8_decode($file).'"');
		$obj2 = $req2->Fetch(PDO::FETCH_ASSOC);
		$r3=$obj2['id'];
		header("location: deldoc.php?doc_id=$r3&t=1");
	}
	if (isset($_POST['valider'])){
	
	include_once 'bd.php';
	$ser=$_GET['ser'];
	$type=$_GET['type'];
	$file=$_GET['file'];
	$doc=$_POST['doc'];
	$req2=$connexion->query('SELECT id from document WHERE document.nom="'.utf8_decode($file).'"');
	$obj2 = $req2->Fetch(PDO::FETCH_ASSOC);
	$r3=$obj2['id'];
	while ($monchoix = array_shift($doc)){
	$req4=$connexion->query('SELECT id from document WHERE document.nom="'.utf8_decode($monchoix).'"');
	$obj4 = $req4->Fetch(PDO::FETCH_ASSOC);
	$r4=$obj4['id'];
	$result3=$connexion->exec("INSERT INTO `mci`.`liaison` (`id`, `id_doc`, `id_anx`) VALUES (NULL, $r3, $r4)");
	
	}
	if(!isset($_GET['t'])){
	$str=urlencode($file);
	header('location: diffusion.php?file='.$str.'&ser='.$ser.'&type='.$type.'&doca=0');
	}
	else{
	$str=urlencode($file);	
	header('location: diffusion.php?file='.$str.'&ser='.$ser.'&type='.$type.'&doca=0');	
	}
	}
	}
	
	
 ?>
</html>