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

        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">View Form</h6>

                    <form class="forms-sample">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Delete</button>
                        <button type="button" class="btn btn-secondary">Back</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection