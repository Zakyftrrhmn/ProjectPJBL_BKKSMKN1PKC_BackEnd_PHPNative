<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['title']; ?> - BKK SMKN 1 PKC</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="<?= !empty($data['logo']['logo_bkk']) ? base_url . '/uploads/logo/logobkk/' . $data['logo']['logo_bkk'] : base_url . '/assets/img/1._Logo_BKK-removebg-preview.png' ?>" />
    <link href="<?= base_url ?>/assets/satoshi.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
</head>

<body>
    <div class="font-[sans-serif] bg-gradient-to-r from-purple-900 via-purple-800 to-purple-600 text-gray-800">
        <div class="min-h-screen flex fle-col items-center justify-center lg:p-6 p-4">
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div>
                    <a href="javascript:void(0)"><img
                            src="<?= !empty($data['logo']['logo_bkk']) ? base_url . '/uploads/logo/logobkk/' . $data['logo']['logo_bkk'] : base_url . '/assets/img/1._Logo_BKK-removebg-preview.png' ?>" alt="logo" class='bg-white rounded-lg px-3 w-50 mb-12 inline-block shadow-lg object-cover' />
                    </a>
                    <h2 class="text-4xl font-extrabold lg:leading-[50px] text-white">
                        Masuk ke Dashboard BKK SMKN 1 Pangkalan Kerinci
                    </h2>
                    <p class="text-sm mt-6 text-white">Selamat datang! Silakan login untuk mengakses dashboard BKK SMKN 1 Pangkalan Kerinci.</p>
                </div>

                <form action="<?= base_url; ?>/admin/login/prosesLogin" method="post" class="bg-white rounded-xl px-6 py-8 space-y-6 max-w-md md:ml-auto w-full">
                    <h3 class="text-3xl font-extrabold mb-12">
                        Sign In
                    </h3>

                    <?php Flasher::flash(); ?>

                    <div>
                        <input name="username" type="username" autocomplete="username" required class="bg-gray-100 focus:bg-transparent w-full text-sm px-4 py-3.5 rounded-md outline-gray-800" placeholder="Username" />
                    </div>
                    <div>
                        <input name="password" type="password" autocomplete="current-password" required class="bg-gray-100 focus:bg-transparent w-full text-sm px-4 py-3.5 rounded-md outline-gray-800" placeholder="Kata Sandi" />
                    </div>
                    <div>
                        <button type="submit" class="w-full shadow-xl py-3 px-6 text-sm font-semibold rounded-md text-white bg-gray-800 hover:bg-[#222] focus:outline-none">
                            Log in
                        </button>
                    </div>

                    <p class="my-6 text-sm text-gray-400 text-center">Lihat Tampilan Halaman Utama</p>

                    <div class="space-x-6 flex justify-center">
                        <div>
                            <a href="<?= base_url ?>/" class="w-full shadow-xl py-3 px-6 text-sm font-semibold rounded-md text-white bg-gray-800 hover:bg-[#222] focus:outline-none">
                                Halaman Utama
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('[data-dismiss-target]').forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-dismiss-target');
                document.querySelector(target).remove();
            });
        });
    </script>
    <script defer src="<?= base_url ?>/assets/bundle.js"></script>
</body>

</html>