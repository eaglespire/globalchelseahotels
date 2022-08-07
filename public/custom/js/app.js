/* 11. Datepicker */


const y = document.querySelector('.show');
const z = document.querySelector('.popor');
function dropdown(){
  if (z.style.display === 'block'){
    z.style.display = 'none';

  } else {
    z.style.display = 'block';
  }
}

y.addEventListener('click', dropdown , false);




