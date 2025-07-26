<?php
class Movie extends Controller {

    public function index() {
        $title = $_GET['title'] ?? '';

        $movie = null;
        $review = null;
        $error = null;
        $rated = isset($_GET['success']) && $_GET['success'] == 1;

        if (!empty($title)) {
            $api = $this->model('Api');
            $movie = $api->searchMovie($title);

            if ($movie && isset($movie['Response']) && $movie['Response'] === 'True') {
                $review = $api->generateReviews($movie['Title']);
                $this->view('movie/results', [
                    'movie' => $movie,
                    'review' => $review,
                    'error' => $error,
                    'rated' => $rated
                ]);
                return;
            } else {
                $error = 'No movie found or invalid response.';
            }
        }

        // If no title or if movie not found, just show search page
        $this->view('movie/index', [
            'error' => $error
        ]);
    }

    public function rate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['movie_title'] ?? '';
            $rating = $_POST['rating'] ?? null;

            if ($title && $rating) {
                try {
                    require_once 'app/core/config.php'; // make sure config is included
                    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $pdo->prepare("INSERT INTO rating_form (title, rating) VALUES (:title, :rating)");
                    $stmt->execute([
                        ':title' => $title,
                        ':rating' => $rating
                    ]);

                    header("Location: /movie/index?title=" . urlencode($title) . "&success=1");
                    exit;
                } catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                }
            } else {
                echo "Invalid rating data.";
            }
        }
    }

        }
    

