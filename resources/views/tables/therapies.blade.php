<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Material</td>
            <td>-</td> 
            <td>-</td> 
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        <form action="{{ route('admin-upd-ther') }}" method="POST">
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
            <td><input class="w-75 text-center" type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
            @endif
            @php
                if ($i == 0) {
                    $id = $column;
                }
                $i++;
            @endphp
            @endforeach
            <td>
                <button type="submit" class="btn btn-primary">Update</button>   
                </form>
            </td>
            <td>
                <form action="{{ route('admin-del-ther') }}" method="POST">
                    @csrf                    
                    <input type="hidden" name="id_user" value={{ $id }} />
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
    <a href="{{ route('admin-new-ther-view') }}"><button class="btn btn-primary">New Therapy</button></a>
</div>