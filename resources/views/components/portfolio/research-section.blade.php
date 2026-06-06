@php($research = config('portfolio.research'))

<section id="research" class="relative py-32">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading title="Engineering Beyond the Interface" />

        <div class="grid gap-8 md:grid-cols-2">
            <div class="animate-on-scroll rounded-2xl border border-white/10 bg-linear-to-br from-blue-500/10 to-purple-500/10 p-8 backdrop-blur-xl transition-all duration-300 hover:border-blue-500/50" data-animate="slideLeft">
                <div class="mb-6 flex items-center gap-3">
                    <div class="rounded-xl border border-blue-500/30 bg-blue-500/20 p-3">
                        <x-portfolio.icon name="brain" class="h-6 w-6 text-blue-400" />
                    </div>
                    <h3 class="text-2xl font-bold">{{ $research['title'] }}</h3>
                </div>

                <p class="mb-6 leading-relaxed text-gray-300">
                    {{ $research['summary'] }}
                </p>

                <div class="grid grid-cols-2 gap-4">
                    @foreach ($research['highlights'] as $item)
                        <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                            <x-portfolio.icon :name="$item['icon']" class="mb-2 h-5 w-5 text-cyan-400" />
                            <div class="mb-1 text-xs text-gray-400">{{ $item['label'] }}</div>
                            <div class="text-sm font-semibold">{{ $item['value'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6">
                <div class="animate-on-scroll glass-panel p-6 transition-all duration-300 hover:border-purple-500/50" data-animate="slideRight">
                    <div class="mb-4 flex items-center gap-3">
                        <x-portfolio.icon name="cpu" class="h-5 w-5 text-purple-400" />
                        <h4 class="font-semibold">ML Pipeline Architecture</h4>
                    </div>
                    <div class="space-y-3">
                        @foreach ($research['pipeline'] as $step)
                            <div class="flex items-center gap-3 rounded-lg border border-white/5 bg-white/5 p-3">
                                <div class="flex h-6 w-6 items-center justify-center rounded-full border border-purple-500/30 bg-purple-500/20 text-xs text-purple-400">
                                    {{ $loop->iteration }}
                                </div>
                                <span class="text-sm text-gray-300">{{ $step }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="animate-on-scroll rounded-xl border border-cyan-500/20 bg-linear-to-br from-cyan-500/10 to-blue-500/10 p-6 backdrop-blur-xl" data-animate="fadeInUp" data-delay="0.2">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        @foreach ($research['stats'] as $stat)
                            <div>
                                <div class="mb-1 text-2xl font-bold text-cyan-400">{{ $stat['value'] }}</div>
                                <div class="text-xs text-gray-400">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
