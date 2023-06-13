<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Street</td>
            <td>Postal Code</td>
            <td>City</td>
            <td>Country</td>
            <td>Number</td>
            <td>Flat</td>
            <td>Cod. patient</td>
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
        <form action="{{ route('admin-upd-addr') }}" method="POST">
            @csrf   
            @foreach ($array as $row)
                <tr>
                    @php
                        $i=0;
                    @endphp                    
                    @foreach ($row as $column)
                        @if ($i == 0)
                        <td><input type="text" value="{{ $column }}" name="cod_appo" disabled/></td>
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
                        <form action="{{ route('admin-del-addr') }}" method="POST">
                            @csrf                    
                            <input type="hidden" name="id_addr" value={{ $id }} />
                            <button type="submit" class="btn btn-primary">Cancel</button>
                        </form>
                    </td>
                </tr>
    @endforeach
        @else
        <tr><td colspan="8"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>