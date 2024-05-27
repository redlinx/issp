<div class="row">
    {{ $tservices->links() }}
</div>
<table class="table table-hover">
    <thead class="bg-warning-subtle text-warning">
        <tr>
            <th>TRAINING DESCRIPTION</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tservices as $t)
            <tr>
                <td>{{ $t->training_description }}</td>
                <td>
                    <button class="btn btn-sm btn-success btn-select-training-services" type="button"
                        tid="{{ Crypt::encrypt($t->t_id) }}">Select</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    {{ $tservices->links() }}
</div>
