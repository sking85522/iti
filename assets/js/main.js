const year = new Date().getFullYear();
const yearEl = document.querySelector('[data-current-year]');
if (yearEl) {
    yearEl.textContent = year;
}
