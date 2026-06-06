@php
    $impact = config('portfolio.impact');
    $statIcons = ['rocket', 'code', 'star', 'award'];
@endphp

<section id="impact" class="relative py-32 portfolio-section">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading title="Impact & Results" />

        <div class="mb-16 grid gap-6 md:grid-cols-4">
            @foreach ($impact['stats'] as $stat)
                <div
                    class="group animate-on-scroll glass-panel p-6 text-center hover:-translate-y-2"
                    data-animate="scaleIn"
                    data-delay="{{ $loop->index * 0.1 }}"
                >
                    <div class="icon-box mb-4 inline-flex p-4 transition-transform group-hover:scale-105">
                        <x-portfolio.icon :name="$statIcons[$loop->index]" class="h-8 w-8 text-zinc-600" />
                    </div>
                    <div class="mb-2 text-4xl font-bold text-zinc-900">{{ $stat['value'] }}</div>
                    <div class="text-sm text-zinc-500">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        @if (count($impact['testimonials']))
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($impact['testimonials'] as $testimonial)
                    <blockquote class="animate-on-scroll glass-panel p-8" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.15 }}">
                        <div class="mb-6">
                            <div class="mb-4 text-4xl text-zinc-300">"</div>
                            <p class="leading-relaxed text-zinc-600 italic">{{ $testimonial['quote'] }}</p>
                        </div>
                        <footer class="flex items-center gap-4">
                            <div class="icon-box flex h-12 w-12 items-center justify-center rounded-full p-0">
                                <span class="text-sm font-semibold text-zinc-700">
                                    {{ collect(explode(' ', $testimonial['author']))->map(fn ($n) => $n[0])->join('') }}
                                </span>
                            </div>
                            <div>
                                <div class="font-semibold text-zinc-900">{{ $testimonial['author'] }}</div>
                                <div class="text-sm text-zinc-500">{{ $testimonial['company'] }}</div>
                            </div>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        @endif
    </div>
</section>
