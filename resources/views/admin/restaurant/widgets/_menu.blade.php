<div class="card mt-4">
    <div class="card-header">
        <h5> {{ __('label.menu') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="card-body">


            @if (isset($restaurant))
                @if ($restaurant->menu and $restaurant->menu->menuCategories)
                    @foreach ($restaurant->menu->menuCategories as $menu_category)
                        <div>
                            {{ $menu_category->name }}
                        </div>
                    @endforeach
                @endif
            @endif

        </div>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card mb-3 -->
