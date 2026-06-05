<h1>Produk Pending</h1>

@foreach($products as $product)

    <div style="border:1px solid #000;padding:10px;margin:10px">

        <h3>{{ $product->nama_produk }}</h3>

        <p>UMKM: {{ $product->umkm->nama_umkm }}</p>

        <form method="POST" action="/admin/products/{{ $product->id }}/approve">
            @csrf
            <button type="submit">
                Approve
            </button>
        </form>

        <form method="POST" action="/admin/products/{{ $product->id }}/reject">
            @csrf
            <button type="submit">
                Reject
            </button>
        </form>

    </div>

@endforeach