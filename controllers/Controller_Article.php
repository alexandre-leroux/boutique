<?php

class controller_Article {

    public function TrierPar($article, $view_article,$cat="",$condition="", $get=""){
        if(!isset($_POST['tri_marque'])  && !isset($_POST['tri_prix']) && !isset($_GET['id_marques']) && !isset($_POST['tri_manche']) && !isset($_POST['tri_thermo']) && !isset($_POST['tri_sous_cat']))
        {
            $result = $article->findAllArticles("{$cat}"," GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); // renvoie un tableaux de tout les articles 
            $view_article->displayAllArticles($result);  // affiche les articles 
            // echo 'salut'; 
        }
        elseif(isset($_POST['tri_marque']))
        {
            $marque = $article->findAllArticles(" WHERE id_marques = {$_POST['marques']} {$condition}", " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); 
            // var_dump($marque);
            // var_dump($condition);
            $view_article->displayAllArticles($marque);
            
        }
        elseif(isset($_GET['id_marques']))
        {
            $marque = $article->findAllArticles(" WHERE id_marques = ".$_GET['id_marques'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); 
            // var_dump($marque);
            $view_article->displayAllArticles($marque);
        }
        elseif(isset($_POST['tri_prix']))
        {
            
            if($_POST['prix'] == "des")
            {

                $prix = $article->findAllArticles("{$cat}", " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie ORDER BY prix DESC");
                $view_article->displayAllArticles($prix);
            }
            elseif($_POST['prix'] == "asc"){

                $prix = $article->findAllArticles("{$cat}", " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie ORDER BY prix ASC");
                $view_article->displayAllArticles($prix);

            }
        }
        elseif(isset($_POST['tri_manche']))
        {
            $manche = $article->findAllArticles("{$cat} AND raq_taille_manche = ".$_POST['taille_manche'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie") ;
            $view_article->displayAllArticles($manche);
        }
        elseif(isset($_POST['tri_thermo'])){
        
            $delete = array_pop($_POST); 
            $valeurs = implode(",",$_POST); 

            $thermo = $article->findAllArticles("{$cat} AND sac_thermobag IN ({$valeurs})", " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie") ;
            $view_article->displayAllArticles($thermo);
        }
        elseif(isset($_POST['tri_sous_cat']))
        {
            $sous_cat = $article->findAllArticles("{$cat} AND id_sous_cat_acc = ".$_POST['cat_acc'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie") ;
            $view_article->displayAllArticles($sous_cat);
        }
    }

    public function catProduits(string $cat,int $id_categorie,$model,$view)
    {
        $result_mar = $model->display("marques"); // renvoie un tableaux de toute les marques 
        $result_sous_cat = $model->display("sous_cat_accessoires") ;


        ?><section id="section_centrale_tous_les_articles"><?php
        $view->formTrierParMarques($result_mar,$cat); // affiche le form trier par marques
        $view->TrierParPrix($cat);
        if($cat == "raquettes"){
            $view->TrierParManche($cat);
        }
        if($cat == "sacs")
        {
            $view->TrierParThermo($cat) ;
        }
        if($cat == "accessoires")
        {
            $view->TrierParCatAcc($result_sous_cat);
        }
        $this->TrierPar($model,$view," WHERE id_categorie = {$id_categorie}","AND id_categorie = {$id_categorie}",@$_GET['id_marques']); 
        ?></section><?php
    }


}