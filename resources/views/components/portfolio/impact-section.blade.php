@php
    $impact = config('portfolio.impact');
    $statIcons = ['rocket', 'code', 'star', 'award'];
@endphp

<section id="impact" class="relative py-32">
    <div class="absolute inset-0 bg-linear-to-b from-[#0a0e1a] via-blue-950/10 to-[#0a0e1a]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading title="Impact & Results" />

        <div class="mb-16 grid gap-6 md:grid-cols-4">
            @foreach ($impact['stats'] as $stat)
                <div
                    class="group animate-on-scroll glass-panel p-6 text-center transition-all duration-300 hover:-translate-y-2 hover:border-white/20"
                    data-animate="scaleIn"
                    data-delay="{{ $loop->index * 0.1 }}"
                >
                    <div class="mb-4 inline-flex rounded-xl border border-white/20 bg-linear-to-br from-blue-500/20 to-purple-500/20 p-4 transition-transform group-hover:scale-110">
                        <x-portfolio.icon :name="$statIcons[$loop->index]" class="h-8 w-8 text-blue-400" />
                    </div>
                    <div class="mb-2 text-4xl font-bold text-gradient-primary">{{ $stat['value'] }}</div>
                    <div class="text-sm text-gray-400">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        @if (count($impact['testimonials']))
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($impact['testimonials'] as $testimonial)
                <blockquote
                    class="animate-on-scroll glass-panel p-8 transition-all duration-300 hover:border-purple-500/50"
                    data-animate="fadeInUp"
                    data-delay="{{ $loop->index * 0.15 }}"
                >
                    <div class="mb-6">
                        <div class="mb-4 text-4xl text-purple-400">"</div>
                        <p class="leading-relaxed text-gray-300 italic">{{ $testimonial['quote'] }}</p>
                    </div>
                    <footer class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-white/20 bg-linear-to-br from-blue-500 to-purple-600">
                            <span class="text-sm font-semibold">
                                {{ collect(explode(' ', $testimonial['author']))->map(fn ($n) => $n[0])->join('') }}
                            </span>
                        </div>
                        <div>
                            <div class="font-semibold">{{ $testimonial['author'] }}</div>
                            <div class="text-sm text-gray-400">{{ $testimonial['company'] }}</div>
                        </div>
                    </footer>
                </blockquote>
                @endforeach
            </div>
        @endif
    </div>
</section>
