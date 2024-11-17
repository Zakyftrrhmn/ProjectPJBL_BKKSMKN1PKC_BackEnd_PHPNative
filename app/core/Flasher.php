<?php
class Flasher
{
    public static function setMessage($pesan, $aksi, $type)
    {
        $_SESSION['msg'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'type' => $type
        ];
    }

    public static function Message()
    {
        if (isset($_SESSION['msg'])) {
            $typeClass = '';
            // Menentukan kelas Tailwind CSS berdasarkan tipe pesan
            switch ($_SESSION['msg']['type']) {
                case 'success':
                    $typeClass = 'bg-meta-3 border-meta-3 text-white';
                    break;
                case 'danger':
                    $typeClass = 'bg-meta-1 border-meta-1 text-white';
                    break;
                case 'warning':
                    $typeClass = 'bg-warning border-warning text-white';
                    break;
                default:
                    $typeClass = 'bg-gray-2 border-gray-2 text-gray-800';
            }

            echo '<div class="relative border-l-4 rounded-lg p-4 mb-4 items-center ' . $typeClass . '" role="alert">
            <p class="font-bold">Data ' . $_SESSION['msg']['pesan'] . ' ' . $_SESSION['msg']['aksi'] . '</p>
            <button class="absolute top-0 right-0 mt-2 mr-2 text-white font-medium text-2xl hover:text-gray-900" onclick="this.parentElement.remove()">×</button>
        </div>';

            unset($_SESSION['msg']);
        }
    }
}
