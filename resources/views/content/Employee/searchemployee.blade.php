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

{{-- <script src="{{ asset('storage/js/updateoperation.js') }}"></script> --}}
