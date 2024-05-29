<?php

include("php/config.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = mysqli_real_escape_string($con, $_POST['nom_utilisateur']);
    $commentaire = mysqli_real_escape_string($con, $_POST['commentaire']);

    if (!empty($nom_utilisateur) && !empty($commentaire)) {
        $query = "INSERT INTO commentaires (nom_utilisateur, commentaire) VALUES ('$nom_utilisateur', '$commentaire')";
        mysqli_query($con, $query);

        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}


if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = "DELETE FROM commentaires WHERE id = $delete_id";
    mysqli_query($con, $delete_query);
   
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Commentaires</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Angkor&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Angkor&family=Galada&family=Oswald&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ultra&family=Whisper&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Angkor&family=Jost:ital,wght@0,100..900;1,100..900&family=Poetsen+One&display=swap');
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #9370DB;
        }
        h1{
            font-size: 2.2rem;
           font-weight: 500;
           text-align: center;
  
               color: #f2f2f4;
            padding: 10px 20px;
         font-family: "Angkor", serif;
        }
        .comment-box {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            

  
        }
        .comment-box:hover{
            transform: translateY(-10px);
  transition: all ease 0.3s;
            
        }
        .comment-box h4 {
            margin: 0 0 10px;
        }
        .comment-box p {
            margin: 0;
        }
        .delete-btn {
            background-color:   #DC143C;
    border: 1px solid #fff;
    border-radius: 20px;
    font-size: 15px;
    width: 10%;
    color:black;
    padding: 10px 30px;
    transition:0.5s ;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
        }
        /* Styles pour le formulaire de commentaire */
form {
    background-color:  #eaa0c5;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #fff;
    border-radius: 4px;
    box-sizing: border-box; /* Garantit que la largeur inclut le padding et la bordure */
}

textarea {
    height: 100px; /* Hauteur du textarea */
}

.blanc_bouton1{
    background-color:   #9370DB;
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
   

  }
  .blanc_bouton1:hover{
    background-color:pink;
    color: black;
  }

/* Facultatif : style pour les erreurs de validation */
input:invalid,
textarea:invalid {
    border-color: #fff;
}

/* Facultatif : style pour les messages d'erreur */
input:invalid + span::after,
textarea:invalid + span::after {
    content: '⚠ Champ requis';
    display: block;
    color: #fff;
    font-size: 12px;
    margin-top: 5px;
}
h2{
    font-size: 1.4rem;
  color: #000;
  font-weight: 800;
  text-transform: uppercase;
  line-height: 2.4rem;
  font-family:"Poppins", sans-serif;
}
h4{
    font-size: 1.0rem;
  color: #000;
  font-weight: 800;
  text-transform: uppercase;
  line-height: 2.4rem;
  font-family:"Poppins", sans-serif;
}
p{
 font-family: "Poetsen One", sans-serif;
  font-weight: 200;
  font-style: normal;
  text-transform: uppercase;
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
 

}
.btn:hover{
  background-color:pink;
  color: black;
}

    </style>
</head>
<body>


<h1>Laissez un commentaire</h1>

<form action="" method="POST">
    <input type="text" name="nom_utilisateur" placeholder="Votre nom" required>
    <br><br>
    <textarea name="commentaire" placeholder="Votre commentaire" required></textarea>
    <br><br>
    <button class="blanc_bouton1" type="submit">Envoyer</button>
</form>


<h2>Commentaires :</h2>

<?php
$query = "SELECT * FROM commentaires ORDER BY date_creation DESC";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='comment-box'>";
    echo "<h4>" . htmlspecialchars($row['nom_utilisateur']) . "</h4>";
    echo "<p>" . htmlspecialchars($row['commentaire']) . "</p>";
    echo "<small>Posté le " . date('d/m/Y H:i:s', strtotime($row['date_creation'])) . "</small>";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?delete=" . $row['id'] . "' class='delete-btn'>Supprimer</a>";
    echo "</div>";
}
?>
<a href='page11.php'><button class='btn'>RETOURNER</button>

</body>
</html>
