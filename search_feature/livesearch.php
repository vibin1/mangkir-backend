<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];

    $query = "SELECT * FROM resep WHERE judul LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>resepID</th>
                    <th>emailAuthor</th>
                    <th>judul</th>
                    <th>asalDaerah</th>
                    <th>porsi</th>
                    <th>durasi_menit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['resepID'];
                    $email = $row['emailAuthor'];
                    $judul = $row['judul'];
                    $asal = $row['asalDaerah'];
                    $porsi = $row['porsi'];
                    $durasi = $row['durasi_menit'];
                    ?>

                    <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $email?></td>
                        <td><?php echo $judul?></td>
                        <td><?php echo $asal?></td>
                        <td><?php echo $porsi?></td>
                        <td><?php echo $durasi?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}

?>