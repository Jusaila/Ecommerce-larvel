@extends('layouts-website.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <!-- Optional: Add any title or heading here if needed -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Address</h2>
            <form method="POST" action="{{ route('address.store') }}">
                @csrf
                <div class="p-3 p-lg-5 border bg-white">
                    <!-- Country Selection -->
                    <div class="form-group">
                        <label for="country" class="text-black">Country <span class="text-danger">*</span></label>
                        <select id="country" class="form-control" name="country">
                            <option value="">Select a country</option>
                            <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                            <option value="Algeria" {{ old('country') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                            <option value="Afghanistan" {{ old('country') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                            <option value="Ghana" {{ old('country') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                            <option value="Albania" {{ old('country') == 'Albania' ? 'selected' : '' }}>Albania</option>
                            <option value="Bahrain" {{ old('country') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                            <option value="Colombia" {{ old('country') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                            <option value="Dominican Republic" {{ old('country') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                        </select>
                        @error('country')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Name Fields -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fname" class="text-black">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}">
                            @error('fname')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}">
                            @error('lname')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- House Name -->
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="housename" class="text-black">House Name</label>
                            <input type="text" class="form-control" id="housename" name="housename" value="{{ old('housename') }}">
                            @error('housename')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Street address" value="{{ old('address') }}">
                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- State and Pincode -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="state" class="text-black">State <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
                            @error('state')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pincode" class="text-black">Pincode <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('pincode') }}">
                            @error('pincode')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Email and Phone -->
                    <div class="form-group row mb-5">
                        <div class="col-md-6">
                            <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

