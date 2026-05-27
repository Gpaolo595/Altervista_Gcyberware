<h2>Modifica Utente</h2>

<form method="POST">
    Username: <b><?= $user['username'] ?></b><br><br>

    Ruolo:
    <select name="role">
        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
        <option value="operator" <?= $user['role'] === 'operator' ? 'selected' : '' ?>>Operator</option>
        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
    </select>
    <br><br>

    <button type="submit">Aggiorna</button>
</form>
