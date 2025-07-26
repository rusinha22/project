<?php require 'app/views/templates/headerPublic.php'; ?>

<style>
    body {
        background-color: #141414;
        color: #ffffff;
    }

    .movie-box {
        background-color: #000;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 0 25px rgba(255, 0, 0, 0.1);
    }

    .movie-poster {
        border-radius: 15px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.5);
    }

    .alert-info {
        background-color: #222;
        color: #fff;
        border-left: 5px solid #e50914;
    }

    .back-btn {
        color: #e50914;
        text-decoration: none;
    }

    .back-btn:hover {
        text-decoration: underline;
    }
</style>

<main class="container py-5">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($movie): ?>
        <div class="movie-box mx-auto" style="max-width: 900px;">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= htmlspecialchars($movie['Poster']) ?>" alt="Poster" class="img-fluid movie-poster">
                </div>
                <div class="col-md-8">
                    <h2><?= htmlspecialchars($movie['Title']) ?> <small class="text-muted">(<?= htmlspecialchars($movie['Year']) ?>)</small></h2>
                    <p><strong>Genre:</strong> <?= htmlspecialchars($movie['Genre']) ?></p>
                    <p><strong>Plot:</strong> <?= htmlspecialchars($movie['Plot']) ?></p>
                    <h4 class="mt-4">AI Review</h4>
                    <div class="alert alert-info"><?= nl2br(htmlspecialchars($review)) ?></div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="/movie/index" class="back-btn">← Search another movie</a>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php require 'app/views/templates/footer.php'; ?>
