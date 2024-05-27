<div class="row">
    {{ $trainingservices->links() }}
</div>
<div class="row">
    <table class="table table-hover">
        <thead class="bg-success-subtle text-success">
            <tr>
                <th>Training Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainingservices as $t)
                <tr class="table-row">
                    <td>{{ $t->training_description }}</td>
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
                                                data-bs-target="#training-services-modal"
                                                onclick="getTrainingServicesData('{{ Crypt::encryptString($t->t_id) }}')">Edit</a>

                                        </li>
                                        <li><a class="dropdown-item btn-delete-training-services"
                                                tid="{{ Crypt::encryptString($t->t_id) }}">Delete</a>
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
    {{ $trainingservices->links() }}
</div>
