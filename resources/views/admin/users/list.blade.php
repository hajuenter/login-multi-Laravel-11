@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Hoverable Table</h6>
                        <p class="text-muted mb-1">Add class <code>.table-hover</code></p>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <th>{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->email }}</td>
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
                                        </tr>
                                    @endforeach
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
