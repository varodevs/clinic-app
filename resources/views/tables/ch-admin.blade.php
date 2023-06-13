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
            @php
            $i=0;
            @endphp
            @foreach ($row as $column)
                @if ($i==0)
                <td><input type="text" value="{{ $column }}" name="id" disabled/></td>
                @elseif ($i==2)
                <td><input type="date" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}" name="date_reg" disabled/></td>
                @else
                <td><input type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
                @endif
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
        @php
        if ($i == 0) {
            $id=$column;
        }
        $i++;
        @endphp
    @endforeach
        @else
        <tr><td colspan="5"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>
<div>
    <a href="{{ route('admin-new-ch-view') }}"><button class="btn btn-primary">New Clinic History</button></a>
</div>