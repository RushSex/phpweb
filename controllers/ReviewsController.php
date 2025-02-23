<?php
require_once __DIR__ . '/../models/Review.php';
class ReviewsController extends BaseController {

    public function index() {
        $model = new Review();
        $reviews = $model->getReviews();

        $this->render('reviews', [
            'title' => 'Отзывы клиентов',
            'currentPath' => 'reviews',
            'reviews' => $reviews
        ]);
    }
}