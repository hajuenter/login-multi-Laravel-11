@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        @include('_pesan')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Users</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Users Form</h6>

                        <form class="forms-sample" method="post" action="{{ url('admin/users/edit/'. $getData->id) }}">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Name <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" required placeholder="Name" value="{{ $getData->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Username <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" required placeholder="Username" value="{{ $getData->username }}">
                                    {{-- <span style="color: red;">{{ $errors->first('username') }}</span> --}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required placeholder="Email" value="{{ $getData->email }}">
                                    <span style="color: red;">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Phone <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="phone" required placeholder="No hp" value="{{ $getData->phone }}">
                                    <span style="color: red;">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control" required>
                                        <option value="">Pilih Role</option>
                                        <option {{ ($getData->role == 'admin') ? 'selected' : ''}} value="admin">Admin</option>
                                        <option {{ ($getData->role == 'agent') ? 'selected' : ''}} value="agent">Agent</option>
                                        <option {{ ($getData->role == 'user') ? 'selected' : ''}} value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Status <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control" required>
                                        <option value="">Pilih Status</option>
                                        <option {{ ($getData->status == 'active') ? 'selected' : ''}} value="active">Active</option>
                                        <option {{ ($getData->status == 'inactive') ? 'selected' : ''}} value="inactive">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
