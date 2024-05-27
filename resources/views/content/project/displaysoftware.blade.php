<div class="row">
    {{ $softwares->links() }}
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <thead class="bg-warning-subtle text-warning">
                    <tr>
                        <th>TYPE</th>
                        <th>DESCRIPTION</th>
                        <th>LICENSE</th>
                        <th>EXPIRATION YEAR</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($softwares as $s)
                        <tr class="table-row-software">
                            <td>{{ $s->type }}</td>
                            <td>{{ $s->description }}</td>
                            <td>{{ $s->license }}</td>
                            <td>{{ $s->exp_year }}</td>
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
                                                        data-bs-target="#edit-software-modal"
                                                        onclick="getSoftwareInfo('{{ Crypt::encryptString($s->soft_id) }}')">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item dropdown-delete-software"
                                                        sid="{{ Crypt::encryptString($s->soft_id) }}">Delete</a>
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
    </div>
</div>
<div class="row">
    {{ $softwares->links() }}
</div>
