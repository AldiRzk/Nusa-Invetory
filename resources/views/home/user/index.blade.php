@extends('layouts.master')
@section('title', 'User')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-secondary text-white ">
                        <h4 class="mb-0 text-white">User Data</h4>
                        {{-- <a href="/user/create" class="btn btn-sm btn-light text-primary">+ Add User</a> --}}
                        <button type="button" class="btn btn-sm btn-white text-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            + Add Data
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-secondary">
                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add User Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/user/store" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}" />
                                                @error('email')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    value="{{ old('password') }}" />
                                                @error('password')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Role</label>
                                                <select name="role" id="" class="form-control">
                                                    <option value="" hidden>-- Select Role --</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="staff">Staff</option>
                                                </select>
                                                @error('role')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-3 py-2">
                        <div class="table-responsive">
                            <table class="table" id="data-table">
                                <thead class="bg-light">
                                    <tr class="text-center text-secondary text-uppercase text-xs font-weight-bold">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->name }}</td>
                                            <td class="text-center">{{ $data->email }}</td>
                                            <td class="text-center">
                                                <span class="badge bg-gradient-info text-white">{{ $data->role }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="/user/{{ $data->id }}/edit"
                                                    class="btn btn-sm btn-warning me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                {{-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editmodal" data-id="{{ $data->id }}"
                                                    data-name="{{ $data->name }}" data-email="{{ $data->email }}"
                                                    data-role={{ $data->role }}> <i class="fas fa-edit"></i>
                                                    Edit
                                                </button> --}}
                                                <a href="/user/{{ $data->id }}/destroy" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin Akan Dihapus?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </td>
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
    {{-- <div class="modal fade" id="editmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="" id="editForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg-gradient-secondary">
                        <h5 class="modal-title text-white">User Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" id="edit-name"
                                class="form-control" value="{{ old('name') }}" />
                            @error('name')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="edit-email"
                                class="form-control" value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"
                                value="{{ old('password') }}" />
                            @error('password')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Role</label>
                            <select name="role" id="edit-role" class="form-control">
                                <option value="" hidden>-- Select Role --</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                            @error('role')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editmodal');
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const email = button.getAttribute('data-email');
                const role = button.getAttribute('data-role');

                editModal.querySelector('#edit-id').value = id;
                editModal.querySelector('#edit-name').value = name;
                editModal.querySelector('#edit-email').value = email;
                editModal.querySelector('#edit-role').value = role;

                const form = document.getElementById('editForm');
                form.action = `/user/${id}/update`;
            });
        });
    </script> --}}

@endsection
