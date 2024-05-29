<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charity - Free Nonprofit Website Template</title>
    <link rel="stylesheet" href="style.css">
<style>.message{
    
    text-align: center;
    background: #f9eded;
    padding: 15px 0px;
    border:1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color:green;
    
}
.dob{
width: 30%;
padding: 14px;
text-align: center;
background-color: #fcfcfc;
transition: none;
outline: none;
border: 1px solid #c0bfbf;
border-radius: 3px;
position: absolute;
left: 35%;
}
.btn{
    background-color: green; /* Couleur de fond bleue */
    color: #fff; /* Couleur du texte blanche */
    border: none; /* Supprimer les bordures */
    padding: 10px 20px; /* Ajouter un espacement interne */
    cursor: pointer; /* Modifier le curseur au survol */
    border-radius: 5px; /* Ajouter des coins arrondis */
    position: absolute;
    top:4%;
    width: 15%;
}



</style>
    
</head>
<body>
<section class="faire_un_don"id="Faire_un_don">
    <div class="a">
    <div class="wrapper">
    <?php
    include("php/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
    $nom_medicament = $_POST['nom_medicament'];
    $methode_livraison = $_POST['methode_livraison'];
    $quantite = $_POST['quantite'];
    $date_expiration = isset($_POST['date_expiration']) ? $_POST['date_expiration'] : "N/A";
// Ajoutez ici d'autres champs et traitements selon votre formulaire


// Exécuter une requête SQL pour récupérer automatiquement une valeur de la table source
$sql_select_automatic_value = "SELECT MAX(N_P) AS N_P FROM dons";

$result_automatic_value = mysqli_query($con, $sql_select_automatic_value);

if ($result_automatic_value) {
    // Récupérer la valeur automatique à partir du résultat de la requête
    $row = mysqli_fetch_assoc($result_automatic_value);
    $N_P = $row['N_P'];

    // Requête pour insérer les données dans la table 'donneursdesang'
    $sql = "INSERT INTO donneursmedicaments (N_P, nom_medicament, methode_livraison, quantite, date_expiration)
            VALUES ('$N_P', '$nom_medicament', '$methode_livraison', '$quantite', '$date_expiration')";
    
    // Exécuter la requête
    if (mysqli_query($con, $sql)) {
      echo "<div class='message'>
                      <p>Merci pour votre don !</p>
                  </div> <br>";
                  echo "<a href='page7.php'><button class='btn'>RETOURNER</button>";
       
    } else {
        echo "<div class='message'>
        <p>Erreur lors de l'insertion des informations  !</p>
    </div> <br>". mysqli_error($con);
    }
} 
}

// Fermer la connexion à la base de données
mysqli_close($con);
?>
    <h2> faire un don </h2>
    <form action=""method="POST">
      <h4>Formulaire de medicament</h4>
      <div class="input-group">
        <div class="select_1">
          
        <h4 for="nom_medicament">Nom du medicament :</h4>
        <select id="nom_medicament"  class="select-box"  name="nom_medicament" required>
        <option value=""required disabled selected>choisir une option</option>
            <option value="chimiothérapie"> chimiothérapie</option>
            <option value="Thérapies ciblées">Thérapies ciblées</option>
            <option value="Immunothérapie">Immunothérapie</option>
            <option value="Hormonothérapie">Hormonothérapie</option>
            <option value="Thérapie génique">Thérapie génique</option>
            
        </select><br><br>
        <div class="icon-select">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
      </div></div>
          
      <div class="input-group">
        <div class="select_1">
          

      
      <h4 for="methode">Methode de livraison:</h4><br>
        <select id="methode"class="select-box" name="methode_livraison" required>
            <option value="" disabled selected>Choisir une méthode</option>
            <option value="Livraison à domicile">Livraison à domicile</option>
            <option value="Livraison par transporteur">Livraison par transporteur</option>
            <option value="Autre">Autre</option>
        </select><br>
        <div class="icon-select">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
      </div></div>
      <div class="input-group">
        <div class="input-box">
      
        <h4 for="date_expiration">Date d'expiration de medicament :</h4><br>
        <input type="date" class="name"  placeholder="date_expiration" id="date_expiration" name="date_expiration" required><br>
        
        </div>
      </div>

      <div class="input-group">
        <div class="input-box">
        <h4 for="quantite">Quantite :</h4><br>
        <input type="number" id="quantite" name="quantite" class="dob" required><br>
        </div></div>
        <div class="input-group">
        <div class="input-box">
          <button type="submit1" >faire un don maintenant</button>
        </div></div>
          
</section> 
</body>
</html>
        