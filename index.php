<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tailwind.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="shortcut icon" href="./assets/icon/icon.png">
    <title>Kartu Prakerja</title>
</head>
<body class="font-poppins overflow-x-hidden">
    <div id="mySidenav" class="delay-300 duration-300 ease-in-out bg-white w-0 h-full z-50 fixed overflow-x-hidden top-0 left-0 flex flex-col items-center pt-40">
        <div class="hover:text-red-700 duration-500 focus:outline-none ease-in-out absolute top-7 right-6 text-blue-500 text-3xl">
            <a href="#" onclick="closeNav()"><i class="fa fa-times"></i></a>
        </div>
        <div class="flex flex-col items-center space-y-4">
            <a class="hover:text-blue-700 duration-500 ease-in-out text-lg font-pbold" href="#">Home</a>
            <a class="hover:text-blue-700 duration-500 ease-in-out text-lg font-pbold" href="#">Syarat</a>
            <a class="hover:text-blue-700 duration-500 ease-in-out text-lg font-pbold" href="#">Kenyamanan</a>
            <a class="hover:text-blue-700 duration-500 ease-in-out text-lg font-pbold" href="#">Keuntungan</a>
            <a href="./auth/login.php"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 px-16 py-2.5 text-white text-sm focus:outline-none">Masuk</button></a>
        </div>
        
    </div>

    <div class="header" style="position: relative; z-index: 1;">
        <img src="./assets/images/header.svg" class="img-header" style="width: 100%; position: absolute; top: 0; z-index: -1;">
        <div class="mx-7 my-0 2xl:mx-40 xl:mx-20 lg:mx-20 md:mx-16 sm:mx-16">
            <div class="flex pt-8">
                <div class="flex items-center justify-between w-full">
                    <div>
                        <a href="#" class="font-pbold text-xl tracking-wide">KARTU<span class="text-blue-300">PRAKERJA</span> </a>
                    </div>
                    <div>
                        <button onclick="openNav()" class="barscustom focus:outline-none block mt-1 hover:text-blue-300 text-white duration-500 ease-in-out">
                            <i class="fa fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
        
                <div class="flex justify-between lg:flex-row">
                    <div class="flex font-pbold text-md menucustom">
                        <a href="#" class="block px-5 py-2.5 hover:text-blue-500 duration-500 ease-in-out">Home</a>
                        <a href="#" class="block px-5 py-2.5 hover:text-blue-500 duration-500 ease-in-out">Syarat</a>
                        <a href="#" class="block px-5 py-2.5 hover:text-blue-500 duration-500 ease-in-out">Kenyamanan</a>
                        <a href="#" class="block px-5 py-2.5 hover:text-blue-500 duration-500 ease-in-out">Keuntungan</a>
                        <!-- <a href="#" class="block px-5 mt-0.5 py-2.5 hover:text-blue-500 duration-500 ease-in-out"><i class="fa fa-search text-xl"></i></a> -->
                        <a href="./auth/login.php" class="block"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 px-9 py-2.5 text-white tracking-wider rounded-full focus:outline-none">Masuk</button></a>
                    </div>
                </div>
            </div>
    
            <div class="mt-36 lg:mt-24 md:mt-12 xl:mt-36 pb-36 lg:pb-32 xl:pb-72 sm:pb-36 md:pb-36 md:flex md:flex-row">
                <div class="flex-1">
                    <h1 class="text-white font-pbold text-4xl tracking-wide" style="line-height: 45px;">Apa Itu</h1>
                    <h2 class="text-white font-pbold text-5xl tracking-wide mt-2" style="line-height: 50px;">Kartu Prakerja ?</h2>
                    <p class="mt-2 text-white text-sm leading-7">Program yang berupa bantuan biaya yang ditujukan untuk pencari kerja dan pekerja yang terkena PHK</p>
                    <a href="./auth/register.php"><button class="mt-3 text-sm hover:bg-blue-700 hover:text-white duration-500 ease-in-out bg-white px-8 py-2.5 tracking-wider rounded-full focus:outline-none">Daftar</button></a>
                </div>
                <div class="flex-1"></div>
            </div>
        </div>
    </div>
    <div class="flex flex-col mx-7 my-0 2xl:mx-40 xl:mx-20 lg:mx-20 md:mx-16 sm:mx-16" style="position: relative; z-index: 1;">
        <div class="flex flex-col mt-10 mb-10">
            <div class="mb-5">
                <h2 class="font-pbold text-xl mb-2 text-center">Syarat Pendaftaran</h2>
                <p class="text-center text-sm leading-7">Berikut adalah beberapa syarat untuk mengikuti kartu prakerja</p>
            </div>
            <div class="flex flex-col lg:flex-row">
                <div class="bg-white my-4 w-full text-center" style="box-shadow: 0px 2px 25px #999; min-height: 500px;">
                    <div class="mx-12 my-9">
                        <img src="./assets/images/relax.svg" alt="" class="w-full">
                    </div>
                    <h1 class="font-pbold text-xl text-blue-500 mx-4 my-2">Tidak Bekerja</h1>
                    <p class="text-sm leading-7 mx-4 my-2">Jika ingin lolos dengan kemungkinan yang tinggi, anda harus tidak memiliki pekerjaan saat ini</p>
                    <a href="#"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 mx-4 mt-2 my-10 px-9 py-2.5 text-white text-sm rounded-full focus:outline-none">Selengkapnya</button></a>
                </div>
                <div class="bg-white my-4 w-full mx-0 lg:mx-16 text-center" style="box-shadow: 0px 2px 25px #999; min-height: 500px;">
                    <div class="mx-12 my-7">
                        <img src="./assets/images/edu.svg" alt="" class="w-full">
                    </div>
                    <h1 class="font-pbold text-xl text-blue-500 mx-4 my-2">Tidak Sekolah</h1>
                    <p class="text-sm leading-7 mx-4 my-2">Jika ingin lolos dengan kemungkinan yang tinggi, anda harus tidak menempuh pendidikan formal</p>
                    <a href="#"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 mx-4 mt-2 my-10 px-9 py-2.5 text-white text-sm rounded-full focus:outline-none">Selengkapnya</button></a>
                </div>
                <div class="bg-white my-4 w-full text-center" style="box-shadow: 0px 2px 25px #999; min-height: 500px;">
                    <div class="mx-12 my-9">
                        <img src="./assets/images/wni.svg" alt="" class="w-full">
                    </div>
                    <h1 class="font-pbold text-xl text-blue-500 mx-4 my-2">WNI</h1>
                    <p class="text-sm leading-7 mx-4 my-2">Anda harus memiliki kependudukan sebagai Warna Negara Indonesia asli untuk mendaftar</p>
                    <a href="#"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 mx-4 mt-2 my-10 px-9 py-2.5 text-white text-sm rounded-full focus:outline-none">Selengkapnya</button></a>
                </div>
            </div>
        </div>

        <div class="mb-20">
            <div class="mb-10 flex flex-col">
                <h2 class="font-pbold text-xl mb-2 text-center">Kenyamanan Website <a href="#" class="font-pbold text-xl tracking-wide">KARTU<span class="text-blue-300">PRAKERJA</span> </a></h2>
                <p class="text-center text-sm leading-7">Berikut kenyamanan sistem kami</p>
            </div>

            <div class="flex flex-col-reverse md:flex-row space-x-0 md:space-x-40 items-center">
                <div class="flex-1 mt-5 md:mt-0">
                    <h2 class="text-2xl font-pbold leading-normal mb-2">Data Anda Aman</h2>
                    <p class="text-sm leading-7">Di Website Kartu Prakerja, anda akan disuruh untuk mengupload data - data diri anda. Siapkan data diri anda dan anda bisa mempercayai kami dalam keamanan data anda</p>
                    <a href="#"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 mt-2 my-10 px-9 py-2.5 text-white text-sm rounded-full focus:outline-none">Selengkapnya</button></a>
                </div>
                <div class="flex-1">
                    <img src="./assets/images/secure.svg" alt="" class="w-full">
                </div>
            </div>
        </div>

        <div class="mb-20">
            <div class="flex flex-col md:flex-row space-x-0 md:space-x-40 items-center">
                <div class="flex-1">
                    <img src="./assets/images/eazy.svg" alt="" class="w-full">
                </div>
                <div class="flex-1 mt-5 md:mt-0">
                    <h2 class="text-2xl font-pbold leading-normal mb-2">Pendaftaran Sangat Mudah</h2>
                    <p class="text-sm leading-7">Website Kartu Prakerja sangat memudahkan anda untuk melakukan pendaftaran. Anda hanya memerlukan email dan password. Selanjutnya, anda hanya perlu mengisi data yang diperlukan di dalam sistem website kami</p>
                    <a href="#"><button class="hover:bg-blue-700 duration-500 ease-in-out bg-blue-500 mt-2 my-10 px-9 py-2.5 text-white text-sm rounded-full focus:outline-none">Selengkapnya</button></a>
                </div>
            </div>
        </div>

        <div class="mb-20">
            <div class="mb-5 flex flex-col">
                <h2 class="font-pbold text-xl mb-2 text-center">Ikuti Perkembangan <a href="#" class="font-pbold text-xl tracking-wide">KARTU<span class="text-blue-300">PRAKERJA</span> </a></h2>
                <p class="text-center text-sm leading-7">Silahkan masukkan email</p>
            </div>
            <div class="flex flex-col md:flex-row">
                <input type="email" class="w-full md:w-3/4 bg-gray-200 px-9 py-6 focus:outline-none rounded-full mb-5 md:mb-0 md:mr-2" placeholder="E-Mail">
                <input type="submit" class="text-white w-full md:w-1/4 bg-blue-500 px-9 py-6 focus:outline-none rounded-full cursor-pointer hover:bg-blue-700 duration-300 ease-in-out" value="Subscribe">
            </div>
        </div>
    </div>
    <div class="footer flex flex-col bg-blue-500 relative z-50">
    <img src="./assets/images/footer-decor.svg" alt="" class="hidden md:block">
    <div class="flex flex-col mx-7 my-0 2xl:mx-40 xl:mx-20 lg:mx-20 md:mx-16 sm:mx-16">
        <div class="footer-atas mt-5 mb-12 flex-row hidden md:flex">
            <div class="flex-1 flex flex-col">
                <a href="#" class="font-pbold text-xl tracking-wide text-black mb-3">KARTU<span class="text-blue-300">PRAKERJA</span> </a>
                <div>
                    <p class="text-sm leading-7 text-white">Program yang berupa bantuan biaya yang ditujukan untuk pencari kerja dan pekerja yang terkena PHK</p>
                </div>
            </div>
            <div class="flex-1">
            </div>
            <div class="flex-1 flex flex-col text-white mr-5 mt-0.5">
                <h2 class="text-md font-pbold tracking-wider mb-3"> KEBIJAKAN </h2>
                <div class="flex flex-col text-sm">
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Keamanan</a>
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Lisensi</a>
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Data</a>
                </div>
                
            </div>
            <div class="flex-1 flex flex-col text-white mr-5 mt-0.5">
                <h2 class="text-md font-pbold tracking-wider mb-3"> BANTUAN </h2>
                <div class="flex flex-col text-sm">
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Pusat Bantuan</a>
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Dukungan</a>
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Admin</a>
                    <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out">Kontak</a>
                </div>
            </div>
        </div>

        <div class="h-0.5 bg-blue-400 hidden md:block">
            
        </div>

        <div class="footer-bawah flex flex-row w-full justify-between text-white mb-5 mt-5 text-sm">
            <div class="w-full">
                <p class="text-center leading-7 md:text-left"> Copyright &copy; 2021 Kartu Prakerja. All Right Reserved </p>
            </div>
            <div class="hidden md:flex">
                <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out"><i class="fab fa-facebook-f mr-5"></i></a>
                <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out"><i class="fab fa-instagram mr-5"></i></a>
                <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out"><i class="fab fa-telegram-plane mr-5"></i></a>
                <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out"><i class="fab fa-whatsapp mr-5"></i></a>
                <a href="#" class="mb-1.5 hover:text-blue-800 duration-500 ease-in-out"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
		function openNav() {
			document.getElementById("mySidenav").style.width="100%";
		}
		function closeNav() {
			document.getElementById("mySidenav").style.width="0";
		}
	</script>
</body>
</html>