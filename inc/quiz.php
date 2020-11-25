<?php
ini_set('memory_limit', '1024M');
// Start the session
session_start();
// Include questions from the questions.php file
include ('inc/questions.php');


// Make a variable to hold the current question. Assign null to it.
//$currentQuestion = NULL;

// Make a variable to determine if the score will be shown or not. Set it to false.
$show_score = false;

$index = array_rand($questions); //randomizes the questions array

// Make a variable to hold the total number of questions to ask
$totalQuestions = count($questions);

// Make a variable to hold the toast message
$toast = NULL;

// If the server request was of type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user's answer was equal to the correct answer.
    if ($_POST['answer'] == $questions[$_POST['index']]['correctAnswer']) {
        // If it was correct:
        // 1. Assign a congratulatory string to the toast variable
        $toast = "That's Correct!";
        //Increment the session variable that holds the total number correct by one.
        $_SESSION['totalCorrect']++;
    } else {
        // 1. Assign a bummer message to the toast variable.
        $toast = "Bummer! That was incorrect!";
    }

}
//checks to see if the $_SESSION is not set and if not set sets it to an empty array
if (!isset($_SESSION['used_indexes'])) {
    $_SESSION['used_indexes'] = [];
    $_SESSION['totalCorrect'] = 0;
}

if (count($_SESSION['used_indexes']) == $totalQuestions) {
    $_SESSION['used_indexes'] = [];
    $show_score = true;
} else {
    $show_score = false;
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION['totalCorrect'] = 0;
        $toast = '';
    }
    do {
        
    }
    $index = array_rand($questions);
    $question = $questions[$index];
    array_push($_SESSION['used_indexes'],$index);
    $answers = [];
    $answers[] = $question['correctAnswer'];
    $answers[] = $question['firstIncorrectAnswer'];
    $answers[] = $question['secondIncorrectAnswer'];
    shuffle($answers);
}

//session_destroy();

