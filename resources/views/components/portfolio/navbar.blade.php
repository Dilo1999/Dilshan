@php
    $navItems = config('portfolio.nav');
    $isHome = request()->routeIs('home');
@endphp

<nav
    data-portfolio-navbar
    data-at-top="{{ $isHome ? 'true' : 'false' }}"
    @class([
        'fixed inset-x-0 top-0 z-50 border-b transition-all duration-300',
        'portfolio-nav-at-top' => $isHome,
        'portfolio-nav-scrolled' => ! $isHome,
    ])
>
    <div class="relative mx-auto max-w-7xl px-6">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('home') }}#home" class="group flex items-center gap-3" data-nav-link>
                <div
                    data-nav-logo
                    @class([
                        'flex h-10 w-10 items-center justify-center rounded-lg border p-0 transition-all duration-300 group-hover:scale-105',
                        'border-white/20 bg-white/10' => $isHome,
                        'icon-box' => ! $isHome,
                    ])
                >
                    <span
                        @class([
                            'font-semibold transition-colors duration-300',
                            'text-white' => $isHome,
                            'text-zinc-800' => ! $isHome,
                        ])
                        data-nav-logo-text
                    >{{ config('portfolio.initials') }}</span>
                </div>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                @foreach ($navItems as $item)
                    <a
                        href="{{ route('home') }}#{{ strtolower($item) }}"
                        @class([
                            'group relative transition-colors duration-300',
                            'text-zinc-200 hover:text-white' => $isHome,
                            'text-zinc-600 hover:text-zinc-900' => ! $isHome,
                        ])
                        data-nav-link
                        data-nav-item
                    >
                        {{ $item }}
                        <span
                            data-nav-underline
                            @class([
                                'absolute -bottom-1 left-0 h-0.5 w-0 transition-all duration-300 group-hover:w-full',
                                'bg-white' => $isHome,
                                'bg-zinc-900' => ! $isHome,
                            ])
                        ></span>
                    </a>
                @endforeach
            </div>

            <button
                type="button"
                data-mobile-menu-toggle
                @class([
                    'rounded-lg border p-2 transition-colors duration-300 md:hidden',
                    'border-white/25 text-zinc-200 hover:bg-white/10 hover:text-white' => $isHome,
                    'border-portfolio-border text-zinc-600 hover:bg-portfolio-bg-soft hover:text-zinc-900' => ! $isHome,
                ])
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
            class="hidden space-y-2 border-t py-4 md:hidden portfolio-nav-scrolled"
            data-mobile-menu-panel
        >
            @foreach ($navItems as $item)
                <a
                    href="{{ route('home') }}#{{ strtolower($item) }}"
                    class="block rounded-lg px-4 py-2 text-zinc-600 transition-colors hover:bg-portfolio-bg-soft hover:text-zinc-900"
                    data-nav-link
                    data-mobile-menu-close
                >
                    {{ $item }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
