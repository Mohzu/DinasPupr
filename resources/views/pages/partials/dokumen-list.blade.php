@foreach($documents as $doc)
<div class="p-6 border-b border-gray-100 hover:bg-blue-50/50 transition-colors">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center border border-red-100 relative overflow-hidden">
            <svg class="w-8 h-8 text-red-600" viewBox="0 0 24 24" fill="currentColor">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
                <path d="M14 2v6h6"/>
                <path d="M12 18v-6"/>
                <path d="M9 15l3 3 3-3"/>
            </svg>
        </div>
        <div class="flex-1 min-w-0">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $doc->title }}</h3>
            @if($doc->description)
            <p class="text-gray-600 text-sm mb-3">{{ $doc->description }}</p>
            @endif
            <div class="flex items-center gap-4 text-sm text-gray-500">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Tanggal Publikasi: {{ optional($doc->published_at)->locale('id')->translatedFormat('l, d/m/Y') ?? '-' }}
                </span>
            </div>
        </div>
        <div class="flex-shrink-0 flex items-center gap-3">
            <button type="button"
                class="flex items-center gap-2 px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors"
                onclick="openModal(this)"
                data-title="{{ $doc->title }}"
                data-description="{{ $doc->description }}"
                data-date="{{ optional($doc->published_at)->locale('id')->translatedFormat('l, d F Y') ?? '-' }}"
                data-url="{{ asset('storage/'.$doc->file_path) }}"
                data-filename="{{ basename($doc->file_path) }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Lihat
            </button>
            <a href="{{ asset('storage/'.$doc->file_path) }}" download="{{ basename($doc->file_path) }}" class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Unduh
            </a>
        </div>
    </div>
    </div>
@endforeach
@if($documents->isEmpty())
<div class="p-6 text-center text-gray-500">Tidak ada dokumen.</div>
@endif
