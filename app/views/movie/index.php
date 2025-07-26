<?php

require 'app/views/templates/headerPublic.php';
?>

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
        color: #fff !important;
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
            <button type="submit" class="btn btn-search btn-lg px-4">
                <i class="bi bi-search"></i> Search
            </button>
        </form>
    </div>
</div>

<?php require 'app/views/templates/footer.php'; ?>
