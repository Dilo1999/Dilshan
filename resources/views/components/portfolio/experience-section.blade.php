@php($experiences = config('portfolio.experience'))

<section id="experience" class="relative py-28 portfolio-section-alt">
    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading
            title="Mission Timeline"
            :subtitle="config('portfolio.experience_subtitle')"
        />

        <div class="mx-auto max-w-4xl">
            <div class="relative">
                <div class="timeline-line" aria-hidden="true"></div>

                <div class="space-y-14">
                    @foreach ($experiences as $exp)
                        @php($isEven = $loop->even)
                        @php($isCurrent = $exp['period'] === 'Current')
                        <div
                            class="animate-on-scroll relative flex items-start gap-8 {{ $isEven ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                            data-animate="fadeInUp"
                            data-delay="{{ $loop->index * 0.15 }}"
                        >
                            <div class="timeline-marker hidden md:flex">
                                <x-portfolio.icon :name="$exp['icon']" class="h-5 w-5 text-gray-300" />
                            </div>

                            <div class="flex-1 pl-10 md:pl-0 {{ $isEven ? 'md:text-right' : 'md:text-left' }}">
                                <article @class(['timeline-card', 'timeline-card-current' => $isCurrent])>
                                    <div class="timeline-header">
                                        <div class="mb-4 flex items-center gap-3 md:hidden">
                                            <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-portfolio-border bg-portfolio-bg">
                                                <x-portfolio.icon :name="$exp['icon']" class="h-5 w-5 text-gray-300" />
                                            </div>
                                        </div>

                                        @if ($isCurrent)
                                            <span class="badge-current">
                                                {{ $exp['period'] }}
                                            </span>
                                        @else
                                            <span class="text-xs font-semibold uppercase tracking-[0.16em] text-gray-500">
                                                {{ $exp['period'] }}
                                            </span>
                                        @endif

                                        <h3 class="mt-2.5 text-xl font-bold leading-snug text-white md:text-2xl">
                                            {{ $exp['role'] }}
                                        </h3>
                                        <p class="mt-1.5 text-sm font-medium text-gray-400 md:text-base">
                                            {{ $exp['company'] }}
                                        </p>
                                    </div>

                                    <div class="timeline-body">
                                        <ul class="space-y-3">
                                            @foreach ($exp['achievements'] as $achievement)
                                                <li class="timeline-achievement text-left">
                                                    @if (str_contains($achievement, ':'))
                                                        <h4 class="text-sm font-semibold leading-snug text-white md:text-base">
                                                            {{ trim(Str::before($achievement, ':')) }}
                                                        </h4>
                                                        <p class="mt-2 text-sm leading-relaxed text-gray-300">
                                                            {{ trim(Str::after($achievement, ':')) }}
                                                        </p>
                                                    @else
                                                        <p class="text-sm leading-relaxed text-gray-300">
                                                            {{ $achievement }}
                                                        </p>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </article>
                            </div>

                            <div class="hidden flex-1 md:block"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
