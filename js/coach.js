const addTrainingBtn = document.querySelector('.button-add-training')
const addMatchBtn = document.querySelector('.button-add-match');
const addAnnouncementBtn = document.querySelector('.dashboard-menu__messages-add');
const addMatchResultBtn = document.querySelectorAll('.button-add-match-result');

const addMatchPopup = document.querySelector('.add-match-popup');
const addTrainingPopup = document.querySelector('.add-training-popup');
const addAnnouncementPopup = document.querySelector('.add-announcement-popup');
const addMatchResultPopup = document.querySelector('.add-match-result-popup');


const popupExit = document.querySelectorAll('.coach-popup__exit');

const openTrainingPopup = () => {
  addTrainingPopup.classList.toggle('coach-popup--active');
}

const openMatchPopup = () => {
  addMatchPopup.classList.toggle('coach-popup--active');
}

const openAnnouncementPopup = () => {
  addAnnouncementPopup.classList.toggle('coach-popup--active');
}

const openMatchResultPopup = (e) => {
  addMatchResultPopup.classList.toggle('coach-popup--active');
  const currentMatch = e.target.closest('.data-box__data-row');
  const currentMatchId = currentMatch.querySelector('.match_id');
  const currentMatchRival = currentMatch.querySelector('.rival');

  const matchIdInput = addMatchResultPopup.querySelector('#match_id');
  const matchRivalInput = addMatchResultPopup.querySelector('#rival');
  matchIdInput.value = Number(currentMatchId.textContent);
  matchRivalInput.value = currentMatchRival.textContent;
}

const closePopup = (e) => {
  const currentPopup = e.target.closest('.coach-popup');
  currentPopup.classList.remove('coach-popup--active');
}
popupExit.forEach((exit) => {
  exit.addEventListener('click', closePopup);
});

addTrainingBtn.addEventListener('click', openTrainingPopup);
addMatchBtn.addEventListener('click', openMatchPopup);
addAnnouncementBtn.addEventListener('click', openAnnouncementPopup);

addMatchResultBtn.forEach((btn) => {
  btn.addEventListener('click', openMatchResultPopup);
})

