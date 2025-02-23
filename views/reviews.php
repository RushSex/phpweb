<?php 
$title = $data['title'] ?? 'PHP WEB DEVELOPER';
include __DIR__ . '/partials/header.php'; 
?>

<section class="reviews">
      <div class="reviews__container container">
        <h2 class="reviews__title">Отзывы</h2>
        
        <ul class="reviews__list">
        <?php foreach ($reviews as $review): ?>
          <li class="reviews__item review visibel">
            <div class="review__site-icon">
              <img src="public/images/icon/profiru.svg" alt="Иконка сайта 1" class="review__icon">
            </div>
            <div class="review__header">
              <div class="review__author-info">
                <cite class="review__author"><?= htmlspecialchars($review['author']); ?></cite>
                <span class="review__date"><?= htmlspecialchars($review['date']); ?></span>
              </div>
            </div>
            <div class="review__work"><?= htmlspecialchars($review['service']); ?></div>
            <div class="review__content">
              <p class="review__text"> <?= htmlspecialchars($review['description']); ?></p>
            </div>
          </li>
            
          <?php endforeach; ?>
        </ul>
      </div>
    </section>

<?php include __DIR__ . '/partials/footer.php'; ?>