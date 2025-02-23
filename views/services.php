<?php 
$title = $data['title'] ?? 'PHP WEB DEVELOPER';
include __DIR__ . '/partials/header.php'; 
?>

<section class="swap-section">
      <div class="pagination" id="pagination">
        <div class="pagination-hidden"></div>

        <?php foreach ($allTitles as $index => $title): ?>
            <?php $pageNumber = $index + 1; // Номер страницы начинается с 1 ?>
            <a href="/services?page=<?= $pageNumber ?>" 
            class="pagination-item <?= $pageNumber === $currentPage ?'active' : '' ?>"
            <?= $pageNumber === $currentPage ?'id="active-item"' : '' ?>>
                <?= htmlspecialchars($title['title']) ?>
            </a>
        <?php endforeach; ?>
  
        <div class="pagination-hidden"></div>
 
      </div>
    
      <?php if ($nextPage): ?>
          <a class="arrow" href="/services?page=<?= $nextPage ?>">
            <div class="arrow-up-container">
              <div class="arrow-button"></div>
              <div class="arrow-text">Вперед</div>
            </div>
          </a>
      <?php endif; ?>

    
      <div class="swap-section__content">
        <div class="service-info">
          <?php if ($service): ?>
            <h3 class="service-info__title"><?= htmlspecialchars($service['title']) ?></h3>
            <p class="service-info__description"><?= htmlspecialchars($service['description']) ?></p>
            <p class="service-info__tools">Инструменты использования:</p>
            <ul class="service-info__tools-list">
            <?php foreach ($tools as $tool): ?>
                <li class="service-info__tools-list-item"><?= htmlspecialchars($tool['name']) ?></li>
            <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <h3 class="service-info__title">404</h3>
            <p class="service-info__description">404</p>
          <?php endif; ?>

          <div class="service-info__button">
            <a href="\contacts" class="button">Заказать</a>
          </div> 
        </div>
      </div>

        <?php if ($prevPage): ?>
          <a class="arrow" href="/services?page=<?= $prevPage ?>">
          <div class="arrow-down-container">
            <div class="arrow-down-text">Назад</div>
            <div class="arrow-down-button"></div>
          </div>
        </a>
      <?php endif; ?>

    </section>


<?php include __DIR__ . '/partials/footer.php'; ?>