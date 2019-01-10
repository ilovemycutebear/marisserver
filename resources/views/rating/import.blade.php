<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
    {{ csrf_field() }}

    <table class="table">
        @foreach ($csv_data as $row)
            <tr>
            @foreach ($row as $key => $value)
                <td>{{ $value }}</td>
            @endforeach
            </tr>
        @endforeach
        <tr>
    </table>

    <button type="submit" class="btn btn-primary">
        Import Data
    </button>
</form>