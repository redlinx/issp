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
            <tr class="table-row">
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
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editproj"
                                            onclick="getInfo('{{ Crypt::encryptString($i->proj_id) }}')">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item dropdown-delete"
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

{{-- <script src="{{ asset('storage/js/updateproj.js') }}"></script> --}}
