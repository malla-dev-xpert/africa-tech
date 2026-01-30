document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.getElementById("menu-btn");
  const closeBtn = document.getElementById("close-btn");
  const mobileMenu = document.getElementById("mobile-menu");

  if (menuBtn && closeBtn && mobileMenu) {
    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.remove("translate-x-full");
      document.body.style.overflow = "hidden"; // Bloque le scroll arrière
    });

    closeBtn.addEventListener("click", () => {
      mobileMenu.classList.add("translate-x-full");
      document.body.style.overflow = ""; // Libère le scroll
    });
  }
});
