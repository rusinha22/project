<?php
class Movie extends Controller {

    public function index() {
        $title = $_GET['title'] ?? '';

        $movie = null;
        $review = null;
        $error = null;

        if (!empty($title)) {
            $api = $this->model('Api');
            $movie = $api->searchMovie($title);

            if ($movie && isset($movie['Response']) && $movie['Response'] === 'True') {
                $review = $api->generateReviews($movie['Title']);
            } else {
                $error = 'No movie found or invalid response.';
            }
        } else {
            $this->view('movie/index');
        }

        

        $this->view('movie/results', [
            'movie' => $movie,
            'review' => $review,
            'error' => $error
        ]);
    }
    public function rate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['movie_title'] ?? '';
            $rating = $_POST['rating'] ?? null;

            if ($title && $rating) {
                // Save the rating in the database
                $model = $this->model('Rating'); // You’ll create this model next
                $model->save($title, $rating);

                header("Location: /movie/index?title=" . urlencode($title) . "&success=1");
                exit;
            } else {
                echo "Invalid rating data.";
            }
        }
    }

}
