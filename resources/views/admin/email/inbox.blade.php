@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 border-end-lg">
                                <div class="d-flex align-items-center justify-content-between">
                                    <button class="navbar-toggle btn btn-icon border d-block d-lg-none"
                                        data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                        <span class="icon"><i data-feather="chevron-down"></i></span>
                                    </button>
                                    <div class="order-first">
                                        <h4>Mail Service</h4>
                                        <p class="text-muted">amiahburton@gmail.com</p>
                                    </div>
                                </div>
                                <div class="d-grid my-3">
                                    <a class="btn btn-primary" href="{{ url('admin/pesan/compose') }}">Compose Email</a>
                                </div>
                                <div class="email-aside-nav collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link d-flex align-items-center" href="../email/inbox.html">
                                                <i data-feather="inbox" class="icon-lg me-2"></i>
                                                Inbox
                                                <span class="badge bg-danger fw-bolder ms-auto">2
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center"
                                                href="{{ url('admin/pesan/compose') }}">
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
                            <div class="col-lg-9">
                                <div class="p-3 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-end mb-2 mb-md-0">
                                                <i data-feather="inbox" class="text-muted me-2"></i>
                                                <h4 class="me-1">Inbox</h4>
                                                <span class="text-muted">(2 new messages)</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Search mail...">
                                                <button class="btn btn-light btn-icon" type="button"
                                                    id="button-search-addon"><i data-feather="search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="d-none d-md-flex align-items-center flex-wrap">
                                        <div class="form-check me-3">
                                            <input type="checkbox" class="form-check-input" id="inboxCheckAll">
                                        </div>
                                        <div class="btn-group me-2">
                                            <button class="btn btn-outline-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" type="button"> With selected <span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Mark as read</a>
                                                <a class="dropdown-item" href="#">Mark as unread</a><a
                                                    class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                                    href="#">Delete</a>
                                            </div>
                                        </div>
                                        <div class="btn-group me-2">
                                            <button class="btn btn-outline-primary" type="button">Archive</button>
                                            <button class="btn btn-outline-primary" type="button">Span</button>
                                            <button class="btn btn-outline-primary" type="button">Delete</button>
                                        </div>
                                        <div class="btn-group me-2 d-none d-xl-block">
                                            <button class="btn btn-outline-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" type="button">Order by <span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Date</a>
                                                <a class="dropdown-item" href="#">From</a>
                                                <a class="dropdown-item" href="#">Subject</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Size</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end flex-grow-1">
                                        <span class="me-2">1-10 of 253</span>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-icon" type="button"><i
                                                    data-feather="chevron-left"></i></button>
                                            <button class="btn btn-outline-secondary btn-icon" type="button"><i
                                                    data-feather="chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="email-list">

                                    <!-- email list item -->
                                    @foreach ($getRecord as $value)
                                        <div class="email-list-item email-list-item--unread">
                                            <div class="email-list-actions">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                </div>
                                                <a class="favorite" href="javascript:;"><span><i
                                                            data-feather="star"></i></span></a>
                                            </div>
                                            <a href="" class="email-list-detail">
                                                <div class="content">
                                                    <span class="from">{{ $value->subject }} {{-- subject di ambil dari nama kolom di database --}}</span>
                                                    <p class="msg">{{ $value->deskripsi }} {{-- deskripsi di ambil dari nama kolom di database --}}</p>
                                                </div>
                                                <span class="date">
                                                    {{ date('d-M-Y', strtotime($value->created_at)) }}
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                    {{-- email list item end --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
