const barsButton = document.querySelector('.dashboard-menu__bars');
const sideMenu = document.querySelector('.dashboard-menu');
const dashboardPanel = document.querySelector('.dashboard-panel');

const sleep = ms => new Promise(r => setTimeout(r, ms));

const openSideMenu = async () => {
  sideMenu.classList.toggle('dashboard-menu--active');
  await sleep(200);
  dashboardPanel.classList.toggle('dashboard-panel--activeMenu');
}

barsButton.addEventListener('click', openSideMenu);


// add trening
let treningi = document.querySelector(".data-box__data--practice");
let mecze = document.querySelector(".data-box__data--match");
let meczeRozegrane = document.querySelector(".data-box__data--played-match")
let strzelcy = document.querySelector(".data-box__data--shooter");
let ogloszenia = document.querySelector(".dashboard-menu__messages");




const addPractice = (adres, czas_trwania, data, godzina) => {
  let trening = document.createElement("div");
  trening.classList.add("data-box__data-row");

  let row_left = document.createElement("div");
  row_left.classList.add("data-box__data-row-left")
  row_left.innerHTML = `<p>${data}</p> <p>${godzina}</p>`;
  trening.append(row_left);

  let row_center = document.createElement("div");
  row_center.classList.add("data-box__data-row-center");
  row_center.innerHTML = `<p>${adres}</p>`;
  trening.append(row_center);


  let row_right = document.createElement("div");
  row_right.classList.add("data-box__data-row-right");
  row_right.innerHTML = `<p>${czas_trwania} min</p>`
  trening.append(row_right);

  treningi.append(trening);
}


const addMatch = (adres, przeciwnik, typ, data, godzina) => {
  let mecz = document.createElement("div");
  mecz.classList.add("data-box__data-row");

  let row_left = document.createElement("div");
  row_left.classList.add("data-box__data-row-left")
  row_left.innerHTML = `<p>${data}</p> <p>${godzina}</p>`;
  mecz.append(row_left);

  let row_center = document.createElement("div");
  row_center.classList.add("data-box__data-row-center");
  row_center.innerHTML = `<p>${przeciwnik}</p> <p>${adres}</p>`;
  mecz.append(row_center);


  let row_right = document.createElement("div");
  row_right.classList.add("data-box__data-row-right");
  row_right.innerHTML = `<p>${typ}</p>`
  mecz.append(row_right);

  mecze.append(mecz);
}

const addCoachMatch = (id_meczu ,adres, przeciwnik, typ, data, godzina) => {
  let mecz = document.createElement("div");
  mecz.classList.add("data-box__data-row");

  let match_id = document.createElement("div");
  match_id.classList.add("match_id");
  match_id.textContent = id_meczu;
  mecz.append(match_id);

  let row_left = document.createElement("div");
  row_left.classList.add("data-box__data-row-left")
  row_left.innerHTML = `<p>${data}</p> <p>${godzina}</p>`;
  mecz.append(row_left);

  let row_center = document.createElement("div");
  row_center.classList.add("data-box__data-row-center");
  row_center.innerHTML = `<p class="rival">${przeciwnik}</p> <p>${adres}</p>`;
  mecz.append(row_center);


  let row_right = document.createElement("div");
  row_right.classList.add("data-box__data-row-right");
  row_right.innerHTML = `<p>${typ}</p> <button class="data-box__result-btn button-add-match-result">wynik</button>`;
  mecz.append(row_right);

  mecze.append(mecz);
}

const addCoachPlayedMatch = (id_meczu ,wynik, przeciwnik, typ, data, godzina) => {
  let mecz = document.createElement("div");
  mecz.classList.add("data-box__data-row");

  let match_id = document.createElement("div");
  match_id.classList.add("match_id");
  match_id.textContent = id_meczu;
  mecz.append(match_id);

  let row_left = document.createElement("div");
  row_left.classList.add("data-box__data-row-left")
  row_left.innerHTML = `<p>${data}</p> <p>${godzina}</p>`;
  mecz.append(row_left);

  let row_center = document.createElement("div");
  row_center.classList.add("data-box__data-row-center");
  row_center.innerHTML = `<p class="rival">${przeciwnik}</p> <p>${wynik}</p>`;
  mecz.append(row_center);


  let row_right = document.createElement("div");
  row_right.classList.add("data-box__data-row-right");
  row_right.innerHTML = `<p>${typ}</p>`;
  mecz.append(row_right);

  meczeRozegrane.append(mecz);
}


const addShooter = (imie, bramki) => {
  let strzelec = document.createElement("div");
  strzelec.classList.add("data-box__data-row");

  let row_left = document.createElement("div");
  row_left.classList.add("data-box__data-row-left")
  row_left.innerHTML = `<p>1</p>`;
  strzelec.append(row_left);

  let row_center = document.createElement("div");
  row_center.classList.add("data-box__data-row-center");
  row_center.innerHTML = `<p>${imie}</p>`;
  strzelec.append(row_center);


  let row_right = document.createElement("div");
  row_right.classList.add("data-box__data-row-right");
  row_right.innerHTML = `<p>${bramki}</p>`
  strzelec.append(row_right);

  strzelcy.append(strzelec);

}

const addAnnouncement = (nadawca, data, tresc) => {
  let announcement = document.createElement("div");
  announcement.classList.add("dashboard-menu__announcement");
  announcement.innerHTML = `
  <div class="dashboard-menu__announcement-top">
    <div class="dashboard-menu__announcment-title">${nadawca}</div>
    <div class="dashboard-menu__announcment-date">${data}</div>
  </div>
  <div class="dashboard-menu__announcment-message">${tresc}</div>
  `;

  ogloszenia.append(announcement);
}