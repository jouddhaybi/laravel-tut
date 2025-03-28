{{ $color }}
<div class="card">
    <div class="card-header">{{ $title }}</div>
    @if ($slot->isEmpty())
        <p>please provide some content</p>
    @else
        {{ $slot }}
    @endif
    <div class="card-footer">{{ $footer }}</div>
</div>
