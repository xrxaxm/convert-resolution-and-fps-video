<?php

// U can Run in termux

// Install php & ffmpeg

// Ram - Ingin memilikinya 馃ズ馃槩

// www.xrxaxm.com

// Minta input nama file, resolusi awal, dan resolusi akhir

echo "Masukkan nama file (dengan ekstensi): ";

$nama_file = trim(fgets(STDIN));

$resolusi_awal = "";

echo "Pilih resolusi awal:\n";

echo "1. 240p\n";

echo "2. 360p\n";

echo "3. 480p\n";

echo "4. 720p\n";

echo "5. 1080p\n";

echo "Masukkan nomor pilihan (1-5): ";

$pilihan_resolusi = trim(fgets(STDIN));

switch ($pilihan_resolusi) {

  case 1:

    $resolusi_awal = "426x240";

    break;

  case 2:

    $resolusi_awal = "640x360";

    break;

  case 3:

    $resolusi_awal = "854x480";

    break;

  case 4:

    $resolusi_awal = "1280x720";

    break;

  case 5:

    $resolusi_awal = "1920x1080";

    break;

  default:

    echo "Pilihan tidak valid.\n";

    exit;

}

$resolusi_akhir = "";

echo "Pilih resolusi akhir:\n";

echo "1. 360p\n";

echo "2. 480p\n";

echo "3. 720p\n";

echo "4. 1080p\n";

echo "5. Lebih tinggi\n";

echo "Masukkan nomor pilihan (1-4): ";

$pilihan_resolusi = trim(fgets(STDIN));

switch ($pilihan_resolusi) {

  case 1:

    $resolusi_akhir = "640x360";

    break;

  case 2:

    $resolusi_akhir = "854x480";

    break;

  case 3:

    $resolusi_akhir = "1280x720";

    break;

  case 4:

    $resolusi_akhir = "1920x1080";

    break;

  case 5:

    echo "Masukkan nilai resolusi akhir (contoh: 1920x1080): ";

    $resolusi_akhir = trim(fgets(STDIN));

    break;

  default:

    echo "Pilihan tidak valid.\n";

    exit;

}

// Minta input frame rate

echo "Masukkan frame rate (contoh: 30, 60, 90): ";

$frame_rate = trim(fgets(STDIN));

// Tambahkan filter vidstab untuk stabilizer video

$vidstab_filter = "vidstabtransform=input=smoothing=10:zoom=0:optzoom=1";

// Konversi resolusi dan frame rate video menggunakan FFMPEG dengan filter vidstab

exec("ffmpeg -i $nama_file -c:v libx264 -preset ultrafast -tune animation -r $frame_rate -vf $vidstab_filter -c:a copy -vf scale=$resolusi_akhir $resolusi_awal-$resolusi_akhir.mp4");

echo "Konversi selesai.\n";

?>

