
<table class="table table-dark text-center">
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
            @foreach ($array as $row)
                <tr>
                    @php
                        $i=0;
                    @endphp                    
                    @foreach ($row as $column)
                    @if ($i == 2)
                        @if ($column != 0)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                    @else
                    <td>{{ $column }}</td>
                    @endif
                    @php
                        if ($i == 0) {
                            $id=$column;
                        }
                        $i++;
                    @endphp
                    @endforeach
                    <td>
                        <form action="">
                            @csrf                    
                            <input type="hidden" name="id" value={{ $id }} />
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('del-appo') }}">
                            @csrf                    
                            <input type="hidden" name="id" value={{ $id }} />
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