<h1>Product list</h1>
<table class="table" border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>