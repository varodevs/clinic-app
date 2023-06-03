<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Street</td>
            <td>Postal Code</td>
            <td>City</td>
            <td>Country</td>
            <td>Number</td>
            <td>Flat</td>
            <td>Cod. patient</td>
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
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