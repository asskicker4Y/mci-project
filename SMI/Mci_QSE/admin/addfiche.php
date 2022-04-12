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
    
    if (!isset($_SESSION['nom']) || !isset($_GET['num'])) {
        header("Location: 404.html");
    }
    else {
	$num=$_GET['num'];		
include_once 'bd.php';	
	$cleerObjectif=$connexion->prepare("DELETE FROM `Objectifaudit` WHERE num_audit=?");
	$prp0 = $connexion->prepare("DELETE FROM respentaudite WHERE num_audit=?");
	$prp = $connexion->prepare("DELETE FROM fichdaudit WHERE audit_num=?");
	$prp2 = $connexion->prepare("DELETE FROM auditee WHERE num_audit=?");
	$cleerObjectif->execute(array($num));
	$prp0->execute(array($num));
	$prp->execute(array($num));
	$prp2->execute(array($num));
$verification=$connexion->prepare("select * from fichdaudit where audit_num=?");
$verification->execute(array($num));
$nbrv=$verification->rowcount();
if($nbrv==0){
	$test=$connexion->prepare("select  id from fichecreeoupas where num=? and CreeOuPas=1");					
	$test->execute(array($num));							
			$nbra=$test->rowcount();
					if($nbra!=0){
									 header("Location: 404.html");						
								}	
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
	$service = $_SESSION['ids'];
	$adp=$_SESSION['adp'];
	$openfrom=1;
	$servname=$connexion->query("select nom from service where service.id=$service");
	$objser = $servname->Fetch(PDO::FETCH_ASSOC);
	$Sname=$objser['nom'];
	$cs=0;
	
	
	
	$prp->execute(array($num));
	$prp2->execute(array($num));
	

?>
<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
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
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
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
<script type="text/javascript" src="ajax/serv_xhr.js" charset="iso_8859-1"></script>
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
			

			<!-- END PAGE HEADER-->
					
	<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						
						<div class="tab-content">
							<div class="tab-pane active" id="tab_2">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-file-o"></i>Fiche d'Audit N° <?php echo $num; ?>
										</div>
										<div class="tools">
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										 <form action="addfiche0.php?num=<?php echo $num ; ?>" class="form-horizontal" method="post" >
											<div class="form-body">			
												
												
												<div class="form-group has-error">
															<label class="col-md-3 control-label">Responsable d'audit :</label>
														<?php
																	include_once 'bd.php';
																	$req1=$connexion->query("select id_auditeur from auditeurprevu where numero_audit='$num' and fonction='1'");	
																	$nbr=$req1->rowcount();
																	if($nbr!=0){
																	while  ($obj = $req1->Fetch(PDO::FETCH_ASSOC)) 
																	{
																		$r1=$obj['id_auditeur'];
																		
																			$SelectAuditeurPrevuNom=$connexion->query("select nom,prenom from auditeur where auditeur.id=$r1.");
																			$auditeurselect = $SelectAuditeurPrevuNom->Fetch(PDO::FETCH_ASSOC);
																				$auditeurs['nom']=$auditeurselect['nom'];
																						$auditeurs['prenom']=$auditeurselect['prenom'];
																								$auditeurs['complet']=substr($auditeurs['prenom'],0,1).'.'.$auditeurselect['nom'];
																										$list=$auditeurs['complet'];
																			
																	}	
																	}
														?><label class="col-md-3 control-label"><b><?php echo $list ; ?></b></label>					
														<input type="hidden" name="id_RA" value=<?php echo $r1; ?>>
															
												</div>
												<div class="form-group has-error">
															<label class="col-md-3 control-label">Activité auditée : </label>
															<?php $req1=$connexion->query("select id_service, id_sservice from auditprevu where numero='$num'");	
																	$nbr=$req1->rowcount();
																	if($nbr!=0){
																	while  ($obj = $req1->Fetch(PDO::FETCH_ASSOC)) 
																	{
																		$r2=$obj['id_sservice'];
																		$serviceID=$obj['id_service'];
																			$Selectsservice=$connexion->prepare("select  nom from sservice where id=?");
																			$Selectsservice->execute(array($r2));
																					$sservice = $Selectsservice->Fetch(PDO::FETCH_ASSOC);
																						$sservicenom=$sservice['nom'];																						
																	}
																	}
															?>
															<label class="col-md-3 control-label"><b><?php echo utf8_encode($sservicenom); ?></b></label>
															<input type="hidden" name="id_ss" value=<?php echo $r2; ?>>
															
												</div>
														<div class="form-group has-error">
															<label class="control-label col-md-3">Date de l’audit  :</label>
																<div class="col-md-4">
																	<input class="form-control form-control-inline input-medium date-picker" size="15"  name="date" type="text"/>
																</div>
														</div>
														<div class="form-group has-error">
													<label class="control-label col-md-3">Lieu de l'audit :</label>
													<div class="col-md-6">
														<textarea id="maxlength_textarea" class="form-control" maxlength="225" rows="2" placeholder="Un maximum de 225 caractères" name="lieu"></textarea>
															<span class="help-block">
															</span>
														</div>
									</div>										
									<div class="form-group has-error">
													<label class="control-label col-md-3"><b>Objectif de l'audit :</b></label><a href="#" onclick="toggle_visibility('foo','foo2'),toggle_visibility2('ic1','ic2'),cleartext('text1');">
																<i class="fa fa-plus" id="ic1" style="visibility:visible"></i>
																<i class="fa fa-minus" id="ic2" style="visibility:hidden"></i>
																</a>
																
													<div class="col-md-6">
														<textarea id="text0" class="form-control" maxlength="225" rows="2" placeholder="Premier Objectif" name="objectif[]"></textarea>
															<span class="help-block">
															
															
													</div>
									</div>
													<div class="form-group has-error" id="foo2" style="display:none">
															<label class="control-label col-md-3"><b>Objectif de l'audit :</b></label><a href="#" onclick="toggle_visibility('foo3','foo4'),toggle_visibility2('ic3','ic4'),cleartext('text2');">
																<i class="fa fa-plus" id="ic3" style="visibility:visible"></i>
																<i class="fa fa-minus" id="ic4" style="visibility:hidden"></i>
																</a>
													<div class="col-md-6">
														<textarea id="text1" class="form-control" maxlength="225" rows="2" placeholder="Deuxième objectif" name="objectif[]"></textarea>
															<span class="help-block">
															
															
													</div>														
													</div>
													<div class="form-group has-error" id="foo" style="display:none">
																														
													</div>
													<div class="form-group has-error" id="foo4" style="display:none">
															<label class="control-label col-md-3"><b>Objectif de l'audit :</b></label>
													<div class="col-md-6">
														<textarea id="text2" class="form-control" maxlength="225" rows="2" placeholder="Troisieme objectif" name="objectif[]"></textarea>
															<span class="help-block">
															
															
													</div>														
													</div>
													<div class="form-group has-error" id="foo3" style="display:none">
																														
													</div>									
									<div class="form-group has-error">
													<label class="control-label col-md-3">Identification des documents de références :</label>
													<div class="col-md-6">
														<textarea id="maxlength_textarea2" class="form-control" maxlength="225" rows="2" placeholder="Un maximum de 225 caractères" name="idr"></textarea>
															<span class="help-block">
															</span>
														</div>
									</div>	
									<div class="form-group has-error">
															<label class="col-md-3 control-label">Responsable de l’entité auditée</label>
															<div class="col-md-4">																
																<select name="reponsable" class="select2me form-control" >
																	<?php
																	include_once 'bd.php';
																	$sel=$connexion->query("select id, prenom, nom from utilisateur where utilisateur.id_service=$serviceID");
																	
																	$nbr111=$sel->rowcount();
																	if($nbr111!=0){
																	while  ($selRA = $sel->Fetch(PDO::FETCH_ASSOC)) 
																	{
																	$id1=$selRA['id'];
																	$retA=$selRA['nom'];
																	$retA2=$selRA['prenom'];
																	echo '<option value="'.$id1.'">'.$retA.' '.$retA2.'</option>';
																	?>																	
																	 <?php } } ?>
																</select>
																<span class="help-block">
																 </span>
															</div>
									</div>
						<div class="form-group has-error">
															<label class="control-label col-md-3">Audités : </label>
															<div class="col-md-4">
																<select multiple="multiple" class="multi-select" id="my_multi_select1" name="auditee[]">
																	<?php
																	include_once 'bd.php';
																	$req2=$connexion->query("select id, prenom, nom from utilisateur where utilisateur.id_service=$serviceID");
																	
																	$nbr1=$req2->rowcount();
																	if($nbr1!=0){
																	while  ($obj1 = $req2->Fetch(PDO::FETCH_ASSOC)) 
																	{
																	$id=$obj1['id'];
																	$ret=$obj1['nom'];
																	$ret2=$obj1['prenom'];
																	echo '<option value="'.$id.'">'.$ret.' '.$ret2.'</option>';
																	?>																	
																	 <?php } } ?>
																	 </select>
																<span class="help-block">
																 </span>
															</div>
						</div>
						
						
									
																				
													<!--/span-->
											
													<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
																										
														<center><button type="submit" name="suivant" class="btn btn-circle blue">Suivant</button></center>
														
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
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
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
<script src="../../assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
<!--
    function toggle_visibility(id,id2) {
       var e = document.getElementById(id);
       var e2 = document.getElementById(id2);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
		   if(e2.style.display == 'block')
          e2.style.display = 'none';
       else
          e2.style.display = 'block';
    }
//-->
</script>

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
			ComponentsDropdowns.init();
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
if (isset($_POST['from'])){
	
	include_once 'bd.php';
	$num=$_POST['num'];
	$sem=$_POST['sem'];
	$ann=$_POST['ann'];
	$verif=$connexion->query("select id from auditprevu where numero='".$num."' and sem=$sem and ann=$ann");
	$verifcount=$verif->rowcount();
	if($verifcount!=0){	
		echo '<script language="javascript" type="text/javascript">
       alert(" Numero d\'audit déjà existant");</script>';
	}	
	else{
	$RA=$_POST['RA'];
	$A=$_POST['A'];
	$O=$_POST['O'];
	if($RA==$A || $RA==$O || $A==$O){
	echo '<script language="javascript" type="text/javascript">
       alert(" Un auditeur ne peut pas faire deux  fonctions dans le meme audit");</script>';	
	}
	else{
	$duree=$_POST['duree'];	
	$ids=$_POST['ser'];
	$id_nom =$connexion->query("SELECT `id` FROM `service` WHERE `nom` = '$ids'");
	$objnom = $id_nom ->Fetch(PDO::FETCH_ASSOC);
	$idt=$objnom['id'];
	$idss=$_POST['sservice'];		
	$addRA=0;	
	$date_from = date_create($_POST['from']);
	$from=date_format($date_from, 'Y-m-d');	
	$date_to = date_create($_POST['to']);
	$to=date_format($date_to, 'Y-m-d');
	$addRA=$connexion->exec("INSERT INTO `auditeurprevu`(`id`, `id_auditeur`, `numero_audit`, `ann`, `fonction`) VALUES (null,'$RA','$num',$ann,'1')");
	$addA=$connexion->exec("INSERT INTO `auditeurprevu`(`id`, `id_auditeur`, `numero_audit`, `ann`, `fonction`) VALUES (null,'$A','$num',$ann,'2')");
	$addO=$connexion->exec("INSERT INTO `auditeurprevu`(`id`, `id_auditeur`, `numero_audit`, `ann`, `fonction`) VALUES (null,'$O','$num',$ann,'3')");
	if($_POST['idsup']!='vide' and $_POST['fonctionsup']!='vide'){
		$idsup=$_POST['idsup'];
		$fsup=$_POST['fonctionsup'];
	$addRA=$connexion->exec("INSERT INTO `auditeurprevu`(`id`, `id_auditeur`, `numero_audit`,  `ann`, `fonction`) VALUES (null,'$idsup','$num',$ann,'$fsup')");
	}
	$addauditp=$connexion->exec("INSERT INTO auditprevu VALUES (null,$ann,'$num','$duree',$idt,$idss,'$from','$to')");
	
	if($addauditp!=0){
		header("location:planaudit.php?sem=$sem&ann=$ann"); 
	}
	else{
		header("Location: 404.html");
		
	}
	
		}
		}
				}
				if(isset($_GET['message'])){
					$r=$_GET['message'];
					echo '<script language="javascript" type="text/javascript">
						alert("Un ou plusieurs champs sont vides");</script>';
							}			
					}
				
				else{
						header("Location: 404.html");
				}
	
	}
	

	

 ?>
</html>