<?php
include 'db.php';
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupération des données du formulaire
    $type = $_POST['type']; // Blog ou Quizz
    $id = $_POST['id']; // ID de l'objet à supprimer
    $categorie = $_POST['categorie']; // Catégorie de l'objet à supprimer


    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Préparation de la requête en fonction du type sélectionné
    switch ($type) {
        case 'Blog':
            $sql = "DELETE FROM blog WHERE id = ?";
            break;
        case 'Quizz':
            $sql = "DELETE FROM quizz WHERE id = ?";
            break;
        default:
            echo "Type invalide";
            exit();
    }

    // Utilisation d'une requête préparée pour éviter les injections SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indique que $id est un entier (integer)

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Suppression réussie.";
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    // Fermeture de la connexion et du statement
    $stmt->close();
    $conn->close();
}
?>
