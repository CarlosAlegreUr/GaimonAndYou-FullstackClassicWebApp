
async function changeMood() {
    gaimon_image = await document.getElementById("gaimon-image")
    mood_button = await document.getElementById("mood-button")
    if(gaimon_image.getAttribute("src") == "./images/gaimon_stressed.webp") {
        gaimon_image.setAttribute("src", "./images/gaimon_normal.webp")
        mood_button.innerHTML = "MAKE HIM ANGRY"    
        console.log("Gaimon mood changed to calmed.")
    } else {
        gaimon_image.setAttribute("src", "./images/gaimon_stressed.webp")
        mood_button.innerHTML = "CALM HIM DOWN"    
        console.log("Gaimon mood changed to angry.")
    }
}
