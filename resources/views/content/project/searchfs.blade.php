<div class="row">
    {{ $fservices->links() }}
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-hover">
            <thead class="bg-warning-subtle text-warning">
                <tr>
                    <th>FRONTLINE SERVICES DESCRIPTION</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fservices as $f)
                    <tr>
                        <td>{{ $f->services }}</td>
                        <td>
                            <button class="btn btn-success btn-sm btn-select-fs" type="button"
                                fid="{{ Crypt::encryptString($f->fs_id) }}">Select</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    {{ $fservices->links() }}
</div>
