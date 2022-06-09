const button = document.getElementById('show-manipulative-ad');
const box = document.getElementById('hidden-box');

if (button && box) {
  button.onclick = () => {
    box.classList.add('is-hide');
  };
}
