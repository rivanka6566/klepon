<?php
session_start();
include 'db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$nama_spj = $_POST['nama_spj'];
$jenis_spj = $_POST['jenis_spj'];
$program = $_POST['program'] ?? '';
$output = $_POST['output'] ?? '';
$komponen = $_POST['komponen'] ?? '';
$akun = $_POST['akun'] ?? '';
$email = $_POST['email'] ?? '';
$tgl_kirim = date('Y-m-d');

$uploaded_files_with_labels = [];
$target_dir = "uploads/";

// FUNGSI BARU: slugify yang lebih kuat untuk membuat nama file ramah URL
function slugify($text) {
    // 1. Konversi ke huruf kecil terlebih dahulu
    $text = strtolower($text);

    // 2. Ganti karakter non-alphanumeric (kecuali spasi dan hyphen) dengan kosong
    //    Ini akan menghapus simbol seperti '*' secara langsung.
    $text = preg_replace('/[^\pL\d\s-]/u', '', $text);

    // 3. Ganti semua spasi dengan satu hyphen
    $text = preg_replace('/\s+/', '-', $text);

    // 4. Ganti beberapa hyphen berturut-turut dengan satu hyphen
    $text = preg_replace('/-+/', '-', $text);

    // 5. Hapus hyphen dari awal dan akhir string
    $text = trim($text, '-');

    // 6. Pemeriksaan akhir: Jika slug masih kosong setelah semua transformasi,
    //    berikan nama cadangan yang jelas.
    if (empty($text)) {
        return 'untitled-document'; // Nama cadangan yang lebih deskriptif
    }

    return $text;
}

// Fungsi untuk menangani upload file dan menyimpannya dengan label
function uploadFileWithLabel($file_input_name, $label, $target_dir, &$uploaded_files) {
    if (isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] == UPLOAD_ERR_OK) {
        $original_uploaded_filename = basename($_FILES[$file_input_name]["name"]); // Nama file asli yang diunggah
        $file_extension = pathinfo($original_uploaded_filename, PATHINFO_EXTENSION); // Ekstensi file asli

        // Gunakan $label sebagai nama dasar untuk slugification
        $base_name_for_slug = $label;

        // Pemeriksaan tambahan jika label itu sendiri kosong atau tidak valid setelah slugify
        if (empty($base_name_for_slug)) {
            return false; // Jangan lanjutkan jika label kosong
        }

        // Slugify label untuk menjadi bagian dari nama file
        $slugified_base_name = slugify($base_name_for_slug);

        // Buat nama file unik: slugified_label + unique_id + ekstensi_asli
        $unique_filename = $slugified_base_name . '-' . uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $unique_filename;

        // Validasi ukuran dan jenis file
        $allowed_extensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
        $max_file_size = 10 * 1024 * 1024; // 10 MB

        if (in_array(strtolower($file_extension), $allowed_extensions) && $_FILES[$file_input_name]['size'] <= $max_file_size) {
            if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
                $uploaded_files[$label] = $unique_filename;
                return true;
            }
        }
    }
    return false;
}

