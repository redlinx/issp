@extends('layouts/contentNavbarLayout')

@section('title', 'Update Project')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-top-externally-funded" aria-controls="navs-top-externally-funded"
                                aria-selected="true">Externally Funded</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-top-internally-funded" aria-controls="navs-top-internally-funded"
                                aria-selected="false">Internally Funded</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-top-externally-funded" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-8">
                                    <h5 class="card-header">Projects <small class="text-muted ms-1">Externally
                                            Funded</small></h5>
                                </div>
                                <div class="col-4">
                                    <form id="frm-external-funds">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="searchInput" class="form-control"
                                                    placeholder="Search...">
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn rounded-pill btn-primary btn-md">
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="search-id">
                                <div class="row">
                                    {{ $exfunds->links() }}
                                </div>
                                <table class="table table-hover" id="external-fund-table">
                                    <thead class="bg-success-subtle text-success">
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Office</th>
                                            <th>Project Started</th>
                                            <th>Project Ended</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="external-fund-table-data">
                                        @foreach ($exfunds as $e)
                                            <tr class="table-row">
                                                <td>{{ $e->project_Name }}</td>
                                                <td>{{ $e->office }}</td>
                                                <td>{{ $e->project_started }}</td>
                                                <td>{{ $e->project_ended }}</td>
                                                <td>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="demo-inline-spacing">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#list-of-hardwares"
                                                                            onclick="displayHardware('{{ Crypt::encryptString($e->proj_id) }}')">List
                                                                            of
                                                                            Hardwares</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#editproj"
                                                                            onclick="getInfo('{{ Crypt::encryptString($e->proj_id) }}')">Edit</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item dropdown-delete"
                                                                            pid="{{ Crypt::encryptString($e->proj_id) }}">Delete</a>
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
                                <div class="row">
                                    {{ $exfunds->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="navs-top-internally-funded" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-8">
                                    <h5 class="card-header">Projects <small class="text-muted ms-1">Internally
                                            Funded</small></h5>
                                </div>
                                <div class="col-4">
                                    <form id="frm-internal-funds">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="search" placeholder="Search..."
                                                    class="form-control" id="searchInput">
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn rounded-pill btn-primary btn-md">
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="search-infund-id">
                                <div class="row">
                                    {{ $infunds->links() }}
                                </div>
                                <table class="table table-hover">
                                    <thead class="bg-success-subtle text-success">
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Office</th>
                                            <th>Project Started</th>
                                            <th>Project Ended</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infunds as $i)
                                            <tr class="table-row-infunds">
                                                <td>{{ $i->project_Name }}</td>
                                                <td>{{ $i->office }}</td>
                                                <td>{{ $i->project_started }}</td>
                                                <td>{{ $i->project_ended }}</td>
                                                <td>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="demo-inline-spacing">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#list-of-hardwares"
                                                                            onclick="displayHardware('{{ Crypt::encryptString($i->proj_id) }}')">List
                                                                            of
                                                                            Hardwares</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#editproj"
                                                                            onclick="getInfo('{{ Crypt::encryptString($i->proj_id) }}')">Edit</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item dropdown-delete-infunds"
                                                                            pid="{{ Crypt::encryptString($i->proj_id) }}">Delete</a>
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
                                <div class="row">
                                    {{ $infunds->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- edit-software-modal --}}
                <div class="modal fade" id="edit-software-modal" tabindex="-1" aria-labelledby="edit-software-label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="edit-software-label">Update Software</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="conatiner">
                                    <form id="frm-edit-software">
                                        <input type="hidden" name="softid" id="software-id-id">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="type" class="form-label">TYPE</label>
                                                <input type="text" name="type" class="form-control"
                                                    id="software-type-id">
                                            </div>

                                            <div class="col-6">
                                                <label for="description" class="form-label">DESCRIPTION</label>
                                                <input type="text" name="description" class="form-control"
                                                    id="software-description-id">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <label for="license" class="form-label">LICENSE</label>
                                                <select name="license" id="software-license-id" class="form-select">
                                                    <option value="lifetime">lifetime</option>
                                                    <option value="not lifetime">not lifetime</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="expyear" class="form-label">EXPIRATION YEAR</label>
                                                <input type="text" name="expyear" class="form-control"
                                                    id="software-expyear-id">
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
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- edit hardware modal --}}
                <div class="modal fade" id="edit-hardware-modal" tabindex="-1" aria-labelledby="edit-hardware-label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="edit-hardware-label">Update Hardware</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form id="frm-edit-hardware">
                                        <input type="hidden" name="pid" id="pid-id">
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <label for="item" class="form-label">ITEM</label>
                                                <input type="text" name="item" class="form-control"
                                                    id="item-id">
                                            </div>
                                            <div class="col-4">
                                                <label for="type" class="form-label">TYPE</label>
                                                <input type="text" name="type" class="form-control"
                                                    id="type-id">
                                            </div>
                                            <div class="col-4">
                                                <label for="dateprocured" class="form-label">ACQUISITION DATE</label>
                                                <input type="date" name="dateprocured" class="form-control"
                                                    id="dateprocured-id">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <label for="ownership" class="form-label">OWNERSHIP</label>
                                                <select name="ownership" id="ownership-id" class="form-select">
                                                    <option value="owned">Owned</option>
                                                    <option value="leased">Leased</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="codenumber" class="form-label">CODE NUMBER</label>
                                                <input type="text" name="codenumber" class="form-control"
                                                    id="codenumber-id">
                                            </div>
                                            <div class="col-4">
                                                <label for="assetclass" class="form-label">ASSET CLASSIFICATION</label>
                                                <input type="text" name="assetclass" class="form-control"
                                                    id="assetclass-id">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <label for="modelnumber" class="form-label">MODEL NUMBER</label>
                                                <input type="text" name="modelnumber" class="form-control"
                                                    id="modelnumber-id">
                                            </div>
                                            <div class="col-3">
                                                <label for="serialnumber" class="form-label">SERIAL NUMBER</label>
                                                <input type="text" name="serialnumber" class="form-control"
                                                    id="serialnumber-id">
                                            </div>
                                            <div class="col-3">
                                                <label for="aquisitioncost" class="form-label">AQUISTION COST</label>
                                                <input type="text" name="aquisitioncost" class="form-control"
                                                    id="aquisitioncost-id">
                                            </div>
                                            <div class="col-3">
                                                <label for="propertynumber" class="form-label">INVENTORY NUMBER</label>
                                                <input type="text" name="propertynumber" class="form-control"
                                                    id="propertynumber-id">
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
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- list-of-softwares --}}
                <div class="modal fade" id="list-of-softwares-modal" tabindex="-1"
                    aria-labelledby="list-of-softwares-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <form id="frm-search-software">
                                    <input type="hidden" name="hdid" id="hd-search-id">
                                    <div class="row mb-3">
                                        <div class="col-2">
                                            <h1 class="modal-title fs-5" id="list-of-softwares-label">List of Softwares
                                            </h1>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn rounded-pill btn-outline-secondary btn-sm" type="button"
                                                data-bs-toggle="modal" data-bs-target="#list-of-hardwares"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOhJREFUSEvtk7EOAUEQhr8rKDUaEg9CL+FFqEQnCpEgKjWJpyDRCInXUWo8ADeyJ3K5vR2X3e6mvbn/y3wzGxG4osD5lACnYZeiKrADBs4kS0MeoAkcgDYU35UNIKESLhAp16TWAbN+HAJboKLUcjMaj1n9PgBJ7iKedJmG2EbvGEUNhyL5PgJmpq8HXH8hvpYsgDVwAfpagPRpz1SO4Q48gPo/AOWeP9cmgCdQCwGYAytALqrrE9CKtYyBiQkV/7KHbxV5QC+Ltymw0Z5pnvs04ATsgbP2oWkXq+orokgVnDSVAKeu4Ire6HAcGfwNoEgAAAAASUVORK5CYII=" />
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="searchSoftwareInput" class="form-control"
                                                placeholder="Search...">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row mb-4">
                                        <div id="software-table" class="col-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- list of hardwares --}}
                <div class="modal fade" id="list-of-hardwares" tabindex="-1" aria-labelledby="list-of=hardwares-label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">

                                <form id="frm-search-hardware" class="row">
                                    <input type="hidden" name="projid" id="proj-search-id">
                                    <div class="col-3">
                                        <h1 class="modal-title fs-5" id="list-of=hardwares-label">List of
                                            Hardwares
                                        </h1>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="searchHardwareInput" class="form-control"
                                            placeholder="Search...">
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-primary" type="Submit">Search</button>
                                    </div>

                                </form>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-15">
                                <div class="container">
                                    <div class="row">
                                        <div id="hardware-table" class="col-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- update project --}}
                <div class="modal fade" id="editproj" tabindex="-1" aria-labelledby="editlabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editlabel">Update Project</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="frmedit">
                                    <input type="hidden" id="pid">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label for="pname" class="form-label">Project Name</label>
                                            <input type="text" name="pname" class="form-control" id="pnameid">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="office" class="form-label">Office</label>
                                            <input type="text" name="office" class="form-control" id="officeid">
                                        </div>
                                        <div class="col-4">
                                            <label for="pstarted" class="form-label">Project started</label>
                                            <input type="date" name="pstarted" class="form-control" id="pstartedid">
                                        </div>
                                        <div class="col-4">
                                            <label for="pended" class="form-label">Project ended</label>
                                            <input type="date" name="pended" class="form-control" id="pendedid">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveedit">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{-- @section('page-script')
    <script src="{{ asset('storage/js/updateproj.js') }}"></script>
@endsection --}}
