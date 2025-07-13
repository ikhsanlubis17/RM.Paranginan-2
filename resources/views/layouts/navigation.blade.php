<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <x-application-logo class="h-16 w-auto" />
                        <span class="text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent group-hover:from-orange-600 group-hover:to-orange-500 transition-all duration-300">
                            Pondok Paranginan 2
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="nav-link-modern">
                        <i class="fas fa-home mr-2"></i>{{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('menu')" :active="request()->routeIs('menu')" class="nav-link-modern">
                        <i class="fas fa-list mr-2"></i>{{ __('Menu') }}
                    </x-nav-link>
                    <x-nav-link :href="route('favorite.index')" :active="request()->routeIs('favorite.index')" class="nav-link-modern">
                        <i class="fas fa-heart mr-2"></i>{{ __('Favorit Saya') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')" class="nav-link-modern">
                        <i class="fas fa-images mr-2"></i>{{ __('Galeri') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="nav-link-modern">
                        <i class="fas fa-map-marker-alt mr-2"></i>{{ __('Kontak') }}
                    </x-nav-link>
                    @auth
                        @if(Auth::user()->is_admin)
                            <script>window.isAdmin = true;</script>
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="nav-link-modern admin-link">
                                <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                @auth
                <!-- Cart Icon -->
                @php
                    $cartCount = 0;
                    if (session()->has('cart')) {
                        $cart = session()->get('cart', []);
                        $cartCount = array_sum(array_column($cart, 'qty'));
                    }
                @endphp
                <a href="{{ route('cart.index') }}" class="relative group">
                    <div class="w-12 h-12 bg-gray-50 hover:bg-orange-50 rounded-xl flex items-center justify-center border border-gray-200 hover:border-orange-200 transition-all duration-300 group-hover:shadow-lg group-hover:shadow-orange-500/10">
                        <i class="fas fa-shopping-cart text-lg text-gray-600 group-hover:text-orange-600 transition-colors duration-300"></i>
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-medium shadow-lg animate-pulse">{{ $cartCount }}</span>
                        @endif
                    </div>
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-200 text-sm leading-4 font-medium rounded-xl text-gray-600 bg-gray-50 hover:text-orange-600 hover:bg-orange-50 hover:border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="group-hover:text-orange-600 transition-colors duration-300">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center group">
                                <i class="fas fa-user-edit mr-3 text-gray-400 group-hover:text-orange-500 transition-colors duration-300"></i>
                                <span>{{ __('Profile') }}</span>
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="flex items-center group">
                                        <i class="fas fa-sign-out-alt mr-3 text-gray-400 group-hover:text-red-500 transition-colors duration-300"></i>
                                        <span>{{ __('Log Out') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
                @else
                    <div class="flex space-x-3">
                        <a href="{{ route('login') }}" class="flex items-center text-gray-600 hover:text-orange-600 px-4 py-2 rounded-xl text-sm font-medium hover:bg-orange-50 transition-all duration-300 group">
                            <i class="fas fa-sign-in-alt mr-2 group-hover:scale-110 transition-transform duration-300"></i>{{ __('Login') }}
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:from-orange-600 hover:to-orange-700 px-4 py-2 rounded-xl text-sm font-medium shadow-lg hover:shadow-xl hover:shadow-orange-500/25 transition-all duration-300 group">
                            <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform duration-300"></i>{{ __('Register') }}
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-orange-600 hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/95 backdrop-blur-md border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="mobile-nav-link">
                <i class="fas fa-home mr-3"></i>{{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('menu')" :active="request()->routeIs('menu')" class="mobile-nav-link">
                <i class="fas fa-list mr-3"></i>{{ __('Menu') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('favorite.index')" :active="request()->routeIs('favorite.index')" class="mobile-nav-link">
                <i class="fas fa-heart mr-3"></i>{{ __('Favorit Saya') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')" class="mobile-nav-link">
                <i class="fas fa-images mr-3"></i>{{ __('Galeri') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="mobile-nav-link">
                <i class="fas fa-map-marker-alt mr-3"></i>{{ __('Kontak') }}
            </x-responsive-nav-link>
            @auth
                @if(Auth::user()->is_admin)
                    <script>window.isAdmin = true;</script>
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="mobile-nav-link admin-mobile-link">
                        <i class="fas fa-tachometer-alt mr-3"></i>{{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-100">
            <div class="px-4 mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="mobile-nav-link">
                    <i class="fas fa-user-edit mr-3"></i>{{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="mobile-nav-link text-red-600 hover:text-red-700 hover:bg-red-50">
                            <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-100">
                <div class="px-4 space-y-3">
                    <a href="{{ route('login') }}" class="flex items-center text-gray-600 hover:text-orange-600 px-4 py-3 rounded-xl text-sm font-medium hover:bg-orange-50 transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-3"></i>{{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:from-orange-600 hover:to-orange-700 px-4 py-3 rounded-xl text-sm font-medium shadow-lg transition-all duration-300">
                        <i class="fas fa-user-plus mr-3"></i>{{ __('Register') }}
                    </a>
                </div>
            </div>
        @endauth
    </div>
</nav>

<style>
/* Modern Navigation Styles */
.nav-link-modern {
    position: relative;
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #6b7280;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.nav-link-modern::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, #f97316, #ea580c);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 0.75rem;
}

.nav-link-modern:hover {
    color: #ea580c;
    background-color: #fff7ed;
    transform: translateY(-1px);
}

.nav-link-modern:hover::before {
    opacity: 0.1;
}

.nav-link-modern.active {
    color: #ea580c;
    background-color: #fff7ed;
    border: 1px solid #fed7aa;
}

.nav-link-modern.active::before {
    opacity: 0.15;
}

.nav-link-modern i {
    transition: transform 0.3s ease;
}

.nav-link-modern:hover i {
    transform: scale(1.1);
}

/* Admin Link Special Styling */
.admin-link {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white !important;
    box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.5);
}

.admin-link:hover {
    background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px -5px rgba(59, 130, 246, 0.5);
}

/* Mobile Navigation Styles */
.mobile-nav-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #6b7280;
    transition: all 0.3s ease;
    margin-bottom: 0.25rem;
}

.mobile-nav-link:hover {
    color: #ea580c;
    background-color: #fff7ed;
    transform: translateX(4px);
}

.mobile-nav-link.active {
    color: #ea580c;
    background-color: #fff7ed;
    border-left: 4px solid #ea580c;
}

.mobile-nav-link i {
    width: 1.25rem;
    transition: transform 0.3s ease;
}

.mobile-nav-link:hover i {
    transform: scale(1.1);
}

/* Admin Mobile Link */
.admin-mobile-link {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white !important;
}

.admin-mobile-link:hover {
    background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    color: white !important;
    transform: translateX(8px);
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Backdrop Blur Support */
@supports (backdrop-filter: blur(12px)) {
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
    }
}

/* Animation for dropdown arrow */
.group:hover svg {
    transform: rotate(180deg);
}

/* Cart badge animation */
@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* Mobile menu slide animation */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.mobile-menu-enter {
    animation: slideDown 0.3s ease-out;
}
</style>