<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: page9.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Accueil</title>
    <style> @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        body{
            background: #e180be;
        }
                .container{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
        }
        .box{
            background: #fdfdfd;
            display: flex;
            flex-direction: column;
            padding: 25px 25px;
            border-radius: 20px;
            box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                        0 32px 64px -48px rgba(0,0,0,0.5);
        }
        .form-box{
            width: 450px;
            margin: 0px 10px;
        }
        .form-box header{
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
            margin-bottom: 10px;
        }
        .form-box form .field{
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;
        
        }
        .form-box form .input input{
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }
        .btn{
            height: 35px;
            background: rgba(76,68,182,0.808);
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
        }
        .btn:hover{
            opacity: 0.82;
        }
        .submit{
            width: 100%;
        }
        .links{
            margin-bottom: 15px;
        
        }
        .show-password-btn {
                    cursor: pointer;
                    width: 200px;
                    margin-left: 10px;
                    height: 35px;
            background: rgba(76,68,182,0.808);
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
                }
                .show-password-btn:hover{
            opacity: 0.82;
        }
        

        
        .nav{
    background: #fff;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    line-height: 60px;
    z-index: 100;
}
.logo{
    font-size: 25px;
    font-weight: 900;
    
}
.logo a{
    text-decoration: none;
    color: #000;
}
.right-links a{
    padding: 0 10px;
}
main{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 60px;
}
.main-box{
    display: flex;
    flex-direction: column;
    width: 70%;
}
.main-box .top{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.bottom{
    width: 100%;
    margin-top: 20px;
}
@media only screen and (max-width:840px){
    .main-box .top{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .top .box{
        margin: 10px 10px;
    }
    .bottom{
        margin-top: 0;
    }
}
.message{
    text-align: center;
    background: #f9eded;
    padding: 15px 0px;
    border:1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color: red;
}
.blanc_bouton{
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
    top: 80%;
    left: 70%;
   

  }
  .blanc_bouton:hover{
    background-color:pink;
    color: black;
  }
  .blanc_bouton2{
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
  top: 80%;
  left: 10%;
 

}
.blanc_bouton2:hover{
  background-color:pink;
  color: black;
}
.blanc_bouton3{
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
  top: 80%;
  left: 40%;
 

}
.blanc_bouton3:hover{
  background-color:pink;
  color: black;
}
.blanc_bouton4{
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
  top: 65%;
  left: 38%;
 

}
.blanc_bouton4:hover{
  background-color:pink;
  color: black;
}

    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="page11.php">Bienvenue</a> </p>
        </div>

        <div class="right-links">
        <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM utilisateurs WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='page12.php?Id=$res_id'>Change de profil</a>";
            ?>
            <a href="php/logout.php"> <button class="btn">Se déconnecter</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Bonjour <b><?php echo $res_Uname ?></b>, Bienvenue</p>
            </div>
            <div class="box">
                <p>Votre email est <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>Et tu es <b><?php echo $res_Age ?> ans</b>.</p> 
            </div>
          </div>
       </div>
        
</div>

    </main>
    <button id="myButton" class="blanc_bouton">faire un don 
      
      <img width="30" height="30" color =#fff   src="https://img.icons8.com/ios/50/get-cash--v1.png" alt="get-cash--v1"/>
    </button>
   

        <button id="myButton2" class="blanc_bouton2">COMMENTER
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-dots" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
            <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
          </svg>
      </button>
      <button id="myButton3" class="blanc_bouton3">FAIRE UN DEPISTAGE
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-heart-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.058.501a.5.5 0 0 0-.5-.501h-2.98c-.276 0-.5.225-.5.501A.5.5 0 0 1 5.582 1a.497.497 0 0 0-.497.497V2a.5.5 0 0 0 .5.5h4.968a.5.5 0 0 0 .5-.5v-.503A.497.497 0 0 0 10.555 1a.5.5 0 0 1-.497-.499"/>
  <path fill-rule="evenodd" d="M4.174 1h-.57a1.5 1.5 0 0 0-1.5 1.5v12a1.5 1.5 0 0 0 1.5 1.5h9a1.5 1.5 0 0 0 1.5-1.5v-12a1.5 1.5 0 0 0-1.5-1.5h-.642q.084.236.085.5V2c0 .828-.668 1.5-1.492 1.5H5.581A1.496 1.496 0 0 1 4.09 2v-.5q.001-.264.085-.5Zm3.894 5.482c1.656-1.673 5.795 1.254 0 5.018-5.795-3.764-1.656-6.69 0-5.018"/>
    </svg>
      </button>
      <button id="myButton4" class="blanc_bouton4">Participer à l'événement
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-heart" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm2 .5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V4a.5.5 0 0 0-.5-.5zm5 4.493c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
</svg>
      </button>
        
        
    
    <script >
        document.getElementById("myButton").addEventListener("click", function() {
    window.location.href = "page7.php"; 
});

    </script>
     <script >
        document.getElementById("myButton2").addEventListener("click", function() {
    window.location.href = "page17.php"; 
});
document.getElementById("myButton3").addEventListener("click", function() {
    window.location.href = "page18.php"; 
});
document.getElementById("myButton4").addEventListener("click", function() {
    window.location.href = "participer.php"; 
});

    </script>
</body>
</html>