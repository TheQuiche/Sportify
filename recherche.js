// Fonction pour effectuer la recherche
function search() {
  var searchInput = document.getElementById('searchInput').value;
  
  // Effectuer la requête AJAX vers le serveur pour récupérer les résultats de recherche
  $.ajax({
    url: 'recherche.php',
    type : 'GET',
    donnee : { searchInput: searchInput},
    success; function(response){
      //Afficher les résultats de recherche
      document.getElementById('searchResults').innerHTML = response;
    },
    error: function(){
      console.log('Erreur lors de la requête Ajax');
    }
  });
}
  