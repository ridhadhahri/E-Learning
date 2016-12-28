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

mysql_select_db($database_connexion, $connexion);
$query_Recordset3 = "SELECT * FROM enseignant";
$Recordset3 = mysql_query($query_Recordset3, $connexion) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<html>
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
                        <h5>Bienvennu sur votre espace d'apprentissage en ligne.</h5>
                         <div class="leftcolumn_box01_top"></div>
                <div class="leftcolumn_box01_bottom">
                    <form method="post" action="index.php" name="connecte">
                      <div class="form_row"></div>
               
                          <p class="Style12">Bienvenue  &quot;<span class="Style10"><?php echo $row_Recordset3['nom']; ?></span>&quot; <span class="Style13">&quot; </span> <span class="Style10"><?php echo $row_Recordset3['prenom']; ?></span><span class="Style13">&quot; </span><span class="Style13">sur votre espace enseignant</span>                        </p>
                        </a>
                        <div class="button1"  >
                          <label>
                          <input class="button1" type="submit" name="Submit2" onClick="index.php" value="deconnexion" />
                          </label>
                      </div>
                        </label>
                    </form>
                </div>            
            </div>
                    <div class="datebox">
                            <div class="date"></div>
                            <div class="user"></div>
                            <div class="com"></div>
                            <div style="clear: both"></div>
              </div>
                   
   <div id="Layer4"></div>
<div id="Layer5">
<fieldset style= "border-color:#000080; text-decoration: none; font-variant: normal;">
 <legend class="Style7"><img src="images/1.GIF" alt="" width="22" height="15" />Recherche par nom</legend>
  <table width="251" height="77" border="0" bordercolor="#333333">
    <tr>
      <td height="29" colspan="3"><p class="Style4"><span class="Style5">Ins&eacute;rez le nom d'apprenant :</span></p></td>
    </tr>
    <tr>
      <td height="32" colspan="3"><form id="chercher" name="chercher" method="post" action="res_rech_ap.php">
          <label>
            <input name="nom_ap" type="text" id="nom_ap" value="RECHERCHER" onfocus="if (value='RECHERCHER'){this.value=''}"  size="30" />
          </label>
          <label>
          <input type="submit" name="Submit" value="GO!" />
          </label>
      </form></td>
    </tr>
 
    <tr>
      <td height="7" colspan="3">&nbsp;</td>
    </tr>
  </table>
  
  <p><img src="images/contenu.png" alt="" width="510" height="11" /></p>
  <p><a href="liste_etud.php"><img src="images/tit_img2.png" alt="" width="21" height="19" />Consultez la liste de tout des apprenants</a></p>
  <p><img src="images/contenu.png" alt="" width="510" height="11" /></p>
  <p><a href="espaceEns.php">Retour</a></p>
</fieldset>
</div>
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
mysql_free_result($Recordset3);
?>
