@extends('layouts/contentNavbarLayout')

@section('title', 'Add hardware')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ADD HARDWARE</h3>
        </div>
        <div class="card-body">
            <form id="frmaddhardware">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="tycd" class="form-label">TYPE OF COMPUTING DEVICE</label>
                        <select name="tycd" id="hrd-select" class="form-select">
                            <option value="server">Server</option>
                            <option value="desktoppc">Desktop PC</option>
                            <option value="laptop">Laptop</option>
                            <option value="mobilephone">Mobile Phone</option>
                            <option value="other">Other type</option>
                        </select>
                    </div>

                    <div class="col-3" id="spectype">
                        <label for="spectype" class="form-label">Specify Item Type</label>
                        <input type="text" name="spectype" class="form-control" placeholder="Enter Specified Item Type">
                    </div>

                    <div class="col-3" id="opsystemid">
                        <label for="opsystem" class="form-label">OPERATING SYSTEM</label>
                        <input type="text" name="opsystem" class="form-control" placeholder="Enter Operating System">
                    </div>

                    <div class="col-3" id="licensetypeid">
                        <label for="licensetype" class="form-label">License Type</label>
                        <select name="licensetype" id="ltypeid" class="form-select">
                            <option value="lifetimelicense">Lifetime License</option>
                            <option value="notlifetimelicense">Not Lifetime</option>
                        </select>
                    </div>

                    <div class="col-3" id="expyearid">
                        <label for="expyear" class="form-label">YEAR OF EXPIRATION</label>
                        <input type="year" name="expyear" class="form-control" placeholder="Enter year of expiration">
                    </div>

                    <div class="col-3" id="tcohid">
                        <label for="tcoh" class="form-label">TOTAL CAPACITY OF HOD</label>
                        <select name="tcoh" id="" class="form-select">
                            <option value="above4tb">Above 4 TB</option>
                            <option value="2tbto4tb">2 TB to 4 TB</option>
                            <option value="below2tb">Below 2 TB</option>
                        </select>
                    </div>
                    <div class="col-3" id="locid">
                        <label for="slocation" class="form-label">LOCATION</label>
                        <select name="slocation" id="" class="form-select">
                            <option value="inhouse">IN-HOUSE</option>
                            <option value="colocated">CO-LOCATED</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="item" class="form-label">ITEM</label>
                        <input type="text" name="item" class="form-control" placeholder="Enter Item/Description">
                    </div>
                    <div class="col-4">
                        <label for="codenumber" class="form-label">CODE NUMBER</label>
                        <input type="text" name="codenumber" class="form-control" placeholder="Enter Code Cumber">
                    </div>
                    <div class="col-4">
                        <label for="assetclassification" class="form-label">ASSET CLASSIFICATION</label>
                        <input type="text" name="assetclassification" class="form-control"
                            placeholder="Enter Asset Classification">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="modelnumber" class="form-label">MODEL NUMBER</label>
                        <input type="text" name="modelnumber" class="form-control" placeholder="Enter Model Number">
                    </div>
                    <div class="col-4">
                        <label for="serialnumber" class="form-label">SERIAL NUMBER</label>
                        <input type="text" name="serialnumber" class="form-control"
                            placeholder="Enter Serial Number">
                    </div>
                    <div class="col-4">
                        <label for="aquisitioncost" class="form-label">AQUISITION COST</label>
                        <input type="text" name="aquisitioncost" class="form-control"
                            placeholder="Enter Aquisition Cost">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="inventorynum" class="form-label">INVENTORY NUMBER</label>
                        <input type="text" name="inventorynum" class="form-control"
                            placeholder="Enter Inventory Number">
                    </div>
                    <div class="col-4">
                        <label for="operation" class="form-label">OPERATIONS</label>
                        <select name="operation" id="operationid" class="form-select">
                            <option value="employee">Employee</option>
                            <option value="training">Training</option>
                            <option value="frontlineservices">Frontline Services</option>
                        </select>
                    </div>
                    <div class="col-4 mt-4" id="employeeid">
                        <button type="button" name="employee" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#employeemodal">
                            Select Employee
                        </button>
                        <input type="hidden" name="empvalue" value="" id="empvalue">
                    </div>
                    <div class="col-4 mt-4" id="trainingid">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#trainingmodal">
                            Select Training Services
                        </button>
                        <input type="hidden" name="tvalue" value="" id="tvalue">
                    </div>
                    <div class="col-4 mt-4" id="fservicesid">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#fservicesmodal">
                            Select Frontline Services
                        </button>
                        <input type="hidden" name="fsvalue" value="" id="fsvalue">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="gass" class="form-label">GENERAL ADMINISTRATION AND SUPPORT SERVICE</label>
                        <select name="gass" id="gassid" class="form-select">
                            <option value="supported">Supported</option>
                            <option value="nosupported">Not Supported</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="acquisitiondate" class="form-label">ACQUISITION DATE</label>
                        <input type="date" name="acquisitiondate" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="ownership" class="form-label">OWNERSHIP</label>
                        <select name="ownership" id="" class="form-select">
                            <option value="owned">Owned</option>
                            <option value="leased">Leased</option>
                        </select>
                    </div>
                </div>
                <div class="con" id="softwareid">
                    <div class="row mb-1">
                        <div class="col-4">
                            <label for="" class="form-label">OFFICE AUTOMATION SOFTWARE</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <input type="hidden" name="softvalue" id="softvalue" value="">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#softwaremodal">
                                Select Softwares
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="project" class="form-label">PROJECT</label>
                        <select name="project" id="selectprojectid" class="form-select">
                            <option value="operated">Operated by a project</option>
                            <option value="notoperated">Not operated by a project</option>
                        </select>
                    </div>
                    <div class="col-4 mt-4" id="projectid">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#projectmodal">
                            Select Project
                        </button>
                        <input type="hidden" name="projectvalue" value="" id="projectvalue">
                    </div>
                </div>


                {{-- modals --}}
                {{-- office automation software --}}
                <div class="modal fade" id="softwaremodal" tabindex="-1" aria-labelledby="#softwaremodallabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="sofwaremodallabel">Select Office Automation Softwares
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Software Types</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($softwares as $s)
                                                    <tr>
                                                        <td>{{ $s->type }}</td>
                                                        <td>{{ $s->description }}</td>
                                                        <td><button class="btn btn-success btn-sm selectsoftid"
                                                                sid="{{ Crypt::encryptString($s->soft_id) }}">Select</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Project modal --}}
                <div class="modal fade" id="projectmodal" tabindex="-1" aria-labelledby="projectlabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="projectlabel">SELECT PROJECT</h1>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6"><input type="text" class="form-control" id="psearchInput"
                                            placeholder="Search..."></div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" id="projecttableid">
                                            <thead>
                                                <tr>
                                                    <th>Projects</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projects as $p)
                                                    <tr>
                                                        <td>{{ $p->project_Name }}</td>
                                                        <td><button class="btn btn-success btn-sm selectprojectid"
                                                                pid="{{ Crypt::encryptString($p->proj_id) }}">Select</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>






                {{-- frontlineservicesmodal --}}
                <div class="modal fade" id="fservicesmodal" tabindex="-1" aria-labelledby="fserviceslabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="fserviceslabel">SELECT FRONTLINE SERVICES</h1>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="fssearchInput"
                                            placeholder="Search...">
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" id="fservicestableid">
                                            <thead>
                                                <tr>
                                                    <th>Frontline Services</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($fservices as $fs)
                                                    <tr>
                                                        <td>{{ $fs->services }}</td>
                                                        <td><button class="btn btn-success btn-sm selectfsid"
                                                                fsid="{{ Crypt::encryptString($fs->fs_id) }}">Select</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>





                {{-- training modal --}}
                <div class="modal fade" id="trainingmodal" tabindex="-1" aria-labelledby="#traininglabelid"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="traininglabelid">SELECT TRAINING DESCRIPTION</h1>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6"><input type="text" class="form-control" id="tsearchInput"
                                            placeholder="Search...">
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" id="trainingtable">
                                            <thead>
                                                <tr>
                                                    <th>Training Services Description</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trainings as $t)
                                                    <tr>
                                                        <td>{{ $t->training_description }}</td>
                                                        <td><button class="btn btn-success btn-sm selecttrainingid"
                                                                tid="{{ Crypt::encryptString($t->t_id) }}">Select</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


                {{-- employee --}}
                <div class="modal fade" id="employeemodal" tabindex="-1" aria-labelledby="emplabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="emplabel">SELECT EMPLOYEE</h1>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6"><input type="text" class="form-control" id="esearchInput"
                                            placeholder="Search...">
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" id="eTable">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Employee Name</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $e)
                                                    <tr>
                                                        <td>{{ $e->firstName }}</td>
                                                        <td>{{ $e->middleName }}</td>
                                                        <td>{{ $e->lastName }}</td>
                                                        <td><button class="btn btn-success btn-sm selectempid"
                                                                eid="{{ Crypt::encryptString($e->emp_id) }}">Select</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('storage/app/public/js/addhardware.js') }}"></script>
@endsection
