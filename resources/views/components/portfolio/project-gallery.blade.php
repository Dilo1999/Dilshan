@props(['project', 'showExternalLink' => true])

@if (! empty($project['url']) || count($project['images']) > 0)
    <div {{ $attributes->merge(['class' => 'space-y-6']) }}>
        @if (count($project['images']) > 0)
            <div class="project-gallery-frame p-3 md:p-4">
                @if (count($project['images']) === 1)
                    <img
                        src="{{ $project['images'][0]['src'] }}"
                        alt=""
                        class="mx-auto block h-auto w-full max-h-[min(75vh,900px)] object-contain"
                        loading="lazy"
                    >
                @else
                    <div data-project-slider tabindex="0" aria-label="Project screenshots">
                        <div class="flex items-center gap-2 md:gap-4">
                            <button
                                type="button"
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-white/10 bg-[#0a0e1a]/80 text-gray-300 backdrop-blur-sm transition-colors hover:border-blue-500/50 hover:text-white md:h-11 md:w-11"
                                data-slider-prev
                                aria-label="Previous image"
                            >
                                <x-portfolio.icon name="arrow-left" class="h-5 w-5" />
                            </button>

                            <div class="min-w-0 flex-1 overflow-hidden">
                                <div class="flex transition-transform duration-500 ease-out" data-slider-track>
                                    @foreach ($project['images'] as $image)
                                        <figure class="w-full shrink-0" data-slider-slide>
                                            <img
                                                src="{{ $image['src'] }}"
                                                alt=""
                                                class="mx-auto block h-auto w-full max-h-[min(75vh,900px)] object-contain"
                                                loading="lazy"
                                            >
                                        </figure>
                                    @endforeach
                                </div>
                            </div>

                            <button
                                type="button"
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-white/10 bg-[#0a0e1a]/80 text-gray-300 backdrop-blur-sm transition-colors hover:border-blue-500/50 hover:text-white md:h-11 md:w-11"
                                data-slider-next
                                aria-label="Next image"
                            >
                                <x-portfolio.icon name="arrow-right" class="h-5 w-5" />
                            </button>
                        </div>

                        <div class="mt-4 flex items-center justify-center gap-2">
                            @foreach ($project['images'] as $image)
                                <button
                                    type="button"
                                    class="h-2 w-2 rounded-full bg-white/30 transition-colors"
                                    data-slider-dot
                                    aria-label="Go to image {{ $loop->iteration }}"
                                    aria-selected="false"
                                ></button>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endif

        @if ($showExternalLink && ! empty($project['url']))
            <a
                href="{{ $project['url'] }}"
                target="_blank"
                rel="noopener noreferrer"
                class="btn-primary group inline-flex w-full justify-center sm:w-auto"
            >
                <x-portfolio.icon name="external-link" class="h-4 w-4" />
                <span>{{ $project['url_label'] }}</span>
                <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1" />
            </a>
        @endif
    </div>
@endif
