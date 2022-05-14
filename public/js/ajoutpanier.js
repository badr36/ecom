function setScroll() {
    let scroll = window.scrollY;
    let scrollString = scroll.toString();
    localStorage.setItem("scrollPosition", scrollString);
}


function restoreScrollPos() {
    let posYString = localStorage.getItem("scrollPosition");
    let posY = parseInt(posYString);
    window.scroll(0, posY);
    return true;
}