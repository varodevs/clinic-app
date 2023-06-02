<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Active</td>
            <td>Reg. date</td>          
        </tr>
    </thead>
    <tbody>
        @php
            $array =[ ['23', 'alvaro', 'alvaro@email.com', 'no', 'hoy'],['23', 'alvaro', 'alvaro@email.com', 'no', 'hoy'] ]
        @endphp
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
        <tr><td colspan="5"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>