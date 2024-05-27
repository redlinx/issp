@extends('layouts/contentNavbarLayout')

@section('title', 'Add hardware')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD SOFTWARE</h4>
                    <form id="frmaddsoft">
                        <div class="row mb-4 mt-3">
                            <div class="col-3">
                                <label for="stype" class="form-label">SOFTWARE TYPE</label>
                                <select name="stype" class="form-select" id="">
                                    <option value="os">Operating System</option>
                                    <option value="oas">Office Automation Software</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="sdescription" class="form-label">DESCRIPTION</label>
                                <input type="text" name="sdescription" class="form-control"
                                    placeholder="Enter Software Description">
                            </div>
                            <div class="col-3">
                                <label for="licensetype" class="form-label">LICENSE TYPE</label>
                                <select name="licensetype" id="licenseid" class="form-select">
                                    <option value="lifetime">Lifetime</option>
                                    <option value="notlifetime">Not Lifetime</option>
                                </select>
                            </div>
                            <div class="col-3" id="expyearid">
                                <label for="expyear" class="form-label">EXPIRATION DATE</label>
                                <input type="date" name="expyear" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('page-script')
    <script src="{{ asset('storage/js/addsoftware.js') }}"></script>
@endsection --}}
