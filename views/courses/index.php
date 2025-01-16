<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les Cours</title>
</head>
<body>
    <h1>Tous les Cours</h1>
    <a href="create.php">Créer un nouveau cours</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Vidéo</th>
                <th>Document</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course['id']; ?></td>
                    <td><?= htmlspecialchars($course['title']); ?></td>
                    <td><?= htmlspecialchars($course['description']); ?></td>
                    <td><?= htmlspecialchars($course['price']); ?> €</td>
                    <td>
                        <?php if (!empty($course['image_url'])): ?>
                            <img src="../uploads/<?= htmlspecialchars($course['image_url']); ?>" alt="Image du cours" width="100">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($course['video_url'])): ?>
                            <iframe src="../uploads/<?= htmlspecialchars($course['video_url']); ?>" 
            width="30" 
            height="40" 
            frameborder="0" 
            allowfullscreen>
        </iframe>                        <?php else: ?>
                            Pas de vidéo
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($course['document_url'])): ?>
                            <a href="../uploads/<?= htmlspecialchars($course['document_url']); ?>" target="_blank">Télécharger</a>
                        <?php else: ?>
                            Pas de document
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="show.php?id=<?= $course['id']; ?>">Voir</a>
                        <a href="edit.php?id=<?= $course['id']; ?>">Modifier</a>
                        <a href="delete.php?id=<?= $course['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
