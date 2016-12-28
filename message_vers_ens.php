<?php require_once('Connections/connexion.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "connexion.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

function GetSQLValueString1($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction3 = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction3 .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['Email_ap'])) {
  $loginUsername=$_POST['Email_ap'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "msg_suc.php";
  $MM_redirectLoginFailed = "msg_rjt.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connexion, $connexion);
  
  $LoginRS__query=sprintf("SELECT apprenant.Email_ap FROM apprenant WHERE apprenant.Email_ap='%s'  AND apprenant.activation_ap=1",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $connexion) or die(mysql_error());
  $loginFoundUser = mysql_fetch_array($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
     $idmembre =$loginFoundUser[2] ;	
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
    $_SESSION['nom'] = $idmembre;
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO message (cont, num_ens, Email_ap) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['cont'], "text"),
                       GetSQLValueString($_POST['num_ens'], "int"),
                       GetSQLValueString($_POST['Email_ap'], "text"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "message_vers_ens.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


  }
  else {
      header("Location: ". $MM_redirectLoginFailed );
     }
}

	?>
<html >
<head>
<title>E_Learning</title>

    <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: 24px;
}
-->
    </style>
<div class="tete"><a href="#" class="sov"><img src="header.jpg"/></a></div> 
    <link href="css 1.css" rel="stylesheet" type="text/css"/>
    <link href="font css.css" rel="stylesheet" type="text/css"/>

  <link href="articl css.css" rel="stylesheet" type="text/css"/>
    
	
	<style>
	
.pad_left_con{
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
}
    
.ls{
    list-style: none;
    padding-left: 0px;
}
#features {

	width: 298px;
    height: 854px;
	float: left;
	background: url(bloc3.png);

}

    </style>
	<script type="text/javascript">
   function calendrier()
{
	var date = new Date();
	var jour = date.getDate();
	var moi = date.getMonth();
	var annee = date.getYear();
	if(annee<=200)
	{
		annee += 1900;
	}
	mois = new Array('Janvier','F&eacute;vrier','Mars','Avril','Mai','Juin','Juillet','Ao&ucirc;t','Septembre','Octobre','Novembre','D&eacute;cembre');
	jours_dans_moi = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
	if(annee%4 == 0 && annee!=1900)
	{
		jours_dans_moi[1]=29;
	}
	total = jours_dans_moi[moi];
	var date_aujourdui = jour+' '+mois[moi]+' '+annee;
	dep_j = date;
	dep_j.setDate(1);
	if(dep_j.getDate()==2)
	{
		dep_j=setDate(0);
	}
	dep_j = dep_j.getDay();
	document.write('<table class="cal_calendrier" onload="opacite(document.getElementById(\'cal_body\'),20);"><tbody id="cal_body"><tr><th colspan="7">'+date_aujourdui+'</th></tr>');
	document.write('<tr class="cal_j_semaines"><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr><tr>');
	sem = 0;
	for(i=1;i<=dep_j;i++)
	{
		document.write('<td class="cal_jours_av_ap">'+(jours_dans_moi[moi-1]-dep_j+i)+'</td>');
		sem++;
	}
	for(i=1;i<=total;i++)
	{
		if(sem==0)
		{
			document.write('<tr>');
		}
		if(jour==i)
		{
			document.write('<td class="cal_aujourdhui">'+i+'</td>');
		}
		else
		{
			document.write('<td>'+i+'</td>');
		}
		sem++;
		if(sem==7)
		{
			document.write('</tr>');
			sem=0;
		}
	}
	for(i=1;sem!=0;i++)
	{
		document.write('<td class="cal_jours_av_ap">'+i+'</td>');
		sem++;
		if(sem==7)
		{
			document.write('</tr>');
			sem=0;
		}
	}
	document.write('</tbody></table>');
//	document.getElementById('cal_body').;
	opacite(document.getElementById('cal_body'),70);
	return true;
}
function setStyle(id,style,value)
{
    id.style[style] = value;
}
</script>
        

        
    </head>

<body>
		




<br>

<div><div id="cc-tp-padding-container" class="cc-content-parent">

