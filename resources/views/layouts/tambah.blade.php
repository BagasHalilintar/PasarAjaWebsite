<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PasarAja</title>
  @include('include.style')
</head>

<body>
  <div class="container-scroller">
    @include('include.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('include.sidebar')
      <!-- partial -->
      <!-- <div class="container">

      </div> -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h2 class="font-weight-bold mt-2">Data Toko</h2>
                </div>
        
              </div>
            </div>
          </div>
          
          <form action="{{ route('add.toko') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Masukan Email" name="email" autofocus required>
            </div>
            <div class="mb-3">
              <label for="phone_number" class="form-label">No.Handphone</label>
              <input type="text" class="form-control" id="phone_number" placeholder="Masukan no.handphone" name="phone_number" autofocus required>
            </div>
            <div class="mb-3">
              <label for="shop_name" class="form-label">Nama Toko</label>
              <input type="text" class="form-control" id="shop_name" placeholder="Masukan nama toko" name="shop_name" autofocus required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
            </div>
            <div class="mb-3">
              <label for="benchmark" class="form-label">Titik Lokasi</label>
              <input type="text" class="form-control" id="benchmark" placeholder="Masukan titik lokasi" name="benchmark" autofocus required>
            </div>
            <div class="mb-3">
              <label for="photo" class="form-label">Upload Gambar</label>
              <input class="form-control" type="file" id="photo" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary mt-5" id="btn-detail">Tambah Toko</button>
          </form>
          
          <!-- Tampilkan notifikasi sebagai alert dialog -->
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        

          {{--
          <div class="container">
            <div class="row">
              <div class="table-responsive">
                <table class="table align-middle"> --}}

                  <div class="container">
                    <div class="row">
                      <div class="table-responsive">
                        <table id="datatokotabel" class="table align-middle">
                          <thead>
                            <tr>
                              <th>Foto Pasar</th>
                              {{-- <th>ID Toko</th> --}}
                              <th>Nama Toko</th>
                              <th>Nama Pemilik</th>
                              <th>Nomor Telpon</th>
                              <th>Deskripsi</th>
                              <th>Titik Lokasi</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $shop)
                            <tr>
                              <td>
                                <img src="{{ $shop->photo }}" alt="Shop Photo"
                                  style="width: 100px; height: 100px; border-radius: 0; object-fit: cover;">
                              </td>
                              {{-- <td>{{ $shop->id_shop }}</td> --}}
                              <td>{{ $shop->shop_name }}</td>
                              <td>{{ $shop->owner_name }}</td>
                              <td>{{ $shop->phone_number }}</td>
                              <td>{{ $shop->description }}</td>
                              <td>{{ $shop->benchmark }}</td>
                              <td>
                                <a href="{{ route('edit.toko', $shop->id_shop) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('delete.toko', $shop->id_shop) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE') <!-- Method spoofing -->
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus toko ini?')">Delete</button>
                                </form>
                            </td>
                            
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <!-- content-wrapper ends -->
                  <!-- partial:partials/_footer.html -->
                  <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                        Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                        from BootstrapDash.
                        All rights reserved.</span>
                      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made
                        with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                          href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                    </div>
                  </footer>
                  <!-- partial -->
              </div>

              <!-- partial -->
            </div>
            <!-- main-panel ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        @include('include.scripct')

        <script>
          $(document).ready(function() {
    $('#datatokotabel').DataTable({
        "language": {
            "emptyTable": "Tidak ada data yang sesuai dengan pencarian",
            "zeroRecords": "Tidak ada data yang sesuai dengan pencarian"
        }
    });
});
        </script>
</body>

</html>