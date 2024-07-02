<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Validation minimale (vérification que les champs ne sont pas vides)
    if (!empty($title) && !empty($content)) {
        // Sauvegarde dans un fichier texte (ajout à la fin du fichier)
        $file = 'blog_posts.txt';
        $current = file_get_contents($file);
        $current .= "Titre: $title\n";
        $current .= "Contenu:\n$content\n\n";
        file_put_contents($file, $current);

        echo "<p>L'article a été ajouté avec succès.</p>";
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>
