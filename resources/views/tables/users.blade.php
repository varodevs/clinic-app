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
            <td>-</td> 
            <td>-</td>         
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        @foreach ($array as $row)
        <tr>
            @php
            $i=0;
            @endphp 
            @foreach ($row as $column)
            <td>{{ $column }}</td>
            @php
            if ($i == 0) {
                $id=$column;
            }
            $i++;
            @endphp
            @endforeach
            <td>
                <form action="{{ route('admin-upd-usr', ['row' => $row]) }}" method="POST">
                    @csrf                    
                    {{-- <input type="hidden" name="id" value={{ $id }} /> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </td>
            <td>
                <form action="{{ route('admin-del-usr') }}" method="POST">
                    @csrf                    
                    <input type="hidden" name="id_user value={{ $id }} />
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
        @else
        <tr><td colspan="7"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>