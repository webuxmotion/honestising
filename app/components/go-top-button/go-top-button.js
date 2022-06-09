const element = document.querySelector('.js-go-top-button');

if (element) {
    element.addEventListener('click', () => {
        window.scrollTo({ top: 0 });
    });
}