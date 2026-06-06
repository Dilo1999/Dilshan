@php($categories = config('portfolio.skills'))

<section id="skills" class="relative py-28 portfolio-section">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading title="Tech Stack Dashboard" />

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                <div class="group animate-on-scroll glass-panel p-8" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.1 }}">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="icon-box transition-transform group-hover:scale-105">
                            <x-portfolio.icon :name="$category['icon']" class="h-6 w-6 text-zinc-600" />
                        </div>
                        <h3 class="text-xl font-semibold text-zinc-900">{{ $category['title'] }}</h3>
                    </div>

                    <div class="space-y-3">
                        @foreach ($category['skills'] as $skill)
                            <div class="group/skill inner-panel cursor-pointer px-4 py-3 transition-all duration-200 hover:border-zinc-300">
                                <div class="flex items-center justify-between">
                                    <span class="text-zinc-600 transition-colors group-hover/skill:text-zinc-800">{{ $skill }}</span>
                                    <div class="h-2 w-2 rounded-full bg-zinc-400 opacity-0 transition-opacity group-hover/skill:opacity-100"></div>
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
                    <div class="mb-2 text-sm text-zinc-500">Soft Skills</div>
                    <h3 class="text-xl font-semibold text-zinc-900">Professional strengths</h3>
                </div>
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach (config('portfolio.soft_skills') as $skill)
                        <span class="tag-pill">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="animate-on-scroll mt-12 glass-panel p-8 text-center" data-animate="fadeInUp">
            <div class="mb-2 text-sm text-zinc-500">Tech Philosophy</div>
            <div class="text-xl text-zinc-700">
                "{{ config('portfolio.skills_philosophy') }}"
            </div>
        </div>
    </div>
</section>
