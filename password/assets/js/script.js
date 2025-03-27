function generatePassword() {
    let length = document.getElementById("passwordLength").value;
    let includeUppercase = document.getElementById("includeUppercase").checked;
    let includeNumbers = document.getElementById("includeNumbers").checked;
    let includeSymbols = document.getElementById("includeSymbols").checked;

    let lowercase = "abcdefghijklmnopqrstuvwxyz";
    let uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let numbers = "0123456789";
    let symbols = "!@#$%^&*()_+[]{}|;:,.<>?";

    let characters = lowercase;
    if (includeUppercase) characters += uppercase;
    if (includeNumbers) characters += numbers;
    if (includeSymbols) characters += symbols;

    if (length < 6 || length > 50) {
        alert("Password length must be between 6 and 50 characters.");
        return;
    }

    let password = "";
    for (let i = 0; i < length; i++) {
        let randomIndex = Math.floor(Math.random() * characters.length);
        password += characters[randomIndex];
    }

    document.getElementById("passwordOutput").value = password;
}

function copyPassword() {
    let passwordField = document.getElementById("passwordOutput");
    passwordField.select();
    document.execCommand("copy");
    alert("Password copied to clipboard!");
}