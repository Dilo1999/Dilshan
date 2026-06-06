@props([
    'bio',
    'profileImage',
    'profileImageAlt',
    'name',
])

@php
    $imagePath = public_path($profileImage);
    $imageSrc = file_exists($imagePath)
        ? asset($profileImage)
        : asset('images/profile/profile.svg');
@endphp

<div class="identity-flip-card group h-[28rem] w-full cursor-pointer sm:h-[30rem]" tabindex="0">
    <div class="identity-flip-inner relative h-full w-full">
        <div class="identity-flip-face identity-flip-front absolute inset-0 flex flex-col items-center justify-center overflow-hidden rounded-2xl border border-portfolio-border bg-portfolio-bg-soft p-10 text-center shadow-sm sm:p-12">
            <div class="mb-6 h-44 w-44 overflow-hidden rounded-full border-4 border-portfolio-border shadow-sm sm:h-48 sm:w-48">
                <img
                    src="{{ $imageSrc }}"
                    alt="{{ $profileImageAlt }}"
                    class="h-full w-full object-cover"
                >
            </div>
            <h3 class="text-2xl font-semibold text-zinc-900 sm:text-3xl">Developer Identity</h3>
            <p class="mt-2 text-sm text-zinc-500 sm:text-base">{{ $name }}</p>
            <p class="mt-4 text-xs text-zinc-400 transition-colors group-hover:text-zinc-500">Hover to read bio</p>
        </div>

        <div class="identity-flip-face identity-flip-back absolute inset-0 overflow-hidden rounded-2xl border border-portfolio-border bg-portfolio-bg-soft p-10 shadow-sm sm:p-12">
            <div class="flex h-full flex-col">
                <div class="mb-4 flex items-start gap-4">
                    <div class="icon-box shrink-0 p-3">
                        <x-portfolio.icon name="target" class="h-6 w-6 text-zinc-600" />
                    </div>
                    <h3 class="text-2xl font-semibold text-zinc-900">Developer Identity</h3>
                </div>
                <div class="min-h-0 flex-1 overflow-y-auto pr-1">
                    <p class="leading-relaxed text-zinc-600">{{ $bio }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
