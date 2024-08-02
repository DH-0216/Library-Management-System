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

let addfavourite = false;

function addFavourite() {
  const likeBtn = document.getElementById("like-btn");

  if (addfavourite) {
    likeBtn.setAttribute("name", "bookmark-outline");
  } else {
    likeBtn.setAttribute("name", "bookmark");
  }
  addfavourite = !addfavourite;
}

function addFavourite2() {
  const likeBtn = document.getElementById("like-btn2");

  if (addfavourite) {
    likeBtn.setAttribute("name", "bookmark-outline");
  } else {
    likeBtn.setAttribute("name", "bookmark");
  }
  addfavourite = !addfavourite;
}

function addFavourite3() {
  const likeBtn = document.getElementById("like-btn3");

  if (addfavourite) {
    likeBtn.setAttribute("name", "bookmark-outline");
  } else {
    likeBtn.setAttribute("name", "bookmark");
  }
  addfavourite = !addfavourite;
}

function addFavourite4() {
  const likeBtn = document.getElementById("like-btn4");

  if (addfavourite) {
    likeBtn.setAttribute("name", "bookmark-outline");
  } else {
    likeBtn.setAttribute("name", "bookmark");
  }
  addfavourite = !addfavourite;
}
