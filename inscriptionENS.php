<?php require_once('Connections/connexion.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "inscriptionAPR")) {
  $insertSQL = sprintf("INSERT INTO enseignant (nom, prenom, sexe, telephone, login, pasword, Email, matiere) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nom'], "text"),
                       GetSQLValueString($_POST['prenom'], "text"),
                       GetSQLValueString($_POST['sexe'], "text"),
                       GetSQLValueString($_POST['telephone'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['pasword'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['matiere'], "text"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "inscriptionENS.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
				<div data-container="navigation"><div><ul id="mainNav1" class="mainNav1"><li id="cc-nav-view-644732352"><a href="index.php"><center><span>Accueil</span></center></a></li>
				<li id="cc-nav-view-659959452"><a href="presentation.php"><span>Presentation</span></a></li>
				<li id="cc-nav-view-644839152"><a href="#"><span>Liste des formations</span></a></li>
				<li id="cc-nav-view-644839652"><a href="connexion.php"><span>Connexion</span></a></li>
				<li id="cc-nav-view-645093052"><a href="inscription.php" class="level_1"><span>Inscription</span></a></li><li id="cc-nav-view-647024052"><a href="#"><span>Contactez nous</span></a></li></ul></div></div> 
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
				    <div class="leftcolumn_box01_top"><center><h3>Inscription Enseignant</h3></center></div>
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
		    </ul>
            <form name="inscriptionAPR" action="<?php echo $editFormAction; ?>" method="POST" id="inscriptionENS">
             <table width="332" height="297" align="center">
              <tr valign="baseline">
                <td width="96" height="28" align="right" nowrap="nowrap">Email</td>
                <td width="224" class="Style3"><span class="Style1">
                <input type="text" name="Email" value="" size="28" />
                <img src="images/fu_i1.png" alt="" width="16" height="16" />                </span></td>
              </tr>
              
              <tr valign="baseline">
                <td height="28" align="right" nowrap="nowrap">Nom</td>
                <td align="left" background="/site/biblio.png"><span class="Style1"><span class="Style3">
                  <input type="text" name="nom" value="" size="25" />
                </span><img src="images/enseignant.png" alt="" width="24" height="25" /></span></td>
              </tr>
              <tr valign="baseline">
                <td height="28" align="right" nowrap="nowrap">Pr&eacute;nom</td>
                <td><span class="Style1">
                  <input type="text" name="prenom" value="" size="25" />
                </span></td>
              </tr>
              <tr valign="baseline">
                <td height="28" align="right" nowrap="nowrap">login</td>
                <td><span class="Style1">
                  <input type="text" name="login" value="" size="25" />
                </span></td>
              </tr>
                <tr valign="baseline">
      <td height="33" align="right" nowrap>Sexe:</td>
      <td colspan="2" align="left"><label>
        <select name="sexe">
          <option>masculin</option>
          <option>féminin</option>
		  </select>
      </label></td>
   

              <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">T&eacute;l&eacute;phone</td>
                <td><input type="text" name="telephone" value="" size="25" />
                <img src="images/fish_us2.png" alt="" width="24" height="22" /></td>
              </tr>
              <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">password</td>
                <td><input type="password" name="pasword" value="" size="25" />
                <img src="images/cadenas.png" alt="" width="22" height="20" /></td>
              </tr>
              <tr valign="baseline">
                <td height="24" align="right" nowrap="nowrap">matiere</td>
                <td><input type="text" name="matiere" value="" size="25" />
                <img src="images/abc.png" alt="" width="29" height="18" /></td>
              </tr>
              <tr valign="baseline">
                <td height="40" align="right" nowrap="nowrap">&nbsp;</td>
                <td><input name="submit" type="submit" onClick="MM_validateForm('nom','','R','prenom','','R','Email','','R',Email','pasword','','R','matiere','','R');return document.MM_returnValue" value="   Inscrire  " /></td>
              </tr>
            </table>
             <input type="hidden" name="MM_insert" value="inscriptionAPR">
            </form>
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