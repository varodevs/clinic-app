<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
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
        <form action="{{ route('admin-upd-usr') }}" method="POST">
            @csrf   
        @foreach ($array as $row)
        <tr>
            @php
            $i=0;
            @endphp
            @foreach ($row as $column)
            @if ($i != 3 && $i != 4)
                @if ($i == 2)
                <td><input type="email" value="{{ $column }}" name="date_reg"/></td>
                @elseif ($i == 6)
                <td><input type="date" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}" name="date_reg"/></td>
                @else
                <td><input type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
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