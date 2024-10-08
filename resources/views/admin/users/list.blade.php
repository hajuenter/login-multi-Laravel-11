@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        @include('_pesan')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Role</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users Role</li>
            </ol>
            <div class="d-flex align-items-center">
                <a href="" class="btn btn-secondary me-2">
                    Admin {{ $dataTotalAdmin }}
                </a> {{--&nbsp;&nbsp; --}}
                <a href="" class="btn btn-primary me-2">
                    Agent {{ $dataTotalAgent }}
                </a>
                <a href="" class="btn btn-warning me-2">
                    User {{ $dataTotalUser }}
                </a>
                <a href="" class="btn btn-success me-2">
                    Active {{ $dataTotalAktif }}
                </a>
                <a href="" class="btn btn-danger me-2">
                    In Active {{ $dataTotalTidakAktif }}
                </a>
                <a href="" class="btn btn-light me-2">
                    Total {{ $dataTotalSemua }}
                </a>
            </div>
        </nav>

        {{-- start cari user --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card mb-2">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Cari User</h6>
                        <form method="get" action="">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Id</label>
                                        <input type="text" name="id" value="{{ Request()->id }}"
                                            class="form-control" placeholder="Masukkan id">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ Request()->name }}"
                                            class="form-control" placeholder="Masukkan name">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" value="{{ Request()->username }}"
                                            class="form-control" placeholder="Masukkan username">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" value="{{ Request()->email }}"
                                            class="form-control" placeholder="Masukkan email">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{ Request()->phone }}"
                                            class="form-control" placeholder="Masukkan no hp">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="text" name="website" value="{{ Request()->website }}"
                                            class="form-control" placeholder="Masukkan website">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-control" name="role">
                                            <option value="">Pilih role</option>
                                            <option value="admin" {{ Request()->role == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="agent" {{ Request()->role == 'agent' ? 'selected' : '' }}>Agent
                                            </option>
                                            <option value="user" {{ Request()->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="">Pilih status</option>
                                            <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ Request()->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">Mulai Tanggal</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}" placeholder="Mulai Tanggal">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">Akhir Tanggal</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}" placeholder="Akhir Tanggal">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-danger">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end cari user --}}

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h4>Data User</h4>
                            <div class="d-flex align-items-center">
                                <a href="{{ url('admin/users/add') }}" class="btn btn-primary">Tambah User</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        {{-- <th>Photo</th> --}}
                                        <th>Phone</th>
                                        <th>Website</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-center">About</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                    <form class="a_form{{ $value->id }}" method="post">
                                        {{ csrf_field() }}
                                        <tr>
                                            <th>{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td style="min-width: 250px;">
                                                <input type="hidden" name="edit_id" value="{{ $value->id }}">
                                                <input type="email" class="form-control" name="edit_email" value="{{ old('email', $value->email) }}">
                                                <button type="button" class="mt-2 btn btn-success submitfform" id="{{ $value->id }}">Simpan</button>
                                            </td>
                                            {{-- <td>
                                            @if (!empty($value->photo))
                                            <img src="{{ asset('uploud/'. $value->photo) }}" style="width: 13px; height:auto;">
                                            @endif
                                        </td> --}}
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->website }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>
                                                @if ($value->role == 'admin')
                                                    <span class="badge bg-secondary">Admin</span>
                                                @elseif($value->role == 'agent')
                                                    <span class="badge bg-primary">Agent</span>
                                                @elseif($value->role == 'user')
                                                    <span class="badge bg-warning">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->status == 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif($value->status == 'inactive')
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/view/' . $value->id) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye icon-sm me-2">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg> <span>View</span></a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/edit/' . $value->id) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 icon-sm me-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg> <span class="">Edit</span></a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/delete/' . $value->id) }}" onclick="return confirm('Apakah anda yakin ingin mengahapus?')"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-trash icon-sm me-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg> <span class="">Delete</span></a>
                                            </td>
                                        </tr>
                                    </form>
                                    @empty
                                        <tr>
                                            <td colspan="100%">Data tidak ditemukan !!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div style="padding: 5px; float: right;">
                            {!! $getRecord->appends(Illuminate\Support\facades\Request::except('page'))->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')'
    <script type="text/javascript">
    $('table').delegate('.submitfform', 'click', function(){
        var id = $(this).attr('id');
        //alert(id);
        $.ajax({
            url:"{{ url('admin/users/update') }}",
            method:"POST",
            data: $('.a_form'+id).serialize(),
            dataType: 'json',
            success:function(response) {
                alert(response.success);
            }
        });
    });
    </script>
@endsection