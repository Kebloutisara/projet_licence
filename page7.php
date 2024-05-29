




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charity - Free Nonprofit Website Template</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<style>.blanc_bouton1{
    background-color: #BA55D3;
    border: 1px solid #fff;
    border-radius: 20px;
    font-size: 15px;
    color:black;
    padding: 10px 30px;
    transition:0.5s ;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0%;
    left: 10%;
   

  }
  .blanc_bouton1:hover{
    background-color:pink;
    color: black;
  }
  .btn{
 background-color:  #9370DB;
  border: 1px solid #fff;
  border-radius: 20px;
  font-size: 15px;
  color:black;
  padding: 10px 30px;
  transition:0.5s ;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: 10%;
  left: 10%;
  width: 10%;
 

}
.btn:hover{
  background-color:pink;
  color: black;
}

   

  
  
  </style>
<body>



<section class="faire_un_don"id="Faire_un_don">
    <div class="a">
    <div class="wrapper">
    <?php

    include("php/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
    $N_P = $_POST["N_P"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $dob_day = $_POST["dob_day"];
    $dob_month = $_POST["dob_month"];
    $dob_year = $_POST["dob_year"];
    $gender = $_POST['gender'];
    $Type_of_donation = $_POST['Type_of_donation'];
    
// Ajoutez ici d'autres champs et traitements selon votre formulaire

// Requête pour insérer les données
$sql = "INSERT INTO dons(N_P, address, city, dob_day, dob_month, dob_year, gender, Type_of_donation)
VALUES ('$N_P', '$address', '$city', '$dob_day', '$dob_month', '$dob_year', '$gender', '$Type_of_donation')";
// Modifiez "table_utilisateurs" pour correspondre au nom de votre table

// Exécuter la requête
if (mysqli_query($con, $sql)) {
    echo "Les informations ont été insérées avec succès.";
    if ($Type_of_donation == "le sang") {
                header("Location: page14.php");
                exit(); // Assurez-vous de terminer le script après la redirection
            }
 else if ($Type_of_donation == "Médicaments médicaux")  {
  header("Location: page15.php");
  exit();
   
}else if ($Type_of_donation == "paiement")  {
  header("Location: page16.php");
  exit();
   
}
}else{
  echo "Erreur lors de l'insertion des informations : " . mysqli_error($con);
}
    }

// Fermer la connexion à la base de données (facultatif si vous incluez déjà un script de fermeture de connexion dans connexion.php)
mysqli_close($con);
?>
       
    

    

   
    
    
      
    <h2> faire un don </h2>
    <form action=""method="POST">
      <h4>Veuillez saisir vos informations personnelles</h4>
      

      <div class="input-group">
        
        <div class="input-box">
          <input type="text" placeholder="nom et prenom"id="name_on_card" name="N_P" required class="name ">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
          </svg> 
  
        </div>
      </div>
     
      <div class="input-group">
        <div class="input-box">
          <input type="text" placeholder=" adresse" id="address" name="address"required class="name">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
          </svg>
  
        </div>
        
      </div>
      <div class="input-group">
        <div class="input-box">
          <input type="text" placeholder=" Ville"  id="city" name="city"required class="name">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon" viewBox="0 0 16 16">
            <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916zM12.375 6v7h-1.25V6zm-2.5 0v7h-1.25V6zm-2.5 0v7h-1.25V6zm-2.5 0v7h-1.25V6zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2M.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1z"/>
          </svg>
  
        </div>
        
      </div>
  
  
     
      <div class="input-group">
        <div class="input-box">
          <h4>date de naissance</h4>
          <input type="number" placeholder="JJ"  id="dob_day" name="dob_day"required class="dob">
          <input type="number" placeholder="MM"  id="dob_month" name="dob_month"required class="dob">
          <input type="number" placeholder="AAAA"  id="dob_year" name="dob_year"required class="dob">
        </div></div>
        <div class="input-group">
        <div class="select_1">
          <h4>Genre:</h4>
          <select class="select-box"name="gender">
            <option value=""required disabled selected>choisir une option</option>
            <option value="Homme" >Homme</option>
            <option value="Femme">Femme</option>
          </select>
          <div class="icon-select">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
          </div>
          
          
  
  
        
      </div></div>
      <div class="input-group">
        <div class="select_1">
          <h4>Type de don:</h4>
          <select class="select-box"required name="Type_of_donation">
            <option value=""required disabled selected>choisir une option</option>
            <option value="le sang">le sang</option>
            <option value="Médicaments médicaux">Médicaments médicaux</option>
            <option value="paiement">paiement</option>
            
          </select>
          <div class="icon-select">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
          </div>
          
          
  
  
        
      </div></div>
      
      <div class="input-group">
        <div class="input-box">
          <button type="submit1" >faire un don maintenant</button>
  
  
    </form>
    
  </div>
 
 
    </div>
    <button onclick="window.location.href='page1.html';" id="myButton1" class="blanc_bouton1">Accueil 
      
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16">
  <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707z"/>
  <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018"/>
</svg>
    </button>
    <a href='page11.php'><button class='btn'>RETOURNER</button>
  </section>


  
 
  </body>    
  </html>