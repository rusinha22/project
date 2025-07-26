

<?php require 'app/views/templates/headerPublic.php'; ?>

<main class="container py-5">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger shadow-sm rounded-3">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php elseif ($movie): ?>
        <div class="row mb-5 align-items-start">
            <div class="col-md-4 mb-3 mb-md-0">
                <img src="<?= htmlspecialchars($movie['Poster']) ?>" alt="Movie Poster" class="img-fluid rounded-3 shadow-sm">
            </div>
            <div class="col-md-8">
                <h2 class="fw-bold mb-3">
                    <?= htmlspecialchars($movie['Title']) ?>
                    <small class="text-muted">(<?= htmlspecialchars($movie['Year']) ?>)</small>
                </h2>

                <p><strong>Genre:</strong> <?= htmlspecialchars($movie['Genre']) ?></p>
                <p><strong>Plot Summary:</strong> <?= htmlspecialchars($movie['Plot']) ?></p>

                <div class="mt-4">
                    <h4 class="mb-2">AI-Generated Review</h4>
                    <div class="alert alert-info bg-opacity-75 rounded-3 shadow-sm">
                        <?= nl2br(htmlspecialchars($review)) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php require 'app/views/templates/footer.php'; ?>
