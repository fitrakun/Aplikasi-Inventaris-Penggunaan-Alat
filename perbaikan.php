<?php
    include "controller/config.php";
    $conn = connect_database();
    
    $namaalat = mysql_real_escape_string($_POST['namaalat2']);
    if(isset($_POST["cari"])) {
        $sql = "SELECT * FROM `perbaikan` NATURAL JOIN `teknisi` WHERE `tanggal_selesai_perbaikan` IS NOT NULL AND nama_alat = '.$namaalat.'";
    } else {
        $sql = "SELECT * FROM `perbaikan` NATURAL JOIN `teknisi`";
    }

    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AIPA</title>
        <meta name="description" content="Using for PPL task">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php require_once 'navigation_bar.php'?>
            </div>
            <div id="content">
                <div class="col-sm-3">
                    <h3><b>Form Perbaikan</b></h3>
                    <h4><b>Detail Alat</b></h4>
                    <form name ='form_perbaikan' action="controller/perbaikan.php" method = 'post'>
                        <h5>ID Alat</h5>
                        <input id="idalat" class="span4 form-control" type = 'text' name = 'id' placeholder = 'ID Alat'/><br/>

                        <h4><b>Detail Teknisi</b></h4>
                        <h5>Nama Institusi</h5>
                            <input id="institusi" class="span4 form-control" type = 'text' name = 'institusi' placeholder = "ex: Bengkel Wilhelm"/>
                        <h5>Nomor Telepon</h5>
                            <input id="telepon" class="span4 form-control" type = 'text' name = 'telepon' placeholder = 'ex: 089999999999'/>
                        <h5>Tanggal Mulai Perbaikan :</h5>
                            <input type="datetime-local" name="mulai_perbaikan" />
                        <h5>Estimasi Selesai Perbaikan :</h5>
                            <input type="datetime-local" name="estimasi" />
                        <br/>
                        <input class = 'button' id='button_post' type = 'submit' name='kirim' value='Kirim'/>
                    </form>
                </div>

               <div class="col-sm-11 list">
                    <h3><b>List Perbaikan</b></h3>
                    <div class="s-alat">
                        <form name ='form_peralatan' action="controller/perbaikan.php; ?>" method = 'post'>
                            <div class="form-group">
                                <label for="namaalat" class="span1">Nama Alat</label>
                                <div class="form-inline">
                                    <input id="namaalat2" class="span1 form-control" type = 'text' name = 'namaalat2' placeholder = 'Nama Alat'/>
                                    <input class='span1 btn btn-default' id='button_post' type='submit' name="cari" value="Cari"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID Alat</th>
                                <th>Nama Institusi</th>
                                <th>Nomor Telepon</th>
                                <th>Tanggal Perbaikan</th>
                                <th>Estimasi Pengembalian</th>
                                <th>Pengembalian</th>
                            </tr>
                        </thead>
                            <tbody> 
                                <?php 
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr> <td>" . $row["id_alat"] . "</td> <td>" . $row["nama_institusi"] . "</td> <td>" . $row["nomor_telepon"] . "</td> <td>" . $row ["tanggal_mulai_perbaikan"] . "</td></tr>" . "</td> <td>" . $row ["estimasi_selesai_perbaikan"] . "</td></tr>";
                                    }
                                }
                                ?>
                            </tbody>
                    </table>
                </div>

            </div>
        </div>
    </body>
</html>