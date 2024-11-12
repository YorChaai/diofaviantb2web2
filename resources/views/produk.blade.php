<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/produk.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{ url(Auth::user()->role . '/home') }}">Contoh</a></li>
            <li><a href="{{ url(Auth::user()->role . '/produk') }}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="{{ url(Auth::user()->role . '/laporan') }}">Laporan</a></li>
            <li>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-decoration-none bg-transparent border-0 text-white"
                        style="font-size: 18px;">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header style="display: flex; justify-content:space-between">
            <h1>Daftar Produk</h1>

            <div>
                <button class="card-button"><a class="text-decoration-none text-wh" href="{{ url(Auth::user()->role . '/produk/add')}}">Add Product</a></button>
            </div>
        </header>
        <h6>Temukan produk terbaik untuk kebutuhan Anda</h6>

        <!-- Product Grid -->
        <div class="product-grid">
            <!-- product card 1 -->
            @foreach ($produk as $item)

            <div class="product-card">
                <img src="{{ url('storage/public/images/' . $item->image) }}" alt="produk 1">
                <h3>{{ $item->nama_produk }}</h3>
                <p class="price">{{ $item->harga }}</p>
                <p class="description">{{ $item->deskripsi }}</p>
                <form action="{{ url(Auth::user()->role . '/produk/edit/'. $item->kode_produk) }}" method="GET">
                    <button type="submit" class="add-to-cart">Edit</button>
                </form>
                <form action="{{ url(Auth::user()->role . 'produk/delete/'. $item->kode_produk) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cancel-to-cart">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
    </footer>
</body>
</html>
