<x-layout>
<x-slot:heading>
    Product List
</x-slot:>
<x-table>
        <thead>
            <tr>
                <th>ID</th>
@@ -12,25 +12,12 @@
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
            @endforeach
        </tbody>
          </x-table>
</x-layout>