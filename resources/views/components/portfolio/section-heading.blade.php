@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'mb-14 text-center']) }}>
    <h2 class="mb-4 text-4xl font-bold text-zinc-900 md:text-5xl">
        {{ $title }}
    </h2>
    <div class="section-divider"></div>
    @if ($subtitle)
        <p class="mx-auto mt-5 max-w-2xl text-base leading-relaxed text-zinc-500 md:text-lg">{{ $subtitle }}</p>
    @endif
</div>
