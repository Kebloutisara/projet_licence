
    
    


<?php
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $age = htmlspecialchars($_POST['age']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $antecedents_familiaux = htmlspecialchars($_POST['antecedents_familiaux']);
    $tabagisme = htmlspecialchars($_POST['tabagisme']);
    $symptomes = htmlspecialchars($_POST['symptomes']);
    $date_rdv = htmlspecialchars($_POST['date_rdv']);
    $specialite_medecin = htmlspecialchars($_POST['specialite_medecin']);

    // Valider les données (par exemple, vérifier que l'âge est un nombre positif)
    if ($age <= 0) {
        echo "L'âge doit être un nombre positif.";
        exit;
    }

    // Insertion des données dans la base de données
    $sql = "INSERT INTO depistagecancer (nom, age, sexe, antecedents_familiaux, tabagisme, symptomes, date_rdv, specialite_medecin) VALUES ('$nom', $age, '$sexe', '$antecedents_familiaux', '$tabagisme', '$symptomes', '$date_rdv', '$specialite_medecin')";

    if ($con->query($sql) === TRUE) {
        echo "<div class='result'>";
        echo "<h2>Résultats du dépistage</h2>";
        echo "<p>Nom: $nom</p>";
        echo "<p>Âge: $age</p>";
        echo "<p>Sexe: $sexe</p>";
        echo "<p>Antécédents familiaux de cancer: $antecedents_familiaux</p>";
        echo "<p>Tabagisme: $tabagisme</p>";
        echo "<p>Symptômes: $symptomes</p>";
        echo "<p>Date de rendez-vous: $date_rdv</p>";
        echo "<p>Spécialité du médecin: $specialite_medecin</p>";

        // Ajouter des conseils en fonction des réponses
        if ($antecedents_familiaux == "oui" || $tabagisme == "oui" || !empty($symptomes)) {
            echo "<p><strong>REMARQUE:</strong> Nous vous enverrons un e-mail pour confirmer le lieu et l'heure!</p>";
        } else {
            echo "<p><strong>REMARQUE:</strong>Vos réponses ne semblent pas indiquer un risque élevé. Cependant, si vous avez des inquiétudes, nous vous enverrons un e-mail pour confirmer le lieu et l'heure!</p>";
        }
        echo "</div>";
    } else {
        echo "Erreur: " . $sql . "<br>" . $con->error;
    }
} else {
    // Récupérer les spécialités des médecins depuis la base de données
    $sql_specialites = "SELECT DISTINCT specialite FROM medecins";
    $result_specialites = $con->query($sql_specialites);

    // Récupérer les dates de rendez-vous disponibles depuis la base de données
    $sql_dates = "SELECT date FROM dates_rdv";
    $result_dates = $con->query($sql_dates);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Dépistage du Cancer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Angkor&family=Galada&family=Oswald&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ultra&family=Whisper&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Angkor&family=Jost:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Angkor&family=Archivo:ital,wght@0,100..900;1,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap');
        body {
            font-family: Arial, sans-serif;
            background-color: #9370DB;
            padding: 20px;
        }
        h1, h2 {
            color: #fff;
            font-family: "Kanit", sans-serif;
            text-align: center;

        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
            margin: auto;
            max-width: 400px; /* Maximum width for the form */
        }
        label {
            font-size: 16px; /* Font size for labels */
            color: #333; /* Text color for labels */
            margin-bottom: 5px; /* Space below each label */
            display: block; /* Make labels block elements */
            font-family: "Kanit", sans-serif;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 22px); 
            padding: 10px; 
            margin-bottom: 15px; 
            border: 2px solid #ccc; 
            border-radius: 5px; /* Rounded corners for input fields */
            box-sizing: border-box; /* Include padding and border in width calculation */
            font-size: 16px; /* Font size for input text */
            color: #333; /* Text color inside input fields */
            transition: border-color 0.3s ease-in-out; /* Smooth transition for border color */

        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #FFC0CB; /* Border color on focus */
            outline: none; /* Remove default outline */
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6); /* Blue shadow on focus */
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color:  #9370DB;
            color: white;
            padding: 10px 30px;
            border: 1px solid #fff;
           
            cursor: pointer;
            margin-top: 20px;
           
            transition:0.5s ;
            border-radius: 20px;
            font-weight: bold;


            
        }
        input[type="submit"]:hover {
            background-color:pink;
            color: black;
        }
        .result {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin: 20px auto;
    max-width: 600px;
    background-color: #f9f9f9;
}

