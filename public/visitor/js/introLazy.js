const imgs = document.getElementsByClassName("logo");
const viewHeight = window.innerHeight || document.documentElement.clientHeight;
let num = 0;
function lazyload() {
    console.log("滚动...");
    for (let i = num; i < imgs.length; i++) {
        let distance = viewHeight - imgs[i].getBoundingClientRect().top;
        if (distance >= 0) {
            imgs[i].src = imgs[i].getAttribute("data-src");
            num = i + 1;
        }
    }
}
function debounce(fn, delay = 500) {
    let timer = null;
    return function (...args) {
        if (timer) clearTimeout(timer);
        timer = setTimeout(() => {
            fn.call(this, args);
        }, delay);
    };
}
window.onload = lazyload;
window.addEventListener("scroll", debounce(lazyload, 300), false);