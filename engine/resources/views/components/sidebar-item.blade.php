@props(['icon', 'label', 'items'])

<div class="px-4">
    <div class="flex items-center space-x-2 text-gray-300 py-2">
        <i class="fas {{ $icon }} w-5"></i>
        <span class="font-semibold">{{ $label }}</span>
    </div>
    <div class="ml-6 space-y-1">
        @foreach ($items as $item)
            <a href="{{ $item['url'] }}" class="block text-gray-400 hover:text-white text-sm">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>
