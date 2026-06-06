@props(['project'])

@if (! empty($project['url']) || count($project['images']) > 0)
    <div class="animate-on-scroll mt-8 space-y-4" data-animate="fadeInUp" data-delay="0.2">
        @if (count($project['images']) > 0)
            <div class="glass-panel overflow-hidden p-4 md:p-6" data-project-slider tabindex="0" aria-label="Project screenshots">
                <div class="mb-4 flex items-center justify-between gap-4">
                    <h2 class="text-lg font-semibold text-zinc-900">Project Gallery</h2>
                    <span class="text-sm text-zinc-500" data-slider-counter>1 / {{ count($project['images']) }}</span>
                </div>

                <div class="relative overflow-hidden rounded-xl border border-portfolio-border bg-portfolio-bg-soft">
                    <div class="flex transition-transform duration-500 ease-out" data-slider-track>
                        @foreach ($project['images'] as $image)
                            <figure class="w-full shrink-0" data-slider-slide>
                                <div class="flex aspect-video items-center justify-center bg-portfolio-bg-soft p-4 md:p-8">
                                    <img
                                        src="{{ $image['src'] }}"
                                        alt="{{ $image['alt'] }}"
                                        class="max-h-[420px] w-full rounded-lg border border-portfolio-border object-contain shadow-sm"
                                        loading="lazy"
                                    >
                                </div>
                                @if (! empty($image['caption']))
                                    <figcaption class="border-t border-portfolio-border px-4 py-3 text-center text-sm text-zinc-600">
                                        {{ $image['caption'] }}
                                    </figcaption>
                                @endif
                            </figure>
                        @endforeach
                    </div>

                    @if (count($project['images']) > 1)
                        <button
                            type="button"
                            class="absolute top-1/2 left-3 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-portfolio-border bg-portfolio-bg text-zinc-700 transition-colors hover:border-zinc-300 hover:text-zinc-900"
                            data-slider-prev
                            aria-label="Previous image"
                        >
                            <x-portfolio.icon name="arrow-left" class="h-4 w-4" />
                        </button>
                        <button
                            type="button"
                            class="absolute top-1/2 right-3 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-portfolio-border bg-portfolio-bg text-zinc-700 transition-colors hover:border-zinc-300 hover:text-zinc-900"
                            data-slider-next
                            aria-label="Next image"
                        >
                            <x-portfolio.icon name="arrow-right" class="h-4 w-4" />
                        </button>
                    @endif
                </div>

                @if (count($project['images']) > 1)
                    <div class="mt-4 flex items-center justify-center gap-2">
                        @foreach ($project['images'] as $image)
                            <button
                                type="button"
                                class="h-2.5 w-2.5 rounded-full bg-zinc-300 transition-colors"
                                data-slider-dot
                                aria-label="Go to image {{ $loop->iteration }}"
                                aria-selected="false"
                            ></button>
                        @endforeach
                    </div>
                @endif
            </div>
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
