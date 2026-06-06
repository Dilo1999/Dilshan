@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'mb-16 text-center']) }}>
    <h2 class="mb-4 text-5xl font-bold text-gradient-primary md:text-6xl">
        {{ $title }}
    </h2>
    <div class="section-divider"></div>
    @if ($subtitle)
        <p class="mx-auto mt-6 max-w-2xl text-zinc-500">{{ $subtitle }}</p>
    @endif
</div>
