<?php require_once 'app/views/templates/headerPublic.php'; ?>

<style>
    body {
        background-color: #141414;
        color: #ffffff;
        font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
        background-color: #000;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 0 20px rgba(229, 9, 20, 0.15);
    }

    .form-control {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 50px;
        padding-left: 1rem;
    }

    .form-control::placeholder {
        color: #aaa;
    }

    .form-control:focus {
        background-color: #444;
        box-shadow: 0 0 8px #e50914;
    }

    .btn-login {
        background-color: #e50914;
        color: #fff;
        border-radius: 50px;
        font-weight: 600;
        border: none;
    }

    .btn-login:hover {
        background-color: #f40612;
    }

    a {
        color: #e50914;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<main class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-card" style="max-width: 420px; width: 100%;">
        <h2 class="text-center mb-4">Sign In to <span style="color:#e50914;">MoviePanel</span></h2>

        <form action="/login/verify" method="post">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login w-100 py-2">Login</button>
        </form>

        <?php if (isset($_SESSION['failedAuth']) && $_SESSION['failedAuth'] > 0): ?>
            <div class="alert alert-danger mt-3 text-center">
                Login failed. Attempt <?= $_SESSION['failedAuth'] ?>
            </div>
        <?php endif; ?>

        <p class="text-center mt-4 mb-0">
            New here? <a href="/create">Create an account</a>
        </p>
    </div>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>
