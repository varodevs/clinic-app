<table class="table table-success table-striped text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Phone</td>
            <td>Date birth</td>
            <td>Age</td>
            <td>Sex</td>
            <td>Image</td>
            <td>Username</td>
            <td>Issued by</td>
            <td>-</td> 
            <td>-</td>             
        </tr>
    </thead>
    <tbody>
        @if ($array != null)
            <form action="{{ route('admin-upd-pat') }}" method="POST">ç
                @csrf
                @foreach ($array as $row)
                    @php
                        $i = 0;                 
                    @endphp                
                    <tr>
                        @foreach ($row as $column)
                        @if ($i==4)
                        <td><input class="w-75 text-center" type="date" value="{{ \Carbon\Carbon::parse($column)->format('Y-m-d H:i:s') }}" name="date_birth"/></td> 
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

                        </td>
            </form>
                    <td>
                        <form action="{{ route('admin-del-pat') }}" method="POST">
                            @csrf                    
                            <input type="hidden" name="cod_patient" value={{ $id }} />
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
        <tr><td colspan="8"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>
<div>
    <form action="{{ route('admin-new-pat-view') }}" method="GET">
        <button class="btn btn-primary" type="submit">New Patient</button>
    </form>
</div>