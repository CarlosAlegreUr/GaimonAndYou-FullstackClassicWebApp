
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
    // DevNote: This can be more efficient.
    const glassesCheckbox = document.getElementById("glasses-checkbox")
    glassesCheckbox.addEventListener("change", async () => {
        clothingMenu = await document.getElementById("clothing-menu")
        if(glassesCheckbox.checked) {
            const glassesMenu = await createGlassesMenu()
            await glassesCheckbox.insertAdjacentElement("afterend", glassesMenu)
            console.log("Glasses Marked")
            console.log(clothingMenu)
            showOrHideGlasses(true)
        } else {
            const glassesMenu = await document.getElementById("glasses-menu")
            showOrHideGlasses(false)
            glassesMenu.remove()
            console.log("Glasses Unmarked")
        }
    })

    const hatCheckbox = document.getElementById("hat-checkbox")
    hatCheckbox.addEventListener("change", async () => {
        const hat = document.getElementById("hat")
        if(hatCheckbox.checked) {
            hat.style.visibility = "visible"
        } else {
            hat.style.visibility = "hidden"
        }
    })

    const stickCheckbox = document.getElementById("stick-checkbox")
    stickCheckbox.addEventListener("change", async () => {
        const hat = document.getElementById("stick")
        if(stickCheckbox.checked) {
            stick.style.visibility = "visible"
        } else {
            stick.style.visibility = "hidden"
        }
    })
}


async function createGlassesMenu() {
    const glassesMenu = await document.createElement("select")
    glassesMenu.setAttribute("id", "glasses-menu")

    const op1 = await document.createElement("option")
    op1.innerHTML = "sunglasses"
    const op2 = await document.createElement("option")
    op2.innerHTML = "hippie"
    const op3 = await document.createElement("option")
    op3.innerHTML = "VR"

    await glassesMenu.appendChild(op1)
    await glassesMenu.appendChild(op2)
    await glassesMenu.appendChild(op3)

    //TODO: add style
    return glassesMenu
}


async function showOrHideGlasses(show) {
    const glassesMenu = await document.getElementById("glasses-menu")
    glasses = await document.getElementById(glassesMenu.value)
    if(show)
        glasses.style.visibility = "visible"
    else
        glasses.style.visibility = "hidden"
}