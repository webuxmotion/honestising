const el = document.getElementById('languages');

if (el) {
  el.addEventListener('click', (event) => {
    let buttonElement = null;

    if (event.target.classList.contains('js-dropdown-item')) {
      buttonElement = event.target;
    } else if (event.target.closest('.js-dropdown-item')) {
      buttonElement = event.target.closest('.js-dropdown-item');
    }

    if (buttonElement) {
      const langCode = buttonElement.dataset.code;
      window.location = PATH + '/language/change?lang=' + langCode;
    }
  });
}
