<?php

require('../controllers/TaskController.php');
require('../controllers/UserController.php');

$taskController = new TaskController();
$userController = new UserController();
$tasks = $taskController->display();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['title']; ?></td>
                    <td><?= $task['description']; ?></td>
                    <td><?= $task['status']; ?></td>
                    <td>
                        <button onclick="<? $taskController->update($task['id'])?>">Modifier</button>
                        <button onclick="<? $taskController->delete($task['id'])?>">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button onclick="<? $taskController->create()?>">Créer une tâche</button>
    <button onclick="<? $userController->logout()?>">Se déconnecter</button>
</body>
</html>

