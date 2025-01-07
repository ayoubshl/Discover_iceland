'use strict';

const details = document.querySelectorAll('.details');

const tousLesNews = document.querySelector('.link-2');
const tousLesNewsModal = document.querySelector('.allnews');

const sinscrire = document.querySelector('.link-3');

const registerModal = document.querySelector('.register-modal');

const modals = document.querySelectorAll('.modal');
const closeBtn = document.querySelectorAll('.close-button');
const overlay = document.querySelector('.overlay');


const removeHidden1 = function (e) {
    e.preventDefault();
    registerModal.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

const removeHidden2 = function (e) {
    e.preventDefault();
    tousLesNewsModal.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

const addHidden = function () {
    overlay.classList.add('hidden');
    for (let i = 0; i < modals.length; i++) {
        if (!modals[i].classList.contains('hidden'))
            modals[i].classList.add('hidden');
    }
}

const removeHiddenNews = function (e) {
    e.preventDefault();
    const news = document.querySelector(`.news-${e.currentTarget.dataset.number}`);
    news.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

sinscrire.addEventListener('click', removeHidden1);

for (let i = 0; i < details.length; i++)
    details[i].addEventListener('click', removeHiddenNews);

for (let i = 0; i < closeBtn.length; i++)
    closeBtn[i].addEventListener('click', addHidden);

overlay.addEventListener('click', addHidden);

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape')
        addHidden();
});


tousLesNews.addEventListener('click', removeHidden2);


