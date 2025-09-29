<?php
function listAllMember(PDO $pdo): void
{
    try {
        $sql  = "SELECT id, lastname, firstname, email, city FROM member";
        $stmt = $pdo->query($sql);

        echo "<h1>Liste des membres</h1>";
        echo "<table border='1' cellpadding='6' cellspacing='0'>";
        echo "<tr>
                <th>Id</th><th>Nom</th><th>Prénom</th><th>E-mail</th><th>Ville</th><th>Actions</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['city']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Modifier</a> |
                        <a href='delete.php?id={$row['id']}'>Supprimer</a>
                    </td>
                  </tr>";
        }

        echo "</table>";
        $stmt->closeCursor();

        echo "<p><a href='index.php'>Retour à l'insertion</a></p>";
    } catch (PDOException $e) {
        echo "Erreur lors de la sélection : " . $e->getMessage();
    }
}

