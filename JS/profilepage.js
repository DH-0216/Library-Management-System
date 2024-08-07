document.addEventListener("DOMContentLoaded", () => {
  const menuLinks = document.querySelectorAll(".menu-link");
  const accountSection = document.querySelector(".generel-section");
  const passwordSection = document.querySelector(".password-section");
  const notificationSection = document.querySelector(".notiffication-section");

  menuLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const target = e.target.closest(".menu-link").textContent.trim();
      switchSections(target);
    });
  });

  function switchSections(target) {
    if (target === "Account") {
      accountSection.style.display = "block";
      passwordSection.style.display = "none";
      notificationSection.style.display = "none";
    } else if (target === "Password") {
      accountSection.style.display = "none";
      passwordSection.style.display = "block";
      notificationSection.style.display = "none";
    } else if (target === "Notifications") {
      accountSection.style.display = "none";
      passwordSection.style.display = "none";
      notificationSection.style.display = "block";
    }
  }
  switchSections("Account");
});


//! Logout Confirm

function confirmLogout() {
  return confirm("Are you sure want to log out?");
}
