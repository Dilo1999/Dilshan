@php($research = config('portfolio.research'))

<section id="research" class="relative py-16 sm:py-20 lg:py-28 portfolio-section-alt">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <x-portfolio.section-heading title="Engineering Beyond the Interface" />

        <div class="grid gap-8 md:grid-cols-2">
            <div class="animate-on-scroll surface-card p-8" data-animate="slideLeft">
                <div class="mb-6 flex items-center gap-3">
                    <div class="icon-box p-3">
                        <x-portfolio.icon name="brain" class="h-6 w-6 text-gray-300" />
                    </div>
                    <h3 class="text-2xl font-bold text-white">{{ $research['title'] }}</h3>
                </div>

                <p class="mb-6 leading-relaxed text-gray-300">
                    {{ $research['summary'] }}
                </p>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4">
                    @foreach ($research['highlights'] as $item)
                        <div class="inner-panel p-4">
                            <x-portfolio.icon :name="$item['icon']" class="mb-2 h-5 w-5 text-gray-400" />
                            <div class="mb-1 text-xs text-gray-400">{{ $item['label'] }}</div>
                            <div class="text-sm font-semibold text-gray-200">{{ $item['value'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6">
                <div class="animate-on-scroll surface-card p-6" data-animate="slideRight">
                    <div class="mb-4 flex items-center gap-3">
                        <x-portfolio.icon name="cpu" class="h-5 w-5 text-gray-300" />
                        <h4 class="font-semibold text-white">ML Pipeline Architecture</h4>
                    </div>
                    <div class="space-y-3">
                        @foreach ($research['pipeline'] as $step)
                            <div class="inner-panel flex items-center gap-3 p-3">
                                <div class="flex h-6 w-6 items-center justify-center rounded-full border border-portfolio-border bg-portfolio-bg-soft text-xs font-medium text-gray-300">
                                    {{ $loop->iteration }}
                                </div>
                                <span class="text-sm text-gray-300">{{ $step }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="animate-on-scroll surface-card p-6" data-animate="fadeInUp" data-delay="0.2">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        @foreach ($research['stats'] as $stat)
                            <div>
                                <div class="mb-1 text-2xl font-bold text-gradient-accent">{{ $stat['value'] }}</div>
                                <div class="text-xs text-gray-400">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
