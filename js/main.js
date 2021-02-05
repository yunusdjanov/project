const noBanner = document.querySelector('.no-banner');
const addBanner = document.getElementById('nav-history-tab')
const banner = document.getElementById('profile-banner')

noBanner.addEventListener('click', (e) => {
    if (e.target.classList.contains('active')) {
        banner.classList.add('remove')
    }
})

addBanner.addEventListener('click', (e) => {
    banner.classList.remove('remove')
})

