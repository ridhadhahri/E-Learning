<?php require_once('Connections/connexion.php');?>
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

$currentPage = $_SERVER["PHP_SELF"];

$a_r = "-1";
if (isset($_POST['nom_ap'])) {
  $a_r = $_POST['nom_ap'];
}
mysql_select_db($database_connexion, $connexion);
$query_r = sprintf("SELECT * FROM apprenant WHERE apprenant.activation_ap=1 AND apprenant.nom_ap=%s", GetSQLValueString($a_r, ""));
$r = mysql_query($query_r, $connexion) or die(mysql_error());
$row_r = mysql_fetch_assoc($r);
$totalRows_r = mysql_num_rows($r);

$queryString_r = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_r") == false && 
        stristr($param, "totalRows_r") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_r = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_r = sprintf("&totalRows_r=%d%s", $totalRows_r, $queryString_r);
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
                    <div class="datebox">
                            <div class="date"></div>
                            <div class="user"></div>
                            <div class="com"></div>
                            <div style="clear: both"></div>
                    </div>
                    <p class="Style1">Liste de tout des apprenant :</p>
        <table width="600" border="0" cellspacing="1">
          <tr bordercolor="#3399FF" bgcolor="#3399FF">
            <td width="39" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">login</div></td>
                        <td width="65" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">nom</div></td>
                        <td width="67" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">prenom</div></td>
            <td width="66" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">numero d'apprenant</div></td>
            <td width="69" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">email</div></td>
 <td width="79" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">telephone</div></td>
            
            
            <td width="79" bgcolor="#6ebfdc"style="color:#ffffff"><div align="center">sexe</div></td>
            
            
            
            
          </tr>
 <?php do { ?>
            <tr bgcolor="#CCCCCC">
              <td height="25"style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['login_ap']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['nom_ap']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['prenom_ap']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['num_app']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['Email_ap']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['Telephone_ap']; ?></td>
              <td style="text-align:center;width=50px;height:25px;background-color:#e6f8f4;"><?php echo $row_r['sexe_ap']; ?></td>
              
              
              
          </tr>
            <?php } while ($row_r = mysql_fetch_assoc($r)); ?>
          
        </table>
  <p>&nbsp;</p>
 <a href="rech_ap.php" class="retoure"> Retoure </a>
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
mysql_free_result($r);
?>
