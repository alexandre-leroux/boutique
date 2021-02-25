<?php

class controllerArticle {

    public function TrierPar($article, $view_article){
        if(!isset($_POST['tri_marque']) && !isset($_POST['tri_cat']) && !isset($_POST['tri_prix']))
        {
            $result = $article->findAllArticles(""," GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); // renvoie un tableaux de tout les articles 
            $view_article->displayAllArticles($result);  // affiche les articles 
        }
        elseif(isset($_POST['tri_cat']))
        {
            $cat = $article->findAllArticles(" WHERE id_categorie = ".$_POST['categories'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); 
            
            var_dump($cat);
            $view_article->displayAllArticles($cat); 
        }
        elseif(isset($_POST['tri_marque']))
        {
            $marque = $article->findAllArticles(" WHERE id_marques = ".$_POST['marques'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); 
            var_dump($marque);
            $view_article->displayAllArticles($marque);
            
        }
        elseif(isset($_POST['tri_prix']))
        {
            
            if($_POST['prix'] == "des")
            {

                $prix = $article->findAllArticles("", " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie ORDER BY prix DESC");
                $view_article->displayAllArticles($prix);
            }
            elseif($_POST['prix'] == "asc"){

                $prix = $article->findAllArticles("", " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie ORDER BY prix ASC");
                $view_article->displayAllArticles($prix);

            }
        }
    }
}