<div class="p-2 mb-1 border d-flex justify-content-between" style="margin-left: {{ $menuItem->parent ? 20 : 0 }}px">
    <div class="">
        <h4><b>{{ $menuItem->name }}</b></h4>
        <a href="{{ $menuItem->url }}">{{ $menuItem->url }}</a>
    </div>

    <div class="" role="group" aria-label="Basic example">
        {{-- <a href="{{ route("admin.menu-items.edit", $menuItem->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
        <form action="{{ route("admin.menu-items.destroy", $menuItem->id) }}" method="POST" class="show-confirm-delete" style="display:inline;">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </div>
</div>
<!-- Render Child Menu Items Recursively -->
@if ($menuItem->children->isNotEmpty())
    @foreach ($menuItem->children->sortBy("order") as $childItem)
        @include("components.admin.navMenu.partialMenuItems", ["menuItem" => $childItem])
    @endforeach
@endif
