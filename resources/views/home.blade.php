<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PasarAja</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset ('admin_asset/template/images/Logo3.png')}}" />
        {{-- <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset ('boot/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset ('boot/css/landing.css')}}" rel="stylesheet" /> 
        <--map-->
        <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menyertakan CSS Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Menyertakan JavaScript Leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <style>
            .image-container {
    width: 500px; /* Sesuaikan dengan lebar yang diinginkan */
    height: 300px; /* Sesuaikan dengan tinggi yang diinginkan */
    margin-bottom: 20px; /* Atur margin antara gambar */
    position: relative; /* Atur posisi relatif untuk menempatkan tombol di atas gambar */
}
#map {
            height: 500px; /* Atur tinggi peta */
            width: 70%; /* Atur lebar peta */
        }
.row-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Hindari distorsi gambar dengan mengisi ruang yang tersedia */
}

        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img id="logo-1" src="{{asset('admin_asset/template/images/Logo3.png')}}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0" id="nav-text">
                        <li class="nav-item"><a id="nav-text1" href="#home">Home</a></li>
                        <li class="nav-item"><a id="nav-text2" href="#informasi">Informasi</a></li>
                        <li class="nav-item"><a id="nav-text3" href="#about">Promo</a></li>
                        <li class="nav-item"><a id="nav-text4" href="#event">Event</a></li>
                        <a class="btn btn-outline-success mb-3" id="sign-in" href="{{ route('loginview') }}">Sign In</a>

                    </ul>


                    
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="home">
            <div class="container d-flex justify-content-end">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card d-flex"  id="body-head">
                            <div class="card-body" id="text-title">
                                <p class="card-text mb-3">Hello!!!</p>
                                <h5 class="card-title">Welcome To PasarAja</h5>
                                <p class="card-text">Nikmati kemudahan berbelanja di pasar melalui aplikasi</p>
                                <p class="card-text">PasarAja, selalu siap membantu memenuhi kebutuhanmu</p>
                                <a href="#" class="btn mt-5" id="btn-detail" data-toggle="modal" data-target="#readMoreModal">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
<div class="modal fade" id="readMoreModal" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="readMoreModalLabel">Read More</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Isi pop-up di sini -->
          <p>Nikmati kemudahan berbelanja di pasar melalui aplikasi PasarAja, selalu siap membantu memenuhi kebutuhanmu. Dengan PasarAja, belanja jadi lebih mudah, cepat, dan nyaman. Ayo mulai belanja sekarang dan rasakan perbedaannya!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
        </header>
        <div class="d-flex mt-5">
            <img src="{{asset('img/akses.png')}}" alt="" id="row-img">
            <img src="{{asset('img/fast.png')}}" alt="" id="row-img">
            <img src="{{asset('img/fresh.png')}}" alt="" id="row-img">
        </div>

        <!-- informasi-->
        <section class="page-section" id="informasi">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Informasi Terbaru</h2>
                    <h3 class="section-subheading text-muted">Berikut adalah beberapa informasi terbaru seputar pasar wage</h3>
                </div>
                <div id="informasiCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php $chunks = array_chunk($dataInformasi->toArray(), 2); @endphp
                        @foreach ($chunks as $key => $chunk)
                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $dii)
                                        <div class="col-md-6 mb-4"> <!-- Tambahkan class mb-4 di sini -->
                                            <div class="image-container px-md-2"> <!-- Tambahkan class px-md-2 di sini -->
                                                <a href="#informasi" style="text-decoration: none;" onclick="tampilkanInformasi('{{ $dii['judul'] }}', '{{ url('/data_informasi/'.$dii['foto']) }}', '{{ $dii['deskripsi'] }}')">
                                                    <img src="{{ url('/data_informasi/'.$dii['foto']) }}" alt="" class="row-img"><br>
                                                    <div class="text-center">
                                                        <h5 class="">{{ $dii['judul'] }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#informasiCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#informasiCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        
                <!-- Modal Popup Informasi-->
                <div class="modal fade" id="informasiModal" tabindex="-1" aria-labelledby="informasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="informasiModalLabel">Informasi Detail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="informasiDetail">
                                    <!-- Konten informasi akan dimasukkan melalui JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Script untuk menangani klik pada gambar -->
                <script>
                    // Fungsi untuk menampilkan modal dengan detail informasi
                    function tampilkanInformasi(judul, foto, deskripsi) {
                        var modalBody = document.getElementById('informasiDetail');
                        modalBody.innerHTML = `
                            <img src="${foto}" class="img-fluid mb-3" alt="${judul}">
                            <h5>${judul}</h5>
                            <p>${deskripsi}</p>
                        `;
                        var modal = new bootstrap.Modal(document.getElementById('informasiModal'));
                        modal.show();
                    }
                </script>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <!-- <section class="page-section bg-light" id="portfolio"> -->
        <div class="container d-flex justify-content-start" id="img-card">
        <div class="row" >
    <div class="col-xxl-6">
        <div class="card d-flex" id="body-head">
            <div class="card-body">
                <h2 class="card-title">Pasar Wage Nganjuk</h2><br>
                <p class="card-text">Pasar Wage merupakan sebuah pasar yang terletak di Jl. Ahmad Yani,</p>
                <p class="card-text">Payaman, Kec. Nganjuk, Kabupaten Nganjuk, buka jam 02.00 s/d 15.00 WIB</p>
                <a href="#" class="btn mt-5" id="btn-detail" data-toggle="modal" data-target="#readMoreModal">Read More</a>
            </div>
            <!-- Modal -->
    <div class="modal fade" id="readMoreModal" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readMoreModalLabel">Pasar Wage Nganjuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pasar Wage merupakan sebuah pasar yang terletak di Jl. Ahmad Yani, Payaman, Kec. Nganjuk, Kabupaten Nganjuk. Pasar ini buka setiap hari mulai pukul 02.00 hingga 15.00 WIB. Pasar ini terkenal dengan berbagai macam produk segar yang dijual, mulai dari sayuran, buah-buahan, hingga kebutuhan sehari-hari lainnya. Dengan lokasi yang strategis dan jam buka yang fleksibel, Pasar Wage menjadi pilihan utama masyarakat sekitar untuk berbelanja kebutuhan mereka.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <div class="col-xxl-6">
        <div class="image-container " style="width: 300px; height: auto; margin-left: 250px;">
            <img src="{{asset('img/wage.png')}}" alt="" class="row-img">
        </div>
    </div>
</div>

            </div>
        <!-- </section> -->
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Promo</h2>
                    <h3 class="section-subheading text-muted">Berikut adalah beberapa promo yang berlaku bulan ini</h3>
                </div>
        
                <!-- Carousel -->
                <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php $chunks = array_chunk($data, 2); @endphp
                        @foreach ($chunks as $key => $chunk)
                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                <div class="row justify-content-center">
                                    @foreach ($chunk as $shop)
                                        <div class="col-md-6 mb-4">
                                            <div class="image-container">
                                                <a href="#promo" style="text-decoration: none;" onclick="tampilkanPromo('{{ $shop->product_name }}', '{{ $shop->photo }}', '{{ $shop->promo_price }}', '{{ $shop->start_date }}', '{{ $shop->end_date }}')">
                                                    <img src="{{ $shop->photo }}" alt="Shop Photo" class="row-img">
                                                    <div class="label">{{ $loop->parent->index * 2 + $loop->iteration }}</div>
                                                    <label class="text">{{ $shop->product_name }}</label>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        
                <!-- Modal Popup -->
                <div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel">Detail Promo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="promoDetail">
                                    <!-- Konten promo akan dimasukkan melalui JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Script untuk menangani klik pada gambar -->
                <script>
                    // Fungsi untuk menampilkan modal dengan detail promo
                    function tampilkanPromo(product_name, foto, promo_price, start_date, end_date) {
                        var modalBody = document.getElementById('promoDetail');
                        modalBody.innerHTML = `
                            <img src="${foto}" class="img-fluid mb-3" alt="${product_name}">
                            <h5>${product_name}</h5>
                            <p>Promo Price: ${promo_price}</p>
                            <p>Start Date: ${start_date}</p>
                            <p>End Date: ${end_date}</p>
                        `;
                        var modal = new bootstrap.Modal(document.getElementById('promoModal'));
                        modal.show();
                    }
                </script>
            </div>
        </section>
        

        <!-- About-->
        <section class="page-section" id="event">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Event</h2>
                    <h3 class="section-subheading text-muted">Berikut adalah beberapa acara yang diselenggarakan</h3>
                </div>
                <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel1">
                    <div class="carousel-inner">
                        @php $chunks = array_chunk($dataEvent->toArray(), 2); @endphp
                        @foreach ($chunks as $key => $chunk)
                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $dee)
                                        <div class="col-md-6 mb-4"> <!-- Tambahkan class mb-4 di sini -->
                                            <div class="image-container px-md-2"> <!-- Tambahkan class px-md-2 di sini -->
                                                <a href="#event" style="text-decoration: none;" onclick="tampilkanEvent('{{ $dee['judul'] }}', '{{ url('/data_event/'.$dee['foto']) }}', '{{ $dee['deskripsi'] }}')">
                                                    <img src="{{ url('/data_event/'.$dee['foto']) }}" alt="" class="row-img"><br>
                                                    <div class="label">{{ $loop->iteration }}</div>
                                                    <div class="text-center">
                                                        <h5 class="">{{ $dee['judul'] }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        
                <!-- Modal Popup -->
                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel">Detail Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="eventDetail">
                                    <!-- Konten event akan dimasukkan melalui JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Script untuk menangani klik pada gambar -->
                <script>
                    // Fungsi untuk menampilkan modal dengan detail event
                    function tampilkanEvent(judul, foto, deskripsi) {
                        var modalBody = document.getElementById('eventDetail');
                        modalBody.innerHTML = `
                            <img src="${foto}" class="img-fluid mb-3" alt="${judul}">
                            <h5>${judul}</h5>
                            <p>${deskripsi}</p>
                        `;
                        var modal = new bootstrap.Modal(document.getElementById('eventModal'));
                        modal.show();
                    }
                </script>
            </div>
        </section>
        
            <!-- <div class="image-container">
                <img src="{{asset('img/event2.png')}}" alt="" class="row-img">
                <div class="label">2</div>
                <div class="text-center">
                    <h5 class="">Jumat Berkah</h4>
                    <p class="text" id="text-event">Setiap hari jumat akan diadakan bagi-</p>
                    <p class="text" id="text-event">bagi nasi secara gratis bagi yang</p>
                    <p class="text" id="text-event">membutuhkan</p>
                </div>
            </div>
            <div class="image-container">
                <img src="{{asset('img/event1.png')}}" alt="" class="row-img">
                <div class="label">3</div>
                <div class="text-center">
                    <h5 class="">Guyon Waton</h4>
                    <p class="text" id="text-event">Untuk merayakan tahun baru 2024 di</p>
                    <p class="text" id="text-event">pasar wage akan mengundang bintang</p>
                    <p class="text" id="text-event">tamu Guyon Waton</p>
                </div>
            </div> -->
        </div>
    </div>
        </section>

        
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                
                <div class="row">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Map</h2>
                        <h3 class="section-subheading text-muted">Berikut lokasi Pasar Wage Nganjuk</h3>
                    </div>
                <div class="card-body">
                <div class="map-container">
    <div id="map"></div>
    <script>
        // Inisialisasi peta dengan koordinat Pasar Wage Nganjuk
        var map = L.map('map').setView([-7.608874, 111.8992217], 17);

        // Menambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Menambahkan marker ke peta untuk Pasar Wage Nganjuk
        var marker = L.marker([-7.608874, 111.8992217]).addTo(map)
            .bindPopup('Pasar Wage Nganjuk')
            .openPopup();
    </script>
                </div>
                            
                            
                            </div>
                   
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Pasar Wage merupakan pasar yang telah ada sejak lama. Namun Pasar Wage baru diresmikan oleh Gubernur Kepala Daerah Provinsi Jawa Timur Bapak Moh. Noer pada tanggal 8 Juni 1973. Pedagang di Pasar Wage Nganjuk dahulu kebanyakan adalah petani yang menjual hasil ladangnya. Saat ini pasar bukan lagi hanya sebagai tempat untuk menjual hasil ladang tetapi masyarakat mulai menyadari bahwa pasar merupakan tempat atau sumber untuk mendapatkan penghasilan dan berbisnis.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
    
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">PasarAja</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Threads
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Illustration
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset ('img/close-icon.svg') }}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Explore
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Graphic Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Finish
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Identity
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Lines
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Branding
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Southwest
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Website Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            <!-- Vectormap -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>

     <!-- Counter Up -->
     <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>
    </body>
</html>
