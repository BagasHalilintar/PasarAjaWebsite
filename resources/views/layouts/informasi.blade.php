<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
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
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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
                  <h2 class="font-weight-bold mt-2">Data Informasi</h2>
                </div>
        
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h2 class="font-weight-bold mt-2">Data Informasi</h2>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="container">
            <div class="row">
            <div class="table-responsive">
              <table id="informasiTable" class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @if($dataInformasi->count() > 0)
                    @foreach ($dataInformasi as $di)
                    <tr>
                        <td scope="row">{{ $i++ }}</td>
                        <td><img src="{{ url('/data_informasi/'.$di->foto) }}"></td>
                        <td>{{ $di->judul }}</td>
                        <td>{{ Str::limit($di->deskripsi, 50) }}</td>
                        <td>
                            <button type="button" class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal{{ $di->id_informasi }}">Edit</button>
                            <button type="button" class="btn btn-info detailBtn" data-toggle="modal" data-target="#detailModal{{ $di->id_informasi }}">Detail</button>
                            <!-- Form untuk menghapus informasi -->
                            <form id="deleteForm_{{ $di->id_informasi }}" action="{{ route('informasi.destroy', $di->id_informasi) }}" method="POST" class="btn btn-danger p-0">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger deleteBtn" onclick="confirmDelete('deleteForm_{{ $di->id_informasi }}')">Hapus</button>
                            </form>
                        </td>
                    </tr>
            
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $di->id_informasi }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $di->id_informasi }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel{{ $di->id_informasi }}">Detail Deskripsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $di->deskripsi }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">Data Tidak Ditemukan!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            
</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-car">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Tambah Informasi</p>

                  <form action="{{ route('upload.proses') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukan Judul" name="judul" autofocus required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Gambar</label>
                        <input class="form-control" type="file" id="gambar" name="foto" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn mt-5" id="btn-detail">Tambah Informasi</button>

                </form>

                  
                </div>
              </div>
            </div>
            
          </div>
          <!-- Modal untuk edit acara -->
          @foreach ($dataInformasi as $de)
<div class="modal fade" id="editModal{{ $de->id_informasi }}" tabindex="-1" aria-labelledby="editModalLabel{{ $de->id_informasi }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $de->id_informasi }}">Edit Informasi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateinformasi.proses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="informasi_id" value="{{ $de->id_informasi }}">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul" name="judul" value="{{ $de->judul }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Gambar</label>
                        <input class="form-control" type="file" id="gambar" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required>{{ $de->deskripsi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    // Fungsi untuk menampilkan konfirmasi penghapusan dengan SweetAlert2
    function confirmDelete(formId) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus saja!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika dikonfirmasi, kirimkan form penghapusan
          document.getElementById(formId).submit();
        }
      });
    }

    $(document).ready(function() {
    $('#informasiTable').DataTable({
        "language": {
            "emptyTable": "Tidak ada data yang sesuai dengan pencarian",
            "zeroRecords": "Tidak ada data yang sesuai dengan pencarian"
        }
    });
});

  </script>
 
</body>
</html>