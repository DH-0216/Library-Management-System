//! sidebar 

function openNav() {
  document.getElementById("side-bar").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("side-bar").style.width = "0px";
  document.getElementById("main").style.marginLeft = "0px";
}




//! Share button popup

const sharebtns = document.querySelectorAll(".share-btn");

sharebtns.forEach((btn) => {
  btn.addEventListener("click", (event) => {
    const popup = btn.closest(".card-footer").querySelector(".popup");

    btn.classList.toggle("active");
    popup.classList.toggle("active");

    event.stopPropagation();
  });
});

document.addEventListener("click", (event) => {
  const popups = document.querySelectorAll(".popup");

  popups.forEach((popup) => {
    if (popup.classList.contains("active") && !popup.contains(event.target)) {
      popup.classList.remove("active");

      const shareBtn = popup
        .closest(".card-footer")
        .querySelector(".share-btn");
      shareBtn.classList.remove("active");
    }
  });
});

//! Add Favorite

const icons = document.querySelectorAll(".like-btn");

icons.forEach((icon) => {
  icon.addEventListener("click", function () {
    if (this.getAttribute("name") === "bookmark-outline") {
      this.setAttribute("name", "bookmark");
      this.classList.add("bounce-in");
    } else {
      this.setAttribute("name", "bookmark-outline");
      this.classList.remove("bounce-in");
    }
  });
});


// set cookie values (this function use to read and display cookies we previously set in user_login.php)
