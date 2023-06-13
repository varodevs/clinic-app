<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Lesion</td>
            <td>Intervention Code</td>
            <td>Reg. date</td>
            <td>Cod. patient</td>
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        @foreach ($array as $row)
        <tr>
            @foreach ($row as $column)
            <td><input type="text" value="{{ $column }}" name="input{{ $i }}" disabled/></td>
            @endforeach
        </tr>
    @endforeach
        @else
        <tr><td colspan="5"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>