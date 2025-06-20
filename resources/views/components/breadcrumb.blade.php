@props([
    'title' => '',
    'items' => [],
])

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">{{ $title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb small mb-0">
                @foreach ($items as $item)
                    @if (isset($item['url']))
                        <li class="breadcrumb-item">
                            <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                        </li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>

@push('styles')
<style>
    .custom-breadcrumb {
        background-color: transparent !important;
        padding: 0;
        margin: 0;
    }
</style>
@endpush