<div>

	<div>
		<center>
		<div id="cc-tp-nav">		
			<div class="cc-tp-gutter">
				<div data-container="navigation"><div><center><ul id="mainNav1" class="mainNav1"><li id="cc-nav-view-644732352"><a href="#"><center><span>accueil</span></center></a></li>
				<li id="cc-nav-view-659959452"><a href="file:///C:/Users/HP/Desktop/css%20html/pr%C3%A9sentation.html"><span>presentation</span></a></li>
				<li id="cc-nav-view-644839152"><a href="file:///C:/Users/HP/Desktop/2eme%20Ann%C3%A9e%20Informatique/css%20html/pr%C3%A9sentation.html"><span>liste des formations</span></a></li>
				<li id="cc-nav-view-644839652"><a href="#"><span>Connexion</span></a></li>
				<li id="cc-nav-view-645093052"><a href="#" class="level_1"><span>Inscréption</span></a></li><li id="cc-nav-view-647024052"><a href="file:///C:/Users/HP/Desktop/css%20html/conacter%20nous.html"><span>Contactez nous</span></a></li></ul></center></div></div> 
<br><br>

		<div class="clear"></div>				
			</div>		
		</div>								
		</center>
	</div>


<div class="tab">

<br>

<div id="div01"></div>

<center><div id="div02"></div>
<div class="main">

	
		
		<article class="article">
			
			<ul class="ls">
				  <div id="leftcolumn_box01">
				    <div class="leftcolumn_box01_top"></div>
				    <div class="leftcolumn_box01_bottom">
				      <ul class="ls">
				        <div id="leftcolumn_box">
				          <div class="leftcolumn_box01_top">
				            <ul class="ls">
				              <div id="leftcolumn_box2">
				                <ul class="ls">
				                  <div id="leftcolumn_box3">
				                    <div class="leftcolumn_box01_top"></div>
				                    <div class="leftcolumn_box01_bottom">
				                      <ul class="ls">
				                        <div id="leftcolumn_box4">
				                          <div class="leftcolumn_box01_top"></div>
				                          <div class="leftcolumn_box01_bottom">
				                            <ul class="ls">
				                              <div id="leftcolumn_box5">
				                                <div class="leftcolumn_box01_top">
				                                  <ul class="ls">
				                                    <div id="leftcolumn_box6">
				                                      <ul class="ls">
				                                        <div id="leftcolumn_box7">
				                                          <div class="leftcolumn_box01_top"></div>
				                                          <div class="leftcolumn_box01_bottom"></div>
			                                            </div>
			                                          </ul>
				                                      <div class="leftcolumn_box01_bottom"></div>
			                                        </div>
			                                      </ul>
			                                    </div>
				                                <div class="leftcolumn_box01_bottom"></div>
			                                  </div>
			                                </ul>
			                              </div>
			                            </div>
			                          </ul>
				                    </div>
			                      </div>
			                    </ul>
				                <div class="leftcolumn_box01_bottom"></div>
			                  </div>
			                </ul>
			              </div>
				          <div class="leftcolumn_box01_bottom"></div>
			            </div>
			          </ul>
			        </div>
			      </div>
		    </ul><p>Envoyer un message a votre enseignant
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
            <table width="332" height="128" align="center">
              <tr valign="baseline">
                <td width="96" height="28/" align="right" nowrap="nowrap">message</td>
                <td width="224" class="Style3"><span class="Style1">
                <textarea name="cont" cols="50" rows="5"></textarea>     
                *</span></td>
              </tr>
                <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">num_app</td>
                <td><input type="text" name="num_ens" value="" size="25" /></td>
              </tr>

              <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">email</td>
                <td><input type="text" name="Email_ap" value="" size="25" /></td>
              </tr>
              <tr valign="baseline">
                <td height="40" align="right" nowrap="nowrap">&nbsp;</td>
                <td><input name="submit" type="submit" onclick="MM_validateForm('cont','','R','num_ens','','R','login_ap','pasword_ap','','R');return document.MM_returnValue" value="   envoyer  " /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1" />
          </form></p>
                    
                    <form method="post" action="<?php echo $loginFormAction1; ?>" name="connecter">
                    <label>
</div>
</center>


<br>
</div>
<div id="cc-tp-footer">		
			<div class="cc-tp-gutter"><div id="contentfooter" data-container="footer">
    <div class="leftrow">
      <center>  <a rel="nofollow" href="#">site</a> | <a rel="nofollow" href="#">Charte de confidentialitï?½</a> | <a href="#">Plan du site</a> | <a rel="nofollow" href="#">Recommander ce site</a><br/>annee 2013-** Université dE JIJEL -  - Tel: ** ** ** ** ** - Fax: ** ** ** ** ** - www.E_Learning.com - Sphinx_b@live.fr </div></center>

<div class="rightrow">
            
      
</div></div>
</div>
			
</div>			

</div>		

</div>
</div>
</body>
</html>