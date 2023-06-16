<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Lesion</td>
            <td>Intervention</td>
            <td>Reg. date</td>
            <td>Cod. patient</td>
            <td>-</td> 
            <td>-</td> 
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        @foreach ($array as $row)
        <form action="{{ route('admin-upd-ch') }}" method="POST">
            @csrf
            <tr>
                @php
                $i=0;
                @endphp
                @foreach ($row as $column)
                    @if ($i==0)
                    @php
                        $id=$column;
                    @endphp
                    <td><input type="text" value="{{ $column }}" name="cod_ch" disabled/></td>
                    @elseif ($i==3)
                    <td><input type="date" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}" name="date_reg" disabled/></td>
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
                </td>
        </form>
            <td>
                <form action="{{ route('admin-del-ch') }}" method="POST">
                    @csrf                    
                    <input type="hidden" name="id_ch" value={{ $id }} />
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
<div>
    <form action="{{ route('admin-new-ch-view') }}" method="GET">
        <button class="btn btn-primary">New Clinic History</button>
    </form>
</div>