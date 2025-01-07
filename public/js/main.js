const ham = document.querySelector('.ham-menu')
const nav = document.querySelector('.navbar')

ham.addEventListener("click",()=>{
    ham.classList.toggle('active')
    nav.classList.toggle('active')
})

const loadder = document.getElementById('preloadder')

window.addEventListener("load",()=>{
    loadder.style.display = "none";
});
document.getElementById('shownav').addEventListener('click', function () {
    var verticalNav = document.querySelector('.sidenav');

    // Toggle visibility and opacity
    if (verticalNav.style.opacity === '1' || verticalNav.style.opacity === '') {
        verticalNav.style.opacity = '0';
        setTimeout(function () {
            verticalNav.style.display = 'none';
        }, 500); // Adjust the timeout to match your transition duration
    } else {
        verticalNav.style.display = 'block';
        setTimeout(function () {
            verticalNav.style.opacity = '1';
        }, 0); // Use a small timeout to ensure the display property is applied before changing opacity
    }
});
