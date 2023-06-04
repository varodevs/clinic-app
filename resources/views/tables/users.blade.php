<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
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
        @php
            $j = 0;
        @endphp
        @foreach ($array as $row)
        <tr>
            @php
            $i=0;
            @endphp
            @foreach ($row as $column)
            @if ($i != 3)
                @if ($i == 6)
                <td>{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}</td>
                @else
                <td>{{ $column }}</td>
                @endif                
            @endif            
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
                    @if ($j != 0)
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary" disabled>Update</button>
                    @endif
                    
                </form>
            </td>
            <td>
                <form action="{{ route('admin-del-usr') }}" method="POST">
                    @csrf                    
                    <input type="hidden" name="id_user" value={{ $id }} />
                    @if (session('role') != 4)
                    <button type="submit" class="btn btn-primary" disabled>Delete</button>
                    @else
                    <button type="submit" class="btn btn-primary">Delete</button>
                    @endif

                </form>
            </td>
        </tr>
        @php
            $j++;
        @endphp
    @endforeach
        @else
        <tr><td colspan="9"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>