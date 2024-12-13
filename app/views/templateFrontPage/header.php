<!DOCTYPE html>
<html lang="id" !scroll-smooth>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="<?= base_url ?>/assets/satoshi.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title class=""><?= $data['title']; ?> - BKK SMKN 1 PKC</title>
    <link rel="icon" href="<?= !empty($data['logo']['logo_bkk']) ? base_url . '/uploads/logo/logobkk/' . $data['logo']['logo_bkk'] : base_url . '/assets/img/1._Logo_BKK-removebg-preview.png' ?>" />
    <style>
        /* Custom CSS for image */
        .flexible-img {
            width: 100%;
            height: 450px;
            max-width: 450px;
            /* batas maksimum ukuran */
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-slide-left {
            animation: slideLeft 20s linear infinite;
        }
    </style>
</head>

<body class="bg-[#f1f4f5] font-['Poppins'] flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-[#44808B] text-white py-2 lg:px-8 px-1">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img
                    src="<?= !empty($data['logo']['logo_sekolah']) ? base_url . '/uploads/logo/logosekolah/' . $data['logo']['logo_sekolah'] : base_url . '/assets/img/2._Logo_SMKN_1_PKC.png' ?>"
                    alt=" Logo"
                    class="w-16 h-16" />
                <div>
                    <h1 class="text-lg font-bold uppercase">
                        <?php if (!empty($data['logo']) && isset($data['logo']['nama_sekolah'])): ?>
                            <?= $data['logo']['nama_sekolah'] ?>
                        <?php else: ?>
                            SMKN 1 Pangkalan Kerinci
                        <?php endif; ?>
                        <p class="text-xs text-gray-200">
                            <?php if (!empty($data['logo']) && isset($data['logo']['alamat_sekolah'])): ?>
                                <?= $data['logo']['alamat_sekolah'] ?>
                            <?php else: ?>
                                Makmur, Pangkalan Kerinci, Pelalawan Regency, Riau 28654
                            <?php endif; ?>
                        </p>
                </div>
            </div>

            <div class="flex gap-3 items-center justify-between">
                <!-- Contact Info (Hide on smaller screens) -->
                <div class="hidden lg:flex items-center space-x-4">
                    <div class="flex items-center gap-2">
                        <div
                            class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-green-500 hover:text-white rounded-full flex items-center justify-center transition ease-in">
                            <i class="bx bx-phone"></i>
                        </div>
                        <div>
                            <p class="text-xs">Telepon</p>
                            <p class="text-sm font-semibold">
                                <?php if (!empty($data['info']) && isset($data['info']['telepon'])): ?>
                                    <?= $data['info']['telepon'] ?>
                                <?php else: ?>
                                    +62xxxxxxxx
                                <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div
                            class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-red-500 hover:text-white rounded-full flex items-center justify-center transition ease-in">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div>
                            <p class="text-xs">Email</p>
                            <p class="text-sm font-semibold">
                                <?php if (!empty($data['info']) && isset($data['info']['email'])): ?>
                                    <?= $data['info']['email'] ?>
                                <?php else: ?>
                                    HumasSMKN1PKC@gmail.com
                                <?php endif; ?></p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hidden bg-white lg:flex w-0.5 h-8"></div>
                <!-- Social Icons -->
                <div class="hidden lg:flex space-x-2 flex items-center">
                    <a
                        href="<?= !empty($data['info']) && isset($data['info']['link_facebook']) ? $data['info']['link_facebook'] : 'https://www.facebook.com/' ?>"
                        class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-blue-500 hover:text-white rounded-full flex items-center justify-center transition ease-in">
                        <i class="bx bxl-facebook"></i>
                    </a>
                    <a
                        href="<?= !empty($data['info']) && isset($data['info']['link_instagram']) ? $data['info']['link_instagram'] : 'https://www.instagram.com/' ?>"
                        class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-orange-500 hover:text-white rounded-full flex items-center justify-center transition ease-in">
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a
                        href="<?= !empty($data['info']) && isset($data['info']['link_youtube']) ? $data['info']['link_youtube'] : 'https://www.youtube.com/' ?>"
                        class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-red-800 hover:text-white rounded-full flex items-center justify-center transition ease-in">
                        <i class="bx bxl-youtube"></i>
                    </a>
                </div>

            </div>
        </div>
    </header>