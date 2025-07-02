@props(['icon', 'label', 'url', 'dataToggle' => null, 'dataTarget' => null])

<a href="{{ $url }}"
    @if($dataToggle) data-toggle="{{ $dataToggle }}" @endif
    @if($dataTarget) data-target="{{ $dataTarget }}" @endif
    class="sidebar-link flex items-center px-4 py-3 text-gray-300 hover:text-white">
    <i class="fas {{ $icon }} w-6"></i>
    <span>{{ $label }}</span>
</a>
