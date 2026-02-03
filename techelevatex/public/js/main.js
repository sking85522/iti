document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".site-header");
  if (!nav) {
    return;
  }
  const toggle = () => {
    nav.classList.toggle("scrolled", window.scrollY > 20);
  };
  toggle();
  window.addEventListener("scroll", toggle);
});
