<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DaisyUI Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.1/dist/full.css" rel="stylesheet" />
</head>

<body class="bg-base-100">

    <!-- Navbar -->
    <div class="navbar bg-base-100 shadow-md px-4">
        <div class="flex-1">
            <a class="text-xl font-bold">daisyUI</a>
        </div>
        <div class="flex-none gap-2">
            <!-- Mobile Dropdown -->
            <div class="dropdown dropdown-end lg:hidden">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Home</a></li>
                    <li><a>Features</a></li>
                    <li><a>Products</a></li>
                    <li><a>Contact</a></li>
                    @if (Route::has('filament.admin.auth.login'))
                        @auth
                            <li>
                                <a href="{{ route('filament.admin.pages.dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('filament.admin.auth.login') }}">Log in</a>
                            </li>
                            @if (Route::has('filament.auth.register'))
                                <li>
                                    <a href="{{ route('filament.auth.register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center">
                <ul class="menu menu-horizontal px-1">
                    <li><a>Home</a></li>
                    <li><a>Features</a></li>
                    <li><a>Products</a></li>
                    <li><a>Contact</a></li>
                </ul>
                @if (Route::has('filament.admin.auth.login'))
                    @auth
                        <a href="{{ route('filament.admin.pages.dashboard') }}" class="btn btn-sm ml-4">Dashboard</a>
                    @else
                        <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-sm ml-4">Log in</a>
                        @if (Route::has('filament.auth.register'))
                            <a href="{{ route('filament.auth.register') }}" class="btn btn-outline btn-sm ml-2">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Theme Toggle -->
            <label class="swap swap-rotate">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" class="theme-controller" value="synthwave" />

                <!-- sun icon -->
                <svg class="swap-off h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                </svg>

                <!-- moon icon -->
                <svg class="swap-on h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                </svg>
            </label>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero min-h-screen bg-base-200 px-4">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold">Welcome to Our Landing Page</h1>
                <p class="py-6">Build beautiful, responsive landing pages with Tailwind CSS + DaisyUI effortlessly.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container mx-auto py-16 px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold">Features</h2>
            <p class="text-gray-500">What makes our service amazing</p>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <div class="card bg-base-100 shadow p-6">
                <h3 class="text-xl font-semibold">Feature One</h3>
                <p class="mt-2 text-sm text-gray-500">Detailed explanation about feature one.</p>
            </div>
            <div class="card bg-base-100 shadow p-6">
                <h3 class="text-xl font-semibold">Feature Two</h3>
                <p class="mt-2 text-sm text-gray-500">Detailed explanation about feature two.</p>
            </div>
            <div class="card bg-base-100 shadow p-6">
                <h3 class="text-xl font-semibold">Feature Three</h3>
                <p class="mt-2 text-sm text-gray-500">Detailed explanation about feature three.</p>
            </div>
        </div>
    </section>

    <!-- Carousel Products -->
    <section class="py-16 bg-base-100 px-4">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold">Popular Products</h2>
            <p class="text-gray-500">Browse our top-selling items</p>
        </div>

        <div class="carousel rounded-box space-x-4 w-full justify-center">
            @foreach (['Product 1', 'Product 2', 'Product 3'] as $index => $product)
                <div class="carousel-item">
                    <div class="card w-80 bg-base-200 shadow">
                        <figure><img src="https://via.placeholder.com/300x200" alt="{{ $product }}" /></figure>
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $product }}</h2>
                            <p>{{ ['Top-quality item just for you.', 'Stylish and modern design.', 'Engineered for performance.'][$index] }}
                            </p>
                            <div class="card-actions justify-center">
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer p-10 bg-neutral text-neutral-content">
        <nav>
            <h6 class="footer-title">Company</h6>
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
        </nav>
        <nav>
            <h6 class="footer-title">Social</h6>
            <div class="grid grid-flow-col gap-4">
                <a><svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M24 4.56v14.91a3.53 3.53 0 01-3.53 3.53H3.53A3.53 3.53 0 010 19.47V4.56A3.53 3.53 0 013.53 1.03h16.94A3.53 3.53 0 0124 4.56zM19.08 3H4.92A1.92 1.92 0 003 4.92v14.16c0 1.06.86 1.92 1.92 1.92h14.16a1.92 1.92 0 001.92-1.92V4.92A1.92 1.92 0 0019.08 3z" />
                    </svg></a>
                <a><svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M19.6 0H4.4A4.4 4.4 0 000 4.4v15.2A4.4 4.4 0 004.4 24h15.2A4.4 4.4 0 0024 19.6V4.4A4.4 4.4 0 0019.6 0zM8 18.3H5.3V9H8v9.3zM6.6 7.8A1.5 1.5 0 118.1 6.3 1.5 1.5 0 016.6 7.8zM20 18.3h-2.7v-4.5c0-1.1-.4-1.9-1.4-1.9-.8 0-1.2.5-1.4 1-.1.3-.1.6-.1.9v4.5h-2.7s.1-7.3 0-8H14v1.1c.4-.6 1-1.5 2.4-1.5 1.8 0 3.2 1.2 3.2 3.9v4.5z" />
                    </svg></a>
            </div>
        </nav>
    </footer>

</body>

</html>