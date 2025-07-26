<?php require_once 'app/views/templates/headerPublic.php'; ?>

<style>
    body {
        background-color: #141414;
        color: #ffffff;
        font-family: 'Segoe UI', sans-serif;
    }

    .register-card {
        background-color: #000;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 0 25px rgba(229, 9, 20, 0.15);
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
        box-shadow: 0 0 10px #e50914;
    }

    .btn-register {
        background-color: #e50914;
        color: #fff;
        font-weight: 600;
        border-radius: 50px;
        border: none;
    }

    .btn-register:hover {
        background-color: #f40612;
    }

    .logo-text {
        color: #e50914;
        font-weight: bold;
        font-size: 1.75rem;
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
    <div class="register-card" style="max-width: 420px; width: 100%;">
        <h2 class="text-center mb-4">Create Your <span class="logo-text">MoviePanel</span> Account</h2>

        <!-- Optional Flash Message -->
        <?php if (isset($_SESSION['register_error'])): ?>
            <div class="alert alert-danger text-center">
                <?= $_SESSION['register_error'] ?>
            </div>
            <?php unset($_SESSION['register_error']); ?>
        <?php endif; ?>

        <form method="POST" action="/create/register">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="btn btn-register w-100 py-2">Register</button>
        </form>

        <p class="text-center mt-4 mb-0">
            Already have an account?
            <a href="/login">Back to Login</a>
        </p>
    </div>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>
