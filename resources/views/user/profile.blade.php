@extends('layout.master')
@section('main_section')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="dropdown flex-shrink-0 ms-auto">
                            <button class="btn btn-light btn-icon btn-sm" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-share"></i>
                            </button>

                        </div>
                    </div>
                    <div class="text-center border-bottom border-dashed pb-4">
                        <img src="{{ asset($user->profile_image ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp9oEh4KYLkefVokbfCyMlmIe72CljRg9-msioAIHjVg&s') }}"
                            alt="" class="avatar-lg rounded-circle p-1 img-thumbnail">
                        <div class="mt-3">
                            <h5>{{ $user->username }}</h5>
                            <p class="text-muted">{{ $user->role->name }}</p>
                        </div>

                    </div>

                    <div class="border-bottom border-dashed py-4">
                        <h5 class="card-title mb-3">Information</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th class="ps-0" scope="row">Email</th>
                                        <td class="text-muted text-end">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Phone No</th>
                                        <td class="text-muted text-end">{{ $user->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Country</th>
                                        <td class="text-muted text-end">{{ $user->country }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">City</th>
                                        <td class="text-muted text-end">{{ $user->city }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="tab-content">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 border-bottom py-3">
                                        <h4>Personal Information</h4>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="user_id" class="form-label">User ID</label>
                                        <input type="text" class="form-control bg-light" id="user_id" name="user_id"
                                            value="{{ $user->User_Id }}" required readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Username" required value="{{ $user->username }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                            placeholder="Enter phone number" required value="{{ $user->phone_number }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email address" required value="{{ $user->email }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter password">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <select id="country" name="country" class="form-select">
                                            <option value="Pakistan" @selected($user->country == 'Pakistan')>Pakistan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <select id="city" name="city" class="form-select" required>
                                            <option value="" disabled selected>Select city</option>
                                            <option value="Karachi" @selected($user->city == 'Karachi')>Karachi</option>
                                            <option value="Lahore" @selected($user->city == 'Lahore')>Lahore</option>
                                            <option value="Islamabad" @selected($user->city == 'Islamabad')>Islamabad</option>
                                            <option value="Peshawar" @selected($user->city == 'Peshawar')>Peshawar</option>
                                            <option value="Quetta" @selected($user->city == 'Quetta')>Quetta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="profile_image" class="form-label">Profile Image</label>
                                        <input type="file" class="form-control" id="profile_image"
                                            name="profile_image" placeholder="Upload profile image">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea id="address" name="address" rows="3" class="form-control" placeholder="Enter address">{{ $user->address ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button class="btn btn-dark" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
