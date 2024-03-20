function validateForm() {
    var identifier = document.getElementById("identifier").value;
    var password = document.getElementById("password").value;

    if (identifier == "" || password == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }
    return true;
}