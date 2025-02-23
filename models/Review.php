<?php

class Review {
    public function getReviews() {
        require_once __DIR__ . '/../plagin/simplehtmldom/simple_html_dom.php';

        $html = file_get_contents('https://profi.ru/profile/PrimakAS5/#reviews-tab');

        if (!$html) {
            throw new Exception("Ошибка при получении содержимого страницы!");
        }

        $dom = new simple_html_dom();
        $dom->load($html);

        $reviews = [];
        foreach ($dom->find('div._1Llkozo') as $review) {
            $author = $review->find('.ui-text._2cila-e', 0);
            $date = $review->find('.ui-text._3-HtGpV', 0);
            $service = $review->find('.ui-text._3eH689t._38NyyC-._32776-7', 0);
            $description = $review->find('.ui-text._MUmGtQr', 0);

            $reviews[] = [
                'author' => $author ? $author->plaintext : 'Автор не найден',
                'date' => $date ? $date->plaintext : 'Дата не найдена',
                'service' => $service ? $service->plaintext : 'Услуга не указана',
                'description' => $description ? $description->plaintext : 'Контент не найден',
            ];
        }

        return $reviews;
    }
}


