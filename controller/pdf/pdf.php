<?php

 function showModel($bdd, $id)
  {
    $query = 'SELECT * FROM evenement WHERE ev_id = ?';
    $sth   = $bdd->prepare($query);
    $sth->execute(array($id));

    return $sth->fetch(PDO::FETCH_ASSOC);
  }
  $evenement        = showModel($bdd, $id);

function listByFacture($bdd, $id_inter, $id_ev)
  {
    $query = 'SELECT * FROM facture WHERE fac_ev_id = :fac_ev_id and fac_inter_id = :fac_inter_id';
    $sth   = $bdd->prepare($query);
    $sth->execute(array(':fac_inter_id' => $id_inter, ':fac_ev_id' => $id_ev));
    return $sth->fetch(PDO::FETCH_ASSOC);
  }
$evenemennt   = listByFacture($bdd, $_SESSION['user']['inter_id'], $evenement['ev_id']);
function listModel($bdd, $id_cat, $id_ev)
  {
    $query = "SELECT *
              FROM categorie, evenement
              WHERE cat_id = :fac_cat_id
              AND ev_id = :fac_ev_id";
    $sth   = $bdd->prepare($query);
    $sth->execute(array(':fac_cat_id' => $id_cat, ':fac_ev_id' => $id_ev));

    return $sth->fetch(PDO::FETCH_ASSOC);
  }
$facture    = listModel($bdd, $evenemennt['fac_cat_id'], $evenemennt['fac_ev_id']);


require 'pdf/mpdf.php';
$mpdf=new mPDF('c','A4','','',32,25,47,47,10,10); 

$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins

$header = '
<table width="100%" style="border-bottom: px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="33%">Facture évènement n° ' . $facture['ev_id'] . '<span style="font-size:14pt;">{PAGENO}</span></td>

<td width="33%" style="text-align: right;"><span style="font-weight: bold;">' . $facture['ev_libelle'] . ' ' . $facture['ev_date'] . ' </span></td>
</tr></table>
';
$headerE = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="33%"><span style="font-weight: bold;">Outer header</span></td>
<td width="33%" align="center"><img src="sunset.jpg" width="126px" /></td>
<td width="33%" style="text-align: right;">Inner header p <span style="font-size:14pt;">{PAGENO}</span></td>
</tr></table>
';

$footer = '<div align="center">Contact : danny.allaoui@luminances.com - +33(0) 6 08 76 40 40</div>';
$footerE = '<div align="center">Contact : danny.allaoui@luminances.com - +33(0) 6 08 76 40 40</div>';


$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLHeader($headerE,'E');
$mpdf->SetHTMLFooter($footer);
$mpdf->SetHTMLFooter($footerE,'E');


$html = '

<h1>' . $facture['ev_libelle'] . ' ' . $facture['ev_date'] . ' </h1>
<h2>Ma facture évènement n° ' . $facture['ev_id'] . '</h2>
<h3>Cette facture fera office de place le jour venu.</h3>
<p>Vous trouverez ci-dessous toutes les informations de votre évènement "' . $facture['ev_libelle'] . '", merci de la présenter à notre organisateur le jour venu. </p>
<style type="text/css">
      h1 { color: #0174DF;
           font-family: helvetica;
           background: #A9E2F3 none;
           border: 6px #9999FF; 
           padding: 0.3em;
           text-align: center;
          letter-spacing: 0.3em;

          }  
      h2 { color: #0174DF; font-family: helvetica; background: #A9E2F3 none; border: 6px #9999FF; padding: 0.3em; text-align: center; letter-spacing: 0.3em;}
      h3 { color : black; font-family: helvetica; background: #FFFFFF none; border: 3px dotted #0066CC; padding: 0.3em; text-align: center;}  
      table

{

    border-collapse: collapse;

}

td, th /* Mettre une bordure sur les td ET les th */

{
    background-color: #D3E2ED;
    border: 1px solid black;

}
</style> 
<table>
   <tr>

       <th>Nom évènement</th>

       <td>' . $facture['ev_libelle'] . '</td>

   </tr>

   <tr>

       <th>Informations évènement </th>
       <td width=80%> <b>Date</b> : ' . $facture['ev_date'] . ' <br></br> <b>Salle </b> : ' . $facture['ev_lieux_id'] . '<br></br> <b> Catégorie </b> : ' . $facture['cat_nom'] . ' <br></br> <b> Prix </b> : ' . $facture['cat_prix'] . ' <br></br>  </td>

       

   </tr>

   <tr>

       <th>Informations utilisateur</th>

       <td><b>Prenom :</b> ' . $_SESSION['user']['inter_prenom'] . ' <br></br> <b>NOM</b> : ' . $_SESSION['user']['inter_nom'] . ' <br> <b>Adresse :</b> ' . $_SESSION['user']['adresse']['adr_num_rue'] . ' ' . $_SESSION['user']['adresse']['adr_rue'] . ' </br> <br> <b>Ville :</b> ' . $_SESSION['user']['adresse']['adr_ville'] . ' </br> <br> <b>Mail :</b> ' . $_SESSION['user']['inter_mail'] . '  </br> </td>

       

   </tr>

</table>
';
$mpdf->WriteHTML($html);
$mpdf->Output(/** Faut pas mettre un nom de fichier ici ? **/);


?>
