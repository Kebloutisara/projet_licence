<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planification d'Événements</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        
        header {
            background-color: #da6fa1;
            color: white;
            padding: 1em 0;
            text-align: center;
            position: relative;
        }
        
        header .logo {
            width: 100px;
            margin-top: 10px;
        }
        
        header img {
            position: absolute;
            left: 20px;
            top: 10px;
        }
        
        h1, h2 {
            margin-top: 0;
        }
        
        main {
            padding: 20px;
        }
        
        .events-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .events-table, .events-table th, .events-table td {
            border: 1px solid #ddd;
        }
        
        .events-table th, .events-table td {
            padding: 12px;
            text-align: left;
        }
        
        .events-table th {
            background-color: #c05084;
            color: white;
        }
        
        .responsive-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
        }
        
        footer {
            background-color: #4e1447;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        
        footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        footer .footer-section {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }
        
        footer .footer-section h4 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #f399d5;
        }
        
        footer .footer-section p, footer .footer-section a {
            margin-bottom: 5px;
            color: #ddd;
            text-decoration: none;
        }
        
        footer .footer-section a:hover {
            color: #fff;
            text-decoration: underline;
        }
        
        form {
            background-color: white;
            padding: 20px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        
        form label {
            display: block;
            margin: 10px 0 5px;
        }
        
        form input[type="text"],
        form input[type="email"],
        form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        form input[type="submit"] {
            background-color: #c05084;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 400px;
        }
        
        form input[type="submit"]:hover {
            background-color: #a04070;
        }
        
        .event-button {
            background-color: #c05084;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 400px;
            margin-top: 10px;
        }
        
        .event-button:hover {
            background-color: #a04070;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <img src="https://img.icons8.com/clouds/100/hospital.png" alt="Logo de l'hôpital" class="logo">
        <h1>Planification d'Événements</h1>
    </header>
    <main>
        <section>
            <?php
           
           include("php/config.php");
            // Vérifier si le formulaire est soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Récupérer les données du formulaire
                $name = $_POST['name'];
                $event = $_POST['event'];
    
                // Préparer et exécuter la requête d'insertion
                $sql = "INSERT INTO inscriptions_even (nom, evenement) VALUES (?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ss", $name, $event);
    
                if ($stmt->execute()) {
                    if ($stmt->execute()) {
                        echo "<div class='message success'>Nouvel enregistrement créé avec succès</div>";
                    } else {
                        echo "<div class='message error'>Erreur : " . $sql . "<br>" . $conn->error . "</div>";
                    }
    
                // Fermer la déclaration
                $stmt->close();
            }
        }
    
            // Fermer la connexion
            $con->close();
            ?>
<form action="" method="post">
    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="event">Événement:</label>
    <select id="event" name="event" required>
        <option value="journée de la femme">journée de la femme</option>
        <option value="jour dédié aux cancers des enfants">jour dédié aux cancers des enfants</option>
        <option value="Journée mondiale des grands-parents">La Journée mondiale des grands-parents</option>
    </select>
    <input type="submit" value="Envoyer">
</form>
<a href='page11.php'><button class='btn1'>RETOURNER</button>
</section>
</main>

<footer>
    <div class="container">
        <div class="footer-section">
            <h4>Contactez-nous</h4>
            <p>Email: <a href="Amiscancer.com">Amiscancer.com</a></p>
            <p>Téléphone: <a href="tel:+213 67 89 90 54 6">+213 67 89 90 54 6</a></p>
        </div>
        <div class="footer-section">
            <h4>Adresse</h4>
            <p>38 Rue SIDI Achour</p>
            <p>23 Annaba, Algerie</p>
        </div>
        <div class="footer-section">
            <h4>Suivez-nous</h4>
            <a href="https://www.facebook.com" target="_blank">Facebook</a><br>
            <a href="https://www.twitter.com" target="_blank">Twitter</a><br>
            <a href="https://www.linkedin.com" target="_blank">LinkedIn</a>
        </div>
    </div>
</footer>
</body>
</html>