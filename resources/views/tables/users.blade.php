<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Cod. verify</td>
            <td>Active</td>
            <td>Reg. date</td>
            <td>Role</td>          
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
        <tr><td colspan="7"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>