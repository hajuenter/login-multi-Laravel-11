@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        @include('_pesan')
        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 border-end-lg">
                                <div class="aside-content">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button class="navbar-toggle btn btn-icon border d-block d-lg-none"
                                            data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                            <span class="icon"><i data-feather="chevron-down"></i></span>
                                        </button>
                                        <div class="order-first">
                                            <h4>Mail Service</h4>
                                            <p class="text-muted">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <div class="d-grid my-3">
                                        <a class="btn btn-primary" href="{{ url('admin/pesan/compose') }}">Compose Email</a>
                                    </div>
                                    <div class="email-aside-nav collapse">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="{{ url('admin/pesan/kirim') }}">
                                                    <i data-feather="inbox" class="icon-lg me-2"></i>
                                                    Inbox
                                                    <span class="badge bg-danger fw-bolder ms-auto">2
                                                </a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="mail" class="icon-lg me-2"></i>
                                                    Sent Mail
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="briefcase" class="icon-lg me-2"></i>
                                                    Important
                                                    <span class="badge bg-secondary fw-bolder ms-auto">4
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="file" class="icon-lg me-2"></i>
                                                    Drafts
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="star" class="icon-lg me-2"></i>
                                                    Tags
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="trash" class="icon-lg me-2"></i>
                                                    Trash
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="text-muted tx-12 fw-bolder text-uppercase mb-2 mt-4">Labels</p>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="tag" class="text-warning icon-lg me-2"></i>
                                                    Important
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="tag" class="text-primary icon-lg me-2"></i>
                                                    Business
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center" href="#">
                                                    <i data-feather="tag" class="text-info icon-lg me-2"></i>
                                                    Inspiration
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div>
                                    <div class="d-flex align-items-center p-3 border-bottom tx-16">
                                        <span data-feather="edit" class="icon-md me-2"></span>
                                        New message
                                    </div>
                                </div>
                                {{-- form start --}}
                                <form method="post" action="{{ url('admin/pesan/compose_post') }}">
                                    @csrf
                                    <div class="p-3 pb-0">
                                        <div class="to">
                                            <div class="row mb-3">
                                                <label class="col-md-2 col-form-label">To:</label>
                                                <div class="col-md-10">
                                                    <select class="compose-multiple-select form-select" name="user_id" required> 
                                                        {{-- <option value="AL"></option> --}}
                                                        @foreach ($getEmail as $value)
                                                            <option value="{{ $value->id }}">{{ $value->email }} - {{ $value->role }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="to cc">
                                            <div class="row mb-3">
                                                <label class="col-md-2 col-form-label">Cc</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="cc_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="subject">
                                            <div class="row mb-3">
                                                <label class="col-md-2 col-form-label">Subject</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="subject" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label visually-hidden">Descriptions
                                                </label>
                                                <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md-12">
                                                <button class="btn btn-primary me-1 mb-1" type="submit"> Send</button>
                                                <button class="btn btn-secondary me-1 mb-1" type="reset"> Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- form end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
