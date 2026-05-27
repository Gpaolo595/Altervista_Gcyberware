<h2>Gestione Utenti</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Ruolo</th>
        <th>Azioni</th>
    </tr>

    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['username'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['role'] ?></td>
            <td>
                <a href="/Gcyberware/public/admin_edit_user.php?id=<?= $u['id'] ?>">✏️ Modifica</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
