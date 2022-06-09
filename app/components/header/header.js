const button = document.getElementById('main-button');
const body = document.querySelector('body');

if (button && body) {
  button.onclick = () => {
    body.classList.toggle('is-honest-fullscreen');
  };
}
