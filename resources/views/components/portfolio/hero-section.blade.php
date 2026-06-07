@php
    $portfolio = config('portfolio');
    $heroImages = $portfolio['hero_images'] ?? [];
@endphp

<section id="home" class="relative flex min-h-screen items-center justify-center overflow-hidden pt-16 pb-24">
    @if (count($heroImages) > 0)
        <div class="absolute inset-0" data-hero-slider aria-hidden="true">
            @foreach ($heroImages as $image)
                <div
                    @class([
                        'absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out',
                        'opacity-100' => $loop->first,
                        'opacity-0' => ! $loop->first,
                    ])
                    data-hero-slide
                    style="background-image: url('{{ asset($image) }}')"
                ></div>
            @endforeach
            <div class="absolute inset-0 bg-[#0a0e1a]/70"></div>
            <div class="absolute inset-0 bg-linear-to-b from-blue-950/40 via-[#0a0e1a]/60 to-[#0a0e1a]"></div>
        </div>
    @else
        <div class="absolute inset-0 portfolio-mesh"></div>
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 h-96 w-96 rounded-full bg-blue-500/20 blur-[128px]"></div>
            <div class="absolute right-1/4 bottom-1/4 h-96 w-96 rounded-full bg-purple-500/20 blur-[128px]"></div>
        </div>
        <div class="absolute inset-0 opacity-20 portfolio-grid-bg"></div>
    @endif

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <div class="space-y-8 text-center">
            <div class="animate-now space-y-3" data-animate="fadeInUp">
                <h1 class="text-4xl leading-tight font-bold text-gradient-hero sm:text-5xl md:text-6xl lg:text-7xl">
                    {{ $portfolio['headline'][0] }}
                </h1>
                <h1 class="text-4xl leading-tight font-bold text-gradient-primary sm:text-5xl md:text-6xl lg:text-7xl">
                    {{ $portfolio['headline'][1] }}
                </h1>
            </div>

            <p
                class="animate-now mx-auto max-w-3xl text-lg text-gray-300 md:text-xl"
                data-animate="fadeInUp"
                data-delay="0.1"
            >
                {{ $portfolio['tagline'] }}
            </p>

            <div
                class="animate-now text-2xl font-bold text-white md:text-3xl lg:text-4xl"
                data-animate="fadeInUp"
                data-delay="0.2"
            >
                {{ $portfolio['name'] }}
            </div>

            <div
                class="animate-now flex flex-wrap items-center justify-center gap-3"
                data-animate="fadeInUp"
                data-delay="0.3"
            >
                @foreach ($portfolio['roles'] as $role)
                    <span class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm text-gray-300 backdrop-blur-sm">{{ $role }}</span>
                @endforeach
            </div>

            <div
                class="animate-now flex flex-col items-center justify-center gap-4 pt-8 sm:flex-row"
                data-animate="fadeInUp"
                data-delay="0.4"
            >
                <a href="#projects" class="btn-primary group px-8 py-4" data-nav-link>
                    View Projects
                    <x-portfolio.icon name="arrow-right" class="h-5 w-5 transition-transform group-hover:translate-x-1" />
                </a>
                <a href="#contact" class="btn-secondary px-8 py-4" data-nav-link>
                    <x-portfolio.icon name="mail" class="h-5 w-5" />
                    Contact Me
                </a>
            </div>
        </div>
    </div>
</section>
