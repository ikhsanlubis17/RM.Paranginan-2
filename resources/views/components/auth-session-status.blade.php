@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-orange-300 bg-orange-500/20 border border-orange-500/30 rounded-lg p-3 text-center']) }}>
        {{ $status }}
    </div>
@endif
