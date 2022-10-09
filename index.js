logInCheck()

async function logInCheck() {
    loggedIn = await sessionStorage.getItem("loggedIn")
    if(loggedIn == null)
        sessionStorage.setItem("loggedIn", false)
    else {
        if(loggedIn == 'true') {
            displayLoggedInMenu()
        } else if(loggedIn == 'false') {
            displayNotLoggedInMenu()
        }
    }
}

async function displayNotLoggedInMenu() {
    // If prevents some cases where you create to log-in menu.
    if(document.getElementById("login-li") == null){
        // Add log-in and sign-up
        logIn = await createUpperMenuButton("login-li", "loggingPage.html", "LOG-IN", false)
        signUp = await createUpperMenuButton("signup-li", "signingUpPage.html", "SIGN-UP", false)

        devLinkedInLi = await document.getElementById("linkedIn-li")
        await devLinkedInLi.insertAdjacentElement("beforebegin", logIn)
        devLinkedInLi.insertAdjacentElement("beforebegin", signUp)

        //Removing GaimonHub and LogOut
        document.getElementById("logout-li").remove()
        document.getElementById("gaimon-hub-li").remove()
    }
}

async function displayLoggedInMenu() {
    // Adding GaimonHub and Log-out.
    yourGaimonHub = createUpperMenuButton("gaimon-hub-li", "gaimonHub.html", "YOUR GAIMON HUB", false)
    logOut = createUpperMenuButton("logout-li", "", "LOG-OUT", true)

    devLinkedInLi = await document.getElementById("linkedIn-li")
    devLinkedInLi.insertAdjacentElement("beforebegin", yourGaimonHub)
    devLinkedInLi.insertAdjacentElement("beforebegin", logOut)

    //Removing Log-In and Sign-Up 
    document.getElementById("login-li").remove()
    document.getElementById("signup-li").remove()
}

// TODO: make it async function
function createUpperMenuButton(ID, Href, InnerHTML, isLogOut) {
    li = document.createElement("li")
    aref = document.createElement("a")
    if(Href != "")
        aref.setAttribute("href", Href)
    button = document.createElement("button")
    button.innerHTML = InnerHTML
    aref.appendChild(button)
    li.appendChild(aref)
    li.setAttribute("id", ID)
    if(isLogOut) {
        li.addEventListener("click", () => {
            sessionStorage.setItem("loggedIn", false)
            displayNotLoggedInMenu()
        })
    }
    return li
}
