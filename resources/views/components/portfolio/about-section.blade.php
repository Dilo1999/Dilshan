@php($about = config('portfolio.about'))

<section id="about" class="relative py-28 portfolio-section">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading title="Developer Profile" />

        <div class="grid items-center gap-8 md:grid-cols-2">
            <div class="space-y-6">
                <x-portfolio.identity-flip-card
                    :bio="$about['bio']"
                    :profile-image="$about['profile_image']"
                    :profile-image-alt="$about['profile_image_alt']"
                    :name="config('portfolio.name')"
                />

                <div class="grid grid-cols-2 gap-4">
                    <div class="glass-panel group p-6">
                        <x-portfolio.icon name="calendar" class="mb-3 h-5 w-5 text-purple-400 transition-transform group-hover:scale-110" />
                        <div class="mb-1 text-sm text-gray-400">Experience</div>
                        <div class="font-semibold text-white">{{ $about['experience'] }}</div>
                    </div>
                    <div class="glass-panel group p-6">
                        <x-portfolio.icon name="map-pin" class="mb-3 h-5 w-5 text-blue-400 transition-transform group-hover:scale-110" />
                        <div class="mb-1 text-sm text-gray-400">Location</div>
                        <div class="font-semibold text-white">{{ $about['location'] }}</div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="glass-panel p-8">
                    <div class="mb-6 flex items-center gap-3">
                        <x-portfolio.icon name="zap" class="h-6 w-6 text-cyan-400" />
                        <h3 class="text-xl font-semibold text-white">Focus Areas</h3>
                    </div>
                    <div class="space-y-3">
                        @foreach ($about['focus_areas'] as $focus)
                            <div class="inner-panel flex items-start gap-3 p-3 transition-colors hover:border-blue-500/50">
                                <div class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-cyan-400"></div>
                                <span class="text-gray-300">{{ $focus }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="glass-panel p-6">
                    <div class="mb-2 text-sm text-gray-400">Current Interest</div>
                    <div class="text-lg font-semibold text-white">
                        {{ $about['current_interest'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
