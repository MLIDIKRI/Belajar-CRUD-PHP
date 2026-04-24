<!-- Header -->
<?php include "../header.php"; ?>

<?php
// Memeriksa apakah tombol "create" diklik
if (isset($_POST['create'])) {
    // Mendapatkan data dari form
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query SQL untuk memasukkan data pengguna ke tabel 'users'
    $query = "INSERT INTO users(username, email, pasword) VALUES('{$user}', '{$email}', '{$pass}')";
    $add_user = mysqli_query($conn, $query);

    // Menampilkan pesan jika query berhasil atau gagal
    if (!$add_user) {
        echo "Something went wrong: " . mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('User added successfully!');</script>";
    }
}
?>

<h1 class="text-center">Add User Details</h1>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email ID</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Submit">
        </div>
    </form>
</div>

<!-- Tombol Kembali -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>