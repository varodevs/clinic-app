<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Active</td>
            <td>Reg. date</td>
            <td>Role</td>          
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        @foreach ($array as $row)
        <tr>
            <td>{{ $row->id_user }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->password }}</td>
            <td>{{ $row->active }}</td>
            <td>{{ $row->reg_date }}</td>
            <td>{{ $row->role_cod_role }}</td>
        </tr>
    @endforeach
        @else
        <tr><td colspan="7"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>