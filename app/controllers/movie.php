<?php
class Movie extends Controller {

        public function index() {
            $title = $_GET['title'] ?? '';

            if (!empty($title)) {
                // Search for movie
                $api = $this->model('Api');
                $movie = $api->searchMovie($title);
            
            }
            // Generate dynamic AI Review using the movie's title
            $review = $api->generateReview($movie['Title']);

        }
}