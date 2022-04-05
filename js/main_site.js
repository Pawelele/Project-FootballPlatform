const loginPlayerButton = document.querySelector('.login-box--player');
const loginPlayerPopup = document.querySelector('.login-popup--player');
const loginPlayerExit = document.querySelector('.login-popup__exit--player');

const openPopup = () => {
  console.log("siema");
  loginPlayerPopup.classList.toggle('login-popup--active');
}

const closePopup = (e) => {
  const currentPopup = e.target.closest('.login-popup');
  currentPopup.classList.remove('login-popup--active');
}

loginPlayerButton.addEventListener('click', openPopup);
loginPlayerExit.addEventListener('click', closePopup);


