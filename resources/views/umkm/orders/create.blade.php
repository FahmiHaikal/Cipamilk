@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Tambah Pesanan</h2>

    <form action="/orders" method="POST">
        @csrf

        <div>
            <label>Nama Pembeli</label>
            <input
                type="text"
                name="customer_name"
                required>
        </div>

        <br>

        <div>
            <label>No WA</label>
            <input
                type="text"
                name="customer_phone">
        </div>

        <br>

        <div>
            <label>Produk</label>

            <select name="product_id">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Jumlah</label>

            <input
                type="number"
                name="quantity"
                min="1"
                required>
        </div>

        <br>

        <button type="submit">
            Simpan
        </button>

    </form>

</div>
@endsection