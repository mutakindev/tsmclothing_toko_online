@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container mx-auto">
        <div>
            <div class="w-1/2"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">{{ $produk->name }}</strong></div>
        </div>
    </div>
</div>

<div class="site-section my-5">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-x-6">
            <div class="md:grid-cols-6">
                <img src="{{ asset('storage/'.$produk->image) }}" alt="Image" class="img-fluid">
            </div>
            <div class="md:grid-cols-6">
                <h2 class="text-black text-2xl">{{ $produk->name }}</h2>
                <p><strong class="text-red-500 font-bold text-lg">Rp {{ $produk->price }} </strong></p>
                <p class="text-gray-900 my-3">
                    {{ $produk->description }}
                </p>
                <div class="mb-5">
                    <form action="{{ route('user.keranjang.simpan') }}" method="post">
                        @csrf
                        @if(Route::has('login'))
                        @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endauth
                        @endif
                        <input type="hidden" name="products_id" value="{{ $produk->id }}">
                        <p class="text-sm my-2">Sisa Stok {{ $produk->stok }}</p>
                        <input type="hidden" value="{{ $produk->stok }}" id="sisastok">
                        <p class="inline text-md">Jumlah</p>
                        <div class="flex justify-around items-center input-group border border-gray-800 px-2 py-0 my-2 rounded-full mb-3 w-1/2 md:w-1/5" >
                            <div class="input-group-prepend">
                                <button class="focus:outline-none js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" name="qty" id="qty" class="form-control focus:outline-none text-center border-none"
                                aria-label="Example text with button addon" aria-describedby="button-addon1" value="1">
                            <div class="input-group-append">
                                <button class="focus:outline-none js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                        <div x-data="{'selectedSize': ''}" class="flex flex-wrap mt-3 space-x-2 space-y-1 md:space-y-0 my-2">
                            @foreach (explode(',', $produk->size) as $size)
                            <div @click="selectedSize = {{ '"'.$size.'"' }}; $refs.size.value = '{{ $size }}'" x-bind:class="{ 'bg-red-600 text-white': selectedSize === {{ '"'.$size.'"' }} }" class="bg-white border border-black px-4 py-1 rounded-full font-semibold hover:bg-red-600 hover:text-white cursor-pointer">{{ $size }}</div>
                            @endforeach
                            <input type="hidden" name="size" x-ref="size">
                            @error('size')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex space-x-2">
                            @if ($produk->stok <= 0)
                                <p><button type="button" class="bg-gray-500 px-3 py-2 rounded-full text-gray-100" disabled>Stok Habis</button></p>
                            @else
                                <p><button type="submit" class="bg-red-600 px-3 py-2 rounded-full text-gray-100">Add To Cart</button></p>
                            @endif
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
            </div>
        </div>
    </div>
</div>
@endsection