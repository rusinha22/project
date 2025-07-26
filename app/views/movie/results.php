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
    .star-rating {
        direction: rtl;
        display: inline-flex;
        justify-content: start;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        font-size: 2rem;
        color: #444;
        cursor: pointer;
        transition: color 0.2s;
        padding: 0 5px;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffc107; /* yellow on hover */
    }

    .star-rating input[type="radio"]:checked ~ label {
        color: #ffc107; /* yellow on selected */
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
            <h4 class="mt-4">Rate This Movie</h4>

            <?php if (isset($rated) && $rated): ?>
                <div class="alert alert-success mt-3">
                    ⭐ Thank you for rating! We appreciate your feedback.
                </div>
            <?php endif; ?>

            <form action="/movie/rate" method="post" class="mt-3">
                <input type="hidden" name="movie_title" value="<?= htmlspecialchars($movie['Title']) ?>">
                <div class="star-rating">
                    <?php for ($i = 5; $i >= 1; $i--): ?>
                        <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>" required>
                        <label for="star<?= $i ?>">&#9733;</label>
                    <?php endfor; ?>
                </div>
                <button type="submit" class="btn btn-outline-danger mt-3">Submit Rating</button>
            </form>


            
            <div class="text-center mt-4">
                <a href="/movie/index" class="back-btn">← Search another movie</a>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php require 'app/views/templates/footer.php'; ?>
