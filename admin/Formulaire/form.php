<?php
include 'db.php';
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs email et mot de passe ont été envoyés
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Récupérer les valeurs des champs email et mot de passe
        $password = $_POST["password"];
        $username = $_POST['username'];

        // Préparer la requête SQL pour vérifier les identifiants
        $sql = "SELECT * FROM blogeurs WHERE username='$username' AND mot_de_passe= password('$password')";
        $result = $conn->query($sql);

        // Vérifier si l'utilisateur existe dans la base de données
        if ($result->num_rows > 0) {
            // Utilisateur authentifié avec succès
            session_start();
            $_SESSION['username'] = $username;

            // Rediriger l'utilisateur vers aceuill.php
            header("Location: ../index.php");
            exit(); // Arrêter l'exécution du script après la redirection
        } else {
            // Authentification échouée
            echo "Identifiants incorrects. Veuillez réessayer.";
        }

        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        // Les champs email et mot de passe n'ont pas été envoyés
        echo "Veuillez saisir votre email et votre mot de passe.";
    }
}
?>
