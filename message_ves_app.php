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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO message2 (cont2, num_app, Email) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['cont'], "text"),
                       GetSQLValueString($_POST['num_app'], "int"),
                       GetSQLValueString($_POST['Email'], "text"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "espaceEns.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_connexion, $connexion);
$query_Recordset3 = "SELECT * FROM enseignant";
$Recordset3 = mysql_query($query_Recordset3, $connexion) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
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
				<div data-container="navigation"><div><ul id="mainNav1" class="mainNav1"><li id="cc-nav-view-644732352"><a href="#"><center><span>accueil</span></center></a></li>
				<li id="cc-nav-view-659959452"><a href="file:///C:/Users/HP/Desktop/css%20html/pr%C3%A9sentation.html"><span>presentation</span></a></li>
				<li id="cc-nav-view-644839152"><a href="file:///C:/Users/HP/Desktop/2eme%20Ann%C3%A9e%20Informatique/css%20html/pr%C3%A9sentation.html"><span>liste des formations</span></a></li>
				<li id="cc-nav-view-644839652"><a href="#"><span>Connexion</span></a></li>
				<li id="cc-nav-view-645093052"><a href="#" class="level_1"><span>Inscréption</span></a></li><li id="cc-nav-view-647024052"><a href="file:///C:/Users/HP/Desktop/css%20html/conacter%20nous.html"><span>Contactez nous</span></a></li></ul></div></div> 
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
                  <div id="black_bg">
			<div id="wrap">
				
				<div id="content">
                  <div class="contact_content_left">
                        <h5>Bienvennu sur votre espace d'apprentissage en ligne.</h5>
                    <div class="datebox">
                            <div class="date"></div>
                            <div class="user"></div>
                            <div class="com"></div>
                            <div style="clear: both"></div>
                      </div>
                    <p>Envoyez un message a votre apprenant :
                    <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
            <table width="332" height="128" align="center">
              <tr valign="baseline">
                <td width="96" height="28/" align="right" nowrap="nowrap">message</td>
                <td width="224" class="Style3"><span class="Style1">
                  <textarea name="cont" cols="50" rows="5"></textarea>
                </span></td>
              </tr>
                <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">num_app</td>
                <td><input type="text" name="num_app" value="" size="25" /></td>
              </tr>

              <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">email</td>
                <td><input type="text" name="Email" value="" size="25" /></td>
              </tr>
              <tr valign="baseline">
                <td height="40" align="right" nowrap="nowrap">&nbsp;</td>
                <td><input name="submit" type="submit" onclick="MM_validateForm('cont','','R','num_ens','','R','login_ap','pasword_ap','','R');return document.MM_returnValue" value="   envoyer  " /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1" />
                    </form>
                    <form method="post" action="<?php echo $row_Recordset3['']; ?>" name="connecter">
                      <div class="form_row"></div>
                      <div class="button1"  >
  <p><a href="espaceEns.php"> <img src="images/close_btn.png" alt="" width="26" height="28" />Retoure</a></p>
                      </div>
                        </label>
                    </form>
                  </div>
                    <div class="contact_content_right">
                        
                        <div class="pad_left_con">
                            <div align="center">
                              <ul class="ls">
                              <h1>comptes enseignants</h1>
                              </ul>
                            </div>
                            <ul class="ls">
                              <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top"></div>
                <div class="leftcolumn_box01_bottom">
                    <form method="post" action="index.php" name="connecte">
                      <div class="form_row"></div>
               
                          <p align="center" class="Style12">Bienvenue  &quot;<span class="Style10"><?php echo $row_Recordset3['nom']; ?></span>&quot; <span class="Style13">&quot; </span> <span class="Style10"><?php echo $row_Recordset3['prenom']; ?></span><span class="Style13">&quot; </span><span class="Style13">sur votre espace enseignant</span>                        </p>
                        </a>
                        <div class="button1"  >
                          <label>
                            <div align="center">
                              <input class="button1" type="submit" name="Submit2" onClick="index.php" value="deconnexion" />
                            </div>
                          </label>
                      </div>
                        <div align="center">
                          </label>
                        </div>
                    </form>
                </div>            
            </div>
                            </ul>
                        </div>
                        
                    </div>


                    <div style="clear: both"></div>
                </div>
                                  
				   <!-- bottom begin --><!-- bottom end --> 
</div>
				</div>
		    </ul>
			<h1 class="style1">&nbsp;</h1>
                

</article>		
		<br style="clear:both;">
	</div>
</div></center>


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
<?php
mysql_free_result($Recordset3);
?>
