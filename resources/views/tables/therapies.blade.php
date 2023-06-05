<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Material</td>
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
        <tr><td colspan="4"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>