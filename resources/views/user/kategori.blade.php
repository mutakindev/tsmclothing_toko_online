@extends('user.app')
@section('content')
<div class="bg-gray-50 py-3">
    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Shop</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 py-10" style="background: center / cover no-repeat url({{ (Str::lower($categories->name)  == 't-shirt') ? asset('images/t-shirt.png') : (Str::lower($categories->name) == 'hoodie' ? asset('images/hoodie.jpg'): asset('images/login-background.png')) }})">
            <div class="grid-cols-12 text-center">
                <h3 class="text-3xl uppercase text-gray-100 font-bold" style="text-shadow: 2px 3px 5px rgba(0,0,0,0.5)">Tsm Clothing {{ $categories->name }} Collection</h3>
            </div>
        </div>
        <div class="grid grid-cols-1 mb-5">
            <div class="grid-cols-9">
                <div class="grid grid-cols-12 gap-5  place-items-start mb-5">
                    @foreach($produks as $produk)
                    <div class="text-center bg-white col-span-6 md:col-span-4 shadow rounded-md p-5" data-aos="fade-up">
                        <div class="max-h-80 overflow-hidden">
                            <a href="{{ route('user.produk.detail', ['id' => $produk->id]) }}" class="block">
                                <img src="{{ asset('storage/'.$produk->image) }}" alt="{{ $produk->name }}" class="w-full">
                            </a>
                        </div>
                        <h2 class="font-semibold text-lg my-2">{{ $produk->name }}</h2>
                        <p class="text-red-600 text-lg font-bold my-2">Rp {{ number_format($produk->price) }},-</p>
                        <div class="flex flex-wrap justify-center mt-3 space-x-2 space-y-1 md:space-y-0">
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">S</div>
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">M</div>
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">L</div>
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">XL</div>
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">S</div>
                        </div>
                        <div class="flex flex-wrap justify-center mt-3 space-x-2 space-y-1 md:space-y-0">
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">Hitam</div>
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">Putih</div>
                            <div class="bg-white border border-black px-4 py-1 rounded-full font-semibold">Navy</div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 text-right">
                        <div class="site-block-27">
                            {{ $produks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection