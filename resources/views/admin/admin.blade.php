@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create & Manage Admin</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="sizing-input-showcode" class="form-label text-muted">Show Admins</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="sizing-input-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted"></p>
                    <div class="live-preview">
                        <form action="{{ route('admin.storeAdmin') }}" method="post">
                            @csrf
                            <div class="row align-items-center g-3">
                                <input id="type" name="type" value="admin" hidden class="form-control" type="text" placeholder="Enter Full Name">
                                <div class="col-lg-6">
                                    <label for="name">Name</label>
                                    <input @if(!auth()->user()->super_admin) readonly disabled @endif value="{{ old('name') }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Full Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <label for="email">E-mail</label>
                                    <input @if (!auth()->user()->super_admin) readonly disabled @endif value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <label for="phone">Generate Password</label>
                                    <input @if (!auth()->user()->super_admin) readonly disabled @endif name="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Generate a Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="super_admin">Make Super Admin</label>
                                    <select @if (!auth()->user()->super_admin) readonly disabled @endif name="super_admin" id="super_admin" class="form-control @error('password') is-invalid @enderror">
                                        <option disabled selected>--Make Super Admin--</option>
                                        <option value="1">Yes</option>
                                        <option value="0">Nope</option>
                                    </select>
                                    @error('super_admin')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                @if (auth()->user()->super_admin)
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary">Create Admin</button>
                                    </div>
                                @endif

                                <!--end col-->
                            </div>
                        </form>
                    </div>

                    <div class="d-none code-view">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th data-ordering="false">ID</th>
                                                <th data-ordering="false">Name</th>
                                                <th data-ordering="false">Email</th>
                                                <th>Joined Date</th>
                                                @if(auth()->id() === 1)
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Models\User::where('type', 'admin')->where('id', '!=', auth()->id())->get() as $admin)
                                                <tr>
                                                    <td>{{ __('CEN-00') . $admin->id }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->created_at->toFormattedDateString() }}</td>
                                                    @if(auth()->id() === 1)  {{--Super Admin--}}
                                                    <td>
                                                        <form onsubmit="return confirm('Are you sure you wanna delete this Admin?')" action="{{ route('admin.delete', $admin->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-2-fill align-middle"></i> Delete User</button>
                                                        </form>
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
