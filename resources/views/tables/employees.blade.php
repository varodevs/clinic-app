<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Title</td>
            <td>Title Court.</td>
            <td>Date Birth</td>
            <td>Date Hire</td>
            <td>ID user</td>         
        </tr>
    </thead>
    <tbody>
        @if (is_array($array) && $array != null)
            @foreach ($array as $row)
                <tr>
                    @foreach ($row as $column)
                    <td>
                        @php
                        $column;
                        @endphp                                        
                    </td>
                    @endforeach
                </tr>
            @endforeach
        @else
        <tr><td colspan="7"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>