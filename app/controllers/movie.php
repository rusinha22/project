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
}
