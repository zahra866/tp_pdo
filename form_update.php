<?php
function displayInfoMember() {
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        echo "<p>Paramètre id manquant.</p>";
        echo "<p><a href='liste.php'>Retour à la liste</a></p>";
        return;
    }

    $id = (int) $_GET['id'];

    $db = new Database();
    $pdo = $db->connexion();

    $sql = $db->selectMemberId();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $member = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    if (!$member) {
        echo "<p>Membre introuvable.</p>";
        echo "<p><a href='liste.php'>Retour à la liste</a></p>";
        return;
    }

    echo '<h1>Modifier le membre #'.$member['id'].'</h1>';
    echo '<form action="update.php?id='.$member['id'].'" method="post">
            <label>Nom : <input type="text" name="lastname" value="'.htmlspecialchars($member['lastname']).'" required></label><br>
            <label>Prénom : <input type="text" name="firstname" value="'.htmlspecialchars($member['firstname']).'" required></label><br>
            <label>E-mail : <input type="text" name="email" value="'.htmlspecialchars($member['email']).'" required></label><br>
            <label>Ville : <input type="text" name="city" value="'.htmlspecialchars($member['city']).'" required></label><br>
            <input type="submit" name="update" value="Mettre à jour">
          </form>
          <p><a href="liste.php">Retour à la liste</a></p>';
}
