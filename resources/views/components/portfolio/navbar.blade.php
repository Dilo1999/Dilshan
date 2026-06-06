@php($navItems = config('portfolio.nav'))

<nav class="fixed inset-x-0 top-0 z-50 border-b border-portfolio-border bg-portfolio-bg/95 backdrop-blur-xl">
    <div class="relative mx-auto max-w-7xl px-6">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('home') }}#home" class="group flex items-center gap-3" data-nav-link>
                <div class="icon-box flex h-10 w-10 items-center justify-center rounded-lg p-0 transition-transform group-hover:scale-105">
                    <span class="font-semibold text-zinc-800">{{ config('portfolio.initials') }}</span>
                </div>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                @foreach ($navItems as $item)
                    <a
                        href="{{ route('home') }}#{{ strtolower($item) }}"
                        class="group relative text-zinc-600 transition-colors hover:text-zinc-900"
                        data-nav-link
                    >
                        {{ $item }}
                        <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-zinc-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                @endforeach
            </div>

            <button
                type="button"
                class="rounded-lg border border-portfolio-border p-2 text-zinc-600 transition-colors hover:bg-portfolio-bg-soft hover:text-zinc-900 md:hidden"
                data-mobile-menu-toggle
                aria-expanded="false"
                aria-controls="portfolio-mobile-menu"
                aria-label="Toggle navigation menu"
            >
                <x-portfolio.icon name="menu" class="h-5 w-5" data-mobile-menu-icon="open" />
                <x-portfolio.icon name="x" class="hidden h-5 w-5" data-mobile-menu-icon="close" />
            </button>
        </div>

        <div id="portfolio-mobile-menu" class="hidden space-y-2 border-t border-portfolio-border py-4 md:hidden" data-mobile-menu-panel>
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
