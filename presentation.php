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
				<div data-container="navigation"><div><ul id="mainNav1" class="mainNav1"><li id="cc-nav-view-644732352"><a href="index.php"><center><span>accueil</span></center></a></li>
				<li id="cc-nav-view-659959452"><a href="presentation.php"><span>presentation</span></a></li>
				<li id="cc-nav-view-644839152"><a href="#"><span>liste des formations</span></a></li>
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

<div id="div01">___>E_learning<___</div>

<center><div id="div02"></div>
<div class="main">

	
		
		<article class="article">
			
				<ul class="ls">
				  <div id="leftcolumn_box01">
				    <div class="leftcolumn_box01_top"></div>
			      </div>
		    </ul>
				<h1 class="style1">Module E_learning</h1>
                
<h1>la grande bibliothèque d'algérie "E_book":</h1>        
<h3>Rapide, sans contrainte de temps ni de lieu, peu coûteuse avec la possibilité de diffusion à un large public, l’utilisation de modules e-learning seuls ou intégrés à une formation présentielle présente de nombreux avantages.</h3>

<h1>Un cursus clé en main, une formation en ligne en totale autonomie</h1>
<h3>  Un module e-Learning est un format d’apprentissage à distance, d’une durée de 15 à 45 minutes, qui utilise les nouvelles technologies du web et du multimédia et dont l’objectif est de varier les modes d’apprentissage en facilitant  l’accès à des ressources et à des services.
Depuis plusieurs années Cegos développe ce mode d’apprentissage et propose un catalogue de 230 modules, clef en main, traduits en 16 langues dans tous les domaines de l’entreprise.
Les modules e-Learning Cegos garantissent :
Des cas concrets et tirés de l’expérience d’experts,
Une formation ludique et interactive, à moindre coût et sans frais de déplacement,
Des séquences d’apprentissage qui permettent de s’interrompre sans perdre le fil,
Une plateforme disponible 24H/24H,
L’accès à des ressources en ligne</h3>  
<br/>
<h1>Un apprentissage plus rapide et plus efficace.</h1> 
<h3>Les nouvelles technologies permettent d’enrichir la pédagogie classique et favorisent un apprentissage plus rapide et plus efficace.
Cegos offrent des modules e-Learning standards seuls et/ou combinés à 
Des formations en salle dans le cadre d’un stage « blended » (mixte)
Des parcours 100% à distance
Pour vos besoins spécifiques, Cegos dispose également d’un studio en interne qui conçoit et développe des contenus e-Learning sur mesure.</h3> 
<div>
<table>

<tr>
<td class="tab"><img src="biblio.png"height=200px width=200px /><td>
<h1>Découvrez tous nos Modules E-Learning :</h1>
<h3>
Achats et Supply Chain<br/>
Commercial<br/>
Développement personnel appliqué<br/>
Efficacité professionnelle<br/>
Finance – Gestion – Comptabilité<br/>
Management de projets<br/>
Management et leadership<br/>
Marketing et Innovation<br/>
Performance industrielle<br/>
Qualité – Sécurité – Environnement<br/>
Ressources humaines<br/>
Secrétaire – Assistant<br/>
 </h3>
 

</tr>

</table></div>
		                     						

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

</div></div>
</body>
</html>

