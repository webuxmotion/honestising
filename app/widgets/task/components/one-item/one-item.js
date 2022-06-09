const item = document.querySelectorAll('.js-task');

if (item) {
  item.forEach((el) => {
    const button = el.querySelector('.js-confirm-button');
    const questionId = el.querySelector('.js-question').dataset.questionId;
    const checkedEls = el.querySelectorAll('.js-input-answer');

    button.addEventListener('click', (event) => {
      let checkedValue = '';

      checkedEls.forEach((element) => {
        const parentEl = element.closest('.js-answer');
        parentEl.classList.remove('is-success');
        parentEl.classList.remove('is-wrong');

        if (element.checked) {
          checkedValue = element.value;
        }
      });

      if (questionId && checkedValue) {
        fetch(`/task/answer?task=${questionId}&answer=${checkedValue}`)
          .then((response) => response.json())
          .then((data) => {
            checkedEls.forEach((element) => {
              const parentEl = element.closest('.js-answer');
              if (element.checked && element.value == data.wrong_answer) {
                parentEl.classList.add('is-wrong');
              } else if (
                element.checked &&
                element.value == data.success_answer
              ) {
                parentEl.classList.add('is-success');
              }
            });
          });
      } else {
        el.classList.add('is-need-choose');
        setTimeout(() => {
          el.classList.remove('is-need-choose');
        }, 1000);
      }
    });
  });
}
