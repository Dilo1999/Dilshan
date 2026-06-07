@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'mb-16 text-center']) }}>
    <h2 class="mb-4 text-4xl font-bold text-gradient-accent md:text-5xl lg:text-6xl">
        {{ $title }}
    </h2>
    <div class="section-divider"></div>
    @if ($subtitle)
        <p class="mx-auto mt-6 max-w-2xl text-base leading-relaxed text-gray-400 md:text-lg">{{ $subtitle }}</p>
    @endif
</div>
