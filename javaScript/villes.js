'use strict';

const imgs = document.querySelectorAll('.img');
const modals = document.querySelectorAll('.modal');
const closeBtn = document.querySelectorAll('.close-button');
const overlay = document.querySelector('.overlay');

const removeHidden = function (e) {
    const img = document.querySelector(`.img${e.currentTarget.dataset.number}`);
    img.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

const addHidden = function () {
    overlay.classList.add('hidden');
    for (let i = 0; i < modals.length; i++) {
        if (!modals[i].classList.contains('hidden'))
            modals[i].classList.add('hidden');
    }
}

for (let i = 0; i < imgs.length; i++)
    imgs[i].addEventListener('click', removeHidden);

for (let i = 0; i < closeBtn.length; i++)
    closeBtn[i].addEventListener('click', addHidden);

overlay.addEventListener('click', addHidden);

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape')
        addHidden();
});