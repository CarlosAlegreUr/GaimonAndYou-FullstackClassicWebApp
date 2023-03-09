// Dev-Note: code is not as efficient as it could be.
const glassesMenu = createGlassesMenu()
glassesMenu.addEventListener("change", showHideGlasses)
// TODO: make createGlassesMenu async function
function createGlassesMenu() {
    const glassesMenu = document.createElement("select")
    glassesMenu.setAttribute("id", "glasses-menu")

    const op1 = document.createElement("option")
    op1.innerHTML = "sunglasses"
    const op2 = document.createElement("option")
    op2.innerHTML = "hippie-glasses"
    const op3 = document.createElement("option")
    op3.innerHTML = "vr-glasses"

    glassesMenu.appendChild(op1)
    glassesMenu.appendChild(op2)
    glassesMenu.appendChild(op3)

    // TODO: add CSS style

    return glassesMenu
}

mood_button =  document.getElementById("mood-button")
mood_button.addEventListener("click", changeMood)
async function changeMood() {
    gaimon_image = await document.getElementById("gaimon-image")
    mood_button = await document.getElementById("mood-button")
    if(gaimon_image.getAttribute("src") == "../public/images/gaimon_stressed.webp") {
        gaimon_image.setAttribute("src", "../public/images/gaimon_normal.webp")
        gaimon_image.setAttribute("alt", "Gaimon normal face")
        mood_button.innerHTML = "MAKE HIM ANGRY"    
    } else {
        gaimon_image.setAttribute("src", "../public/images/gaimon_stressed.webp")
        gaimon_image.setAttribute("alt", "Gaimon angry face")
        mood_button.innerHTML = "CALM HIM DOWN"    
    }
}

glassesCheckbox = document.getElementById("glasses-checkbox")
glassesCheckbox.addEventListener("change", showHideGlassesMenu)
async function showHideGlassesMenu() { 
    clothingMenu = await document.getElementById("clothing-menu")
    if(glassesCheckbox.checked) {
        await glassesCheckbox.insertAdjacentElement("afterend", glassesMenu)
        console.log("Glasses Marked")
        showHideGlasses(true)
    } else {
        const glassesMenu = await document.getElementById("glasses-menu")
        showHideGlasses(false)
        glassesMenu.remove()
    }
}

async function showHideGlasses(show) {
    const glassesMenu = await document.getElementById("glasses-menu")
    
    glass = await document.getElementById("sunglasses")
    glass.style.visibility = "hidden"
    glass = await document.getElementById("hippie-glasses")
    glass.style.visibility = "hidden"
    glass = await document.getElementById("vr-glasses")
    glass.style.visibility = "hidden"

    glasses = await document.getElementById(glassesMenu.value)
    if(show)
        glasses.style.visibility = "visible"
}


const hatCheckbox = document.getElementById("hat-checkbox")
hatCheckbox.addEventListener("change", showHideHat)
async function showHideHat() {
    const hat = document.getElementById("hat")
    if(hatCheckbox.checked) {
        hat.style.visibility = "visible"
    } else {
        hat.style.visibility = "hidden"
    }
}


const stickCheckbox = document.getElementById("stick-checkbox")
stickCheckbox.addEventListener("change", showHideStick)
async function showHideStick() {
    const hat = document.getElementById("stick")
    if(stickCheckbox.checked) {
        stick.style.visibility = "visible"
    } else {
        stick.style.visibility = "hidden"
    }
}

const gaimonAttributesForm = document.getElementById("gaimon-attributes")
gaimonAttributesForm.addEventListener("submit", sendAttributesToDB)
async function sendAttributesToDB(event) { 
    console.log(event)
    alert("Sending data...")
}
