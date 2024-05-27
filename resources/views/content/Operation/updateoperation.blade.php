@extends('layouts/contentNavbarLayout')

@section('title', 'Update Operations')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#employees" aria-controls="employees"
                                aria-selected="true">Employees</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#trainingservices" aria-controls="trainingservices"
                                aria-selected="false">Training Services</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#frontlineservices" aria-controls="frontlineservices"
                                aria-selected="false">Frontline Services</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="employees" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-8">
                                    <h5 class="card-header">Employees</h5>
                                </div>
                                <div class="col-4">
                                    <form id="frm-search-employee">
                                        <div class="row">
                                            <div class="col-2">
                                                <button type="button"
                                                    class="btn rounded-pill btn-icon btn-outline-secondary"
                                                    id="refresh-employee">
                                                    <span class="tf-icons bx bx-refresh"></span>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="searchemployee" class="form-control"
                                                    placeholder="Search...">
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="search-employee">
                                <div class="row">
                                    {{ $employees->links() }}
                                </div>
                                <div class="row">
                                    <table class="table table-hover">
                                        <thead class="bg-success-subtle text-success">
                                            <tr>
                                                <th>FIRST NAME</th>
                                                <th>MIDDLE NAME</th>
                                                <th>LAST NAME</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $e)
                                                <tr class="table-row">
                                                    <td>{{ $e->firstName }}</td>
                                                    <td>{{ $e->middleName }}</td>
                                                    <td>{{ $e->lastName }}</td>
                                                    <td>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                            <div class="demo-inline-spacing">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                                                data-bs-target="#edit-employee"
                                                                                onclick="getEmployeeInfo('{{ Crypt::encryptString($e->emp_id) }}')">Edit</a>

                                                                        </li>
                                                                        <li><a class="dropdown-item dropdown-delete-emp"
                                                                                eid="{{ Crypt::encryptString($e->emp_id) }}">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    {{ $employees->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="trainingservices" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-8">
                                    <h5 class="card-header">Traning Services</h5>
                                </div>
                                <div class="col-4">
                                    <form id="frm-search-training-services">
                                        <div class="row">
                                            <div class="col-2">
                                                <button type="button"
                                                    class="btn rounded-pill btn-icon btn-outline-secondary"
                                                    id="refresh-training-services">
                                                    <span
                                                        class="tf-icons
                                                    bx bx-refresh"></span>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="searchtrainingservices" placeholder="Search..."
                                                    class="form-control">
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="search-tservices">
                                <div class="row">
                                    {{ $trainingservices->links() }}
                                </div>
                                <div class="row">
                                    <table class="table table-hover">
                                        <thead class="bg-success-subtle text-success">
                                            <tr>
                                                <th>Training Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trainingservices as $t)
                                                <tr class="table-row">
                                                    <td>{{ $t->training_description }}</td>
                                                    <td>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                            <div class="demo-inline-spacing">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#training-services-modal"
                                                                                onclick="getTrainingServicesData('{{ Crypt::encryptString($t->t_id) }}')">Edit</a>

                                                                        </li>
                                                                        <li><a class="dropdown-item btn-delete-training-services"
                                                                                tid="{{ Crypt::encryptString($t->t_id) }}">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    {{ $trainingservices->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="frontlineservices" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-8">
                                    <h5 class="card-header">Frontline Services</h5>
                                </div>
                                <div class="col-4">
                                    <form id="frm-search-frontline-services">
                                        <div class="row">
                                            <div class="col-2">
                                                <button type="button"
                                                    class="btn rounded-pill btn-icon btn-outline-secondary"
                                                    id="refresh-frontline-services">
                                                    <span
                                                        class="tf-icons
                                                    bx bx-refresh"></span>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="searchfrontlineservices" class="form-control"
                                                    placeholder="Search...">
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="search-frontline-services">
                                <div class="row">
                                    {{ $frontlineservices->links() }}
                                </div>
                                <div class="row mb-3">
                                    <table class="table table-hover">
                                        <thead class="bg-success-subtle text-success">
                                            <tr>
                                                <th>FRONTLINE SERVICES DESCRIPTION</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($frontlineservices as $f)
                                                <tr class="table-row">
                                                    <td>{{ $f->services }}</td>
                                                    <td>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                            <div class="demo-inline-spacing">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#frontline-services-modal"
                                                                                onclick="getFrontlineServicesData('{{ Crypt::encryptString($f->fs_id) }}')">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item btn-delete-frontline-services"
                                                                                fsid="{{ Crypt::encryptString($f->fs_id) }}">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    {{ $frontlineservices->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modals --}}

        {{-- frontline-services --}}
        <div class="modal fade" id="frontline-services-modal" tabindex="-1" aria-labelledby="frontline-services-label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="frontline-services-label">Update Frontline Services</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frm-edit-frontline-services">
                            <input type="hidden" name="fsid" id="fsid">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="fsname" class="form-label">FRONTLINE SERVICES</label>
                                    <input type="text" name="fsname" class="form-control" id="fsname-id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>


        {{-- training-services --}}
        <div class="modal fade" id="training-services-modal" tabindex="-1"
            aria-labelledby="training-services-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="training-services-modal-label">Update Training Services
                            Information
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frm-update-training-services">
                            <div class="row mb-4">
                                <input type="hidden" id="tid" name="tid">
                                <div class="col-6">
                                    <label for="tdescription" class="form-label">TRAINING DESCRIPTION</label>
                                    <input type="text" name="tdescription" class="form-control" id="tdescription-id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>



        {{-- employee-update --}}
        <div class="modal fade" id="edit-employee" tabindex="-1" aria-labelledby="edit-employee" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="edit-employee">Update Employee Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frm-update-employee">
                            <div class="row mb-3">
                                <input type="hidden" name="id" id="empid">
                                <div class="col-6">
                                    <label for="fname" class="form-label">FIRST NAME</label>
                                    <input type="text" name="fname" class="form-control" id="fname">
                                </div>
                                <div class="col-6">
                                    <label for="mname" class="form-label">MIDDLE NAME</label>
                                    <input type="text" name="mname" class="form-control" id="mname">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label for="lname" class="form-label">LAST NAME</label>
                                    <input type="text" name="lname" class="form-control" id="lname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('page-script')
        <script src="{{ asset('storage/js/updateoperation.js') }}"></script>
    @endsection
