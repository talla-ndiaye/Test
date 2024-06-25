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

$sql = "SELECT * FROM questions";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Open Sans', sans-serif;
        }

        .quiz-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .quiz-question {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }

        .quiz-question h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .radio-options {
            display: grid;
            grid-template-columns: auto 1fr;
            grid-column-gap: 10px;
            align-items: center;
        }

        .radio-options label {
            font-size: 1.2rem;
        }

        .next-prev button {
            margin-right: 10px;
        }

        .result-container {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .result-container h3 {
            margin-bottom: 10px;
        }

        .result-container .result-text {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .result-container .score {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        .result-container .restart-btn {
            margin-top: 20px;
        }
    </style>
</head>

<body>
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

    <div class="container quiz-container">
        <form id="quizForm">
            <?php foreach ($questions as $index => $question): ?>
                <div class="quiz-question <?php echo ($index === 0) ? 'active' : ''; ?>" id="question<?php echo $index + 1; ?>">
                    <h2><?php echo $question['question']; ?></h2>
                    <div class="radio-options">
                        <input type="radio" id="option<?php echo $index + 1; ?>a" name="question<?php echo $index + 1; ?>" value="a">
                        <label for="option<?php echo $index + 1; ?>a"><?php echo $question['a']; ?></label>

                        <input type="radio" id="option<?php echo $index + 1; ?>b" name="question<?php echo $index + 1; ?>" value="b">
                        <label for="option<?php echo $index + 1; ?>b"><?php echo $question['b']; ?></label>

                        <input type="radio" id="option<?php echo $index + 1; ?>c" name="question<?php echo $index + 1; ?>" value="c">
                        <label for="option<?php echo $index + 1; ?>c"><?php echo $question['c']; ?></label>

                        <input type="radio" id="option<?php echo $index + 1; ?>d" name="question<?php echo $index + 1; ?>" value="d">
                        <label for="option<?php echo $index + 1; ?>d"><?php echo $question['d']; ?></label>
                    </div>
                    <div class="correct-answer" style="display:none;"><?php echo $question['correct']; ?></div>
                </div>
            <?php endforeach; ?>
            <div class="result-container" id="resultContainer">
                <h3>Résultats du Quiz</h3>
                <div class="result-text">Votre score est :</div>
                <div class="score" id="userScore">0%</div>
                <div class="restart-btn">
                    <button id="restart" class="btn btn-primary">Recommencer</button>
                    <button id="chooseAnother" class="btn btn-secondary">Choisir un autre quiz</button>
                </div>
            </div>
            <div class="next-prev mt-3">
                <button class="btn btn-primary" id="prevButton" type="button">Précédent</button>
                <button class="btn btn-primary" id="nextButton" type="button">Suivant</button>
                <button class="btn btn-success" id="submitButton" type="button">Soumettre</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            const totalQuestions = <?php echo count($questions); ?>;
            let currentQuestion = 0;
            let correctAnswers = 0;

            showQuestion(currentQuestion); // Affiche la première question par défaut

            $('#nextButton').click(function() {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    showQuestion(currentQuestion);
                }
            });

            $('#prevButton').click(function() {
                if (currentQuestion > 0) {
                    currentQuestion--;
                    showQuestion(currentQuestion);
                }
            });

            $('#submitButton').click(function() {
                $('#quizForm').hide(); // Cache le formulaire
                $('.next-prev').hide(); // Cache les boutons de navigation
                calculateScore(); // Calcule le score
            });

            $('#restart').click(function() {
                resetQuiz(); // Réinitialise le quiz
            });

            $('#chooseAnother').click(function() {
                window.location.href = 'index.html#services'; // Redirige vers la page de choix de quiz
            });

            function showQuestion(questionIndex) {
                $('.quiz-question').hide();
                $('.quiz-question').eq(questionIndex).show();
            }

            function calculateScore() {
                let score = 0;

                $('.quiz-question').each(function(index) {
                    const correctAnswer = $(this).find('.correct-answer').text();
                    const selectedAnswer = $(this).find('input[type="radio"]:checked').val();

                    if (selectedAnswer === correctAnswer) {
                        score++;
                    }
                });

                const scorePercentage = (score / totalQuestions) * 100;
                $('#userScore').text(scorePercentage.toFixed(2) + '%');
                $('#resultContainer').show(); // Affiche le conteneur des résultats
            }

            function resetQuiz() {
                $('.quiz-question').hide(); // Cache toutes les questions
                currentQuestion = 0; // Réinitialise l'index de la question actuelle
                correctAnswers = 0; // Réinitialise le nombre de bonnes réponses
                $('#quizForm')[0].reset(); // Réinitialise le formulaire
                $('.next-prev').show(); // Affiche les boutons de navigation
                $('#resultContainer').hide(); // Cache le conteneur de résultats
                showQuestion(currentQuestion); // Affiche la première question
            }
        });
    </script>

</body>

</html>
