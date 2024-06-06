@if ($thumbnail)
    <img src="{{ $thumbnail->url }}" alt="Thumbnail" style="max-width: 40px; max-height: 40px;">
@else
    --
@endif
