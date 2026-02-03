document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.getElementById("menu-btn");
  const closeBtn = document.getElementById("close-btn");
  const mobileMenu = document.getElementById("mobile-menu");

  if (menuBtn && closeBtn && mobileMenu) {
    // Store initial scroll position to restore it when closing menu
    let scrollPosition = 0;

    // Open mobile menu
    menuBtn.addEventListener("click", () => {
      // Save current scroll position
      scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
      
      // Show menu by removing translate-x-full class
      mobileMenu.classList.remove("translate-x-full");
      
      // Prevent body scroll when menu is open
      // Use both overflow and position to handle all mobile browsers
      document.body.style.overflow = "hidden";
      document.body.style.position = "fixed";
      document.body.style.top = `-${scrollPosition}px`;
      document.body.style.width = "100%";
    });

    // Close mobile menu
    const closeMenu = () => {
      // Hide menu by adding translate-x-full class
      mobileMenu.classList.add("translate-x-full");
      
      // Restore body scroll
      document.body.style.overflow = "";
      document.body.style.position = "";
      document.body.style.top = "";
      document.body.style.width = "";
      
      // Restore scroll position
      window.scrollTo(0, scrollPosition);
    };

    closeBtn.addEventListener("click", closeMenu);

    // Close menu when clicking on a link (UX improvement)
    const menuLinks = mobileMenu.querySelectorAll("a");
    menuLinks.forEach(link => {
      link.addEventListener("click", closeMenu);
    });
  }
});
