// theme switcher
const html = document.querySelector('html');
html.dataset.theme = `theme-dark`;
let darkMode = localStorage.getItem('dark-mode');

function switchTheme(theme) {
    html.dataset.theme = `theme-${theme}`;
}

function switchAssets(theme) {

    if (theme === "dark") {
        document.getElementById("dark-mode-btn").innerHTML = '◉';
        document.getElementById("dark-mode-btn-desktop").innerHTML = '◉';
        // document.getElementById("header-nav").style.color = "#fff";
        // document.getElementById("mc_embed_signup").getElementsByClassName("button")[0].style.backgroundColor = "#d0000a";
        // document.getElementById("header-nav-desktop").style.color = "#fff";

    } else {
        document.getElementById("dark-mode-btn").innerHTML = '◉';
        document.getElementById("dark-mode-btn-desktop").innerHTML = '◉';
        // document.getElementById("header-nav").style.color = "#000";
        // document.getElementById("mc_embed_signup").getElementsByClassName("button")[0].style.backgroundColor = "#111";
        // document.getElementById("header-nav-desktop").style.removeProperty("color");
        // document.getElementById("header-nav-desktop").style.color = "000";
    }
}

// logos switcher
function toggleTheme() {
    if (html.dataset.theme === 'theme-light') {
        switchTheme('dark');
        switchAssets('dark');
        localStorage.setItem("dark-mode", "enabled");
    } else {
        switchTheme('light');
        switchAssets('light');
        localStorage.setItem("dark-mode", "disabled");
    }
}

if (darkMode === "enabled") { // set state of darkMode on page load
    document.addEventListener('DOMContentLoaded', (event) => {
        switchAssets();
    });
}