.result h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #9370DB;
}

.result p {
    margin-bottom: 5px;
    font-family: "Archivo", sans-serif;
}
        
.result strong{
    margin-bottom: 5px;
    font-family: "Archivo", sans-serif;
    color: red;

}

        select {
            background-color: #FFC0CB; /* Light pink background */
            color: #333; /* Text color inside select */
            font-family:"Poppins", sans-serif;
            font-size: 16px; /* Adjust font size */
            padding: 10px; /* Padding inside select box */
            border: 2px solid #FF69B4; /* Darker pink border */
            border-radius: 5px; /* Rounded corners */
            outline: none; /* Remove default outline */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            transition: border-color 0.3s ease-in-out; /* Smooth transition for border */
        }

        select:focus {
            border-color: #fff; /* Change border color on focus */
        }
        input[type="radio"] {
    display: none; /* Masquer les boutons radio */
}

/* Afficher les boutons personnalisés */
input[type="radio"] + label {
    display: inline-block;
    cursor: pointer;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

/* Styling pour le bouton sélectionné */
input[type="radio"]:checked + label {
    background-color: #FFC0CB;
    color: #fff;
}
textarea {
    width: 100%;
    height: 100px; 
    padding: 5px; /* Marge intérieure pour un peu d'espace */
    border: 1px solid #ccc; /* Bordure grise */
    border-radius: 5px; /* Coins arrondis */
    resize: vertical; /* Permet à l'utilisateur de redimensionner verticalement */
}

textarea:focus {
    outline: none; /* Supprimer la bordure de focus par défaut */
    border-color: #FFC0CB; /* Changement de couleur de bordure lorsqu'il est sélectionné */
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
  top: 10%;
  left: 10%;
 }
 .btn:hover{
  background-color:pink;
  color: black;
}

      
    </style>
</head>
<body>
    
    <?php if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>
        <h1>Formulaire de Dépistage du Cancer</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom"  class="nom" name="nom" required>

        <label for="age">Âge:</label>
        <input type="number" id="age"  class="nom" name="age" required>
       
       
            
        <label for="sexe" >Sexe:</label>
        <select id="sexe" name="sexe" required>
        <option value=""required disabled selected>choisir une option</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
           
        </select> 
       
         

        <label for="antecedents_familiaux">Antécédents familiaux de cancer:</label>
        <input type="radio" id="antecedents_familiaux_oui" name="antecedents_familiaux" value="oui" required>
        <label for="antecedents_familiaux_oui">Oui</label>
        <input type="radio" id="antecedents_familiaux_non" name="antecedents_familiaux" value="non">
        <label for="antecedents_familiaux_non">Non</label>

        <label for="tabagisme">Tabagisme:</label>
        <input type="radio" id="tabagisme_oui" name="tabagisme" value="oui" required>
        <label for="tabagisme_oui">Oui</label>
        <input type="radio" id="tabagisme_non" name="tabagisme" value="non">
        <label for="tabagisme_non">Non</label>

        <label for="symptomes">Symptômes:</label>
        <textarea id="symptomes" name="symptomes" ></textarea>

        <label for="date_rdv">Date de rendez-vous:</label>
        <select id="date_rdv" name="date_rdv" required>
        <option value=""required disabled selected>choisir une option</option>
            <?php
            if ($result_dates->num_rows > 0) {
                while($row = $result_dates->fetch_assoc()) {
                    echo "<option value='" . $row["date"] . "'>" . $row["date"] . "</option>";
                }
            } else {
                echo "<option value=''>Aucune date disponible</option>";
            }
            ?>
        </select>

        <label for="specialite_medecin">Spécialité du médecin:</label>
        <select id="specialite_medecin" name="specialite_medecin" required>
        <option value=""required disabled selected>choisir une option</option>
            <?php
            if ($result_specialites->num_rows > 0) {
                while($row = $result_specialites->fetch_assoc()) {
                    echo "<option value='" . $row['specialite'] . "'>" . $row['specialite'] . "</option>";
                }
            } else {
                echo "<option value=''>Aucune spécialité disponible</option>";
            }
            ?>
        </select>
        <input type="submit"  class="" value="Soumettre">
        
        
    </form>

    <?php } ?>
    

</body>
</html>