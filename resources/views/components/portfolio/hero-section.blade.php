@php
    $portfolio = config('portfolio');
@endphp

<section id="home" class="relative flex min-h-screen items-center justify-center overflow-hidden pt-16">
    <div class="absolute inset-0 bg-linear-to-b from-blue-950/20 via-purple-950/20 to-[#0a0e1a]"></div>

    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 h-96 w-96 rounded-full bg-blue-500/20 blur-[128px]"></div>
        <div class="absolute right-1/4 bottom-1/4 h-96 w-96 rounded-full bg-purple-500/20 blur-[128px]"></div>
    </div>

    <div class="absolute inset-0 opacity-20 portfolio-grid-bg"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <div class="space-y-8 text-center">
            <div
                class="animate-now inline-flex items-center gap-2 rounded-full border border-blue-500/20 bg-linear-to-r from-blue-500/10 to-purple-500/10 px-4 py-2 backdrop-blur-sm"
                data-animate="fadeInUp"
            >
                <x-portfolio.icon name="sparkles" class="h-4 w-4 text-blue-400" />
                <span class="text-sm text-blue-300">{{ $portfolio['status'] }}</span>
            </div>

            <div class="animate-now space-y-4" data-animate="fadeInUp" data-delay="0.1">
                <h1 class="text-5xl leading-tight font-bold text-gradient-hero sm:text-6xl md:text-8xl">
                    {{ $portfolio['headline'][0] }}
                </h1>
                <h1 class="text-5xl leading-tight font-bold text-gradient-accent sm:text-6xl md:text-8xl">
                    {{ $portfolio['headline'][1] }}
                </h1>
            </div>

            <p
                class="animate-now mx-auto max-w-3xl text-xl text-gray-300 md:text-2xl"
                data-animate="fadeInUp"
                data-delay="0.2"
            >
                {{ $portfolio['tagline'] }}
            </p>

            <div
                class="animate-now text-3xl font-bold text-white md:text-4xl"
                data-animate="fadeInUp"
                data-delay="0.3"
            >
                {{ $portfolio['name'] }}
            </div>

            <div
                class="animate-now flex flex-wrap items-center justify-center gap-3"
                data-animate="fadeInUp"
                data-delay="0.4"
            >
                @foreach ($portfolio['roles'] as $role)
                    <span class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm text-gray-300 backdrop-blur-sm">
                        {{ $role }}
                    </span>
                @endforeach
            </div>

            <div
                class="animate-now flex flex-col items-center justify-center gap-4 pt-8 sm:flex-row"
                data-animate="fadeInUp"
                data-delay="0.5"
            >
                <a
                    href="#projects"
                    class="group flex items-center gap-2 rounded-xl bg-linear-to-r from-blue-600 to-purple-600 px-8 py-4 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/50"
                    data-nav-link
                >
                    View Projects
                    <x-portfolio.icon name="arrow-right" class="h-5 w-5 transition-transform group-hover:translate-x-1" />
                </a>
                <a
                    href="#contact"
                    class="flex items-center gap-2 rounded-xl border border-white/20 px-8 py-4 transition-all duration-300 hover:border-white/30 hover:bg-white/5"
                    data-nav-link
                >
                    <x-portfolio.icon name="mail" class="h-5 w-5" />
                    Contact Me
                </a>
            </div>

            <div
                class="animate-now relative pt-12"
                data-animate="scaleIn"
                data-delay="0.6"
            >
                <div class="relative mx-auto h-64 w-64">
                    <div class="absolute inset-0 animate-float-orb rounded-3xl border border-white/10 bg-linear-to-br from-blue-500/20 to-purple-500/20 backdrop-blur-xl"></div>
                    <div class="absolute inset-0 animate-float-orb-reverse rounded-3xl border border-white/10 bg-linear-to-br from-purple-500/20 to-cyan-500/20 backdrop-blur-xl"></div>
                    <div class="absolute inset-0 flex items-center justify-center rounded-3xl border border-white/20 bg-black/40 backdrop-blur-xl">
                        <div class="space-y-2 text-center">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-purple-600">
                                <x-portfolio.icon name="sparkles" class="h-8 w-8" />
                            </div>
                            <div class="text-sm text-gray-400">{{ $portfolio['hero_badge'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
