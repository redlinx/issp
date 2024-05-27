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
                        <button class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" type="button"
                            id="dropdownsoftware" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownsoftware">
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editsoft"
                                    onclick="getInfo('{{ Crypt::encryptString($s->soft_id) }}')">
                                    Edit</a>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-delete" sid="{{ Crypt::encryptString($s->soft_id) }}">
                                    Delete</a>
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

{{-- <script src="{{ asset('storage/js/updatesoft.js') }}"></script> --}}
