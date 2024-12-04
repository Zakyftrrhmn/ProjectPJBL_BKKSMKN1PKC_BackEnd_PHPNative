<?php

class Landing extends Controller
{
    public function index()
    {
        $data['title'] = 'BKK SMKN 1 Pangkalan Kerinci';
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $data['info'] = $this->model('InfoModel')->getAllInfoo();
        $data['beranda'] = $this->model('BerandaModel')->getAllBerandaa();
        $data['about'] = $this->model('AboutModel')->getAllAboutt();
        $data['tujuan'] = $this->model('TujuanModel')->getAllTujuan();
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();
        $data['event'] = $this->model('EventModel')->getAllEvent();
        $data['gallery'] = $this->model('GalleryModel')->getAllGallery();

        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/index', $data);
        $this->view('templateFrontPage/s_pengumuman', $data);
        $this->view('templateFrontPage/footer', $data);
    }

    public function lowongan()
    {
        $data['title'] = 'All Lowongan';


        $data['event'] = $this->model('EventModel')->getAllEvent();

        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/lowongan', $data);
        $this->view('templateFrontPage/s_pengumuman', $data);
        $this->view('templateFrontPage/footer', $data);
    }


    public function statistik()
    {
        $data['title'] = 'Statistik Alumni';

        // Mengambil data event
        $eventData = $this->model('EventModel')->getAllEvent();
        $totalEvent = count($eventData);
        $data['totalEvent'] = $totalEvent;

        // Mengambil data perusahaan
        $perusahaanData = $this->model('PerusahaanModel')->getAllPerusahaan();
        $totalPerusahaan = count($perusahaanData);
        $data['totalPerusahaan'] = $totalPerusahaan;

        // Mengambil data jurusan
        $jurusanData = $this->model('JurusanModel')->getAllJurusan();
        $totalJurusan = count($jurusanData);
        $data['totalJurusan'] = $totalJurusan;

        // Mengambil data alumni
        $alumniData = $this->model('AlumniModel')->getAllAlumni();

        $totalAlumni = count($alumniData);
        $bekerja = 0;
        $kuliah = 0;
        $unknown = 0;

        foreach ($alumniData as $alumni) {
            if ($alumni['status'] == 'Bekerja') {
                $bekerja++;
            } elseif ($alumni['status'] == 'Kuliah') {
                $kuliah++;
            } else {
                $unknown++;
            }
        }

        // Mencegah pembagian dengan nol di view
        $data['bekerja'] = $bekerja;
        $data['kuliah'] = $kuliah;
        $data['unknown'] = $unknown;
        $data['totalAlumni'] = $totalAlumni > 0 ? $totalAlumni : 1; // Hindari pembagian dengan nol

        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/statistik', $data);
        $this->view('templateFrontPage/s_pengumuman', $data);
        $this->view('templateFrontPage/footer', $data);
    }


    public function pendaftaran($id)
    {
        $data['title'] = 'Form Pendaftaran';
        $data['event'] = $this->model('EventModel')->getEventById($id);
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/pendaftaran', $data);
        $this->view('templateFrontPage/s_pengumuman', $data);
        $this->view('templateFrontPage/footer', $data);
    }

    public function pendaftaranSimpan($id)
    {

        // Validasi file upload
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'xls'];
        $filesToValidate = ['foto_kk', 'foto_ktp', 'file_cv', 'sertifikat'];
        $fileData = [];

