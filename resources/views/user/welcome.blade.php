@extends('user.app')
@section('style')
    <style>
        .promo{
        background: url(/images/promo-bg.png) no-repeat;
        background-size: cover;
        background-position: right 80%;
        height: 300px;
        }

    </style>
@endsection
@section('content')
<div class="banner" style="background: black url({{ asset('images/jaket\ 01.jpg') }}) top / cover no-repeat fixed;">
    <div class="container mx-auto p-4 md:p-0 h-60 md:h-screen relative">
        <div class="h-full flex flex-col justify-center items-start">
            <h1 class="text-md md:text-5xl shadow-md py-5 border-t-2 border-b-2 border-red-600 font-medium text-white">Produk Terbaru Kami</h1>
            <a href="{{ route('user.produk') }}" class="bg-red-700 text-white px-5 py-3 rounded-full mt-10">Lihat Produk</a>
        </div>
    </div>
</div>
@foreach ($categories as $category)
    <div class="container mx-auto px-5 my-10">
        <div class="grid grid-rows-3 grid-flow-row md:grid-flow-col gap-2">
            <div class="p-5 flex justify-center md:justify-end items-center banner" data-aos="fade-up" style="background: url(
                @foreach($produks as $produk)
                    @if ($produk->categories_id === $category->id)
                        {{ asset('storage/'.$produk->image) }}) center / cover no-repeat;">
                    <?php break; ?>
                    @endif
                @endforeach
                <div class="text-center">
                    <h1 class="text-6xl mb-4 text-white font-bold shadow-md">{{ $category->name }}</h1>
                    <a href="{{ route('user.kategori',['id' => $category->id]) }}" class="py-2 px-3 rounded-full bg-gray-300 opacity-80 shadow-md hover:bg-gray-700 hover:text-gray-100">SHOW ALL</a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 row-span-2" data-aos="fade-up" data-aos-duration="800">
                <div class="owl-carousel owl-theme shadow-md bg-white rounded pb-4">
                    @foreach($produks as $produk)
                        @if ($produk->categories_id === $category->id)
                        <div class="text-center">
                            <a href="{{ route('user.produk.detail', ['id' => $produk->id]) }}">
                                <img src="{{ asset('storage/'.$produk->image) }}" alt="{{ $produk->name }}" class="w-full object-center max-h-1/4">
                            </a>
                            <h2 class="font-semibold text-lg my-2">{{ $produk->name }}</h2>
                            <p class="text-red-600 text-lg font-bold my-2">Rp {{ number_format($produk->price) }},-</p>
                            <div class="flex flex-wrap justify-center mt-3 space-x-2 space-y-1 md:space-y-0">
                                @foreach (explode(',', $produk->size) as $size)
                                <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">{{ $size }}</div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="owl-carousel owl-theme shadow-md bg-white rounded pb-3">
                    @foreach($produks->reverse() as $produk)
                        @if ($produk->categories_id == $category->id)
                        <div class="text-center">
                            <a href="{{ route('user.produk.detail', ['id' => $produk->id]) }}">
                                <img src="{{ asset('storage/'.$produk->image) }}" alt="{{ $produk->name }}" class="w-full">
                            </a>
                            <h2 class="font-semibold text-lg my-2">{{ $produk->name }}</h2>
                            <p class="text-red-600 text-lg font-bold my-2">Rp {{ number_format($produk->price) }},-</p>
                            <div class="flex flex-wrap justify-center mt-3 space-x-2 space-y-1 md:space-y-0">
                                @foreach (explode(',', $produk->size) as $size)
                                <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">{{ $size }}</div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div x-data="{show: false}" class="row-span-full text-center shadow-md bg-white rounded" data-aos="fade-up" data-aos-duration="1200">
                @foreach ($produks as $produk)
                @if ($produk->categories_id == $category->id)
                    <div class="relative block max-h-1/2 overflow-hidden">
                        <a href="{{ route('user.produk.detail', ['id' => $produk->id]) }}">
                            <img @mouseenter="show = true" src="{{ asset('storage/'.$produk->image) }}" alt="T-Shirt">
                        </a>
                        <div x-show.transition = "show" @click.away="show = false" class="absolute bottom-5 left-0 right-0 flex space-x-4 justify-center">
                            <form action="{{ route('user.keranjang.simpan') }}" method="POST">
                                @csrf
                                @if(Route::has('login'))
                                @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endauth
                                @endif
                                <input type="hidden" name="products_id" value="{{ $produk->id }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="rounded-full w-10 h-10 bg-white flex justify-center items-center"><i
                                    class="icon icon-cart-plus text-black"></i></button>
                            </form>
                            <form action="{{ route('user.wishlist.simpan') }}" method="POST">
                                @csrf
                                @if(Route::has('login'))
                                @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endauth
                                @endif
                                <input type="hidden" name="products_id" value="{{ $produk->id }}">
                                <button type="submit" class="rounded-full p-3 bg-red-600 flex justify-center items-center"><i
                                        class="icon icon-heart text-white"></i></button>
                            </form>
                        </div>
                    </div>
                    <h2 class="font-semibold text-lg my-2">{{ $produk->name }}</h2>
                    <p class="text-red-600 text-lg font-bold my-2">RP. {{ number_format($produk->price) }},-</p>
                    <div class="flex flex-wrap justify-center mt-3 space-x-2 space-y-1 md:space-y-0">
                        @foreach (explode(',', $produk->size) as $size)
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">{{ $size }}</div>
                        @endforeach
                    </div>
                    <?php break; ?>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endforeach

<div class="promo px-16 md:px-24 flex items-start justify-center flex-col">
    <p class="text-5xl md:text-6xl font-black text-gray-900 uppercase">Diskon 30%</p>
    <p class="text-4xl md:text-4xl font-black text-red-600 uppercase">Untuk Pembelian 2 PCS</p>
    <a href="#" class="bg-red-700 text-white px-5 py-3 rounded-full mt-4">Selengkapnya</a>
</div>


@endsection