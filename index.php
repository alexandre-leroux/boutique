<?php


$bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

var_dump($bdd);

// $a = 1;
// $b = 1;
// $c = 'aero drive';
// $d = ' ceci est une belle raquette jouée par nadal';
// $e = ' ceci est une belle raquette, je suis d\'accord en plus elle est formidable';
// $f = 8;
// $g = 210;

// $req = $bdd->prepare('INSERT INTO articles(categorie_id_categorie, marques_id_marques, art_nom, art_courte_desprition, art_description, stock, prix) VALUES(:a, :b, :c, :d, :e, :f, :g)');
// $req->execute(array(

//     'a' => $a,
//     'b' => $b,
//     'c' => $c,
//     'd' => $d,  
//     'e' => $e, 
//     'f' => $f, 
//     'g' => $g, 

// ));


// $art_nom = 'pure aero';
// $id = 2;

// $req = $bdd->prepare('UPDATE articles SET art_nom = :art_nom WHERE id_articles  = :id');
// $req->execute(array(
//                    'art_nom' => $art_nom,
//                      'id' => $id,
//                                                                       ));

$req = $bdd->query('SELECT * FROM articles INNER JOIN marques ON articles.id_marques = marques.id_marques INNER JOIN categorie on articles.id_categorie = categorie.id_categorie  where id_articles = 2');
$donnees = $req->fetch();

// echo '<pre>';
// print_r($donnees);
// echo '</pre>';

$req_categorie = $bdd->query('select * FROM categorie');
$req_marques = $bdd->query('select * FROM marques');
// $donnees_categorie = $req_categorie->fetchall();
// echo '<pre>';
// print_r($donnees_categorie);
// echo '</pre>';

?>
<p><b>données actuelles :</b></p>
<p>nom du produit : <?= $donnees['art_nom']?> </p>
<p>catégorie : <?= $donnees['categorie_type']?> </p>
<p>marque : <?= $donnees['marques_nom']?> </p>
<p>resumé : <?= $donnees['art_courte_description']?> </p>
<p>description : <?= $donnees['art_description']?> </p>
<p>poids : <?= $donnees['raq_poids']?> gr </p>
<p>tamis : <?= $donnees['raq_tamis']?> cm2</p>
<p>manche : <?= $donnees['raq_taille_manche']?> </p>
<p>équilibre : <?= $donnees['raq_equilibre']?> nr</p>
<p>stock : <?= $donnees['stock']?> </p>
<p>prix : <?= $donnees['prix']?> €</p>

<p><b>modifier l'article :</b></p>



<form action="index.php" method="post" >

<div >

    
    </div>
    
    <select name="id_categorie">
        <option disabled value="CATEGORIES"  selected="selected"  >CATEGORIES</option>
        <?php while($donnees_categorie = $req_categorie->fetch())
         {
             echo  "<option value=". $donnees_categorie['id_categorie'] . ">". $donnees_categorie['categorie_type'] ."</option> " ;  }?>
    </select>
    
    
    <select name='id_marques'>
        <option disabled value="MARQUES"  selected="selected"  >MARQUES</option>
        <?php while($donnees_marques = $req_marques->fetch())
         {echo  "<option value=". $donnees_marques['id_marques'] . ">". $donnees_marques['marques_nom'] ."</option> ";}?>
    </select>
    
    <div >
    <label for="nom">modifier le nom de l'article : </label>
    <input type="text" name="nom" value="<?= $donnees['art_nom']?>"  >
  </div>


  <div >
    <label for="resume">modifier le résumé : </label>
    <textarea name="resume" ><?= $donnees['art_courte_description']?></textarea>

  </div>
  <div >
    <label for="description">modifier la  description : </label>
    <textarea name="description"  ><?= $donnees['art_description']?></textarea>
  </div>
  <div >
    <label for="poids">modifier le poids : </label>
    <input type="number" name="poids" value="<?= $donnees['raq_poids']?>"  >
  </div>
  <div >
    <label for="tamis">modifier le tamis : </label>
    <input type="number" name="tamis" value="<?= $donnees['raq_tamis']?>">
  </div>
  <div >
    <label for="manche">modifier le manche : </label>
    <input type="number" name="manche" value="<?= $donnees['raq_taille_manche']?>" >
  </div>
  <div >
    <label for="equilibre">modifier l'équilibre : </label>
    <input type="number" name="equilibre" value="<?= $donnees['raq_equilibre']?>">
  </div>
  <div >
    <label for="prix">modifier le prix : </label>
    <input type="number" name="prix" value="<?= $donnees['prix']?>" >
  </div>
  <div >
    <label for="stock">modifier le stock : </label>
    <input type="number" name="stock" value="<?= $donnees['stock']?>" >
  </div>

  <div class="form-example">
    <input type="submit" value="modifier" name="submit">
  </div>
</form>

<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';



if (@$_POST['submit'] )
     {
         if ( @$_POST['id_marques'] == NULL){ $_POST['id_marques'] = $donnees['id_marques'] ;}
         if ( @$_POST['id_categorie'] == NULL){ $_POST['id_categorie'] = $donnees['id_categorie'] ;}
        $req_update = $bdd->prepare('UPDATE articles SET
                         art_nom = :art_nom,
                         id_categorie= :id_categorie,
                         id_marques= :id_marques,
                         art_nom = :art_nom,
                         art_courte_description = :resume,
                         stock = :stock,
                         prix = :prix,
                         raq_tamis = :tamis,
                         raq_taille_manche = :manche, 
                         raq_equilibre = :equilibre                                                  
                                                      
                          WHERE id_articles = :id');
        $req_update->execute(array( 
                        'id_marques' => $_POST['id_marques'],
                        'art_nom' => $_POST['nom'],
                        'id' => $donnees['id_articles'],
                        'id_categorie' => $_POST['id_categorie'],
                        'art_nom' => $_POST['nom'],
                        'resume' => $_POST['resume'],
                        'stock' => $_POST['stock'],
                        'prix' => $_POST['prix'],
                        'poids' => $_POST['poids'],
                        'tamis' => $_POST['tamis'],
                        'manche' => $_POST['manche'],
                        'equilibre' => $_POST['equilibre'],
        ));
        }

        


?>


<div style="display:flex">
<?php
$i = 1;

while ($i<8)
{
  ?>
  <p><img style="height:100px" src="medias/img_articles/pure-aero-vs-<?=$i?>.jpg" alt=""></p>
<?php
$i++;

}
?>
</div>