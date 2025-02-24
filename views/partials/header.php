<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'PHP WEB DEVELOPER' ?></title>
  <link rel="stylesheet" href="/public/style/main.css">
  </head>
<body class="light-mode">
  <div class="wraaper">
    <header class="header">
      <div class="header__container">
        <div class="burger-menu">
          <input type="checkbox" id="menu-toggle" class="burger-menu__toggle" aria-label="Открыть меню">
          <label class="burger-menu__icon" for="menu-toggle"></label>
          <nav class="burger-menu__content">
            <ul class="burger-menu__list">
              <li class="burger-menu__item"><a href="/" class="burger-menu__link <?= ($currentPath ?? 'home') === 'home' ? 'burger-menu__link--active' : '' ?>">Главная</a></li>
              <li class="burger-menu__item"><a href="/services" class="burger-menu__link <?= ($currentPath ?? 'services') === 'services' ? 'header__link--active' : '' ?>">Услуги</a></li>
              <li class="burger-menu__item"><a href="/reviews" class="burger-menu__link <?= ($currentPath ?? 'reviews') === 'reviews' ? 'header__link--active' : '' ?>">Отзывы</a></li>
              <li class="burger-menu__item"><a href="/contacts" class="burger-menu__link <?= ($currentPath ?? 'contacts') === 'contacts' ? 'header__link--active' : '' ?>">Контакты</a></li>
            </ul>
          </nav>
        </div>
        <nav class="header__nav">
          <ul class="header__list">
            <li class="header__item"><a href="/"  class="header__link <?= ($currentPath ?? 'home') === 'home' ? 'header__link--active' : '' ?>">Главная</a></li>
            <li class="header__item"><a href="/services" class="header__link <?= ($currentPath ?? 'services') === 'services' ? 'header__link--active' : '' ?>">Услуги</a></li>
            <li class="header__item"><a href="/reviews"  class="header__link <?= ($currentPath ?? 'reviews') === 'reviews' ? 'header__link--active' : '' ?>">Отзывы</a></li>
            <li class="header__item"><a href="/contacts" class="header__link <?= ($currentPath ?? 'contacts') === 'contacts' ? 'header__link--active' : '' ?>">Контакты</a></li>
          </ul>
        </nav>
        <label class="switch-toggle">
          <input type="checkbox" id="theme-toggle"/>
          <span class="switch-toggle__slider switch-toggle__slider--round">
            <div class="switch-toggle__slider--background"></div>
          </span>
        </label>
      </div>
    </header>
