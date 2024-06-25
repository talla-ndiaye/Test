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
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Quiz - Voir les Réponses</title>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .quiz-question {
            display: none;
            margin-bottom: 20px;
        }

        .quiz-question.active {
            display: block;
        }

        .correct {
            background-color: #a5d6a7; /* Vert pour les réponses correctes */
        }

        .incorrect {
            background-color: #ef9a9a; /* Rouge pour les réponses incorrectes */
        }

        #quiz-controls {
            margin-top: 20px;
        }

        #quiz-controls button {
            margin-right: 10px;
        }

        #results {
            margin-top: 20px;
        }

        #results .quiz-question {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <!-- Header -->
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
    <!-- End Header -->

    <!-- Quiz Container -->
    <div class="quiz-container">
        <form id="quizForm">
            <?php foreach ($questions as $index => $question): ?>
                <div class="quiz-question <?php if ($index === 0) echo 'active'; ?>" id="question<?php echo $index + 1; ?>">
                    <h2><?php echo $question['question']; ?></h2>
                    <label>
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="a">
                        <?php echo $question['a']; ?>
                    </label>
                    <label>
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="b">
                        <?php echo $question['b']; ?>
                    </label>
                    <label>
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="c">
                        <?php echo $question['c']; ?>
                    </label>
                    <label>
                        <input type="radio" name="question<?php echo $index + 1; ?>" value="d">
                        <?php echo $question['d']; ?>
                    </label>
                    <span class="correct-answer" style="display:none;"><?php echo $question['correct']; ?></span>
                </div>
            <?php endforeach; ?>
            <div id="quiz-controls">
                <button type="button" id="next">Suivant</button>
                <button type="button" id="submit" style="display: none;">Soumettre</button>
                <button type="button" id="restart" style="display: none;">Recommencer</button>
                <button type="button" id="choose-another" style="display: none;">Choisir un autre quiz</button>
                <button type="button" id="show-answers" style="display: none;">Voir les réponses</button>
            </div>
        </form>
        <div id="results"></div>
    </div>
    <!-- End Quiz Container -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Custom Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextButton = document.getElementById('next');
            const submitButton = document.getElementById('submit');
            const restartButton = document.getElementById('restart');
            const chooseAnotherButton = document.getElementById('choose-another');
            const showAnswersButton = document.getElementById('show-answers');
            const resultsContainer = document.getElementById('results');
            const questions = document.querySelectorAll('.quiz-question');

            let currentQuestionIndex = 0;
            const totalQuestions = <?php echo count($questions); ?>;

            // Show the first question
            showQuestion(currentQuestionIndex);

            function showQuestion(index) {
                questions.forEach((question, idx) => {
                    if (idx === index) {
                        question.classList.add('active');
                    } else {
                        question.classList.remove('active');
                    }
                });

                // Hide or show buttons based on the question index
                if (index === totalQuestions - 1) {
                    nextButton.style.display = 'none';
                    submitButton.style.display = 'block';
                    showAnswersButton.style.display = 'block'; // Show 'Show Answers' button on last question
                } else {
                    nextButton.style.display = 'block';
                    submitButton.style.display = 'none';
                    showAnswersButton.style.display = 'none';
                }
            }

            nextButton.addEventListener('click', () => {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            });

            submitButton.addEventListener('click', () => {
                const formData = new FormData(document.getElementById('quizForm'));
                let score = <?php echo count($questions); ?>;

                // Convert FormData to a usable object
                const answers = {};
                formData.forEach((value, key) => {
                    answers[key] = value;
                });

                // List of correct answers
                const correctAnswers = <?php echo json_encode(array_column($questions, 'correct', 'id')); ?>;

                // Compare answers and calculate score
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

                // Display results and correct answers
                resultsContainer.innerHTML = `<h2>Vous avez répondu correctement à ${score} sur ${Object.keys(correctAnswers).length} questions.</h2>`;
                resultsContainer.innerHTML += '<h3>Réponses correctes:</h3>';

                // Show all questions with correct answers
                questions.forEach((question, idx) => {
                    const questionIndex = idx + 1;
                    const correctAnswer = question.querySelector('.correct-answer').innerText.trim();
                    let correctAnswerText = '';

                    // Find the correct answer and display it
                    if (correctAnswer === 'a') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(1)').innerText;
                    } else if (correctAnswer === 'b') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(2)').innerText;
                    } else if (correctAnswer === 'c') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(3)').innerText;
                    } else if (correctAnswer === 'd') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(4)').innerText;
                    }

                    // Display the question and correct answer
                    resultsContainer.innerHTML += `<div class="quiz-question"><h3>${question.querySelector('h2').innerText}</h3><p>Réponse correcte: ${correctAnswerText}</p></div>`;
                });

                // Show the restart and choose another quiz buttons
                restartButton.style.display = 'block';
                chooseAnotherButton.style.display = 'block';

                // Hide navigation buttons
                nextButton.style.display = 'none';
                submitButton.style.display = 'none';
                showAnswersButton.style.display = 'none';
            });

            restartButton.addEventListener('click', () => {
                // Reload the page to restart the quiz
                location.reload();
            });

            chooseAnotherButton.addEventListener('click', () => {
                // Redirect to another page to choose another quiz
                window.location.href = 'choose_quiz.php'; // Replace 'choose_quiz.php' with your quiz selection URL
            });

            showAnswersButton.addEventListener('click', () => {
                // Show all questions with correct answers
                resultsContainer.innerHTML = '<h2>Réponses correctes:</h2>';
                questions.forEach((question, idx) => {
                    const questionIndex = idx + 1;
                    const correctAnswer = question.querySelector('.correct-answer').innerText.trim();
                    let correctAnswerText = '';

                    // Find the correct answer and display it
                    if (correctAnswer === 'a') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(1)').innerText;
                    } else if (correctAnswer === 'b') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(2)').innerText;
                    } else if (correctAnswer === 'c') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(3)').innerText;
                    } else if (correctAnswer === 'd') {
                        correctAnswerText = question.querySelector('.quiz-question label:nth-of-type(4)').innerText;
                    }

                    // Display the question and correct answer
                    resultsContainer.innerHTML += `<div class="quiz-question"><h3>${question.querySelector('h2').innerText}</h3><p>Réponse correcte: ${correctAnswerText}</p></div>`;
                });

                // Hide quiz controls and show 'Restart' and 'Choose another quiz' buttons
                document.getElementById('quiz-controls').style.display = 'none';
                restartButton.style.display = 'block';
                chooseAnotherButton.style.display = 'block';
            });
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
