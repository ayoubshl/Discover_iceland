'use strict';

const ajouter = document.querySelector('.btn-ajouter');
const addModal = document.querySelector('.modal-ajouter');
const modals = document.querySelectorAll('.modal');
const closeBtn = document.querySelectorAll('.close-button');
const overlay = document.querySelector('.overlay');
const mofidyBtns = document.querySelectorAll('.btn-modify');


const removeHidden = function () {
    addModal.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

const addHidden = function () {
    overlay.classList.add('hidden');
    for (let i = 0; i < modals.length; i++) {
        if (!modals[i].classList.contains('hidden'))
            modals[i].classList.add('hidden');
    }
}

const removeHiddenModify = function (e) {
    e.preventDefault();
    const news = document.querySelector(`.news-${e.currentTarget.dataset.number}`);
    news.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

ajouter.addEventListener('click', removeHidden);

for (let i = 0; i < mofidyBtns.length; i++)
    mofidyBtns[i].addEventListener('click', removeHiddenModify);

for (let i = 0; i < closeBtn.length; i++)
    closeBtn[i].addEventListener('click', addHidden);

overlay.addEventListener('click', addHidden);

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape')
        addHidden();
});


