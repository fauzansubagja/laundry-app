@extends('layouts.main')
@section('konten')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="{{ asset('image/profile/' . Auth::user()->image) }}"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    {{-- {{dd($data)}} --}}
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ $user->username }}</h4>
                                        <p>{{ $user->role }}</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ $user->email }}</h4>
                                        <p>Email</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                class="nav-link active show">About
                                                Me</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                class="nav-link">Setting</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4 mt-1">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 col-5">
                                                        <h5 class="f-w-500">Username <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-8 col-7"><span>{{ $user->username }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-8 col-7"><span>{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 col-5">
                                                        <h5 class="f-w-500">Hak Akses <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-8 col-7"><span>{{ $user->role }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 col-5">
                                                        <h5 class="f-w-500">Mengelola Cabang <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-8 col-7"><span>{{ $user->outlet->nama }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Account Setting</h4>
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" placeholder="Email" name="email"
                                                                    class="form-control" value="{{ $user->email }}">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">New Password</label>
                                                                <input type="password" placeholder="Password"
                                                                    name="password" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Nama</label>
                                                                <input type="text" placeholder="Username" name="name"
                                                                    class="form-control" value="{{ $user->name }}">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" placeholder="Confirm Password"
                                                                    name="username" class="form-control"
                                                                    value="{{ $user->username }}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Upload</span>
                                                                <div class="form-file">
                                                                    <input type="file"
                                                                        class="form-file-input form-control"
                                                                        id="image" name="image"
                                                                        onchange="previewImage()">
                                                                </div>
                                                            </div>
                                                            @if (isset($user) && $user->image)
                                                                <img id="preview"
                                                                    src="{{ asset('image/profile/' . $user->image) }}"
                                                                    alt="Preview" class="img-fluid rounded-circle"
                                                                    width="100" height="100">
                                                            @else
                                                                <img id="preview" src="#" alt="Preview"
                                                                    class="img-fluid rounded-circle" width="100"
                                                                    height="100">
                                                            @endif
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">btn-close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="flaticon-381-user-7"></i>
                                                </span>
                                                <div class="media-body text-white text-end">
                                                    <p class="mb-1">Pelanggan</p>
                                                    <h3 class="text-white">{{ $members }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="widget-stat card bg-danger">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="la la-store"></i>
                                                </span>
                                                <div class="media-body text-white text-end">
                                                    <p class="mb-1">Outlet</p>
                                                    <h3 class="text-white">{{ $outlets }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="widget-stat card bg-info">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="la la-shopping-bag"></i>
                                                </span>
                                                <div class="media-body text-white text-end">
                                                    <p class="mb-1">Total Pesanan</p>
                                                    <h3 class="text-white">{{ $transaksi_baru }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="widget-stat card bg-success">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="la la-check"></i>
                                                </span>
                                                <div class="media-body text-white text-end">
                                                    <p class="mb-1">Selesai</p>
                                                    <h3 class="text-white">{{ $selesai }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('ajax_crud')
    <script>
        function previewImage() {
            var fileInput = document.getElementById('image');
            var preview = document.getElementById('preview');
            var label = document.querySelector('.custom-file-label');
            var oldImage = document.getElementById('old_image');
            // Jika ada gambar lama, tampilkan dulu previewnya
            if (oldImage) {
                preview.setAttribute('src', oldImage.src);
                preview.style.display = 'block';
            }
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.setAttribute('src', e.target.result);
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(fileInput.files[0]);
                label.innerHTML = fileInput.files[0].name;
            }
        }
    </script>
@endpush
