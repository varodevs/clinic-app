<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Title</td>
            <td>Title Court.</td>
            <td>Date Birth</td>
            <td>Date Hire</td>
            <td>Image</td>
            <td>ID user</td>
            <td>-</td>
            <td>-</td>         
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        <form class="col-12" action="{{ route('admin-upd-emp') }}" method="POST">
            @csrf
            @foreach ($array as $row)
                @php
                    $i = 0;
                @endphp
                <tr>
                    @foreach ($row as $column)
                    @if ($i == 4 && $i == 5)
                    <td><input class="w-75 text-center" type="date" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}" name="date{{ $i }}"/></td>
                    @else
                    <td><input class="w-75 text-center" type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
                    @endif
                    @php                                
                    if ($i == 0) {
                        $id=$column;
                    }

                    $i++;                 
                @endphp
                    @endforeach
                    <td>
                        <button type="submit" class="btn btn-primary">Update</button>   
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin-del-emp') }}" method="POST">
                            @csrf                    
                            <input type="hidden" name="cod_emp" value={{ $id }} />
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
<div>
    <form action="" method="GET">
        <button class="btn btn-primary" type="submit">New Employee</button>
    </form>
</div>