const noBanner = document.querySelector('.no-banner');
const addBanner = document.getElementById('nav-history-tab')
const banner = document.getElementById('profile-banner')

// noBanner.addEventListener('click', (e) => {
//     if (e.target.classList.contains('active')) {
//         banner.classList.add('remove')
//     }
// })

// addBanner.addEventListener('click', (e) => {
//     banner.classList.remove('remove')
// })

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));




