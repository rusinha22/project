<pre><?php var_dump(get_defined_vars()); ?></pre>
<?php require 'app/views/templates/headerPublic.php'; ?>

<!-- Modern background -->
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #2d0a4b, #4b1d74);">
    <main class="container py-5 text-light">
        <div class="mx-auto" style="max-width: 700px;">
            <div class="p-4 rounded-4 shadow-lg bg-dark bg-opacity-75">
                <h2 class="fw-bold mb-4">AI Review for 
                    <span class="text-warning">
                        <?= isset($title) ? htmlspecialchars($title) : 'Unknown Movie' ?>
                    </span>
                </h2>

                <div class="alert bg-light text-dark rounded-3 px-4 py-3 border-0 shadow-sm mb-4">
                    <?= isset($review) ? nl2br(htmlspecialchars($review)) : 'No review available.' ?>
                </div>

                <a href="/movie/index" class="btn btn-warning btn-lg rounded-pill px-4 shadow-sm">
                    Search Another Movie
                </a>
            </div>
        </div>
    </main>
</div>

<?php require 'app/views/templates/footer.php'; ?>
