<option
value="{{ $item['id'] }}"
wire:key="{{ $item['id'] }}"
{!! $item['parent_id'] == 0 ? 'class="font-weight-bold"' : '' !!}
>
    {!! $tab . $item['title'] !!}
</option>


@if (isset($item['children']))
{!! \App\Helpers\Category\Category::getHtml($item['children'], "&nbsp;$tab - ") !!}
@endif

