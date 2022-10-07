
async function changeMood() {
    gaimon_image = await document.getElementById("gaimon-image")
    mood_button = await document.getElementById("mood-button")
    if(gaimon_image.getAttribute("src") == "./images/gaimon_stressed.webp") {
        gaimon_image.setAttribute("src", "./images/gaimon_normal.webp")
        gaimon_image.setAttribute("alt", "Gaimon normal face")
        mood_button.innerHTML = "MAKE HIM ANGRY"    
        console.log("Gaimon mood changed to calmed.")
    } else {
        gaimon_image.setAttribute("src", "./images/gaimon_stressed.webp")
        gaimon_image.setAttribute("alt", "Gaimon angry face")
        mood_button.innerHTML = "CALM HIM DOWN"    
        console.log("Gaimon mood changed to angry.")
    }
}


async function dressGaimon() {
    //TODO:  Checked event listener...
    // const glassesCheckbox = await document.getElementById("glasses-checkbox")
    // glassesCheckbox.addEventListener()

    // Glasses menu => Element creation
    const glassesMenu = await document.createElement("select")

    const op1 = await document.createElement("option")
    op1.innerHTML = "sunglasses"
    const op2 = await document.createElement("option")
    op2.innerHTML = "hippie"
    const op3 = await document.createElement("option")
    op3.innerHTML = "VR"

    await glassesMenu.appendChild(op1)
    await glassesMenu.appendChild(op2)
    await glassesMenu.appendChild(op3)
    console.log(glassesMenu)

    //TODO: add style

    // TODO: unchecked Event listener...
    // Remove <select>
}


async function glassesMenu() {

}
