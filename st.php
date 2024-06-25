<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM questions_culture";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$questions = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    echo "No questions found in the database.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  
  <link rel="stylesheet" href="assets/css/styles.css">
    
</head>

<body>
  <!-- Debut Header -->
<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        
        <h1>SenegalWeb<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#portfolio">Blogs</a></li>
          <li><a href="#services">Quizz</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
  <!-- Fin Header -->
<div class="quiz-container">
    
    <form id="quizForm" class="formulaire">
        <?php foreach ($questions as $index => $question): ?>
             <div class="quiz-question <?php if ($index === 0) echo 'active'; ?>" id="question<?php echo $index + 1; ?>">
                    <h2><?php echo $question['question']; ?></h2>
                    <label  style="font-size: 1.5rem;">
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="a">
                        <?php echo $question['a']; ?>
                    </label>
                    <label  style="font-size: 1.5rem;">
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="b">
                        <?php echo $question['b']; ?>
                    </label>
                    <label  style="font-size: 1.5rem;">
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="c">
                        <?php echo $question['c']; ?>
                    </label>
                    <label style="font-size: 1.5rem;">
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="d">
                        <?php echo $question['d']; ?>
                    </label>
                    <hr>
                    <span class="correct-answer" style="display:none;"><?php echo $question['correct']; ?></span>
            </div>
        <?php endforeach; ?>
            <div id="quiz-controls" style="display: flex; justify-content: space-between;">
                <button type="button" id="next">Suivant</button>
                <button type="button" id="submit" style="display: none;">Soumettre</button>
                <button type="button" id="restart" style="display: none;">Recommencer</button>
                <button type="button" id="choose-another" style="display: none;">Quitter</button>
            </div>
        
    </form>
    
    
</div>

<div id="results"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextButton = document.getElementById('next');
            const submitButton = document.getElementById('submit');
            const restartButton = document.getElementById('restart');
            const chooseAnotherButton = document.getElementById('choose-another');
            const resultsContainer = document.getElementById('results');
            const questions = document.querySelectorAll('.quiz-question');

            let currentQuestionIndex = 0;
            const totalQuestions = <?php echo count($questions); ?>;

            // Afficher la première question
            showQuestion(currentQuestionIndex);

            function showQuestion(index) {
                questions.forEach((question, idx) => {
                    if (idx === index) {
                        question.classList.add('active');
                    } else {
                        question.classList.remove('active');
                    }
                });

                // Masquer ou afficher les boutons en fonction de l'index de la question
                if (index === totalQuestions - 1) {
                    nextButton.style.display = 'none';
                    submitButton.style.display = 'block';
                } else {
                    nextButton.style.display = 'block';
                    submitButton.style.display = 'none';
                }
            }

            nextButton.addEventListener('click', () => {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            });

            submitButton.addEventListener('click', () => {
                const formData = new FormData(document.getElementById('quizForm'));
                let score = <?php echo count($questions); ?>;

                // Convertir FormData en un objet utilisable
                const answers = {};
                formData.forEach((value, key) => {
                    answers[key] = value;
                });

                // Liste des réponses correctes
                const correctAnswers = <?php echo json_encode(array_column($questions, 'correct', 'id')); ?>;

                // Comparaison des réponses et calcul du score
                for (let key in correctAnswers) {
                    if (correctAnswers.hasOwnProperty(key)) {
                        const questionIndex = 'question' + key;
                        const selectedOption = answers[questionIndex];
                        const questionElement = document.getElementById(questionIndex);
                        const correctAnswer = questionElement.querySelector('.correct-answer').innerText.trim();

                        if (selectedOption === correctAnswers[key]) {
                            questionElement.classList.add('correct');
                        } else {
                            questionElement.classList.add('incorrect');
                            score--;
                        }
                    }
                }

                // Affichage des résultats et des bonnes réponses
                resultsContainer.innerHTML = `<h2>Vous avez répondu correctement à ${score} sur ${Object.keys(correctAnswers).length} questions.</h2>`;

                // Afficher les boutons de recommencement et de choix d'un autre quiz
                restartButton.style.display = 'block';
                chooseAnotherButton.style.display = 'block';

                // Masquer les boutons de navigation
                nextButton.style.display = 'none';
                submitButton.style.display = 'none';
            });

            restartButton.addEventListener('click', () => {
                // Recharger la page pour recommencer le quiz
                location.reload();
            });

            chooseAnotherButton.addEventListener('click', () => {
                // Rediriger vers une autre page pour choisir un autre quiz
                window.location.href = 'index.html#services'; // Remplacez 'choose_quiz.php' par votre URL de choix de quiz
            });
        });
    </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>