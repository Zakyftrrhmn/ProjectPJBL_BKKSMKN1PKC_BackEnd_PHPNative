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
        if ($this->model('PendaftaranModel')->tambahPendaftaran($data) > 0) {
            Flasher::setMessage('Pendaftaran berhasil disimpan!', 'success');
            header('location:' . base_url . '/landing/success');
            exit;
        } else {
            Flasher::setMessage('Pendaftaran gagal disimpan!', 'danger');
            header('location:' . base_url . '/landing/pendaftaran/' . $id);
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
}
