<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengumuman - Kampus LSP</title>

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
                    }
                }
            }
        }
    </script>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow">

        <section class="relative pt-32 pb-16 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <div class="relative max-w-screen-xl mx-auto px-4 text-center">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-red-50 text-red-600 text-xs font-bold tracking-widest mb-4 border border-red-100 dark:bg-red-900/30 dark:text-red-300 dark:border-red-800">
                    BERITA & INFORMASI
                </span>
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    Pusat Informasi Kampus
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500 dark:text-gray-400">
                    Dapatkan update terbaru mengenai akademik, kemahasiswaan, dan agenda kampus lainnya.
                </p>

                <div class="mt-8 max-w-xl mx-auto">
                    <form action="{{ route('pengumuman.index') }}" method="GET" class="relative">
                        <input type="search" name="search" value="{{ request('search') }}" id="search" autocomplete="off"
                            class="block w-full p-4 pl-5 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-campus-600 focus:border-campus-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Cari pengumuman..." required>
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-campus-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-6 py-2 dark:bg-blue-600 dark:hover:bg-blue-700">Cari</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="py-12 px-4">
            <div class="max-w-screen-xl mx-auto flex flex-col lg:flex-row gap-12">

                <div class="lg:w-2/3">

                    @if($featured)
                        <div
                            class="group relative mb-12 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent z-10"></div>

                            <img src="{{ $featured->gambar ? asset('storage/' . $featured->gambar) : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop' }}"
                                class="w-full h-96 object-cover transform group-hover:scale-105 transition-transform duration-700"
                                alt="Featured">

                            <div class="absolute bottom-0 left-0 p-6 md:p-8 z-20 text-white">
                                <span
                                    class="bg-campus-600 text-xs font-bold px-2.5 py-0.5 rounded mb-3 inline-block uppercase">{{ $featured->kategori }}</span>
                                <h2
                                    class="text-2xl md:text-3xl font-bold mb-2 leading-tight group-hover:text-blue-200 transition-colors">
                                    <a href="{{ route('pengumuman.show', $featured->id) }}">{{ $featured->judul }}</a>
                                </h2>
                                <div class="flex items-center text-sm text-gray-300 gap-4">
                                    <span><i class="mr-1">📅</i>
                                        {{ \Carbon\Carbon::parse($featured->tgl_publish)->translatedFormat('d F Y') }}</span>

                                    <span><i class="mr-1">✍️</i> 
                                        {{ $featured->is_hidden ? 'Admin' : ($featured->user->name ?? 'Admin') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="p-8 text-center bg-gray-100 rounded-xl dark:bg-gray-800 mb-8">
                            <p class="text-gray-500">Belum ada berita utama saat ini.</p>
                        </div>
                    @endif

                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-2 h-6 bg-campus-600 rounded mr-3"></span>
                        Berita Terbaru
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        @forelse($pengumuman as $item)
                            <article
                                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                                <a href="{{ route('pengumuman.show', $item->id) }}">
                                    <img class="w-full h-48 object-cover"
                                        src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                                        alt="{{ $item->judul }}">
                                </a>
                                <div class="p-5">
                                    <div class="flex justify-between items-center mb-3">
                                        @php
                                            $colors = [
                                                'Akademik' => 'blue',
                                                'Kemahasiswaan' => 'green',
                                                'Beasiswa' => 'orange',
                                                'Teknologi' => 'purple',
                                                'Berita' => 'red',
                                                'Lainnya' => 'gray'
                                            ];
                                            $color = $colors[$item->kategori] ?? 'gray';
                                        @endphp
                                        <span
                                            class="text-xs font-semibold text-{{ $color }}-600 bg-{{ $color }}-100 px-2 py-1 rounded dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300">
                                            {{ $item->kategori }}
                                        </span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($item->tgl_publish)->format('d M Y') }}
                                        </span>
                                    </div>
                                    <h2
                                        class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 hover:text-campus-600 dark:hover:text-blue-400 transition-colors">
                                        <a href="{{ route('pengumuman.show', $item->id) }}">{{ $item->judul }}</a>
                                    </h2>

                                    @php
                                        $deskripsiJson = json_decode($item->deskripsi, true);
                                        $previewText = 'Tidak ada deskripsi singkat.';
                                        if (is_array($deskripsiJson)) {
                                            foreach ($deskripsiJson as $block) {
                                                if (isset($block['type']) && $block['type'] === 'text') {
                                                    $previewText = strip_tags($block['text']);
                                                    break;
                                                }
                                            }
                                        }
                                    @endphp

                                    <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3 mb-4">
                                        {{ Str::limit($previewText, 100) }}
                                    </p>

                                    <div class="flex justify-between items-center mt-4 border-t border-gray-100 dark:border-gray-700 pt-3">
                                        <a href="{{ route('pengumuman.show', $item->id) }}"
                                            class="inline-flex items-center text-sm font-medium text-campus-600 hover:underline dark:text-blue-400">
                                            Baca <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1" title="Penulis">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            {{ $item->is_hidden ? 'Admin' : ($item->user->name ?? 'Admin') }}
                                        </span>
                                    </div>

                                </div>
                            </article>
                        @empty
                            <div class="col-span-2 text-center py-10 text-gray-500">
                                Tidak ada berita yang ditemukan.
                            </div>
                        @endforelse

                    </div>

                    <div class="mt-12 flex justify-center">
                        {{ $pengumuman->withQueryString()->links() }}
                    </div>

                </div>

                <div class="lg:w-1/3 space-y-8">

                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                            Kategori</h3>
                        <ul class="space-y-2">
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('pengumuman.index', ['kategori' => $cat->kategori]) }}"
                                        class="flex justify-between items-center text-gray-600 dark:text-gray-300 hover:text-campus-600 dark:hover:text-blue-400 group">
                                        <span>{{ $cat->kategori }}</span>
                                        <span
                                            class="bg-gray-100 dark:bg-gray-700 text-gray-500 text-xs font-medium px-2 py-0.5 rounded-full group-hover:bg-blue-100 group-hover:text-blue-600">
                                            {{ $cat->total }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                            Tag Populer</h3>
                        <div class="flex flex-wrap gap-2">
                            @forelse($tags as $tag)
                                <a href="{{ route('pengumuman.index', ['tag' => $tag]) }}"
                                    class="px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded hover:bg-campus-600 hover:text-white transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-600">
                                    #{{ $tag }}
                                </a>
                            @empty
                                <span class="text-sm text-gray-500">Belum ada tags.</span>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>