<div class="row">
    {{ $hardwares->links() }}
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <thead class="bg-warning-subtle text-warning">
                    <tr>
                        <th>ITEM</th>
                        <th>TYPE</th>
                        <th>ACQUISTION DATE</th>
                        <th>OWNERSHIP</th>
                        <th>CODE NUMBER</th>
                        <th>ASSET CLASSIFICATION</th>
                        <th>MODEL NUMBER</th>
                        <th>SERIAL NUMBER</th>
                        <th>ACQUISITION COST</th>
                        <th>INVENTORY NUMBER</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hardwares as $h)
                        <tr class="hardware-table-row">
                            <td>{{ $h->item }}</td>
                            <td>{{ $h->type }}</td>
                            <td>{{ $h->date_Procured }}</td>
                            <td>{{ $h->ownership }}</td>
                            <td>{{ $h->code_number }}</td>
                            <td>{{ $h->asset_classification }}</td>
                            <td>{{ $h->model_number }}</td>
                            <td>{{ $h->serial_number }}</td>
                            <td>{{ $h->aquisition_cost }}</td>
                            <td>{{ $h->property_number }}</td>
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
                                                        data-bs-target="#list-of-softwares-modal"
                                                        onclick="displaySoftware('{{ Crypt::encryptString($h->hd_id) }}')">List
                                                        of Softwares</a>
                                                </li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#edit-hardware-modal"
                                                        onclick="getHardwareInfo('{{ Crypt::encryptString($h->hd_id) }}')">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item dropdown-delete-hardware"
                                                        hid="{{ Crypt::encryptString($h->hd_id) }}">Delete</a>
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
    {{ $hardwares->links() }}
</div>
