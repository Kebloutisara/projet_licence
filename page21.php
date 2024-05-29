<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Donateurs de Médicaments</title>
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

   </style>
</head>
<body>
    <h1>Liste des Donateurs de Médicaments</h1>
    <div id="donor-list">
    <?php
    include("php/config.php");
    $sql = "SELECT N_P, nom_medicament, methode_livraison, quantite, date_expiration FROM donneursmedicaments";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nom & Prénom</th><th>Nom du Médicament</th><th>Méthode de Livraison</th><th>Quantité</th><th>Date d'Expiration</th></tr>";
    // Afficher les données pour chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["N_P"] . "</td>";
        echo "<td>" . $row["nom_medicament"] . "</td>";
        echo "<td>" . $row["methode_livraison"] . "</td>";
        echo "<td>" . $row["quantite"] . "</td>";
        echo "<td>" . $row["date_expiration"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun donateur de médicaments trouvé.";
}


$con->close();
?>
    </div>
    <a href='page19.php'><button class='btn'>RETOURNER</button>
</body>
</html>
