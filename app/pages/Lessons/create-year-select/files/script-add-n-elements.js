for (let year = 2010; year <= 2100; year++) {
  const optionElement = document.createElement('option');
  optionElement.setAttribute('value', year);
  optionElement.innerHTML = year;

  yearSelectElement.insertAdjacentElement('beforeEnd', optionElement);
}
