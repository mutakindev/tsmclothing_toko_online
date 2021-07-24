@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container mx-auto">
        <div class="grid grid-cols-1">
            <div class="mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Shop</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 py-10"
            style="background: center / cover no-repeat fixed url({{ asset('images/t-shirt.png') }});">
            <div class="md:col-span-12 text-center">
                <h3 class="text-3xl uppercase text-gray-100 font-bold" style="text-shadow: 2px 3px 5px rgba(0,0,0,0.5)">
                    Hasil Pencarian Untuk : {{ $cari }}
                    ({{ $total  }} Hasil)</h3>
            </div>
        </div>
        <div class="grid grid-cols-1 mb-5">
            <div class="order-2">
                <div class="grid grid-cols-12 gap-5 mb-5">
                    @foreach($produks as $produk)
                    <div class="col-span-6 md:col-span-4  mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                                <img src="{{ asset('storage/' . $produk->image) }}" alt="Image placeholder"
                                    class="img-fluid" width="100%" style="max-height:300px; object-fit: fill">
                            </a>
                            <div class="block-4-text p-4">
                                <h3><a
                                        href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{ $produk->name }}</a>
                                </h3>
                                <p class="mb-0">RP {{ $produk->price }}</p>
                                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}"
                                    class="btn btn-primary mt-2">Detail</a>
                            </div>
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
@endsection