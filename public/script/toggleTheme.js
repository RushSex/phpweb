const themeToggle = document.getElementById('theme-toggle');
const savedTheme = localStorage.getItem('theme');
const body = document.body;

if (savedTheme === 'dark') {
    body.classList.remove('light-mode');
    body.classList.add('dark-mode');
    themeToggle.checked = true;
}
function toggleTheme() {
  if (body.classList.contains('light-mode')) {
    body.classList.remove('light-mode');
    body.classList.add('dark-mode');
    localStorage.setItem('theme', 'dark'); 
  } else {
    body.classList.remove('dark-mode');
    body.classList.add('light-mode');
    localStorage.setItem('theme', 'light'); 
  }
}

themeToggle.addEventListener('click', toggleTheme);