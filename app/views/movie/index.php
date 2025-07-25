<?php require 'app/views/templates/headerPublic.php'; ?>

        <form method="get" action="/movie/index" class="d-flex justify-content-center">
            <input 
                type="text" 
                name="title" 
                class="form-control form-control-lg w-75 rounded-pill px-4 me-2 border-0 shadow-sm" 
                placeholder="Enter movie title..." 
                required
            >
            <button 
                type="submit" 
                class="btn btn-light btn-lg rounded-pill px-4 shadow-sm"
                style="white-space: nowrap;"
            >
                <i class="bi bi-search"></i> Search
            </button>
        </form>
    </div>
</main>

<?php if (isset($_GET['logout'])): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast show align-items-center text-bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    You have been logged out successfully.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require 'app/views/templates/footer.php'; ?>
