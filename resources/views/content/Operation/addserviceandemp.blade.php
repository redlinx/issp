@extends('layouts/contentNavbarLayout')

@section('title', 'Update Operations')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Training Services</h5>
                                <form id="frm-add-training-services">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="tsdescription" class="form-label">TRAINING DESCRIPTION</label>
                                            <input type="text" name="tsdescription" class="form-control"
                                                placeholder="Enter Training Description">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Employee</h5>
                                <form id="frm-add-employee">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="fname" class="form-label">FIRST NAME</label>
                                            <input type="text" name="fname" class="form-control"
                                                placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="mname" class="form-label">MIDDLE NAME</label>
                                            <input type="text" name="mname" class="form-control"
                                                placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="lname" class="form-label">LAST NAME</label>
                                            <input type="text" name="lname" class="form-control"
                                                placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Add FrontLine Services
                                </h5>
                                <form id="frm-add-frontline-services">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="fsdescription" class="form-label">FRONTLINE SERVICE
                                                DESCRIPTION</label>
                                            <input type="text" class="form-control" name="fsdescription"
                                                placeholder="Enter Frontline Description">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('storage/js/addservemp.js') }}"></script>
@endsection
