<?php include 'inc/quiz.php'; // includes the quiz page
//var_dump($questions) checks to see if the files are linked
//var_dump($_POST["answer"]);
//var_dump($_POST["index"]);
//var_dump($_SESSION); checks that the session was started successfully
var_dump($_SESSION['used_indexes']); //checks to see if the index is being added to the array
//var_dump($_SESSION['totalCorrect']); //checks to see if the correct number gets stored
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <?php
            if (!empty($toast)) {?>
                <p><?php echo $toast;?></p>
            <?php } ?>

            <?php if ($show_score == false){?>
            <p class="breadcrumbs">Question <?php echo count($_SESSION['used_indexes']); ?> of <?php echo $totalQuestions; ?></p>
            <p class="quiz">What is <?php echo $question['leftAdder'];?> + <?php echo $question['rightAdder'];?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="index" value=<?php echo $index; ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $answers[0]; ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $answers[1]; ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $answers[2]; ?> />
            </form>
            <?php } ?>
            <?php if ($show_score == true){?>
                <p><?php echo "You got " . $_SESSION['totalCorrect'] . " of " . $totalQuestions;?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>