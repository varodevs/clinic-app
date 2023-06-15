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
                @foreach ($array as $row)
                <form action="{{ route('admin-upd-appo') }}" method="POST">
                    @csrf 
                    <tr>
                        @php
                            $i=0;
                        @endphp                    
                        @foreach ($row as $column)
                            @if ($i == 1)
                                <td>
                                    <input type="text" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}"/>
                                    <input type="datetime-local" name="date_ap" id="date"/>
                                </td>
                            @else
                                @if ($i == 0)
                                    <td><input type="text" value="{{ $column }}" name="cod_appo" disabled/></td>
                                @else
                                    @if ($i == 2)
                                        @if ($column != 0)
                                            <td><input type="text" value="Si" name="input{{ $i }}" disabled/></td>
                                        @else
                                            <td><input type="text" value="No" name="input{{ $i }}" disabled/></td>
                                        @endif
                                    @else
                                    <td><input type="text" value="{{ $column }}" name="input{{ $i }}"/></td>
                                    @endif                                                                   
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
                            <button type="submit" class="btn btn-primary">Update</button>
                    
                        </td>
                </form>
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
<div>
    <form action="{{ route("admin-new-appo-view") }}" method="GET">
        <button class="btn btn-primary">New Appointment</button>
    </form>
</div>