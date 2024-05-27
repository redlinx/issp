@extends('layouts/contentNavbarLayout')

@section('title', 'Add hardware')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-8">
                                <h3 class="card-title">Softwares</h3>
                            </div>
                            <div class="col-4">
                                <form id="frm-search-software">
                                    <div class="row">
                                        <div class="col-2">
                                            <button type="button" class="btn rounded-pill btn-icon btn-outline-secondary"
                                                id="refresh">
                                                <span class="tf-icons bx bx-refresh"></span>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="search" class="form-control" id="softsearchInput"
                                                placeholder="Search...">
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="search-id">
                            <div class="row">
                                {{ $softwares->links() }}
                            </div>
                            <table class="table" id="softtableid">
                                <thead class="table-success">
                                    <tr>
                                        <th>Sofware Type</th>
                                        <th>Software Description</th>
                                        <th>License Type</th>
                                        <th>Expiration Year</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody-softwares">
                                    @foreach ($softwares as $s)
                                        <tr class="table-row">
                                            <td>{{ $s->type }}</td>
                                            <td>{{ $s->description }}</td>
                                            <td>{{ $s->license }}</td>
                                            <td>{{ $s->exp_year }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                        type="button" id="dropdownsoftware" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownsoftware">
                                                        <li>
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#editsoft"
                                                                onclick="getInfo('{{ Crypt::encryptString($s->soft_id) }}')">
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item dropdown-delete"
                                                                sid="{{ Crypt::encryptString($s->soft_id) }}"> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-3">
                                {{ $softwares->links() }}
                            </div>
                        </div>
                        <div class="modal fade" id="editsoft" tabindex="-1" aria-labelledby="editmodallabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editmodallabel">Update Software</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="frmeditid">
                                            <input type="hidden" id="sid" name="sid">
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label for="stype" class="form-label">TYPE</label>
                                                    <input type="text" name="stype" class="form-control"
                                                        id="stype">
                                                </div>
                                                <div class="col-6">
                                                    <label for="sdescription" class="form-label">DESCRIPTION</label>
                                                    <input type="text" name="sdescription" class="form-control"
                                                        id="sdescription">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="licensetype" class="form-label">LICENSE TYPE</label>
                                                    <select name="licensetype" id="licensetype" class="form-select">
                                                        <option value="lifetime">Lifetime</option>
                                                        <option value="notlifetime">Not Lifetime</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="expyear" class="form-label">EXPIRATION DATE</label>
                                                    <input type="date" name="expyear" class="form-control"
                                                        id="expyear">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="saveupdate">Save
                                            changes</button>
                                    </div>
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
    <script src="{{ asset('storage/js/updatesoft.js') }}"></script>
@endsection --}}
