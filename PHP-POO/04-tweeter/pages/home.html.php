<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="icon" type="image/png" href="./pages/no-twitter.png" />
    <link rel="stylesheet" href="./pages/home.css">
</head>

<body>
    <header>
        <h1>Bienvenue sur Twitter</h1>
    </header>
    <div id="turbo-wrapper">
        <aside></aside>
        <main>
            <form method="post" class="form">
                <div class="form-group">
                    <input type="text" name="content" placeholder="A vos tweets!" class="form__input">
                    <label for="content" class="form__label">A vos tweets!!</label>
                </div>
                <button type="submit" class="btn"><i class="fab fa-twitter"></i> Tweet !</button>
            </form>

            <?php foreach ($tweets as $tweet) : ?>
                <div class="tweet">
                    <span><?= $tweet->getAuthor() ?> a écrit le <?= $tweet->getPublishedAt() ?></span>
                    <blockquote><?= $tweet->getContent() ?></blockquote>
                    <form action="like.php" method='POST'>
                        <span><?= $tweet->getLikes() ?></span>
                        <input type="hidden" name="tweet_id" value=<?= $tweet->getId() ?>>
                        <button type="submit"><i class="fas fa-thumbs-up"></i> Like</button>
                    </form>
                </div>

            <?php endforeach ?>
        </main>
        <aside></aside>
    </div>


</body>

</html>