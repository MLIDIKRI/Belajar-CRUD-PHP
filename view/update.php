<!-- Header -->
<?php include "../header.php"; ?>

<?php
// Memeriksa apakah 'user_id' tersedia dalam URL
if (isset($_GET['user_id'])) {
    $userid = $_GET['user_id'];

    // Query SQL untuk memilih data pengguna berdasarkan ID
    $query = "SELECT * FROM users WHERE ID = $userid";
    $view_users = mysqli_query($conn, $query);

    // Memeriksa apakah data pengguna ditemukan
    if ($row = mysqli_fetch_assoc($view_users)) {
        $id = $row['ID'];
        $user = $row['username'];
        $email = $row['email'];
        $pass = $row['pasword'];
    } else {
        echo "<script type='text/javascript'>alert('User not found!');</script>";
        echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
        exit;
    }
}

// Memproses data saat form disubmit
if (isset($_POST['update'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass']; // Memperbaiki typo 'pasword' menjadi 'pass'

    // Query SQL untuk memperbarui data pengguna
    $query = "UPDATE users SET username = '{$user}', email = '{$email}', pasword = '{$pass}' WHERE ID = $userid";
    $update_user = mysqli_query($conn, $query);

    // Menampilkan pesan sukses
    if ($update_user) {
        echo "<script type='text/javascript'>alert('User data updated successfully!');</script>";
        echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
?>

<h1 class="text-center">Update User Details</h1>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="user">Username</label>
            <input type="text" name="user" class="form-control" value="<?php echo htmlspecialchars($user); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" class="form-control" value="<?php echo htmlspecialchars($pass); ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" name="update" class="btn btn-primary mt-2" value="Update">
        </div>
    </form>
</div>

<!-- Tombol Kembali ke Halaman Utama -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
