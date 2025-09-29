<?php /* Formulaire d'ajout d'un membre */ ?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Insertion membre</title></head>
<body>
    <h1>Ajouter un membre</h1>
    <form action="member/insert.php" method="post">
        <label>Nom : <input type="text" name="lastname" required></label><br>
        <label>Prénom : <input type="text" name="firstname" required></label><br>
        <label>E-mail : <input type="text" name="email" required></label><br>
        <label>Ville : <input type="text" name="city" required></label><br>
        <input type="submit" name="form_insert" value="Insérer">
    </form>

    <p><a href="liste.php">Voir la liste des membres</a></p>
</body>
</html>

