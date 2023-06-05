<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Lesion</td>
            <td>Intervention Code</td>
            <td>Reg. date</td>
            <td>Cod. patient</td>
            <td>-</td> 
            <td>-</td> 
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        <form action="{{ route('admin-del-usr') }}" method="POST">
            @csrf
        @foreach ($array as $row)
        <tr>
            @foreach ($row as $column)
            <td><input class="w-75 text-center" type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
            @endforeach
            <td>
                <button type="submit" class="btn btn-primary">Update</button>   
                </form>
            </td>
            <td>
                <form action="{{ route('admin-del-usr') }}" method="POST">
                    @csrf                    
                    <input type="hidden" name="id_user" value={{ $id }} />
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
        @else
        <tr><td colspan="5"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>