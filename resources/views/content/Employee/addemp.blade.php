@extends('layouts/contentNavbarLayout')

@section('title', 'Update Project')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <h3 class="card-title">ADD EMPLOYEE</h3>
                    </div>
                    <form id="frmaddemp">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="fname" class="form-label">FIRST NAME</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-6">
                                <label for="mname" class="form-label">MIDDLE NAME</label>
                                <input type="text" name="mname" class="form-control" placeholder="Enter Middle Name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="lname" class="form-label">LAST NAME</label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('page-script')
    <script src="{{ asset('storage/js/addemp.js') }}"></script>
@endsection --}}
