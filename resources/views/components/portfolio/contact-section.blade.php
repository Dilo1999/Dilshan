@php
    $contact = config('portfolio.contact');
    $links = [
        ['icon' => 'mail', 'label' => 'Email', 'value' => $contact['email'], 'href' => 'mailto:' . $contact['email']],
        ['icon' => 'github', 'label' => 'GitHub', 'value' => $contact['github'], 'href' => $contact['github_url']],
        ['icon' => 'linkedin', 'label' => 'LinkedIn', 'value' => $contact['linkedin'], 'href' => $contact['linkedin_url']],
        ['icon' => 'map-pin', 'label' => 'Location', 'value' => $contact['location'], 'href' => null],
    ];

    if (! empty($contact['phone'])) {
        array_splice($links, 1, 0, [[
            'icon' => 'phone',
            'label' => 'Phone',
            'value' => $contact['phone'],
            'href' => 'tel:' . preg_replace('/\s+/', '', $contact['phone']),
        ]]);
    }
@endphp

<section id="contact" class="relative py-28 portfolio-section-alt">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading :title="$contact['heading'] ?? 'Get in Touch'" />

        <div class="mx-auto max-w-4xl">
            <div class="surface-card mb-8 p-8 md:p-10">
                <div class="mb-8">
                    <p class="mb-3 text-2xl font-semibold text-zinc-900 md:text-3xl">
                        {{ $contact['intro'] }}
                    </p>
                    <p class="text-zinc-500">
                        {{ $contact['description'] }}
                    </p>
                </div>

                <div class="mb-8 grid gap-4 md:grid-cols-2">
                    @foreach ($links as $link)
                        @if ($link['href'])
                            <a
                                href="{{ $link['href'] }}"
                                @if (str_starts_with($link['href'], 'http'))
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif
                                class="group inner-panel block p-5 transition-all duration-300 hover:border-zinc-300"
                            >
                                <div class="flex items-start gap-4">
                                    <div class="icon-box p-3 transition-transform group-hover:scale-105">
                                        <x-portfolio.icon :name="$link['icon']" class="h-5 w-5 text-zinc-600" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-1 text-sm text-zinc-500">{{ $link['label'] }}</div>
                                        <div class="break-all text-zinc-700 transition-colors group-hover:text-zinc-900">{{ $link['value'] }}</div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <div class="inner-panel p-5">
                                <div class="flex items-start gap-4">
                                    <div class="icon-box p-3">
                                        <x-portfolio.icon :name="$link['icon']" class="h-5 w-5 text-zinc-600" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="mb-1 text-sm text-zinc-500">{{ $link['label'] }}</div>
                                        <div class="text-zinc-700">{{ $link['value'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <a href="mailto:{{ $contact['email'] }}" class="btn-primary group w-full">
                    <x-portfolio.icon name="send" class="h-5 w-5 transition-transform group-hover:translate-x-1" />
                    <span class="font-semibold">Send Message</span>
                </a>
            </div>

            <p class="text-center text-sm text-zinc-500">
                © {{ date('Y') }} {{ config('portfolio.name') }}. Built with Laravel & Tailwind CSS.
            </p>
        </div>
    </div>
</section>
