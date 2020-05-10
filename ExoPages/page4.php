<!DOCTYPE html>
<html>
<head>
    
    <title>Document</title>
</head>
    <body>
        <form action="Untitled-4a.php" method="post">
        <label for="">Matricule</label> 
        <input type="text" name="Matricule" class="color"/><br><br>

        <label for="">Nom</label>
        <input type="text" name="Nom" class="color"/><br><br>
    
        <label for="">Prenom</label>
        <input type="text" name="Prenom" /><br><br>
   
        <label for="">Sexe</label>
        <input type="radio" name="Sexe" value="Masculin" /> Masculin
        <input type="radio" name="Sexe" value="Feminin" /> Feminin 
        <br />
        <br />
    
        <label for="">Adresse</label>
        <textarea name="Adresse" id="" cols="25" rows="2"></textarea><br>
    
        <label for="">Service</label>
        <select name="Service" class="Service">
        <option value="Choix 1">Choisir  </option>
        <option value="Choix 2">Choix 2  </option>
        <option value="Choix 3">Choix 3  </option>
        </select><br><br>

        <label for="">Fonction</label>
        <select name="Fonction">
        <option value="Fonction 1">Choisir</option>
        <option value="Fonction 2">Fonction</option>
        <option value="Fonction 3">Fonction</option>
        </select><br><br>

    
        <input type="submit" value="Valider" />
        <input type="submit" value="Reinitialiser" />
        </form>
        <style>
        label {
        width: 80px;
        display: inline-block;
        vertical-align: top;
        margin: 6px;
      }
      input{
            width: 100px;
            padding: 2px;
            height: auto;
      }
        .color{background-color: pink;}
        </style>
    </body>
</html>