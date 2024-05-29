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
$groupe_sanguin = $_POST['groupe_sanguin'];
    $rhesus = $_POST['rhesus'];
    $poids = $_POST['poids'];
    $dernier_don = isset($_POST['dernier_don']) ? $_POST['dernier_don'] : "N/A";
// Ajoutez ici d'autres champs et traitements selon votre formulaire


// Exécuter une requête SQL pour récupérer automatiquement une valeur de la table source
$sql_select_automatic_value = "SELECT MAX(N_P) AS N_P FROM dons";

$result_automatic_value = mysqli_query($con, $sql_select_automatic_value);

if ($result_automatic_value) {
    // Récupérer la valeur automatique à partir du résultat de la requête
    $row = mysqli_fetch_assoc($result_automatic_value);
    $N_P = $row['N_P'];

    // Requête pour insérer les données dans la table 'donneursdesang'
    $sql = "INSERT INTO donneursdesang (N_P, groupe_sanguin, rhesus, poids, dernier_don)
            VALUES ('$N_P', '$groupe_sanguin', '$rhesus', '$poids', '$dernier_don')";
    
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
      <h4>Formulaire de Don de Sang</h4>
      <div class="input-group">
        <div class="select_1">
          
        <h4 for="groupe_sanguin">Groupe sanguin :</h4>
        <select id="groupe_sanguin"  class="select-box"  name="groupe_sanguin" required>
        <option value=""required disabled selected>choisir une option</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br><br>
        <div class="icon-select">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
      </div></div>
          
      <div class="input-group">
        <div class="select_1">
          

      <h4 for="rhesus">Facteur Rhesus :</h4>
        <select id="rhesus"  class="select-box"name="rhesus" required>
        <option value=""required disabled selected>choisir une option</option>
            <option value="+">+</option>
            <option value="-">-</option>
        </select><br><br>
        <div class="icon-select">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
      </div></div>
      <div class="input-group">
        <div class="input-box">
      
        <input type="number"  placeholder= "poids"id="poids" name="poids" required class="dob"><br><br>
        
        </div>
      </div>

      <div class="input-group">
        <div class="input-box">
      <h4 for="dernier_don">Date du dernier don :</h4>
        <input type="date" class="name" id="dernier_don" name="dernier_don"><br><br>
        </div></div>
        <div class="input-group">
        <div class="input-box">
          <button type="submit1" >faire un don maintenant</button>
</section> 
</body>
</html>
        