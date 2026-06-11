<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-16">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('portfolio.name') }} — Software Engineer portfolio. Building digital systems that feel effortless.">
    <title>{{ $title ?? config('portfolio.name') . ' | Software Engineer' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden bg-portfolio-bg font-sans text-gray-300 antialiased selection:bg-blue-500/30 selection:text-white supports-[padding:max(0px)]:pb-[max(0px,env(safe-area-inset-bottom))]">
    <div class="pointer-events-none fixed inset-0 bg-[radial-gradient(ellipse_at_top,var(--tw-gradient-stops))] from-blue-900/20 via-portfolio-bg to-portfolio-bg" aria-hidden="true"></div>

    <div class="relative z-10">
        <x-portfolio.navbar />

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
