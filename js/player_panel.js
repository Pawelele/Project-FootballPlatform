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