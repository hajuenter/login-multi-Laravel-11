@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Role</li>
        </ol>
    </nav>

    <div class="row justify-content-center">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-center text-primary">View Form</h6>
                    <form class="forms-sample">
                        <div class="row mb-1">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" readonly value="{{ $getRecord->name }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" readonly value="{{ $getRecord->username }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" readonly value="{{ $getRecord->email }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->phone }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->address }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">About</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->about }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->website }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->role }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->status }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Created At</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" readonly value="{{ $getRecord->created_at }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Delete</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary" >Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection