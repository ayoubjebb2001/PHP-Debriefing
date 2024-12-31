<?php include __DIR__ . '/../layouts/header.php'; ?>
<?php include __DIR__ . '/../../database/connection.php'; ?>
<?php
if (!isset($_SESSION['auth_user'])) {
    header('Location: ../auth/login.php');
}
?>
<h2>Admin Dashboard</h2>


<!-- Add User Button -->
<a href="./users/add.php" class="btn btn-primary mb-3">Add User</a>


<!-- TODO: Display a table of users with options to edit or delete -->
<!-- Use Bootstrap table classes -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php
        // TODO: Fetch and display users in the table
        $sql = "SELECT *,users.id as user_id,role.name as role FROM users JOIN role on users.role_id = role.id";
        $result = mysqli_query($conn, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($users as $user): ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['fullname'] ?></td>
                <td> <?= $user['role'] ?></td>
                <!-- // TODO: Add edit and delete links with appropriate href values -->
                <td>
                    <a href='./users/edit.php?id=<?= $user['user_id']; ?>' class='btn btn-warning'>Edit</a>
                    <a href='./users/delete.php?id=<?= $user['user_id']; ?>' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include __DIR__ . '/../layouts/footer.php';
?>