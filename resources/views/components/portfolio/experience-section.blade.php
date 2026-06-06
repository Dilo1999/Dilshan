@php($experiences = config('portfolio.experience'))

<section id="experience" class="relative py-32 portfolio-section-alt">
    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading
            title="Mission Timeline"
            :subtitle="config('portfolio.experience_subtitle')"
        />

        <div class="mx-auto max-w-4xl">
            <div class="relative">
                <div class="absolute top-0 bottom-0 left-4 w-px bg-portfolio-border md:left-1/2"></div>

                <div class="space-y-12">
                    @foreach ($experiences as $exp)
                        @php($isEven = $loop->even)
                        <div
                            class="animate-on-scroll relative flex items-center gap-8 {{ $isEven ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                            data-animate="fadeInUp"
                            data-delay="{{ $loop->index * 0.15 }}"
                        >
                            <div class="flex-1 pl-10 md:pl-0 {{ $isEven ? 'md:text-right' : 'md:text-left' }}">
                                <div class="glass-panel group p-6">
                                    <div class="mb-4 flex items-start gap-4 md:hidden">
                                        <div class="icon-box p-3">
                                            <x-portfolio.icon :name="$exp['icon']" class="h-6 w-6 text-zinc-600" />
                                        </div>
                                    </div>

                                    <div class="text-sm font-medium text-zinc-500">{{ $exp['period'] }}</div>
                                    <h3 class="mb-1 text-xl font-bold text-zinc-900">{{ $exp['role'] }}</h3>
                                    <div class="mb-4 text-zinc-500">{{ $exp['company'] }}</div>

                                    <div class="space-y-2">
                                        @foreach ($exp['achievements'] as $achievement)
                                            <div class="flex items-start gap-2 text-sm text-zinc-600 {{ $isEven ? 'md:flex-row-reverse md:text-right' : '' }}">
                                                <div class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-zinc-400"></div>
                                                <span>{{ $achievement }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="icon-box absolute left-4 hidden -translate-x-1/2 p-4 md:left-1/2 md:flex">
                                <x-portfolio.icon :name="$exp['icon']" class="h-6 w-6 text-zinc-600" />
                            </div>

                            <div class="hidden flex-1 md:block"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
