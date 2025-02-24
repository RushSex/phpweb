document.addEventListener('DOMContentLoaded', () => {
  const pagination = document.getElementById('pagination');

  if (!pagination) return; // Проверяем, существует ли элемент

  let isDragging = false;
  let startX, scrollLeft;

  pagination.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.pageX - pagination.offsetLeft;
    scrollLeft = pagination.scrollLeft;
    pagination.style.cursor = 'grabbing';
  });

  document.addEventListener('mouseup', () => { 
    isDragging = false;
    pagination.style.cursor = 'grab';
  });

  document.addEventListener('mouseleave', () => { 
    isDragging = false;
  });

  pagination.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - pagination.offsetLeft;
    const walk = (x - startX) * 2; 
    pagination.scrollLeft = scrollLeft - walk;
  });

  pagination.addEventListener('selectstart', (e) => {
    e.preventDefault();
  });

  // Прокрутка к активному элементу после загрузки страницы
  setTimeout(() => {
    const activeItem = document.getElementById('active-item');
    if (activeItem) {
      activeItem.scrollIntoView({
        behavior: 'smooth',
        block: 'nearest',
        inline: 'center'
      });
    }
  }, 100);
});
