function setScroll() {
    

    let scroll = window.scrollY;
    let scrollString = scroll.toString();

    const data = {
        value: scrollString,                  // store the value within this object
        ttl: Date.now() + 5000,   // store the TTL (time to live)
    }
    localStorage.setItem("scrollPosition", JSON.stringify(data));
}


function restoreScrollPos() {
    const data = localStorage.getItem("scrollPosition");

    if (!data) {     // if no value exists associated with the key, return null
        return null;
    }
 
    const item = JSON.parse(data);
 
    // If TTL has expired, remove the item from localStorage and return null
    if (Date.now() > item.ttl) {
        localStorage.removeItem("scrollPosition");
        return null;
    }
 
    // return data if not expired
    let posYString = item.value;
    let posY = parseInt(posYString);
    window.scroll(0, posY);
    return true;
}