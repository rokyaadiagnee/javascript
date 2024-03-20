<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'joueur') {
    header("Location: login.php");
    exit();
}

include 'config.php';

$questions = getVisibleQuestions($connexion);

if (empty($questions)) {
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de questions</title>
    <script>
        var questions = <?php echo json_encode($questions); ?>;
        var questionIndex = 0;

        function displayQuestion() {
            var question = questions[questionIndex];
            var questionContainer = document.getElementById('question-container');
            questionContainer.innerHTML = `
                <div>
                    <h2>Question ${questionIndex + 1}</h2>
                    <p>${question.question}</p>
                    <form id="question-form">
                        <input type="radio" name="answer" value="option1"> ${question.option1}<br>
                        <input type="radio" name="answer" value="option2"> ${question.option2}<br>
                        <input type="radio" name="answer" value="option3"> ${question.option3}<br>
                        <input type="radio" name="answer" value="option4"> ${question.option4}<br>
                        <button type="submit">Répondre</button>
                    </form>
                </div>
            `;

            var form = document.getElementById('question-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(form);
                var answer = formData.get('answer');

                saveAnswer(question.id, answer);
                questionIndex++;
                if (questionIndex < questions.length) {
                    displayQuestion();
                } else {
                    submitAnswers();
                }
            });
        }

        function saveAnswer(questionId, answer) {
            console.log("Question ID:", questionId);
            console.log("Réponse sélectionnée:", answer);
        }

        function submitAnswers() {
            var form = document.createElement('form');
            form.style.display = 'none';
            form.method = 'POST';
            form.action = 'save_answer.php';

            questions.forEach(function(question, index) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'answers[' + question.id + ']';
                input.value = question.answer; 
                form.appendChild(input);
            });

            var sessionQuizzIdInput = document.createElement('input');
            sessionQuizzIdInput.type = 'hidden';
            sessionQuizzIdInput.name = 'session_quizz_id';
            sessionQuizzIdInput.value = <?php echo $_SESSION['id_session_quizz']; ?>;
            form.appendChild(sessionQuizzIdInput);

            document.body.appendChild(form);
            form.submit();
        }

        window.onload = function() {
            displayQuestion();
        };
    </script>
</head>
<body>
    <div id="question-container"></div>
</body>
</html>