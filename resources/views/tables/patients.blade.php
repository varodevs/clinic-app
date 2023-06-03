<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Date birth</td>
            <td>Age</td>
            <td>Sex</td>
            <td>Username</td>
            <td>Issued by</td>            
        </tr>
    </thead>
    <tbody>
        @if (is_array($array) && $array != null)
            @foreach ($array as $row)
                <tr>
                    @foreach ($row as $column)
                    <td>{{ $column }}</td>
                    @endforeach
                </tr>
            @endforeach
        @else
        <tr><td colspan="8"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>