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
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute inset-0 bg-linear-to-b from-black/40 via-black/50 to-black/65"></div>
        </div>
    @else
        <div class="absolute inset-0 portfolio-mesh"></div>
    @endif

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <div class="space-y-8 text-center">
            <div class="animate-now space-y-3" data-animate="fadeInUp">
                <h1 class="text-4xl leading-tight font-bold text-white sm:text-5xl md:text-6xl">
                    {{ $portfolio['headline'][0] }}
                </h1>
                <h1 class="text-4xl leading-tight font-bold text-zinc-200 sm:text-5xl md:text-6xl">
                    {{ $portfolio['headline'][1] }}
                </h1>
            </div>

            <p
                class="animate-now mx-auto max-w-3xl text-lg text-zinc-300 md:text-xl"
                data-animate="fadeInUp"
                data-delay="0.1"
            >
                {{ $portfolio['tagline'] }}
            </p>

            <div
                class="animate-now text-2xl font-bold text-white md:text-3xl"
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
                    <span class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm text-zinc-200">{{ $role }}</span>
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
                <a href="#contact" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/25 bg-white/10 px-8 py-4 font-medium text-white transition-all duration-300 hover:bg-white/20" data-nav-link>
                    <x-portfolio.icon name="mail" class="h-5 w-5" />
                    Contact Me
                </a>
            </div>
        </div>
    </div>
</section>
