<?php require 'app/views/templates/headerPublic.php'; ?>

<style>
    .gradient-bg {
        background: linear-gradient(135deg, #2d0a4b, #4b1d74);
    }
</style>

<div class="gradient-bg min-vh-100 d-flex justify-content-center align-items-center text-center text-light">
    <div class="p-5 bg-dark bg-opacity-75 rounded-4 shadow-lg" style="max-width: 600px; width: 100%;">
        <h1 class="lead fst-italic display-4 fw-bold mb-3 text-white">MoviePanel</h1>
        <p class="lead fst-italic text-light mb-4">Discover your next movie obsession</p>
        <form method="get" action="/movie/index" class="d-flex justify-content-center">
            <input 
                type="text" 
                name="title" 
                class="form-control form-control-lg rounded-pill w-75 me-2 border-0 shadow-sm" 
                placeholder="Enter movie title..." 
                required
            >
            <button 
                type="submit" 
                class="btn btn-light btn-lg rounded-pill px-4"
            >
                <i class="bi bi-search"></i> Search
            </button>
        </form>
    </div>
</div>

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
