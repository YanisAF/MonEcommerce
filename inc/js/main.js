function toggleNav() {
    let nav = document.querySelector("#myTopNav");
    console.log(nav)
    if (nav.className === "topnav") {
        nav.className += " responsive";
    } else {
        nav.className = "topnav";
    }
}