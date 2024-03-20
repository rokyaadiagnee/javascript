<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['answers'])) {
        $answers = $_POST['answers'];

        header("Location: correction_questions.php?answers=" . urlencode(json_encode($answers)));
        exit();
    } else {
        header("Location: error.php");
        exit();
    }
} else {
    header("Location: error.php");
    exit();
}
?>