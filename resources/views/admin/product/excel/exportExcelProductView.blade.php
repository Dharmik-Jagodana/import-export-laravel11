<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>User Name</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Detalis</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $value) {
            <tr>
                <td>{{ $value->id ?? '' }}</td>
                <td>{{ $value->getUser->name ?? '' }}</td>
                <td>{{ $value->name ?? '' }}</td>
                <td>{{ $value->stock ?? '' }}</td>
                <td>{{ $value->price ?? '' }}</td>
                <td>{{ $value->deatils ?? '' }}</td>
            </tr>
        @endforeach
</table>