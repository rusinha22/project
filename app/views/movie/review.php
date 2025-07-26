<?php require 'app/views/templates/headerPublic.php'; ?>

<style>
    body {
        background-color: #141414;
        color: #fff;
    }

    .review-panel {
        background-color: #000;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 0 30px rgba(255, 0, 0, 0.15);
    }

    .alert-info {
        background-color: #1f1f1f;
        border-left: 4px solid #e50914;
        color: #fff;
    }
</style>

<main class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="review-panel text-center w-100" style="max-width: 720px;">
        <h2 class="mb-4">🎬 AI Review</h2>
        <div class="alert alert-info fs-5">
            <?= nl2br(htmlspecialchars($review ?? "No review available.")) ?>
        </div>
        <a href="/movie/index" class="btn btn-danger mt-4">Search Another</a>
    </div>
</main>

<?php require 'app/views/templates/footer.php'; ?>
