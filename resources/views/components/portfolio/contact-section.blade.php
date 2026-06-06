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

<section id="contact" class="relative py-32">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading :title="$contact['heading'] ?? 'Communication Console'" />

        <div class="mx-auto max-w-4xl">
            <div class="glass-panel mb-8 p-8 md:p-12">
                <div class="mb-6 flex items-center gap-3 border-b border-white/10 pb-6">
                    <x-portfolio.icon name="terminal" class="h-6 w-6 text-cyan-400" />
                    <div class="flex-1 font-mono text-sm text-gray-400">
                        <span class="text-cyan-400">dilshan@portfolio</span>
                        <span class="text-gray-500">:</span>
                        <span class="text-purple-400">~</span>
                        <span class="text-gray-500">$ </span>
                        <span class="text-white">initiate_contact</span>
                    </div>
                </div>

                <div class="mb-8">
                    <p class="mb-4 text-2xl text-gray-200 md:text-3xl">
                        {{ $contact['intro'] }}
                    </p>
                    <p class="text-gray-400">
                        {{ $contact['description'] }}
                    </p>
                </div>

                <div class="mb-8 grid gap-6 md:grid-cols-2">
                    @foreach ($links as $link)
                        @if ($link['href'])
                            <a
                                href="{{ $link['href'] }}"
                                @if (str_starts_with($link['href'], 'http'))
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif
                                class="group cursor-pointer rounded-xl border border-white/10 bg-white/5 p-6 transition-all duration-300 hover:border-blue-500/50 hover:bg-white/10"
                            >
                                <div class="flex items-start gap-4">
                                    <div class="rounded-lg border border-white/20 bg-linear-to-br from-blue-500/20 to-purple-500/20 p-3 transition-transform group-hover:scale-110">
                                        <x-portfolio.icon :name="$link['icon']" class="h-5 w-5 text-blue-400" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-1 text-sm text-gray-400">{{ $link['label'] }}</div>
                                        <div class="break-all text-gray-200 transition-colors group-hover:text-white">{{ $link['value'] }}</div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <div class="group rounded-xl border border-white/10 bg-white/5 p-6 transition-all duration-300 hover:border-blue-500/50 hover:bg-white/10">
                                <div class="flex items-start gap-4">
                                    <div class="rounded-lg border border-white/20 bg-linear-to-br from-blue-500/20 to-purple-500/20 p-3">
                                        <x-portfolio.icon :name="$link['icon']" class="h-5 w-5 text-blue-400" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="mb-1 text-sm text-gray-400">{{ $link['label'] }}</div>
                                        <div class="text-gray-200">{{ $link['value'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <a
                    href="mailto:{{ $contact['email'] }}"
                    class="group flex w-full items-center justify-center gap-3 rounded-xl bg-linear-to-r from-blue-600 to-purple-600 px-6 py-4 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/50"
                >
                    <x-portfolio.icon name="send" class="h-5 w-5 transition-transform group-hover:translate-x-1" />
                    <span class="font-semibold">Start a Conversation</span>
                </a>
            </div>

            <p class="text-center text-sm text-gray-500">
                © {{ date('Y') }} {{ config('portfolio.name') }}. Built with Laravel & Tailwind CSS.
            </p>
        </div>
    </div>
</section>