// Map untuk setiap jenis SPJ dengan input name dan label file yang diharapkan
$file_map = [
    'Perlengkapan' => [
        'perlengkapan_form_permintaan' => 'FORM PERMINTAAN *',
        'perlengkapan_kak' => 'KAK*',
        'perlengkapan_tanda_terima' => 'TANDA TERIMA *',
        'perlengkapan_foto_barang_1' => 'FOTO BARANG 1 *',
        'perlengkapan_foto_barang_2' => 'FOTO BARANG 2 *',
        'perlengkapan_kuitansi_pembelian' => 'KUITANSI PEMBELIAN'
    ],
    'Konsumsi' => [
        'konsumsi_form_permintaan' => 'FORM PERMINTAAN *',
        'konsumsi_kak' => 'KAK*',
        'konsumsi_surat_undangan' => 'SURAT UNDANGAN *',
        'konsumsi_daftar_hadir' => 'DAFTAR HADIR *',
        'konsumsi_notulen' => 'NOTULEN *',
        'konsumsi_kuitansi' => 'KUITANSI',
        'konsumsi_dokumentasi_kegiatan' => 'DOKUMENTASI KEGIATAN *',
        'konsumsi_dokumentasi_konsumsi' => 'DOKUMENTASI KONSUMSI (MAKAN DAN SNACK)*'
    ],
    'Belanja Bahan' => [
        'belanja_bahan_form_permintaan' => 'FORM PERMINTAAN *',
        'belanja_bahan_kak' => 'KAK*',
        'belanja_bahan_kuitansi' => 'KUITANSI',
        'belanja_bahan_foto_barang' => 'FOTO BARANG*'
    ],
    'Pembelian Paket Data / Pulsa' => [
        'pulsa_form_permintaan' => 'FORM PERMINTAAN *',
        'pulsa_kak' => 'KAK*',
        'pulsa_kuitansi' => 'KUITANSI',
        'pulsa_daftar_penerima' => 'DAFTAR PENERIMA PULSA/PAKET DATA *'
    ],
    'Honor Instruktur Nasional / Daerah' => [
        'instruktur_form_permintaan' => 'FORM PERMINTAAN *',
        'instruktur_kak' => 'KAK*',
        'instruktur_sk' => 'SK*',
        'instruktur_kuitansi_spj' => 'KUITANSI / SPJ *',
        'instruktur_laporan_mengajar' => 'LAPORAN MENGAJAR *'
    ],
    'Honor Petugas' => [
        'petugas_form_permintaan' => 'FORM PERMINTAAN *',
        'petugas_kak' => 'KAK*',
        'petugas_sk' => 'SK*',
        'petugas_kuitansi_spj' => 'KUITANSI / SPJ *'
    ],
    'Honor Narasumber' => [
        'narasumber_form_permintaan' => 'FORM PERMINTAAN *',
        'narasumber_kak' => 'KAK*',
        'narasumber_sk' => 'SK*',
        'narasumber_kuitansi_spj' => 'KUITANSI / SPJ *',
        'narasumber_undangan' => 'UNDANGAN *',
        'narasumber_ktp_npwp' => 'KTP DAN NPWP *',
        'narasumber_jadwal_kegiatan' => 'JADWAL KEGIATAN *',
        'narasumber_cv' => 'CV',
        'narasumber_bahan_paparan' => 'BAHAN PAPARAN NARASUMBER *',
        'narasumber_daftar_hadir' => 'DAFTAR HADIR NARASUMBER'
    ],
    'Transport Lokal' => [
        'transport_lokal_form_permintaan' => 'FORM PERMINTAAN *',
        'transport_lokal_kak' => 'KAK*',
        'transport_lokal_sk' => 'SK*',
        'transport_lokal_kuitansi_spj' => 'KUITANSI / SPJ *',
        'transport_lokal_surat_tugas' => 'SURAT TUGAS *',
        'transport_lokal_laporan_perjadin_visum' => 'LAPORAN PERJADIN DAN VISUM',
        'transport_lokal_superkendis' => 'SUPERKENDIS'
    ],
    'Perjalanan Dinas Luar Kota' => [
        'perjadin_luar_kota_surat_permintaan' => 'SURAT PERMINTAAN *',
        'perjadin_luar_kota_kak' => 'KAK*',
        'perjadin_luar_kota_sk' => 'SK*',
        'perjadin_luar_kota_kuitansi_rincian' => 'KUITANSI & RINCIAN BIAYA PERJALANAN DINAS',
        'perjadin_luar_kota_bukti_transportasi' => 'BUKTI TRANSPORTASI *',
        'perjadin_luar_kota_bukti_penginapan' => 'BUKTI PENGINAPAN *',
        'perjadin_luar_kota_surat_tugas' => 'SURAT TUGAS *',
        'perjadin_luar_kota_spd_visum' => 'SPD DAN VISUM *',
        'perjadin_luar_kota_laporan_dinas' => 'LAPORAN PERJALANAN DINAS *',
        'perjadin_luar_kota_superkendis' => 'SUPERKENDIS'
    ],
    'Honor Operasional Satuan Kerja' => [
        'honor_satker_surat_permintaan' => 'SURAT PERMINTAAN *',
        'honor_satker_kak' => 'KAK*',
        'honor_satker_sk' => 'SK*',
        'honor_satker_kuitansi_spj' => 'KUITANSI / SPJ *'
    ]
];

$detail_array = [
    'program' => $program,
    'output' => $output,
    'komponen' => $komponen,
    'akun' => $akun,
    'email' => $email
];
$detail_json = json_encode($detail_array);

$file_names_json = json_encode($uploaded_files_with_labels);

$query = "INSERT INTO form_data (nama_spj, jenis_spj, detail, file_names, tgl_kirim)
          VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("Preparation failed: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "sssss", $nama_spj, $jenis_spj, $detail_json, $file_names_json, $tgl_kirim);

if (mysqli_stmt_execute($stmt)) {
    header("Location: klepon/klepon.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
?>