<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Donateurs</title>
   <style>
     @import url('https://fonts.googleapis.com/css2?family=Angkor&family=Archivo:ital,wght@0,100..900;1,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap');
   body {
  font-family: Arial, sans-serif;
  background-color: #e180be;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  margin-top: 20px;
  font-family: "Kanit", sans-serif;
  color: whitesmoke;
}

#donor-list {
  width: 80%;
  margin: 20px auto;
  background-color: pink;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  border: 1px solid black;
  text-align: left;
  font-family: "Kanit", sans-serif;
}

th {
  background-color: white;
}
.btn{
    background-color:  #FFC0CB;
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
  top: 1%;
  left: 10%;
 }
 .btn:hover{
  background-color:pink;
  color: black;
}
.btn-selectionner {
 background-color:  #9370DB;
            border: none;
            color: white; /* Assurez-vous que la couleur est correcte */
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            position: fixed; /* Pour fixer la position en haut de la page */
            top: 20px; /* Ajuster la distance du haut de la page */
            left: 80%; /* Centrer horizontalement */
            
        }

        .btn-selectionner:hover {
            background-color:  #FFC0CB;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        

        
</style>
</head>
<body>
    <h1>Liste des Donateurs</h1>
    <div id="donor-list">
    <?php
     include("php/config.php");
     $sql = "SELECT N_P, address, city, dob_day, dob_month, dob_year, gender, Type_of_donation FROM dons";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nom & Prénom</th><th>Adresse</th><th>Ville</th><th>Date de Naissance</th><th>Sexe</th><th>Type de Don</th></tr>";
    // Afficher les données pour chaque ligne
    while($row = $result->fetch_assoc()) {
        $dob = $row["dob_day"] . "/" . $row["dob_month"] . "/" . $row["dob_year"];
        echo "<tr>";
        echo "<td>" . $row["N_P"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $dob . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["Type_of_donation"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun donateur trouvé.";
}


?>

    </div>
    <div class="custom-select-wrapper">
    
    <select class="btn-selectionner">
    <option value="">choisir une option</option>
    <option value="sang">Sang</option>
    <option value="medicament">Médicament</option>
    <option value="paiement">Paiement</option>
</select>

</div>
    <a href='page1.html'><button class='btn'>RETOURNER</button>
    <script >document.addEventListener('DOMContentLoaded', function() {
    var select = document.querySelector('.btn-selectionner');
    select.addEventListener('change', function() {
        var option = this.value;
        if (option === 'sang') {
            window.location.href = 'page22.php';
        } else if (option === 'medicament') {
            window.location.href = 'page21.php';
        } else if (option === 'paiement') {
            window.location.href = 'page23.php';
        }
    });
});</script>
</body>
</html>
