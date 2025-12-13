<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pengumuman->judul }} - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: { 600: '#2563eb', 800: '#1e40af' }
                    },
                    typography: (theme) => ({
                        DEFAULT: {
                            css: {
                                color: theme('colors.gray.700'),
                                a: {
                                    color: theme('colors.campus.600'),
                                    '&:hover': {
                                        color: theme('colors.campus.800'),
                                    },
                                },
                            },
                        },
                    }),
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <style>
        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1.5rem auto;
            display: block;
        }
        .article-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
        .article-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
        .article-content p { margin-bottom: 1rem; }
        .article-content h2, .article-content h3 { font-weight: bold; margin-top: 1.5rem; margin-bottom: 0.5rem; }
        
        .dark .article-content { color: #d1d5db; }
        .dark .article-content strong { color: white; }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow pt-24 pb-16 px-4">
        <article class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">

            <header class="p-6 md:p-10 pb-0 border-b border-gray-100 dark:border-gray-700 mb-6">
                <nav class="flex mb-6 text-sm text-gray-500 dark:text-gray-400" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="hover:text-campus-600 dark:hover:text-blue-400">Beranda</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <a href="{{ route('pengumuman.index') }}" class="ml-1 hover:text-campus-600 dark:hover:text-blue-400">Pengumuman</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <span class="ml-1 text-gray-400 md:ml-2 line-clamp-1">{{ Str::limit($pengumuman->judul, 20) }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="flex flex-wrap items-center gap-4 mb-4">
                    @php
                        $colors = [
                            'Akademik' => 'blue', 'Kemahasiswaan' => 'green', 'Beasiswa' => 'orange',
                            'Teknologi' => 'purple', 'Berita' => 'red', 'Lainnya' => 'gray'
                        ];
                        $color = $colors[$pengumuman->kategori] ?? 'gray';
                    @endphp
                    <span class="bg-{{ $color }}-100 text-{{ $color }}-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300">
                        {{ $pengumuman->kategori }}
                    </span>
                    <span class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ \Carbon\Carbon::parse($pengumuman->tgl_publish)->translatedFormat('l, d F Y') }}
                    </span>
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white leading-tight mb-8">
                    {{ $pengumuman->judul }}
                </h1>
            </header>

            <div class="p-6 md:p-10 space-y-6 text-lg leading-relaxed text-gray-700 dark:text-gray-300 article-content">
                @php
                    $contents = json_decode($pengumuman->deskripsi, true) ?? [];
                @endphp

                @foreach($contents as $item)
                    @if(isset($item['type']) && $item['type'] == 'text')
                        <div class="prose dark:prose-invert max-w-none">
                            {!! $item['text'] !!}
                        </div>
                    @elseif(isset($item['type']) && $item['type'] == 'image')
                        <figure class="my-8">
                            <div class="flex justify-center bg-gray-50 dark:bg-gray-900/50 rounded-xl overflow-hidden border border-gray-100 dark:border-gray-700">
                                <img src="{{ asset('storage/' . $item['image_path']) }}" 
                                     class="max-w-full h-auto max-h-[600px] object-contain" 
                                     alt="{{ $item['caption'] ?? 'Gambar tambahan' }}">
                            </div>
                            @if(!empty($item['caption']))
                                <figcaption class="mt-3 text-center text-sm text-gray-500 italic dark:text-gray-400">
                                    {{ $item['caption'] }}
                                </figcaption>
                            @endif
                        </figure>
                    @endif
                @endforeach
            </div>

            <footer class="px-6 md:px-10 py-8 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                    <div class="flex-1">
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-3">Tags</h4>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $tags = $pengumuman->tags ? explode(',', $pengumuman->tags) : [];
                            @endphp
                            @forelse($tags as $tag)
                                <a href="{{ route('pengumuman.index', ['tag' => trim($tag)]) }}" 
                                   class="px-3 py-1 text-sm bg-white border border-gray-200 rounded-lg text-gray-600 hover:text-campus-600 hover:border-campus-600 transition-all shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:text-white dark:hover:border-blue-500">
                                    #{{ trim($tag) }}
                                </a>
                            @empty
                                <span class="text-sm text-gray-400 italic">Tidak ada tags</span>
                            @endforelse
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white transition-colors bg-gray-800 rounded-lg hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                            <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/></svg>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </footer>

        </article>
    </main>

    @include('layouts.footer')

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        var themeToggleBtn = document.getElementById('theme-toggle');
        if(themeToggleBtn) {
            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark'); localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark'); localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark'); localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark'); localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
        }
        function toggleUserDropdown() { document.getElementById('user-dropdown')?.classList.toggle('hidden'); }
        function toggleTentangDropdown() { document.getElementById('tentang-dropdown')?.classList.toggle('hidden'); }
        window.onclick = function (event) {
            if (!event.target.closest('#user-menu-button')) { document.getElementById('user-dropdown')?.classList.add('hidden'); }
            if (!event.target.closest('#tentang-button')) { document.getElementById('tentang-dropdown')?.classList.add('hidden'); }
        }
    </script>
</body>
</html>