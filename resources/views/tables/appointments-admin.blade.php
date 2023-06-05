
<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Date</td>
            <td>Confirmed</td>
            <td>Employee</td>
            <td>Patient</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        <form action="{{ route('admin-upd-appo') }}" method="POST">
            @csrf   
            @foreach ($array as $row)
                <tr>
                    @php
                        $i=0;
                    @endphp                    
                    @foreach ($row as $column)
                    @if ($i == 1)
                        <td><input type="date" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}" name="date_ap"/></td>
                    @else
                        @if ($i == 0)
                        <td><input type="text" value="{{ $column }}" name="cod_appo" disabled/></td>
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
                            <input type="hidden" name="id" value={{ $id }} />
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin-del-appo') }}" method="POST">
                            @csrf                    
                            <input type="hidden" name="id_appo" value={{ $id }} />
                            <button type="submit" class="btn btn-primary">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
        <tr><td colspan="5"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>