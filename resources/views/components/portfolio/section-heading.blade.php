@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'mb-10 text-center sm:mb-16']) }}>
    <h2 class="mb-4 text-3xl font-bold text-gradient-accent sm:text-4xl md:text-5xl lg:text-6xl">
        {{ $title }}
    </h2>
    <div class="section-divider"></div>
    @if ($subtitle)
        <p class="mx-auto mt-6 max-w-2xl text-base leading-relaxed text-gray-400 md:text-lg">{{ $subtitle }}</p>
    @endif
</div>
