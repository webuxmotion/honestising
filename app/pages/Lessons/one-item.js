const page = document.querySelector('.js-one-item-page');

if (page) {
  page.addEventListener('click', (event) => {
    if (event.target.tagName === 'IMG') {
      event.target.classList.toggle('is-fullwidth');
    }
  });
}
