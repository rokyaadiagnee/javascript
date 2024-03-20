function supprimerJoueur(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce joueur?")) {
        var row = document.getElementById("row_" + id);
        row.parentNode.removeChild(row);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                } else {
                    alert("Erreur lors de la suppression du joueur.");
                }
            }
        };
        xhr.open("GET", "supprimer_joueur.php?id=" + id, true);
        xhr.send();
    }
}

function bloquerDebloquerJoueur(id, action) {
    var actionText = action == "bloquer" ? "bloquer" : "débloquer";
    if (confirm("Êtes-vous sûr de vouloir " + actionText + " ce joueur?")) {
        var statusCell = document.getElementById("status_" + id);
        statusCell.textContent = actionText.charAt(0).toUpperCase() + actionText.slice(1);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                } else {
                    alert("Erreur lors de l'action sur le joueur.");
                }
            }
        };
        xhr.open("GET", "bloquer_debloquer_joueur.php?id=" + id + "&action=" + action, true);
        xhr.send();
    }
}