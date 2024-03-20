function masquerQuestion(id) {
    if (confirm("Êtes-vous sûr de vouloir masquer cette question?")) {
        var row = document.getElementById("row_" + id);
        row.style.display = "none";
    }
}

function supprimerQuestion(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette question?")) {
        var row = document.getElementById("row_" + id);
        row.parentNode.removeChild(row);
    }
}