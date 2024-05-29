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
    $num_carte= $_POST['num_carte'];
   
    $montant = $_POST['montant'];
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
    $sql = "INSERT INTO donateurs_dargent (N_P, num_carte, montant, date_expiration)
            VALUES ('$N_P', '$num_carte', '$montant', '$date_expiration')";
    
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
      <h4>Formulaire de paiement</h4>
      <div class="input-group">
        <div class="input-box">
          <input type="tel"   class="name" name="num_carte" placeholder="Numéro de carte 1111-2222-3333-4444" required>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icon" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
          </svg>
        </div>
      </div>
      <div class="input-group">
      <div class="input-box">
      <h4 for="date_expiration">Date d'expiration  :</h4><br>
          <input type="date"   class="name" name="date_expiration" placeholder="date_expiration" required>
          
        </div>
      </div>
      <div class="input-group">
        <div class="input-box">
            
          <input type="number"   class="name"  name ="montant" placeholder="entrer le montant" required>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon" viewBox="0 0 16 16">
            <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM8.5 4h6l.5.667V5H1v-.333L1.5 4h6V1h1zM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
          </svg>    </div></div>
          <div class="input-group">
        <div class="input-box">
          <button type="submit1" >faire un don maintenant</button>
        </div></div>

</body>