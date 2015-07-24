<?= 
/**
 Page achat et achat evenement place restante codepromo ok
*/ 

function placesRestantesByCodePromo($bdd, $idcod)
                {
                $query = 'SELECT COUNT(fac_code_id) AS "code_pris",SUM(code_nb) - COUNT(fac_code_id) AS "code_restant", SUM(code_nb) AS "nb_total"
                FROM facture, codepromo
                WHERE fac_code_id = fac_code_id
                AND code_id = ?';
                $sth   = $bdd->prepare($query);
                $sth->execute(array($idcod));
                return $sth->fetch(PDO::FETCH_ASSOC);
                }

                $codePromoNb = placesRestantesByCodePromo($bdd, $codepromovalide['code_id']);
                
                exit;

    if (empty($codePromoNb['code_restant'])) {
      error('Le nombre a ete depasse');
    }
    else{

?>

<?php 
                  /**
 Page achat et achat evenement place restante categorie ok
*/  
foreach ($categories as $key => $categorie)
  $categories[$key]['place'] = placesRestantesByCategorie($bdd, $evenement['ev_id'], $categorie['cat_id']);



                    if(empty($categorie['place']['nb_place_restante'])) 
                        {
                            ?><select name="" class="form-control">
                            <option value="">Plus de place disponible<selected></option>
                            </select>
                    <?php 
                        } 
                        else
                        {
                            ?><select name="cat_<?= $categorie['cat_id']?>" class="form-control">
                            <option value="" selected></option>
                            <option value="<?= $categorie['cat_id']?>">1</option>
                            </select><?php 
                        } 
?>