<header x-data="{toggleNav: false}" class="relative">
    <div class="navbar flex flex-wrap justify-between items-stretch bg-black py-5 md:py-1 px-5">
        <div class="logo p-3 md:grid place-items-center md:w-40 w-1/2 hidden">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt="Logo TSM Clothing" class="w-full"></a>
        </div>

        <div class="grid place-self-center w-5 md:hidden">
            <button class="border-none" @click="toggleNav = !toggleNav"><i
                    class="icon icon-bars text-xl text-white"></i></button>
        </div>

        <form action="{{ route('user.produk.cari') }}" method="get"
            class="search flex-grow md:flex justify-end hidden px-3 py-7 mr-3">
            @csrf
            <input type="search" class="rounded-full p-3 focus:outline-none w-1/3" name="cari"
                placeholder="Cari Produk Disini">
        </form>

        <div class="menu flex justify-end items-center w-1/2 md:w-max">
            @if (Route::has('login'))
            @auth
            <div class="wishlist mx-2 md:mx-5">
                <?php
                    $user_id = \Auth::user()->id;
                    $total_wishlist = \DB::table('wishlists')
                    ->select(DB::raw('count(id) as jumlah'))
                    ->where('user_id',$user_id)
                    ->first();

                    ?>
                <div class="flex items-center space-x-1">
                    <a href="{{ route('user.wishlist') }}"><span class="icon icon-favorite text-gray-300 text-2xl"></span></a>
                    <span class=" text-yellow-500">{{ $total_wishlist->jumlah }}</span>
                </div>
            </div>
            <div class="cart mx-2 md:mx-5" title="Keranjang">
                <?php
                        $user_id = \Auth::user()->id;
                        $total_keranjang = \DB::table('keranjang')
                        ->select(DB::raw('count(id) as jumlah'))
                        ->where('user_id',$user_id)
                        ->first();
                        ?>
                <div class="flex items-center space-x-1">
                    <a href="{{ route('user.keranjang') }}"><span class="icon icon-cart-plus text-gray-300 text-2xl"></span></a>
                    <span class=" text-yellow-500">{{ $total_keranjang->jumlah }}</span>
                </div>
            </div>
            <div class="order mx-2 md:mx-5" title="Order">
                <?php
                                            $user_id = \Auth::user()->id;
                                            $total_order = \DB::table('order')
                                            ->select(DB::raw('count(id) as jumlah'))
                                            ->where('user_id',$user_id)
                                            ->where('status_order_id','!=',5)
                                            ->where('status_order_id','!=',6)
                                            ->first();
                                          ?>
                <div class="flex items-center space-x-1">
                    <a href="{{ route('user.order') }}"><span class="icon icon-shopping-bag text-gray-300 text-2xl"></span></a>
                    <span class="text-yellow-500">{{ $total_order->jumlah }}</span>
                </div>
            </div>
            <div class="relative account mx-2 md:mx-5 grid place-items-center" x-data="{open:false}">
                <button @click="open = true"><span class="icon icon-account_circle text-gray-300 text-3xl"></span></button>
                <div x-show.transition="open" @click.away="open = false"
                    class="absolute right-0 -bottom-28 rounded bg-white shadow-md z-40 p-3">
                    <ul class="list-none">
                        <li class="w-max font-normal px-5 py-2 hover:text-blue-600"><a
                                href="{{ route('user.alamat') }}">Pengaturan Alamat</a></li>
                        <li class="w-max font-normal px-5 py-2 hover:text-blue-600"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="relative account mx-2 md:mx-5 grid place-items-center" x-data="{open:false}">
                <button @click="open = true"><span class="icon icon-account_circle text-gray-300 text-3xl"></span></button>
                <div x-show.transition="open" @click.away="open = false"
                    class="absolute top-8 -left-16 rounded bg-white shadow-md z-40 p-3">
                    <ul class="list-none">
                        <li class="w-max font-normal px-5 py-2 hover:text-blue-600"><a href="/login">
                                Masuk</a></li>
                        </li>
                        <li class="w-max font-normal px-5 py-2 hover:text-blue-600"><a href="/register">
                                Daftar</a></li>
                        </li>
                    </ul>
                </div>
            </div>
            @endauth
            @endif
        </div>

    </div>
    <nav id="navbar" class="hidden md:block shadow-lg bg-white py-4 z-20">
        <div class="container mx-auto">
            <ul class="flex items-stretch flex-wrap md:flex-nowrap md:text-center">
                <li class="text-gray-700 font-semibold hover:text-blue-600 pr-5"><a href="/"
                        class="block w-full h-full">Home</a></li>
                <li class="text-gray-700 font-semibold hover:text-blue-600 px-5"><a href="{{ route('user.produk') }}""
                        class=" block w-full h-full">Produk</a></li>
                <?php
                            $categories = DB::table('categories')
                                    ->join('products','products.categories_id','=','categories.id')
                                    ->select(DB::raw('count(products.categories_id) as jumlah, categories.*'))
                                    ->groupBy('categories.id')
                                    ->get();
                            ?>
                <li x-data="{open: false}" class="relative">
                    <button @click="open = true" type="button"
                        class="inline-flex items-center w-full bg-white font-semibold text-gray-700 hover:text-blue-600 focus:outline-none"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Kategori
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show.transition="open" @click.away="open = false"
                        class="origin-top-right absolute z-50 right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            @foreach($categories as $categori)
                            <a href="{{ route('user.kategori',['id' => $categori->id]) }}"
                                class="text-gray-700 block px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-0">
                                <span>{{ $categori->name }}</span> <span class="text-black ml-auto">(
                                    {{ $categori->jumlah }})</span></a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="text-gray-700 font-semibold hover:text-blue-600 px-5"><a href="#"
                        class="block w-full h-full">Ketentuan</a></li>
            </ul>
        </div>
    </nav>
    <nav id="mobile" class="fixed shadow-md bg-white md:hidden top-0 left-0 right-0 z-30" x-show.transition="toggleNav" @click.away="toggleNav = false">
        <div class="close-btn m-3 p-2">
            <button @click="toggleNav = false" class="font-medium text-xl">&times;</button>
        </div>

        <div>
            <img src="{{ asset('images/dark-logo.png') }}" alt="Logo" class="w-28 mx-auto">
        </div>
        <form action="{{ route('user.produk.cari') }}" method="get" class="search w-full px-3 py-3">
            @csrf
            <input type="search"
                class="p-3 border border-opacity-50 border-gray-300 focus:outline-none w-full bg-gray-100 rounded"
                name="cari" placeholder="Cari Produk Disini">
        </form>
        <ul class="flex flex-col">
            <li class="text-gray-700 font-semibold hover:text-blue-600 py-4 mb-2 px-5 w-full"><a href="/"
                    class="block w-full h-full">Home</a></li>
            <li class="text-gray-700 font-semibold hover:text-blue-600 py-4 mb-2 px-5 w-full"><a href="{{ route('user.produk') }}""
                                    class=" block w-full h-full">Produk</a></li>
            <?php
                                        $categories = DB::table('categories')
                                                ->join('products','products.categories_id','=','categories.id')
                                                ->select(DB::raw('count(products.categories_id) as jumlah, categories.*'))
                                                ->groupBy('categories.id')
                                                ->get();
                                        ?>
            <li x-data="{open: false}" class="relative py-4 mb-2 px-5 w-full">
                <button @click="open = true" type="button"
                    class="inline-flex items-center w-full bg-white font-semibold text-gray-700 hover:text-blue-600 mocu w-fulls:outline-none"
                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                    Kategori
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show.transition="open" @click.away="open = false"
                    class="origin-top-right absolute z-50 right-0 mt-2 w-56 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        @foreach($categories as $categori)
                        <a href="{{ route('user.kategori',['id' => $categori->id]) }}"
                            class="text-gray-700 block px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-0">
                            <span>{{ $categori->name }}</span> <span class="text-black ml-auto">(
                                {{ $categori->jumlah }})</span></a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="text-gray-700 font-semibold hover:text-blue-600 py-4 mb-2 px-5 w-full"><a href="#"
                    class="block w-full h-full">Ketentuan</a>
            </li>
        </ul>
    </nav>
</header>

@section('script')
<script>
    window.onscroll = function() {myFunction()};
        
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
        
        function myFunction() {
            if (window.pageYOffset >= sticky + 100) {
                navbar.classList.add("md:fixed")
                navbar.classList.add("top-0")
                navbar.classList.add("left-0")
                navbar.classList.add("right-0")
                
            } else {
                navbar.classList.remove("top-0")
                navbar.classList.remove("left-0")
                navbar.classList.remove("right-0")
                navbar.classList.remove("md:fixed");
            }
        }
</script>
@endsection