<?php
// app/models/ArticleModel.php

require_once __DIR__ . '/../dao/ArticleDAO.php';

class ArticleModel {
    private $dao; // La propriété doit s'appeler $dao, pas $ArticleDAO

    public function __construct($conn) {
        $this->dao = new ArticleDAO($conn);
    }

    // Méthode pour récupérer tous les articles ou les articles filtrés par catégorie
    public function getAllArticles($categorie = null) {
        return $this->dao->getAllArticles($categorie);
    }

    //Méthode pour insérer l'article dans la base de données
    public function addArticle($article) {
        return $this->dao->addArticle($article);
    }

    public function getArticleById($id) {
        return $this->dao->getArticleById($id);
    }

    public function updateArticle($article) {
        return $this->dao->updateArticle($article);
    }

    public function deleteArticleById($id) {
        return $this->dao->deleteArticleById($id);
    }
    // ...
}
