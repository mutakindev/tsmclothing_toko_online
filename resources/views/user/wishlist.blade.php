@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Wishlist</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-5">
        @foreach ($wishlists as $wishlist)
            <div class="card shadow">
                <div class="card-header bg-white border-none py-1">
                    <a href="{{ route('user.wishlist.delete', ['id' => $wishlist->id]) }}"><span class="icon icon-close text-xl"></span></a>
                </div>
                <a href="{{ route('user.produk.detail', ['id' => $wishlist->products_id]) }}" class="card-body flex space-x-3">
                    <div class="image w-24">
                        <img src="{{ asset('storage/'.$wishlist->image) }}" alt="" class="w-full">
                    </div>
                    <div class="">
                        <h1 class="text-gray-800 text-2xl">{{ $wishlist->nama_produk }}</h1>
                        <h2 class="text-red-800 text-3xl">Rp.{{ number_format($wishlist->price) }}</h2>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
        {{-- 
        <div class="grid  grid-row-1 md:grid-cols-3 place-items-stretch">
            <div class="col-span-2">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Update wishlist</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection