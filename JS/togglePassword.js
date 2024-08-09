const eyeIcons = document.querySelectorAll(".eyeicon");

eyeIcons.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    const passwordInput = eyeIcon
      .closest(".inputbox")
      .querySelector('input[type = "password"],input[type="text"]');

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.setAttribute("name", "eye-outline");
    } else {
      passwordInput.type = "password";
      eyeIcon.setAttribute("name", "eye-off-outline");
    }
  });
});
