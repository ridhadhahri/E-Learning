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

$colname_Recordset1 = "-1";
if (isset($_GET['num_ens'])) {
  $colname_Recordset1 = $_GET['num_ens'];
}
mysql_select_db($database_connexion, $connexion);
$query_Recordset1 = sprintf("SELECT * FROM upload WHERE num_ens = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['Email_ap'])) {
  $colname_Recordset2 = $_GET['Email_ap'];
}
mysql_select_db($database_connexion, $connexion);
$query_Recordset2 = sprintf("SELECT * FROM message WHERE Email_ap = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $connexion) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset5 = "-1";
if (isset($_GET['num_ens'])) {
  $colname_Recordset5 = $_GET['num_ens'];
}
mysql_select_db($database_connexion, $connexion);
$query_Recordset5 = sprintf("SELECT * FROM message3 WHERE num_ens = %s", GetSQLValueString($colname_Recordset5, "int"));
$Recordset5 = mysql_query($query_Recordset5, $connexion) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);
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
		    </ul>
			<div class="contact_content_left">
                        <h1>Bienvennu sur votre espace d'apprentissage en ligne.</h1>
                    <div class="datebox">
                            <div class="date"></div>
                            <div class="user"></div>
                            <div class="com"></div>
                            <div style="clear: both"></div>
                    </div>
                    <p class="Style1">
         <img src="images/spis_bot.gif" alt="" width="7" height="7" /> Liste des ressources :        </p>
        <table width="518" border="0" cellspacing="1">
          <tr bordercolor="#3399FF" bgcolor="#3399FF">
            <td width="22" height="27" bgcolor="#6ebfdc" style="color:#ffffff;font-weight:bold;"><div align="center">Identifien</div></td>
                        <td width="149" bgcolor="#6ebfdc" style="color:#FFFfff;font-weight:bold;"><div align="center">Description</div></td>
						 <td width="149" bgcolor="#6ebfdc" style="color:#ffffff;font-weight:bold;"><div align="center">Lien</div></td>
						  <td width="129" bgcolor="#6ebfdc" style="color:#ffffff;font-weight:bold;"><div align="center">Date d'ajout</div></td>
                           <td width="129" bgcolor="#6ebfdc" style="color:#ffffff;font-weight:bold;"><div align="center">sup_doc</div></td>
                         
</tr>
</tr>
 <?php do { ?>    
            <tr bgcolor="#CCCCCC">
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_Recordset1['id']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_Recordset1['description']; ?></td>
			  <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"> <a href="es_ensg.php?id=<?php echo urlencode($row_Recordset1['id']);?>"
><?php echo urlencode($row_Recordset1['name']);?></a> </td>
 <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo date('d/m/Y H:i:s' ,$row_Recordset1['date_envoie']); ?></td>
      <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><a href="supprimer_doc.php?date_envoie=<?php echo $row_Recordset1['date_envoie']; ?>">Supprimer</a></td>
        
              </tr>
         <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>  
         
        </table>
       <br /> 
        <p>Ajouter  un resource:</p>
       
<form method="post" enctype="multipart/form-data" Action="es_ensg.php">
<table width="350" border="0" cellpadding="1"cellspacing="1" class="box">
<tr>


</tr>

<tr>
<label for="description"><em>Description :</em> </label><input type="text" style="width:240px;height:16px;"  value="" id="description" name="description" />
<td>
<input type="hidden" name="MAX_FILE_SIZE"
value="16000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload"
type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</form>
        <p> <p><img src="header.jpg" alt="" width="660" height="8" /><br /> 
        <p class="Style1">
          <img src="images/contact.png" alt="" width="64" height="67" />Les messages apprenant recus : </p>
        <table width="359" border="0" cellspacing="1">
          <tr bordercolor="#3399FF" bgcolor="#3399FF">
            <td width="167" height="27" bgcolor="#6ebfdc"><div align="center"><em>E-mail apprenant</em></div></td>
                        <td width="150" bgcolor="#6ebfdc"><div align="center">message</div></td>
                        <td width="185" bgcolor="#6ebfdc"><div align="center">sup_msg</div></td>
            </tr>
 <?php do { ?>    
            <tr bgcolor="#CCCCCC">
              <td height="37"><?php echo $row_Recordset2['Email_ap']; ?></td>
              <td><textarea name="cont" cols="50" rows="5">     <?php echo $row_Recordset2['cont']; ?></textarea></td><td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><a href="supprimer_msg.php?num_msg=<?php echo $row_Recordset2['num_msg']; ?>">Supprimer</a></td>
              </tr>
         <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>  
          
        </table>
        <p>Les messages administrateur recus :</p>
        <table width="359" border="0" cellspacing="1">
          <tr bordercolor="#3399FF" bgcolor="#3399FF">
            <td height="27" bgcolor="#6ebfdc"><div align="center">message</div></td>
            <td bgcolor="#6ebfdc"><div align="center">sup_msg</div></td>
          </tr>
          <?php do { ?>
          <tr bgcolor="#CCCCCC">
            <td height="37"><textarea name="cont" cols="50" rows="5">     <?php echo $row_Recordset5['cont']; ?></textarea></td>
            <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><a href="supprimer_msg_ad.php?num_msg3=<?php echo $row_Recordset5['num_msg3']; ?>">Supprimer</a></td>
          </tr>
          <?php } while ($row_Recordset5 = mysql_fetch_assoc($Recordset5)); ?>
        </table>
        <p>&nbsp;</p>
        <p> <p><img src="" alt="" width="518" height="10" /></p>
        <p><a href="message_ves_app.php"><img src="images/contact_hover.png" alt="" width="64" height="67" />envoyez un message a votre apprenant</a></p>
        <p><img src="" alt="" width="518" height="10" /></p>
        <p><a href="rech_ap.php"><img src="images/1.GIF" alt="" width="53" height="40" /> Rechercher a un apprenant</a></p>
            </div>
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
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset5);
?>
