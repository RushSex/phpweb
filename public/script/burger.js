document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('menu-toggle'); 
  const menuContent = document.querySelector('.burger-menu__content'); 

  document.addEventListener('click', (event) => {
   
    if (
      !menuContent.contains(event.target) && 
      !event.target.matches('.burger-menu__icon') && 
      toggle.checked 
    ) {
      toggle.checked = false; 
    }
  });

  menuContent.addEventListener('click', (event) => {
    if (event.target.tagName === 'A') { 
      toggle.checked = false; 
    }
  });
});