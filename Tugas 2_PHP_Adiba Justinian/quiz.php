<?php
    require_once 'qna.php';
    if (isset($_POST['jawaban'])) {
        $_SESSION['jawaban'][$_GET['no']] = $_POST['jawaban'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h2>QUIZ AJA DULU</h2>
        <a class="navbar" href="index.php">Back to home</a>
    </div>
    <br><br><br>
    
    <div class="main">
        <div class="question">
            <h3> <?= $quiz[$_GET['no']]['q'] ?> </h3>
            <div class="answer">
                <form action="" method="POST">
                    <?php foreach ($quiz[$_GET['no']]['o'] as $o) : ?>
                        <input 
                        <?php if(isset($_SESSION['jawaban'][$_GET['no']]) && $_SESSION['jawaban'][$_GET['no']] == $o) : ?>
                            checked
                        <?php endif ?>
                        onchange="this.form.submit()" type="radio" name="jawaban" id="" value='<?= $o ?>'> <?= $o ?> <br>
                    <?php endforeach ?>
                </form>
            </div>
        </div>
        <div class="move">
            <?php if ($_GET['no'] > 0) : ?>
            <a class="prev" href="quiz.php?no=<?= $_GET['no'] - 1 ?>">Previous</a>
            <?php endif ?>
        
            <?php if ($_GET['no'] < count($quiz) - 1) : ?>
                <a class="next" href="quiz.php?no=<?= $_GET['no'] + 1 ?>">Next</a>
            <?php endif ?>
        </div>
    </div>
    <br>
    
    <div class="nav">
        <div class="number">
            <?php for ($i=0; $i < count($quiz); $i++) : ?>
                <a class="navigation" href="quiz.php?no=<?= $i ?>"> <?= $i + 1 ?> </a>
            <?php endfor ?>
        </div>
        
        <div class="finish">
            <a class="submit" href="submit.php">Finish attempt</a>
        </div>
    </div> 
</body>
</html>