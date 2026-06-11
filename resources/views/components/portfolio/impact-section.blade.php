@php
    $impact = config('portfolio.impact');
@endphp

<section id="impact" class="relative py-16 sm:py-20 lg:py-28 portfolio-section">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <x-portfolio.section-heading title="Impact & Results" />

        <div class="mb-12 grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($impact['stats'] as $stat)
                <div
                    class="animate-on-scroll glass-panel p-6 text-center"
                    data-animate="scaleIn"
                    data-delay="{{ $loop->index * 0.1 }}"
                >
                    <div class="mb-1 stat-value">{{ $stat['value'] }}</div>
                    <div class="text-sm text-gray-400">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        @if (count($impact['testimonials']))
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($impact['testimonials'] as $testimonial)
                    <blockquote class="animate-on-scroll glass-panel p-8" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.15 }}">
                        <div class="mb-6">
                            <div class="mb-4 text-4xl text-gray-300">"</div>
                            <p class="leading-relaxed text-gray-300 italic">{{ $testimonial['quote'] }}</p>
                        </div>
                        <footer class="flex items-center gap-4">
                            <div class="icon-box flex h-12 w-12 items-center justify-center rounded-full p-0">
                                <span class="text-sm font-semibold text-gray-300">
                                    {{ collect(explode(' ', $testimonial['author']))->map(fn ($n) => $n[0])->join('') }}
                                </span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">{{ $testimonial['author'] }}</div>
                                <div class="text-sm text-gray-400">{{ $testimonial['company'] }}</div>
                            </div>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        @endif
    </div>
</section>
