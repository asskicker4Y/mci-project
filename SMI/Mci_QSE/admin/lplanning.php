<!DOCTYPE html>
<html lang="fr"> 
<?php

    session_start();
if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
  ob_start(null, 0, PHP_OUTPUT_HANDLER_STDFLAGS ^
    PHP_OUTPUT_HANDLER_REMOVABLE);
} else {
  ob_start(null, 0, false);
} 
    if (!isset($_SESSION['nom'])) {
        header("Location: login.php");
    }
    else {

	include_once 'bd.php';
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
	$service = $_SESSION['ids'];
	$adp=$_SESSION['adp'];
	include_once 'bd.php';
	$servname=$connexion->query("select nom from service where service.id=$service");
	$objser = $servname->Fetch(PDO::FETCH_ASSOC);
	$Sname=$objser['nom'];
	$openfrom=0;
	if($adp==0){
		header("Location: 404.html");
	}
	else{
									
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
<link rel="stylesheet" href="../../assets/global/plugins/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
<!-- END GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/pdf.css" rel="stylesheet" type="text/css"/>
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
.auto-style5 {
	color: #0B6294;
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
			<center><span class="auto-style3">S</span><span class="auto-style5">ystème <b>M</b>anagement <b>I</b>ntégré</span><br>
			<center><small><font color="green">Qualité Sécurité et Environnement</font></small></center>
			</h3>
			
			<!-- END PAGE HEADER-->			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-file-o"></i>Liste des Documents
							</div>
							<div class="tools">
								
								
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											
										</div>
									</div>
																		
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th>
									 Désignation
								</th>
								<th>
									 Service
								</th>
								<th>
									 Date prévisionnelle
								</th>
								<th>
									 Reprogrammé
								</th>
								<th>
									 Etat
								</th>
								<th>
									 Statut
								</th>
								<th>
									 Date réception AQ/QSE
								</th>
								<th>
									Date remise finale AQ/QSE
								</th>	
								<th>
									 Remarque
								</th>
								<th>
									<span class="fa fa-wrench ">
								</th>
																
								
							</tr>
							</thead>
							<tbody>
							
								<?php			
								include_once 'bd.php';
								$p=0;
								if($adp==2){
								$req1=$connexion->query("select document.id as id,document.id_service as id_ser, document.nom as nom, document.lien as lien,document.dateAPP as app,document.DATTREV as rev, document.Etat as etat, document.type as type from document where document.ajtpar=2 and  document.Etat != 'Annule'");
								}
								elseif($adp==3){
								$req1=$connexion->query("select document.id as id,document.id_service as id_ser, document.nom as nom, document.lien as lien,document.dateAPP as app,document.DATTREV as rev, document.Etat as etat, document.type as type from document where document.ajtpar=3 and  document.Etat != 'Annule'");
								}
								elseif($adp==1){
								$req1=$connexion->query("select document.id as id,document.id_service as id_ser, document.nom as nom, document.lien as lien,document.dateAPP as app,document.DATTREV as rev, document.Etat as etat, document.type as type from document where document.Etat != 'Annule'");	
								}
								$nbra=$req1->rowcount();
								if($nbra!=0){
								
								
								$i=0;
								while  ($obj_exp = $req1->Fetch(PDO::FETCH_ASSOC)) 
								{
									
									$dateR='';
									$dateF='';
									$statut='';
									$programme='';
									$remarque='';
									$controle='0';	
									$nom_exp=utf8_encode($obj_exp['nom']);
									$id_doc_exp=$obj_exp['id'];
									$id_ser_exp=$obj_exp['id_ser'];
									$type_exp=$obj_exp['type'];
									$reqz_exp=$connexion->query("select service.nom as nom from service where service.id=$id_ser_exp");
									$objz_exp = $reqz_exp->Fetch(PDO::FETCH_ASSOC);
									$serv_exp=utf8_encode($objz_exp['nom']);
									$date_exp=$obj_exp['app'];
									
									$rev_exp=$obj_exp['rev'];
									if($rev_exp!='2099-10-10'){
											
									
									$etat_exp=utf8_encode($obj_exp['etat']);
									$now_exp = date("Ymd");															
									$expire_exp = date("Ymd", strtotime($rev_exp));
									$expire_exp1 = date("d/m/Y", strtotime($rev_exp));
									//si le document est périmé :
									if($etat_exp=="Périmé") {
										
									$re=$connexion->query("select * from remplacerpar where id_doc=$id_doc_exp");
									$nbrexp=$re->rowcount();
								if($nbrexp==0){
									 $rest=0;
									$controle=1;
									$p++;								 
									}
									}
									// Si le document n'est pas périmé
									else {
									$now = date("Ymd");						
									$now_Y = date("Y");						
									$now_M = date("m");						
									$now_D = date("d");
									$dateP = $expire_exp1;
									$expire_exp = date("Ymd", strtotime($expire_exp));	
									$expire_exp_Y = date("Y", strtotime($expire_exp));	
									$expire_exp_M = date("m", strtotime($expire_exp));			
								if($expire_exp_Y==$now_Y){
									if($expire_exp_M==$now_M){
										$rest=(int)$expire_exp - (int)$now;
									
										
										
										}
									else
									{
										$rest=(int)$expire_exp - (int)$now -70;
										
									}									
									if( $rest < 31) {								
									 
									$rest=$rest;
									$controle=1;
									
														
								}
								}
								}
							
							if($controle!=0){
							$complet=$connexion->query("select * from planning2 where id_doc=$id_doc_exp");
								$nbrComplet=$complet->rowcount();
								if($nbrComplet!=0){
									while  ($obj_complet = $complet->Fetch(PDO::FETCH_ASSOC)) 
								{
									$dateP=$obj_complet['dateP'];
									$statut=$obj_complet['statut'];
									$dateR=$obj_complet['dateR'];
									$dateF=$obj_complet['dateF'];
									$remarque=$obj_complet['remarque'];
									$programme=$obj_complet['progamme'];
								}
								}
								$string = $obj_exp['nom'];
								$patterns = array();
								$patterns[0] = '/.pdf/';

								$replacements = array();
								$replacements[0] = '';

								$modnom= preg_replace($patterns, $replacements, $string);
								
								echo '<tr><td>'.utf8_encode($modnom).'</td>
									<td>'.$serv_exp.'</td>
									<td>'.$dateP.'</td>
									<td>'.$programme.'</td>';
									
						    if($etat_exp=="En cours d'application"){
								echo '<td><center><span class="label label-sm label-warning">
										Proche périmé reste :'.$rest.'jours </span><center></td>';	
								}
							elseif($etat_exp=="En cours de révision"){
								echo '<td><span class="label label-sm label-info">
										En cours de révision </span></td>';	
								}
							elseif($etat_exp=="Annulé"){
								echo '<td><center><span class="label label-sm label-danger">
										Annulé </span><center></td>';	
								}
							elseif($etat_exp=="Périmé"){
								echo '<td><center><span class="label label-sm label-danger">
										Périmé </span></center></td>';	
								}
							elseif($etat_exp=="Reconduit"){
								echo '<td><center><span class="label label-sm label-danger">
										Reconduit </span><center></td>';	
								}
							else{
								echo '<td></td>';	
								}
								
							
							
								echo'
									<td>'.$statut.'</td>
									<td>'.$dateR.'</td>
									<td>'.$dateF.'</td>
									<td>'.$remarque.'</td>
									<td><a class="" href="pmoddoc.php?doc_id='.$id_doc_exp.'"id="Acc" title="Modifier"><span class="fa fa-pencil"></span></a></td>
									</tr>';
								}								
								}								
								}								
								}								
								else{
								/*echo '<script language="javascript" type="text/javascript">
								alert("Aucune donnée éxistante");</script>';*/
								$nbrT=0;
								}
							if($adp==2){
								$req1=$connexion->query("select docprovisoire.id as id,docprovisoire.id_service as id_ser, docprovisoire.nom as nom,docprovisoire.type as type,docprovisoire.cop as cop,docprovisoire.datepre as dateP from docprovisoire where docprovisoire.ajtpar=2");
								}
								elseif($adp==3){
								$req1=$connexion->query("select docprovisoire.id as id,docprovisoire.id_service as id_ser, docprovisoire.nom as nom,docprovisoire.type as type,docprovisoire.cop as cop,docprovisoire.datepre as dateP  from docprovisoire where docprovisoire.ajtpar=3");
								}
								elseif($adp==1){
								$req1=$connexion->query("select docprovisoire.id as id,docprovisoire.id_service as id_ser, docprovisoire.nom as nom,docprovisoire.type as type,docprovisoire.cop as cop,docprovisoire.datepre as dateP from docprovisoire");
								}
								$nbra=$req1->rowcount();
								if($nbra!=0){
								$dateR='';
								$dateF='';
								$programme='';
								$statut='';
								$remarque='';
								
								while  ($obj_exp = $req1->Fetch(PDO::FETCH_ASSOC)) 
								{

									$nom_exp=utf8_encode($obj_exp['nom']);
									$id_doc_exp=$obj_exp['id'];
									$id_ser_exp=$obj_exp['id_ser'];
									$cop=$obj_exp['cop'];
									$dateP=$obj_exp['dateP'];
									if($cop=="0"){
										$cop='<span class="label label-sm label-warning">En cours de création</span>';
									}
									elseif($cop=="1"){
										$cop='<span class="label label-sm label-info">Crée</span>';
									}
								$complet=$connexion->query("select * from planning where id_doc=$id_doc_exp");
								$nbrComplet=$complet->rowcount();
								if($nbrComplet!=0){
									while  ($obj_complet = $complet->Fetch(PDO::FETCH_ASSOC)) 
								{
									$dateP=$obj_complet['dateP'];
									$dateR=$obj_complet['dateR'];
									$dateF=$obj_complet['dateF'];
									$programme=$obj_complet['progamme'];
									$statut=$obj_complet['statut'];
									$remarque=$obj_complet['remarque'];
								}
								}
									$type_exp=$obj_exp['type'];
									$reqz_exp=$connexion->query("select service.nom as nom from service where service.id=$id_ser_exp");
									$objz_exp = $reqz_exp->Fetch(PDO::FETCH_ASSOC);
									$serv_exp=utf8_encode($objz_exp['nom']);
												
									echo '<tr><td>'.utf8_encode($nom_exp).'</td>
									<td>'.$serv_exp.'</td>
									<td>'.$dateP.'</td>
									<td>'.$programme.'</td>
									<td><center>'.$cop.'</center></td>
									<td>'.$statut.'</td>
									<td>'.$dateR.'</td>
									<td>'.$dateF.'</td>
									<td>'.$remarque.'</td>
									<td><a class="" href="pmoddoc3.php?doc_id='.$id_doc_exp.'"id="Acc" title="Modifier"><span class="fa fa-pencil"></span></a></td>
									</tr>';
								}								
								}								
								else{
								$nbrT=0;
								}
							
							
						?>	
														
							</tbody>
							</table>
						</div>
					</div>
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
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
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
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/table-advanced.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
   <script>
    $(document).ready(function() {
        $('.fancybox').fancybox();
		 iframe: {
              preload: false // fixes issue with iframe and IE
          }
    });
</script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
    TableAdvanced.init();
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
			}
			}
	
?>
</html>
