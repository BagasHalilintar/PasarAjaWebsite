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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
              aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
              aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="{{asset ('admin_asset/template/images/faces/face1.jpg')}}"
                    alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset ('admin_asset/template/images/faces/face2.jpg')}}"
                    alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset ('admin_asset/template/images/faces/face3.jpg')}}"
                    alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset ('admin_asset/template/images/faces/face4.jpg')}}"
                    alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset ('admin_asset/template/images/faces/face5.jpg')}}"
                    alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset ('admin_asset/template/images/faces/face6.jpg')}}"
                    alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
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
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                        <table class="table align-middle">
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
                                <img src="{{ asset('shops/' . $shop->photo) }}" alt="Shop Photo"
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

</body>

</html>