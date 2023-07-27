const sidebarMobile = document.getElementById('sidebar_mobile');
const openButton = document.getElementById('sidebar_open_button');
const closeButton = document.getElementById('sidebar_close_button');

function closeSidebar() {
    const isOpen = sidebarMobile.classList.contains("left-0");

    if (isOpen) {
        sidebarMobile.classList.remove("left-0");
        sidebarMobile.classList.add("-left-full");
    }
}

function openSidebar() {
    const isClose = sidebarMobile.classList.contains("-left-full");

    if (isClose) {
        sidebarMobile.classList.remove("-left-full");
        sidebarMobile.classList.add("left-0");
    }
}

openButton.onclick = () => openSidebar();
closeButton.onclick = () => closeSidebar();