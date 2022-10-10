
const logInButton = document.getElementById("login-button")
logInButton.addEventListener("click", () => { 
    sessionStorage.setItem("loggedIn", true)
    //TODO: Connect to database and validate data.
    //TODO: Save data from user in some browser storage.
})
