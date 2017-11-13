<!DOCTYPE html>

<!-- script untuk menghitung beerat badan ideal
develop by laptop asus -->

<html>
<head>
  <title>Hitung BB Idealmu !!</title>
  <link rel="stylesheet" type="text/css" href="style.css"> <!-- memasukkan css -->
</head>
<body>
  <?php 
error_reporting(0); //jika ada erer maka tidak akan ditampilkan//
  if(isset($_POST['hitung'])){
    //Inisialisasi variabel berdasarkan idnya//
    $tinggi = $_POST['tinggi'];
    $bb_skrng = $_POST['bb_now'];
    $gender = $_POST['jenis_kelamin'];
    $usia_hamil=$_POST['usia_hamil'];

    //percabangan ketika user memilih bendasarkan combobox yg tersedia//
    switch ($gender) {
      case 'laki':
        $hasil =($tinggi-100)-(($tinggi-100)*0.1);
      break;
      case 'perempuan':
            $kondisi=$_POST['hamil'];
            $bbhamil=($tinggi-100)-(($tinggi-100)*0.15);
            switch ($kondisi) {
              case 'hamil':
                  $hasil=$bbhamil+($usia_hamil*0.35);

                break;
              
              case 'tidak':
                  $hasil=$bbhamil;
                break;
            }
      break;
    }

    //perhitungan terahir//
    if($bb_skrng>=$hasil){
      $diet=$bb_skrng-$hasil;  
    }else{
      $diet=$hasil-$bb_skrng;
    }
    
  }
  ?>
  <div class="kalkulator_bb">
    <h2 class="judul">Hitung Berat Badan Ideal</h2>
    <form method="post" action="">     
      <input type="text" name="tinggi" class="bil" autocomplete="off" placeholder="Tinggi Badan (cm)">
      <input type="text" name="bb_now" class="bil" autocomplete="off" placeholder="Berat Bada Sekarang (Kg)">


      <select class="bil" name="jenis_kelamin">
        <option value="kosong">Jenis Kelamin</option>
        <option value="laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
      </select>

      <select class="bil" name="hamil">
        <option>Hamil (Yes/No)?</option>
        <option value="hamil">Yes</option>
        <option value="tidak">No</option>
      </select>

       <input type="text" name="usia_hamil" class="bil" autocomplete="off" placeholder="Usia Kehamilan dalam Minggu">


      <input type="submit" name="hitung" value="Hitung" class="tombol">                     
    </form>

    <!-- penentuan berad badannya ideal atau tidak -->

    <?php if(isset($_POST['hitung'])){ ?>
      <p class="brand"> Berat Badan Ideal</p>
      <input type="text" value="<?php echo $hasil." Kg"; ?>" class="bil">
      <?php if ($bb_skrng>=$hasil) {?>
      <p class="brand">Anda Harus Mengurangi Berat Badan Sebanyak</p>
      <input type="text" value="<?php echo $diet." Kg"; ?>" class="bil">
      <?php } else{ ?>
      <p class="brand">Anda Harus Menambah Berat Badan Sebanyak</p>
      <input type="text" value="<?php echo $diet." Kg"; ?>" class="bil">
      <?php } ?>
    <?php }else{ ?>
      <!-- <input type="text" class="bil"> -->
    <?php } ?>      
  </div>
</body>
</html>
