@php
    $categories = config('portfolio.skills');
    $colorStyles = [
        'blue' => ['border' => 'border-blue-500/30 hover:border-blue-500/50', 'bg' => 'from-blue-500/10', 'text' => 'text-blue-400', 'dot' => 'bg-blue-400', 'iconBg' => 'bg-blue-500/10 border-blue-500/20'],
        'purple' => ['border' => 'border-purple-500/30 hover:border-purple-500/50', 'bg' => 'from-purple-500/10', 'text' => 'text-purple-400', 'dot' => 'bg-purple-400', 'iconBg' => 'bg-purple-500/10 border-purple-500/20'],
        'cyan' => ['border' => 'border-cyan-500/30 hover:border-cyan-500/50', 'bg' => 'from-cyan-500/10', 'text' => 'text-cyan-400', 'dot' => 'bg-cyan-400', 'iconBg' => 'bg-cyan-500/10 border-cyan-500/20'],
        'violet' => ['border' => 'border-violet-500/30 hover:border-violet-500/50', 'bg' => 'from-violet-500/10', 'text' => 'text-violet-400', 'dot' => 'bg-violet-400', 'iconBg' => 'bg-violet-500/10 border-violet-500/20'],
        'indigo' => ['border' => 'border-indigo-500/30 hover:border-indigo-500/50', 'bg' => 'from-indigo-500/10', 'text' => 'text-indigo-400', 'dot' => 'bg-indigo-400', 'iconBg' => 'bg-indigo-500/10 border-indigo-500/20'],
    ];
@endphp

<section id="skills" class="relative py-32">
    <div class="absolute inset-0 bg-linear-to-b from-[#0a0e1a] via-blue-950/10 to-[#0a0e1a]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading title="Tech Stack Dashboard" />

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                @php($colors = $colorStyles[$category['color']])
                <div class="group animate-on-scroll rounded-2xl border {{ $colors['border'] }} bg-linear-to-br {{ $colors['bg'] }} to-white/2 p-8 backdrop-blur-xl transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/10" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.1 }}">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="rounded-xl border p-3 transition-transform group-hover:scale-110 {{ $colors['iconBg'] }}">
                            <x-portfolio.icon :name="$category['icon']" class="h-6 w-6 {{ $colors['text'] }}" />
                        </div>
                        <h3 class="text-xl font-semibold">{{ $category['title'] }}</h3>
                    </div>

                    <div class="space-y-3">
                        @foreach ($category['skills'] as $skill)
                            <div class="group/skill cursor-pointer rounded-lg border border-white/10 bg-white/5 px-4 py-3 transition-all duration-200 hover:bg-white/10">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300 transition-colors group-hover/skill:text-white">{{ $skill }}</span>
                                    <div class="h-2 w-2 rounded-full opacity-0 transition-opacity group-hover/skill:opacity-100 {{ $colors['dot'] }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        @if (count(config('portfolio.soft_skills')))
            <div class="animate-on-scroll mt-12 glass-panel p-8" data-animate="fadeInUp">
                <div class="mb-6 text-center">
                    <div class="mb-2 text-sm text-gray-400">Soft Skills</div>
                    <h3 class="text-xl font-semibold text-white">Professional strengths</h3>
                </div>
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach (config('portfolio.soft_skills') as $skill)
                        <span class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm text-gray-300">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="animate-on-scroll mt-12 glass-panel p-8 text-center" data-animate="fadeInUp">
            <div class="mb-2 text-sm text-gray-400">Tech Philosophy</div>
            <div class="text-xl text-gray-200">
                "{{ config('portfolio.skills_philosophy') }}"
            </div>
        </div>
    </div>
</section>
