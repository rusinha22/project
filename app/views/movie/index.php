<?php require 'app/views/templates/headerPublic.php'; ?>

<style>
    body {
        background-color: #141414;
        color: #ffffff;
        font-family: 'Segoe UI', sans-serif;
    }

    .hero-box {
        background-color: #000;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 0 25px rgba(229, 9, 20, 0.15);
    }

    .movie-title {
        color: #e50914;
        font-size: 2.75rem;
        font-weight: bold;
    }

    .subtitle {
        color: #cccccc;
        font-size: 1.25rem;
    }

    .form-control {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 30px;
        padding-left: 1rem;
    }

    .form-control::placeholder {
        color: #aaa;
    }

    .form-control:focus {
        background-color: #444;
        box-shadow: 0 0 10px #e50914;
    }

    .btn-search {
        background-color: #e50914;
        color: #fff;
        font-weight: 600;
        border-radius: 30px;
        border: none;
    }

    .btn-search:hover {
        background-color: #f40612;
    }

    .auth-links {
        margin-top: 1.5rem;
    }

    .auth-links a {
        color: #fff;
        background-color: #e50914;
        padding: 0.5rem 1.25rem;
        border-radius: 25px;
        margin: 0 0.5rem;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
    }

    .auth-links a:hover {
        background-color: #f40612;
    }
</style>

<div class="min-vh-100 d-flex justify-content-center align-items-center text-center px-3">
    <div class="hero-box w-100" style="max-width: 600px;">
        <h1 class="movie-title mb-3">MoviePanel</h1>
        <p class="subtitle mb-4">Discover your next movie obsession</p>

        <form method="get" action="/movie/index" class="d-flex justify-content-center mb-4">
            <input 
                type="text" 
                name="title" 
                class="form-control form-control-lg w-75 me-2 shadow-sm" 
                placeholder="Search for a movie..." 
                required
            >
            <button type="submit" class="btn btn-search btn-lg px-4 bg-red">
                <i class="bi bi-search"></i> Search
            </button>
        </form>

        <div class="auth-links">
            <a href="/login">Login</a>
            <a href="/create">Create Account</a>
        </div>
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
