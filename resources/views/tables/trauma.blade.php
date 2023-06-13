<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>-</td> 
            <td>-</td> 
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        <form action="{{ route('admin-del-trau') }}" method="POST">
            @csrf
        @foreach ($array as $row)
        <tr>
            @php
            $i=0;
            @endphp
            @foreach ($row as $column)
            @if ($i == 0)
            <td><input type="text" value="{{ $column }}" name="id" disabled/></td>
            @else
            <td><input type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
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
                <form action="{{ route('admin-del-trau') }}" method="POST">
                    @csrf                    
                    <input type="hidden" name="id_trau" value={{ $id }} />
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
        @else
        <tr><td colspan="4"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>
<div>
    <form action="{{ route('admin-new-trau-view') }}" method="GET">
        <button class="btn btn-primary">New Trauma</button>
    </form>
</div>