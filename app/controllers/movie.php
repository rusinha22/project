<?php
class Movie extends Controller {

        public function index() {
            $title = $_GET['title'] ?? '';

            if (!empty($title)) {
                // Search for the movie using the OMDB API
                $api = $this->model('Api');
                $movie = $api->searchMovie($title);
            
            }
           // Generate a review for the movie
            $review = $api->generateReview($movie['Title']);
            
           // Display the movie details and review
            $this->view('movie/results', [
                'movie' => $movie,
                'review' => $review
            ]);

        }
}