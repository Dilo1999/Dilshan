@php($categories = config('portfolio.skills'))

<section id="skills" class="relative py-16 sm:py-20 lg:py-28 portfolio-section">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <x-portfolio.section-heading title="Tech Stack Dashboard" />

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                <div class="group animate-on-scroll glass-panel p-5 sm:p-8" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.1 }}">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="icon-box transition-transform group-hover:scale-105">
                            <x-portfolio.icon :name="$category['icon']" class="h-6 w-6 text-blue-400" />
                        </div>
                        <h3 class="text-xl font-semibold text-white">{{ $category['title'] }}</h3>
                    </div>

                    <div class="space-y-3">
                        @foreach ($category['skills'] as $skill)
                            <div class="group/skill inner-panel cursor-pointer px-4 py-3 transition-all duration-200 hover:border-blue-500/50">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300 transition-colors group-hover/skill:text-gray-200">{{ $skill }}</span>
                                    <div class="h-2 w-2 rounded-full bg-cyan-400 opacity-0 transition-opacity group-hover/skill:opacity-100"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        @if (count(config('portfolio.soft_skills')))
            <div class="animate-on-scroll mt-12 glass-panel p-5 sm:p-8" data-animate="fadeInUp">
                <div class="mb-6 text-center">
                    <div class="mb-2 text-sm text-gray-400">Soft Skills</div>
                    <h3 class="text-xl font-semibold text-white">Professional strengths</h3>
                </div>
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach (config('portfolio.soft_skills') as $skill)
                        <span class="tag-pill">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="animate-on-scroll mt-12 glass-panel p-5 text-center sm:p-8" data-animate="fadeInUp">
            <div class="mb-2 text-sm text-gray-400">Tech Philosophy</div>
            <div class="text-xl text-gray-300">
                "{{ config('portfolio.skills_philosophy') }}"
            </div>
        </div>
    </div>
</section>
