const yearSpan = document.querySelector('[data-current-year]');
if (yearSpan) {
  yearSpan.textContent = new Date().getFullYear();
}
