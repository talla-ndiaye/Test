document.addEventListener('DOMContentLoaded', function() {
    const quizForm = document.getElementById('quizForm');
    const submitButton = document.getElementById('submit');
    const resultsContainer = document.getElementById('results');

    submitButton.addEventListener('click', () => {
        const formData = new FormData(quizForm);
        let score = 0;

        // Convert FormData en un objet utilisable
        const answers = {};
        formData.forEach((value, key) => {
            answers[key] = value;
        });

        // Liste des réponses correctes
        const correctAnswers = <?php echo json_encode(array_column($questions, 'correct', 'id')); ?>;

        // Comparaison des réponses
        for (let key in correctAnswers) {
            if (correctAnswers.hasOwnProperty(key)) {
                const questionIndex = 'question' + key;
                if (answers[questionIndex] === correctAnswers[key]) {
                    score++;
                }
            }
        }

        // Affichage des résultats
        resultsContainer.innerHTML = `<h2>Vous avez répondu correctement à ${score} sur ${Object.keys(correctAnswers).length} questions.</h2>`;
    });
});
