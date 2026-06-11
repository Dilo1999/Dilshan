@php($navItems = config('portfolio.nav'))

<nav
    data-portfolio-navbar
    class="fixed inset-x-0 top-0 z-50 border-b border-white/10 backdrop-blur-xl transition-all duration-300 portfolio-nav-scrolled"
>
    <div class="absolute inset-0 bg-linear-to-b from-[#0a0e1a]/95 to-[#0a0e1a]/80" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 supports-[padding:max(0px)]:pt-[max(0px,env(safe-area-inset-top))]">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('home') }}#home" class="group flex items-center gap-3" data-nav-link>
                <div class="portfolio-logo" data-nav-logo>
                    <span data-nav-logo-text>{{ config('portfolio.initials') }}</span>
                </div>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                @foreach ($navItems as $item)
                    <a
                        href="{{ route('home') }}#{{ strtolower($item) }}"
                        class="group relative text-gray-300 transition-colors duration-300 hover:text-white"
                        data-nav-link
                        data-nav-item
                    >
                        {{ $item }}
                        <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-linear-to-r from-blue-500 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                @endforeach
            </div>

            <button
                type="button"
                data-mobile-menu-toggle
                class="rounded-lg border border-white/10 p-2 text-gray-300 transition-colors duration-300 hover:border-white/20 hover:bg-white/5 hover:text-white md:hidden"
                aria-expanded="false"
                aria-controls="portfolio-mobile-menu"
                aria-label="Toggle navigation menu"
            >
                <x-portfolio.icon name="menu" class="h-5 w-5" data-mobile-menu-icon="open" />
                <x-portfolio.icon name="x" class="hidden h-5 w-5" data-mobile-menu-icon="close" />
            </button>
        </div>

        <div
            id="portfolio-mobile-menu"
            class="hidden max-h-[calc(100dvh-4rem)] space-y-1 overflow-y-auto border-t border-white/10 py-3 md:hidden"
            data-mobile-menu-panel
        >
            @foreach ($navItems as $item)
                <a
                    href="{{ route('home') }}#{{ strtolower($item) }}"
                    class="block rounded-lg px-4 py-3 text-base text-gray-300 transition-colors hover:bg-white/5 hover:text-white"
                    data-nav-link
                    data-mobile-menu-close
                >
                    {{ $item }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
