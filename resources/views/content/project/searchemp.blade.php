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
                                eid="{{ Crypt::encrypt($e->emp_id) }}">Select</button>
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
