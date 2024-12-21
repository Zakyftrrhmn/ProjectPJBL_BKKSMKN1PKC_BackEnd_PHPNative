<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Event extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah login') {
            Flasher::setMessage('Anda Belum Login', 'danger');
            header('location:' . base_url . '/admin/login');
            exit;
        }
    }

    function cekAkses($role)
    {
        if (!isset($_SESSION['session_login'])) {
            header('location:' . base_url . '/admin/login');
            exit;
        }

        // Cek apakah role sesuai
        if ($_SESSION['role'] !== $role) {
            Flasher::setMessage('Akses ditolak', 'danger');
            header('location:' . base_url . '/admin/error');
            exit;
        }
    }

    public function index()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');

        $data['title'] = 'Data Event';
        $data['event'] = $this->model('EventModel')->getAllEvent();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Event Baru';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/create', $data);
        $this->view('templates/footer', $data);
    }


    public function simpanEvent()
    {
        $this->cekAkses('Super Admin');
        if ($this->model('EventModel')->tambahEvent($_POST) > 0) {
            Flasher::setMessage(' Event berhasil di Tambah!', 'success');
            header('location:' . base_url . '/admin/event');
            exit;
        } else {
            Flasher::setMessage(' Event gagal di Tambah!', 'danger');
            header('location:' . base_url . '/admin/event');
            exit;
        }
    }

    public function edit($uuid)
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit Data Event';
        $data['event'] = $this->model('EventModel')->getEventByUuid($uuid);
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();


        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updateEvent()
    {
        $this->cekAkses('Super Admin');
        if ($this->model('EventModel')->updateDataEvent($_POST) > 0) {
            Flasher::setMessage(' Event berhasil di Update!', 'success');
            header('location:' . base_url . '/admin/event');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada event di Update!', 'danger');
            header('location:' . base_url . '/admin/event');
            exit;
        }
    }


    public function hapus($uuid)
    {
        $this->cekAkses('Super Admin');
        if ($this->model('EventModel')->deleteEvent($uuid) > 0) {
            Flasher::setMessage(' Event berhasil dihapus!', 'success');
            header('location:' . base_url . '/admin/event');
            exit;
        } else {
            Flasher::setMessage(' Event gagal dihapus', 'danger');
            header('location:' . base_url . '/admin/event');
            exit;
        }
    }

    public function cari()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Event';
        $data['event'] = $this->model('EventModel')->cariEvent();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($uuid)
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Detail Data Event';
        $data['event'] = $this->model('EventModel')->getEventByUuid($uuid);
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function pelamar($uuid)
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Pelamar';

        // Ambil data event berdasarkan uuid yang dipilih
        $data['event'] = $this->model('EventModel')->getEventByUuid($uuid);

        // Ambil ID event
        $id_event = $data['event']['id'];

        // Ambil pelamar yang terdaftar untuk event tersebut
        $data['pelamar'] = $this->model('PendaftaranModel')->getPelamarByEvent($id_event);

        // Hitung total pelamar
        $data['totalPelamar'] = count($data['pelamar']);

        // Ambil data perusahaan (jika diperlukan)
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        // Load views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/pelamar', $data);
        $this->view('templates/footer', $data);
    }


    public function detailpelamar($uuid)
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Pelamar';

        $data['event'] = $this->model('EventModel')->getEventByUuid($uuid);
        $data['pelamar'] = $this->model('PendaftaranModel')->getPendaftaranByUuid($uuid);
        // Load views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/detailpelamar', $data);
        $this->view('templates/footer', $data);
    }

    public function cetakPelamar($uuid)
    {
        $this->cekAkses('Super Admin');

        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();
        $data['event'] = $this->model('EventModel')->getEventByUuid($uuid);

        if (!$data['event']) {
            exit('Event tidak ditemukan.');
        }

        // Ambil ID event
        $id_event = $data['event']['id'];

        // Ambil pelamar yang terdaftar untuk event tersebut
        $data['pelamar'] = $this->model('PendaftaranModel')->getPelamarByEvent($id_event);

        // Validasi data pelamar
        if (empty($data['pelamar'])) {
            exit('Tidak ada data pelamar untuk event ini.');
        }

        // Inisialisasi Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Pelamar');

        // Buat judul Excel berdasarkan perusahaan dan event
        $judul = 'Data Pelamar ' . $data['event']['posisi'] . ' di ';
        foreach ($data['perusahaan'] as $perusahaan) {
            if ($perusahaan['id'] == $data['event']['id_perusahaan']) {
                $judul .= $perusahaan['nama_perusahaan'];
                break;
            }
        }
        $sheet->setCellValue('A1', $judul);
        $sheet->mergeCells('A1:T1');
        $sheet->getStyle('A1')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
        ]);

        // Header kolom
        $headers = [
            'No',
            'Nama Lengkap',
            'Nomor KTP',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Usia',
            'Jenis Kelamin',
            'No. Handphone',
            'Email',
            'Agama',
            'Tinggi Badan',
            'Berat Badan',
            'Alamat Sekarang',
            'Asal Sekolah',
            'Jurusan',
            'Tahun Lulus',
            'Foto KK (URL)',
            'Foto KTP (URL)',
            'File CV (URL)',
            'Sertifikat (URL)'
        ];
        $sheet->fromArray($headers, null, 'A2');

        // Tambahkan data pelamar
        $baseUrl = 'http://localhost/bkk_smkn1pkc/public/uploads/pelamar/';
        $rowNum = 3;

        foreach ($data['pelamar'] as $index => $pelamar) {
            $sheet->fromArray([
                $index + 1,
                $pelamar['nama_lengkap'],
                $pelamar['nomor_ktp'],
                $pelamar['tanggal_lahir'],
                $pelamar['tempat_lahir'],
                $pelamar['usia'],
                $pelamar['jenis_kelamin'],
                $pelamar['no_handphone'],
                $pelamar['email'],
                $pelamar['agama'],
                $pelamar['tinggi_badan'],
                $pelamar['berat_badan'],
                $pelamar['alamat_sekarang'],
                $pelamar['asal_sekolah'],
                $pelamar['jurusan'],
                $pelamar['tahun_lulus']
            ], null, "A{$rowNum}");

            // Tambahkan hyperlink
            $sheet->getCell("Q{$rowNum}")->setValue('Foto KK')->getHyperlink()->setUrl($baseUrl . $pelamar['foto_kk']);
            $sheet->getCell("R{$rowNum}")->setValue('Foto KTP')->getHyperlink()->setUrl($baseUrl . $pelamar['foto_ktp']);
            $sheet->getCell("S{$rowNum}")->setValue('File CV')->getHyperlink()->setUrl($baseUrl . $pelamar['file_cv']);
            $sheet->getCell("T{$rowNum}")->setValue('Sertifikat')->getHyperlink()->setUrl($baseUrl . $pelamar['sertifikat']);

            $rowNum++;
        }

        // Tambahkan border
        $lastRow = $rowNum - 1;
        $sheet->getStyle("A2:T{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Format header kolom
        $sheet->getStyle('A2:T2')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFCCCCFF'],
            ],
        ]);

        // Atur lebar kolom otomatis
        foreach (range('A', 'T') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Header untuk unduhan
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data_Pelamar.xlsx"');
        header('Cache-Control: max-age=0');

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
