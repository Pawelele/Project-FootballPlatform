const loginPlayerButton = document.querySelector('.login-box--player');
const loginParentButton = document.querySelector('.login-box--parents');
const loginCoachButton = document.querySelector('.login-box--coach');

const loginPlayerPopup = document.querySelector('.login-popup--player');
const loginParentPopup = document.querySelector('.login-popup--parent');
const loginCoachPopup = document.querySelector('.login-popup--coach');
const loginErrorPopup = document.querySelector('.login-popup__error');

const popupExit = document.querySelectorAll('.login-popup__exit');

const openPlayerPopup = () => {
  loginPlayerPopup.classList.toggle('login-popup--active');
}

const openParentPopup = () => {
  loginParentPopup.classList.toggle('login-popup--active');
}

const openCoachPopup = () => {
  loginCoachPopup.classList.toggle('login-popup--active');
}

const openLoginErrorPopup = () => {
  loginErrorPopup.classList.toggle('login-popup--active');
}

const closePopup = (e) => {
  const currentPopup = e.target.closest('.login-popup');
  currentPopup.classList.remove('login-popup--active');
}


popupExit.forEach((exit) => {
  exit.addEventListener('click', closePopup);
});


loginPlayerButton.addEventListener('click', openPlayerPopup);
loginParentButton.addEventListener('click', openParentPopup);
loginCoachButton.addEventListener('click', openCoachPopup);

// check for query params in url
const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});
let value = params.status;
if(value == 'error') {
  openLoginErrorPopup();
  window.history.replaceState({}, document.title, "/football");
}