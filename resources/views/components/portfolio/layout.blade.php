<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('portfolio.name') }} — Software Engineer portfolio. Building digital systems that feel effortless.">
    <title>{{ $title ?? config('portfolio.name') . ' | Software Engineer' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-portfolio-bg font-sans text-zinc-600 antialiased selection:bg-zinc-200 selection:text-zinc-900">
    <x-portfolio.navbar />

    <main>
        {{ $slot }}
    </main>
</body>
</html>
