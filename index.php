<?php
$nilai = null;
$predikat = null;
$lulus = null;

if (isset($_POST['confirmation'])) {
    if (isset($_POST['nilai'])) {
        // ketentuan kelulusan =
        // lulus = 50 - 100
        // gagal = 0  - 50

        // ketentuan predikat nilai = 
        // a = 90 - 100
        // b = 75 - 89
        // c = 50 - 74
        // d = 25 - 49
        // e = 0  - 24

        $nilai = (int) $_POST['nilai'];
        if ($nilai == 0) {
            $predikat = ucwords('e');
            $lulus = ucwords('gagal');
        } else {
            switch ($nilai) {
                case ($nilai >= 90 && $nilai <= 100):
                    $predikat = ucwords('a');
                    $lulus = ucwords('lulus');
                    break;
                case ($nilai >= 75 && $nilai < 90):
                    $predikat = ucwords('b');
                    $lulus = ucwords('lulus');
                    break;
                case ($nilai >= 50 && $nilai < 75):
                    $predikat = ucwords('c');
                    $lulus = ucwords('lulus');
                    break;
                case ($nilai >= 25 && $nilai < 50):
                    $predikat = ucwords('d');
                    $lulus = ucwords('gagal');
                    break;
                case ($nilai > 0 && $nilai < 25):
                    $predikat = ucwords('e');
                    $lulus = ucwords('gagal');
                    break;

                default:
                    return abort('401', 'error to write nilai');
                    break;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Predikat dan Penentuan Nilai</title>
</head>

<body>
    <?php
    if ($predikat != null && $lulus != null) { ?>
        <h3>your nilai <?= $nilai ?> is <?= $lulus ?> with predikat <?= $predikat ?>.</h3>
        <br>
    <?php
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="number" name="nilai" value="<?= ($nilai == null) ? '' : $nilai ?>">
        <input type="submit" name="confirmation" value="hitung">
    </form>
</body>

</html>