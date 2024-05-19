<div class="page-title-right">
    <ol class="m-0 breadcrumb">
        @foreach (request()->segments() as $segment => $value)
            @php
                $displayValue = $value == "admin" ? '<i class="ri-dashboard-line"></i>' : ucwords($value);
            @endphp
            @if ($segment == count(request()->segments()) - 1)
                <li class="breadcrumb-item active">{{ ucwords($value) }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url(implode("/", array_slice(request()->segments(), 0, $segment + 1))) }}">{!! $displayValue !!}</a></li>
            @endif
        @endforeach
    </ol>
</div>