        foreach ($filesToValidate as $fileKey) {
            if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES[$fileKey]['name'];
                $fileTmpName = $_FILES[$fileKey]['tmp_name'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($fileExtension, $allowedExtensions)) {
                    Flasher::setMessage("File $fileKey harus berupa format: jpg, jpeg, png, pdf, docx, atau xls!", 'danger');
                    header('location:' . base_url . '/landing/pendaftaran/' . $id);
                    exit;
                }

                // Pindahkan file ke folder tujuan
                $uploadDir = 'uploads/pelamar';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $newFileName = uniqid() . '.' . $fileExtension;
                move_uploaded_file($fileTmpName, $uploadDir . '/' . $newFileName);

                // Simpan nama file baru ke dalam array
                $fileData[$fileKey] = $newFileName;
            } else {
                $fileData[$fileKey] = null; // Kosongkan jika tidak ada file diupload
            }
        }

        // Gabungkan data POST dengan file data
        $data = array_merge($_POST, $fileData);

        // Simpan data ke model

        $pendaftaranModel = $this->model('PendaftaranModel');
        $id = $pendaftaranModel->tambahPendaftaran($data);  // Langsung ambil ID dari tambahPendaftaran

        if ($id > 0) {  // ID yang lebih besar dari 0 berarti berhasil disimpan
            Flasher::setMessage('Pendaftaran berhasil disimpan!', 'success');
            header('location:' . base_url . '/landing/success/' . $id);
            exit;
        } else {
            Flasher::setMessage('Pendaftaran gagal disimpan!', 'danger');
            header('location:' . base_url . '/landing/pendaftaran/');
            exit;
        }
    }



    public function gallery()
    {
        $data['title'] = 'All Gallery';

        $data['gallery'] = $this->model('GalleryModel')->getAllGallery();
        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/gallery', $data);
        $this->view('templateFrontPage/s_pengumuman', $data);
        $this->view('templateFrontPage/footer', $data);
    }

    public function pengumuman()
    {
        $data['title'] = 'Pengumuman';

        $data['pengumuman'] = $this->model('PengumumanModel')->getAllPengumuman();
        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/pengumuman', $data);
        $this->view('templateFrontPage/footer', $data);
    }

    public function success($id)
    {
        $data['title'] = 'Pendaftaran Success';
        $data['pelamar'] = $this->model('PendaftaranModel')->getPendaftaranById($id); // Ambil data berdasarkan ID pelamar

        $this->view('templateFrontPage/header', $data);
        $this->view('templateFrontPage/navbar', $data);
        $this->view('landing/success', $data);
        $this->view('templateFrontPage/footer', $data);
    }

    public function buktiPendaftaran($id)
    {
        // Mengambil data pelamar dan event berdasarkan ID
        $data['pelamar'] = $this->model('PendaftaranModel')->getPendaftaranById($id);
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        // Membuat PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);

        // Header: Logo dan Informasi Sekolah
        $pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/bkk_smkn1pkc/public/assets/img/2._Logo_SMKN_1_PKC.png', 10, 10, 25); // Logo kiri
        $pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/bkk_smkn1pkc/public/assets/img/1._Logo_BKK-removebg-preview.png', 170, 10, 30); // Logo kanan

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 5, 'PEMERINTAH PROVINSI RIAU', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 22);
        $pdf->Cell(190, 7, 'DINAS PENDIDIKAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190, 7, 'SMK NEGERI 1 PANGKALAN KERINCI', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(190, 5, 'Makmur, Pangkalan Kerinci, Pelalawan Regency, Riau 28654', 0, 1, 'C');
        $pdf->Cell(190, 5, 'Website: https://smkn1pangkalankerinci.sch.id', 0, 1, 'C');
        $pdf->Ln(5);
        $pdf->Cell(190, 0, '', 1, 1, 'C'); // Garis pemisah
        $pdf->Ln(10);

        // Judul dokumen
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'BUKTI PENDAFTARAN', 0, 1, 'C');
        $pdf->Ln(5);

        // Informasi Pelamar
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(230, 230, 230); // Warna latar
        $pdf->SetDrawColor(200, 200, 200); // Warna garis

        // Data Pelamar
        $fields = [
            'Nama Lengkap' => $data['pelamar']['nama_lengkap'],
            'Nomor KTP' => $data['pelamar']['nomor_ktp'],
            'Tanggal Lahir' => $data['pelamar']['tanggal_lahir'],
            'Tempat Lahir' => $data['pelamar']['tempat_lahir'],
            'Usia' => $data['pelamar']['usia'] . ' tahun',
            'Jenis Kelamin' => $data['pelamar']['jenis_kelamin'],
            'No Handphone' => $data['pelamar']['no_handphone'],
            'Email' => $data['pelamar']['email'],
            'Alamat Sekarang' => $data['pelamar']['alamat_sekarang'],
        ];

        foreach ($fields as $key => $value) {
            $pdf->Cell(60, 8, $key, 1, 0, 'L', true); // Kolom pertama
            $pdf->Cell(130, 8, $value, 1, 1, 'L', false); // Kolom kedua
        }

        // Data Event
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 8, 'Informasi Event', 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 12);

        $eventFields = [
            'Tipe' => $data['pelamar']['tipe'], // Tipe event dari tabel event
            'Nama Perusahaan' => $data['pelamar']['nama_perusahaan'], // Nama perusahaan dari tabel event
            'Posisi' => $data['pelamar']['posisi'], // Lokasi event dari tabel event
            'Lokasi' => $data['pelamar']['lokasi'], // Lokasi event dari tabel event
        ];

        foreach ($eventFields as $key => $value) {
            $pdf->Cell(60, 8, $key, 1, 0, 'L', true); // Kolom pertama
            $pdf->Cell(130, 8, $value, 1, 1, 'L', false); // Kolom kedua
        }

        $pdf->Ln(10);

        // Footer
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 5, 'Daftar Pada tanggal  : ' . date('d F Y'), 0, 1, 'L');
        $pdf->Ln(10);
        $pdf->Cell(190, 5, 'KEPALA SMK NEGERI 1 PANGKALAN KERINCI', 0, 1, 'C');
        $pdf->Ln(20);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 5, 'H. Nasril, S.Pd., M.Pd.', 0, 1, 'C');

        // Output PDF
        $pdf->Output('D', 'Bukti Pendaftaran SMKN 1 Pangkalan Kerinci.pdf', true);
    }
}
