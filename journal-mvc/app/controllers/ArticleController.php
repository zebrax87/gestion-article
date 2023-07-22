<?php
// app/controllers/ArticleController.php

require_once __DIR__ . '/../models/ArticleModel.php';


class ArticleController {
    private $model;

    public function __construct($conn) {
        $this->model = new ArticleModel($conn);
    }

    public function index() {
        
        $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : null;
        $articles = $this->model->getAllArticles($categorie);
        
        if (empty($articles)) {
            // Si aucun article n'est trouvé, définis $articles comme un tableau vide
            
            $articles = [];
            echo "Aucun article trouvé";
        }
        require __DIR__ . '/../views/index.php';

        
    }
    
    public function add() {
        require __DIR__ . '/../views/add_article.php';
    }
    
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $categorie = $_POST['categorie'];
            // Récupérer les autres champs du formulaire si nécessaire

            // Créer un tableau avec les données de l'article
            $article = [
                'titre' => $titre,
                'contenu' => $contenu,
                'categorie' => $categorie
                // Ajoute les autres champs du formulaire ici si nécessaire
            ];

            // Utilise le modèle pour ajouter l'article en base de données
            $result = $this->model->addArticle($article);

            if ($result) {
                // Redirige vers la page d'accueil en cas de succès ou affiche un message de succès
                header('Location: index.php');
                exit;
            } else {
                // Affiche un message d'erreur en cas d'échec de l'insertion
                echo "Erreur lors de l'ajout de l'article.";
            }
        }
    }

    public function modify() {
        $articleId = isset($_GET['id']) ? $_GET['id'] : null;
        $article = $this->model->getArticleById($articleId);

        if (!$article) {
            // Si l'article n'existe pas, redirige vers la page d'accueil ou affiche un message d'erreur
            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../views/modify_article.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleId = $_POST['id'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            // Récupérer les autres champs du formulaire si nécessaire

            // Créer un tableau avec les données de l'article mis à jour
            $article = [
                'id' => $articleId,
                'titre' => $titre,
                'contenu' => $contenu,
                // Ajoutez les autres champs du formulaire ici si nécessaire
            ];

            // Utiliser le modèle pour mettre à jour l'article en base de données
            $this->model->updateArticle($article);

            // Rediriger vers la page d'accueil ou afficher un message de succès
            header('Location: index.php');
            exit;
        }
    }

    public function delete($articleId) {
        // Utilise le modèle pour supprimer l'article en base de données
        $result = $this->model->deleteArticleById($articleId);

        // Vérifiez si la suppression a réussi
        if ($result) {
            // Rediriger vers la page d'accueil avec un message de succès
            header('Location: index.php?delete_success=true');
            exit;
        } else {
            // Rediriger vers la page d'accueil avec un message d'erreur
            header('Location: index.php?delete_error=true');
            exit;
        }
    }

}

