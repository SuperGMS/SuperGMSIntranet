const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

function setDarkModeState(isDarkMode) {
    localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
}

// Function to get dark mode state from localStorage
function getDarkModeState() {
    return localStorage.getItem('darkMode') === 'enabled';
}

// Check if dark mode was previously enabled and set the appropriate class
document.body.classList.toggle('dark-mode-variables', getDarkModeState());


menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    const isDarkMode = !getDarkModeState();
    document.body.classList.toggle('dark-mode-variables', isDarkMode);
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active', isDarkMode);
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active', isDarkMode);
    setDarkModeState(isDarkMode);
});

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-bottom-right",
    preventDuplicates: true,
    onclick: null,
    showDuration: "1000",
    hideDuration: "1000",
    timeOut: "2000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};