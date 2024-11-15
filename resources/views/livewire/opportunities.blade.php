<div>
    <!-- Items per page selection -->
    <div>
        <!-- searching -->
        <form wire:submit="search">
            <label for="searchString">Keyword:</label>
            <input wire:model.live="searchString" type="text">
            <button type="submit">Search</button>
        </form>
        <br>
        <!-- sorting  -->
        <label for="perPage">Sorting Order:</label>
        <select wire:model="sortType" id="sortType" wire:click="$refresh">
            @foreach ($sortOptions as $sortOptions)
                <option value="{{ $sortOptions }}">{{ $sortOptions }}</option>
            @endforeach
        </select>
        <!-- padination -->
        <label for="perPage">Items per page:</label>
        <select wire:model="perPage" id="perPage" wire:click="$refresh">
            @foreach ($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
        <br><br>
    </div>
    <!-- Items list -->
    <div>
        @foreach ($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
    <!-- Pagination links -->
    {{ $items->links() }}
</div>
