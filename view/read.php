<!-- Header -->
<?php include '../header.php'; ?>

<h1 class="text-center">User Details</h1>

<div class="container">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Memeriksa apakah 'user_id' tersedia dalam URL menggunakan 'isset()'
            if (isset($_GET['user_id'])) {
                // Mendapatkan nilai 'user_id' dari URL
                $userid = $_GET['user_id'];

                // Query SQL untuk mengambil data pengguna berdasarkan ID
                $query = "SELECT * FROM users WHERE ID = {$userid}";
                $view_users = mysqli_query($conn, $query);

                // Menampilkan data pengguna jika query berhasil
                while ($row = mysqli_fetch_assoc($view_users)) {
                    $id = $row['ID'];
                    $user = $row['username'];
                    $email = $row['email'];
                    $pass = $row['pasword'];

                    echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$user}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$pass}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Tombol Kembali ke Halaman Sebelumnya -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include '../footer.php'; ?>
