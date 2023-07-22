<?php
// public/index.php

require_once '../config.php';
require_once '../app/controllers/ArticleController.php';

$controller = new ArticleController($conn);
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
}

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'save':
        $controller->save();
        break;
    case 'modify': 
        // Ajouter la logique pour récupérer l'ID de l'article à modifier depuis les paramètres GET
        $articleId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($articleId !== null) {
            // Si l'ID de l'article est spécifié, afficher la vue de modification avec l'ID de l'article
            $controller->modify($articleId);
        } else {
            // Sinon, rediriger vers la page d'accueil ou afficher un message d'erreur
            $controller->index();
        }
        break;
    case 'update':
        $controller->update();
        break;
        case 'delete':
            // Vérifiez si l'ID de l'article a été passé en paramètre
            if (isset($_GET['id'])) {
                $articleId = $_GET['id'];
                $controller->delete($articleId); // Passez l'ID de l'article comme argument
            } else {
                // Redirige vers la page d'accueil si l'ID de l'article est manquant
                header('Location: index.php');
                exit;
            }
            break;
}
