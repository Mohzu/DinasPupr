@if(!isset($template_only) && isset($msg))
    @php $s = $msg->sender_type; @endphp
    @if($s === 'user')
        <div class="flex items-end gap-2">
            <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-xs font-bold flex-shrink-0">U</div>
            <div class="bg-white text-gray-800 rounded-2xl rounded-bl-none px-4 py-3 shadow-sm max-w-lg border border-gray-100">
                <p class="text-sm leading-relaxed whitespace-pre-wrap">{{ $msg->message }}</p>
                <span class="text-gray-400 text-[10px] block mt-1">{{ $msg->created_at->format('H:i') }}</span>
            </div>
        </div>
    @elseif($s === 'admin')
        <div class="flex justify-end gap-2">
            <div class="bg-blue-600 text-white rounded-2xl rounded-br-none px-4 py-3 shadow-sm max-w-lg">
                <p class="text-sm leading-relaxed whitespace-pre-wrap">{{ $msg->message }}</p>
                <span class="text-blue-100 text-[10px] block mt-1 text-right">{{ $msg->created_at->format('H:i') }} · Admin</span>
            </div>
            <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">ADM</div>
        </div>
    @else
        {{-- Bot message --}}
        <div class="flex items-end gap-2">
            <img src="{{ asset('img/sapa_pupr.png') }}" alt="AI" class="w-8 h-8 rounded-full object-cover flex-shrink-0 bg-white border border-gray-200">
            <div class="bg-blue-50 text-gray-800 rounded-2xl rounded-bl-none px-4 py-3 shadow-sm max-w-lg border border-blue-100">
                <p class="text-sm leading-relaxed whitespace-pre-wrap">{{ $msg->message }}</p>
                <span class="text-gray-400 text-[10px] block mt-1">{{ $msg->created_at->format('H:i') }} · Bot AI</span>
            </div>
        </div>
    @endif
@endif
