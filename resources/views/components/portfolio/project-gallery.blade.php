@props(['project'])

@if (! empty($project['url']) || count($project['images']) > 0)
    <div class="animate-on-scroll space-y-4" data-animate="fadeInUp" data-delay="0.2">
        @if (count($project['images']) > 0)
            @if (count($project['images']) === 1)
                <img
                    src="{{ $project['images'][0]['src'] }}"
                    alt=""
                    class="mx-auto block h-auto w-full max-w-full max-h-[820px] object-contain md:max-h-[920px] lg:max-h-[min(90vh,1100px)]"
                    loading="lazy"
                >
            @else
                <div data-project-slider tabindex="0" aria-label="Project screenshots">
                    <div class="flex items-center gap-2 md:gap-3">
                        <button
                            type="button"
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-portfolio-border bg-portfolio-bg text-zinc-700 shadow-sm transition-colors hover:border-zinc-300 hover:text-zinc-900 md:h-11 md:w-11"
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
                                            class="mx-auto block h-auto w-full max-w-full max-h-[820px] object-contain md:max-h-[920px] lg:max-h-[min(90vh,1100px)]"
                                            loading="lazy"
                                        >
                                    </figure>
                                @endforeach
                            </div>
                        </div>

                        <button
                            type="button"
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-portfolio-border bg-portfolio-bg text-zinc-700 shadow-sm transition-colors hover:border-zinc-300 hover:text-zinc-900 md:h-11 md:w-11"
                            data-slider-next
                            aria-label="Next image"
                        >
                            <x-portfolio.icon name="arrow-right" class="h-5 w-5" />
                        </button>
                    </div>

                    <div class="mt-3 flex items-center justify-center gap-2">
                        @foreach ($project['images'] as $image)
                            <button
                                type="button"
                                class="h-2 w-2 rounded-full bg-zinc-300 transition-colors"
                                data-slider-dot
                                aria-label="Go to image {{ $loop->iteration }}"
                                aria-selected="false"
                            ></button>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        @if (! empty($project['url']))
            <a
                href="{{ $project['url'] }}"
                target="_blank"
                rel="noopener noreferrer"
                class="btn-primary group inline-flex"
            >
                <x-portfolio.icon name="external-link" class="h-4 w-4" />
                <span>{{ $project['url_label'] }}</span>
                <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1" />
            </a>
        @endif
    </div>
@endif
