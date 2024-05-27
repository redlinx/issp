@extends('layouts/contentNavbarLayout')

@section('title', 'Create Project')

@section('content')

    <h4 class="text-muted">Create Project</h4>

    <form id="frmcreateproj">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pname" class="form-label">PROJECT NAME</label>
                                        <input type="text" name="pname" placeholder="Enter Project Name"
                                            id="project-name" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pstarted" class="form-label">PROJECT STARTED</label>
                                        <input type="date" name="pstarted" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="office" class="form-label">OFFICE</label>
                                        <input type="text" name="office" class="form-control"
                                            placeholder="Enter office where the project is assigned">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <h5 class="card-title">Funder</h5>
                        </div>
                        <div class="row mb-3">
                            <label for="projfund" class="form-label">FUNDER TYPE</label>
                            <select name="projfund" id="" class="form-select">
                                <option value="internallyfund">Internally Funded</option>
                                <option value="externallyfund">External Funded</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="funder" class="form-label">FUNDER</label>
                            <input type="text" name="funder" class="form-control" placeholder="Enter Funder Name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

    {{-- modals --}}

    {{-- add hardware modal --}}
    <div class="modal fade" id="add-hardware-modal" tabindex="-1" aria-labelledby="addhardwdarelabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addhardwdarelabel">Add Hardware</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frm-add-hardware">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-3">
                                <input type="hidden" id="projid" name="projid" value="">
                                <div class="col-4">
                                    <label for="hardwareType" class="form-label">TYPE OF COMPUTING DEVICE</label>
                                    <select name="hardwareType" id="hardwareType" class="form-select">
                                        <option value="server">Server</option>
                                        <option value="desktoppc">Desktop PC</option>
                                        <option value="laptop">Laptop</option>
                                        <option value="mobilephone">Mobile Phone</option>
                                        <option value="othertype">Other Type</option>
                                    </select>
                                </div>
                                <div id="server-option" class="col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="tcoh" class="form-label">TOTAL CAPACITY OF HOD</label>
                                            <select name="tcoh" id="tcoh" class="form-select">
                                                <option value="above4tb">Above 4 TB</option>
                                                <option value="2tbto4tb">2 TB to 4 TB</option>
                                                <option value="below2tb">Below 2 TB</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="location" class="form-label">LOCATION</label>
                                            <select name="location" id="location" class="form-select">
                                                <option value="inhouse">IN-HOUSE</option>
                                                <option value="colocated">CO-LOCATED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="mobile-pc-option" class="col-8">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="opsystem" class="form-label">OPERATING SYSTEM</label>
                                            <input type="text" name="opsystem" class="form-control"
                                                placeholder="Enter Operating System">
                                        </div>
                                        <div class="col-4">
                                            <label for="licensetype" class="form-label">LICENSE TYPE</label>
                                            <select name="licensetype" id="licensetype" class="form-select">
                                                <option value="lifetimelicense">Lifetime License</option>
                                                <option value="nolifetime">Not Lifetime</option>
                                            </select>
                                        </div>
                                        <div class="col-4" id="notelifetime-option">
                                            <label for="expdate" class="form-label">EXPIRATION DATE</label>
                                            <input type="text" name="expdate" class="form-control"
                                                placeholder="Enter Expiration Date!">
                                        </div>
                                    </div>
                                </div>
                                <div id="other-type-option" class="col-4">
                                    <label for="otheritemtype" class="form-label">SPECIFY ITEM TYPE</label>
                                    <input type="text" name="otheritemtype" class="form-control"
                                        placeholder="Enter Specified Item Type">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="item" class="form-label">ITEM</label>
                                    <input type="text" name="item" class="form-control"
                                        placeholder="Enter Item/Description">
                                </div>
                                <div class="col-4">
                                    <label for="codenumber" class="form-label">CODE NUMBER</label>
                                    <input type="text" name="codenumber" class="form-control"
                                        placeholder="Enter Code Number">
                                </div>
                                <div class="col-4">
                                    <label for="assetclass" class="form-label">ASSET CLASSIFICATION</label>
                                    <input type="text" name="assetclass" class="form-control"
                                        placeholder="Enter Asset Classification">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <label for="modelnumber" class="form-label">MODEL NUMBER</label>
                                    <input type="text" name="modelnumber" class="form-control"
                                        placeholder="Enter Model Number">
                                </div>
                                <div class="col-4">
                                    <label for="serialnumber" class="form-label">SERIAL NUMBER</label>
                                    <input type="text" name="serialnumber" class="form-control"
                                        placeholder="Enter Serial Number">
                                </div>
                                <div class="col-4">
                                    <label for="acquisitioncost" class="form-label">ACQUISITION COST</label>
                                    <input type="text" name="acquisitioncost" class="form-control"
                                        placeholder="Enter Acquisition Cost">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="inventorynumber" class="form-label">INVENTORY NUMBER</label>
                                    <input type="text" name="inventorynumber" class="form-control"
                                        placeholder="Enter Inventory Number">
                                </div>
                                <div class="col-6">
                                    <label for="gass" class="form-label">GENERAL ADMINISTRATION AND SUPPORT
                                        SERVICE</label>
                                    <select name="gass" id="" class="form-select">
                                        <option value="supported">Supported</option>
                                        <option value="notsupported">Not Supported</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="ownership" class="form-label">OWNERSHIP</label>
                                    <select name="ownership" id="" class="form-select">
                                        <option value="owned">Owned</option>
                                        <option value="leased">Leased</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="acquisitiondate" class="form-label">ACQUISITION DATE</label>
                                    <input type="date" name="acquisitiondate" class="form-control">
                                </div>
                            </div>
                            {{-- services and employee value --}}

                            <input type="hidden" name="empidval" id="empidval">
                            <input type="hidden" name="tsidval" id="tsidval">
                            <input type="hidden" name="fsidval" id="fsidval">

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="selectoperator" class="form-label">SERVICES AND EMPLOYEES</label>
                                </div>
                                <div class="col-4" id="software-label">
                                    <label for="selectsoftware" class="form-label">SOFTWARE</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <div class="input-group">
                                        <select name="selectoperator" id="select-operator" class="form-select">
                                            <option value="employee">Employees</option>
                                            <option value="trainingservices">Training Services</option>
                                            <option value="frontlineservices">Frontline Services</option>
                                        </select>
                                        <button id="employee-modal" class="btn btn-outline-secondary" type="button"
                                            data-bs-toggle="modal" data-bs-target="#select-employee-modal">...</button>
                                        <button class="btn btn-outline-secondary" id="training-services-modal"
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#select-training-services-modal">...</button>
                                        <button class="btn btn-outline-secondary" id="frontline-services-modal"
                                            data-bs-toggle="modal" data-bs-target="#select-frontline-services-modal"
                                            type="button">...</button>
                                    </div>
                                </div>
                                <div class="col-4" id="list-software-button">
                                    <input type="hidden" name="softval" id="softval-id">

                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#select-software-modal" id="software-modal"><i
                                            class="bx bxs-devices"></i>Select
                                        Softwares</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- softwares modal --}}
    <div class="modal fade" id="select-software-modal" tabindex="-1" aria-labelledby="select-software-label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <form id="frm-search-software">
                        <div class="row">
                            <div class="col-2">
                                <h1 class="modal-title fs-5" id="select-software-label">Select Software</h1>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded-pill btn-outline-secondary btn-sm" type="button"
                                    data-bs-toggle="modal" data-bs-target="#add-hardware-modal"><img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOhJREFUSEvtk7EOAUEQhr8rKDUaEg9CL+FFqEQnCpEgKjWJpyDRCInXUWo8ADeyJ3K5vR2X3e6mvbn/y3wzGxG4osD5lACnYZeiKrADBs4kS0MeoAkcgDYU35UNIKESLhAp16TWAbN+HAJboKLUcjMaj1n9PgBJ7iKedJmG2EbvGEUNhyL5PgJmpq8HXH8hvpYsgDVwAfpagPRpz1SO4Q48gPo/AOWeP9cmgCdQCwGYAytALqrrE9CKtYyBiQkV/7KHbxV5QC+Ltymw0Z5pnvs04ATsgbP2oWkXq+orokgVnDSVAKeu4Ire6HAcGfwNoEgAAAAASUVORK5CYII=" />
                                </button>
                            </div>
                            <div class="col-5">
                                <input type="text" name="searchSoftwareInput" class="form-control"
                                    placeholder="Search...">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-reponsive">
                                <table class="table table-hover">
                                    <thead class="bg-warning-subtle text-warning">
                                        <tr>
                                            <th>TYPE</th>
                                            <th>DESCRIPTION</th>
                                            <th>LICENSE</th>
                                            <th>EXPIRATION DATE</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($softwares as $s)
                                            <tr>
                                                <td>{{ $s->type }}</td>
                                                <td>{{ $s->description }}</td>
                                                <td>{{ $s->license }}</td>
                                                <td>{{ $s->exp_year }}</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm btn-select-soft"
                                                        sid="{{ Crypt::encryptString($s->soft_id) }}"
                                                        type="button">Select</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>





    {{-- frontline services --}}
    <div class="modal fade" id="select-frontline-services-modal" tabindex="-1"
        aria-labelledby="select-frontline-services-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <form id="frm-search-frontline-services">
                        <div class="row">
                            <div class="col-2">
                                <h1 class="modal-title fs-5" id="select-frontline-services-label">Select Frontline
                                    Services</h1>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded-pill btn-outline-secondary btn-sm" type="button"
                                    data-bs-toggle="modal" data-bs-target="#add-hardware-modal"><img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOhJREFUSEvtk7EOAUEQhr8rKDUaEg9CL+FFqEQnCpEgKjWJpyDRCInXUWo8ADeyJ3K5vR2X3e6mvbn/y3wzGxG4osD5lACnYZeiKrADBs4kS0MeoAkcgDYU35UNIKESLhAp16TWAbN+HAJboKLUcjMaj1n9PgBJ7iKedJmG2EbvGEUNhyL5PgJmpq8HXH8hvpYsgDVwAfpagPRpz1SO4Q48gPo/AOWeP9cmgCdQCwGYAytALqrrE9CKtYyBiQkV/7KHbxV5QC+Ltymw0Z5pnvs04ATsgbP2oWkXq+orokgVnDSVAKeu4Ire6HAcGfwNoEgAAAAASUVORK5CYII=" />
                                </button>
                            </div>
                            <div class="col-5">
                                <input type="text" name="searchfs" placeholder="Search..." class="form-control">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-search-frontline-services"
                                    type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="search-frontline-services">
                        <div class="row">
                            {{ $fservices->links() }}
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-hover">
                                    <thead class="bg-warning-subtle text-warning">
                                        <tr>
                                            <th>FRONTLINE SERVICES DESCRIPTION</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fservices as $f)
                                            <tr>
                                                <td>{{ $f->services }}</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm btn-select-fs" type="button"
                                                        fid="{{ Crypt::encryptString($f->fs_id) }}">Select</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            {{ $fservices->links() }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{-- training services modal --}}
    <div class="modal fade" id="select-training-services-modal" tabindex="-1"
        aria-labelledby="select-training-services-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <form id="frm-search-training-services">
                        <div class="row">
                            <div class="col-2">
                                <h1 class="modal-title fs-5" id="select-training-services-label">Select Training Services
                                </h1>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded-pill btn-outline-secondary btn-sm" type="button"
                                    data-bs-toggle="modal" data-bs-target="#add-hardware-modal"><img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOhJREFUSEvtk7EOAUEQhr8rKDUaEg9CL+FFqEQnCpEgKjWJpyDRCInXUWo8ADeyJ3K5vR2X3e6mvbn/y3wzGxG4osD5lACnYZeiKrADBs4kS0MeoAkcgDYU35UNIKESLhAp16TWAbN+HAJboKLUcjMaj1n9PgBJ7iKedJmG2EbvGEUNhyL5PgJmpq8HXH8hvpYsgDVwAfpagPRpz1SO4Q48gPo/AOWeP9cmgCdQCwGYAytALqrrE9CKtYyBiQkV/7KHbxV5QC+Ltymw0Z5pnvs04ATsgbP2oWkXq+orokgVnDSVAKeu4Ire6HAcGfwNoEgAAAAASUVORK5CYII=" />
                                </button>
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Search..." class="form-control" name="searchts">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="search-training-services">
                        <div class="row">
                            {{ $tservices->links() }}
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <table class="table table-hover">
                                    <thead class="bg-warning-subtle text-warning">
                                        <tr>
                                            <th>TRAINING DESCRIPTION</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tservices as $t)
                                            <tr>
                                                <td>{{ $t->training_description }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-success btn-select-training-services"
                                                        type="button"
                                                        tid="{{ Crypt::encryptString($t->t_id) }}">Select</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    {{ $tservices->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{-- employee-modal --}}
    <div class="modal fade" id="select-employee-modal" tabindex="-1" aria-labelledby="employeemodallabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <form id="search-employee">
                        <div class="row">
                            <div class="col-2">
                                <h1 class="modal-title fs-5" id="employeemodallabel">Select Employee</h1>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded-pill btn-outline-secondary btn-sm" type="button"
                                    data-bs-toggle="modal" data-bs-target="#add-hardware-modal"><img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOhJREFUSEvtk7EOAUEQhr8rKDUaEg9CL+FFqEQnCpEgKjWJpyDRCInXUWo8ADeyJ3K5vR2X3e6mvbn/y3wzGxG4osD5lACnYZeiKrADBs4kS0MeoAkcgDYU35UNIKESLhAp16TWAbN+HAJboKLUcjMaj1n9PgBJ7iKedJmG2EbvGEUNhyL5PgJmpq8HXH8hvpYsgDVwAfpagPRpz1SO4Q48gPo/AOWeP9cmgCdQCwGYAytALqrrE9CKtYyBiQkV/7KHbxV5QC+Ltymw0Z5pnvs04ATsgbP2oWkXq+orokgVnDSVAKeu4Ire6HAcGfwNoEgAAAAASUVORK5CYII=" />
                                </button>
                            </div>
                            <div class="col-5">
                                <input type="text" name="searchEmployee" class="form-control"
                                    placeholder="Search...">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="search-employee-table">
                        <div class="row mb-3">
                            {{ $employees->links() }}
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-hover">
                                    <thead class="bg-warning-subtle text-warning">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
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
                                                    <button class="btn btn-success btn-sm btn-select-emp" type="button"
                                                        eid="{{ Crypt::encryptString($e->emp_id) }}">Select</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>



@endsection

{{-- @section('page-script')
    <script src="{{ asset('storage/js/addproj.js') }}"></script>
@endsection --}}
