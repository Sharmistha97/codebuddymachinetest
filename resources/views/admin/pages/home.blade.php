<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <h2>Tree View</h2>
    <p>{{ Auth::guard('admin')->user()->name }}</p>
    <a href="{{route('admin.cat.create')}}">Create Category</a>
    <ul id="myUL">
        @if ($category->count() > 0)
            @foreach ($category as $item)             
                <li><span class="caret">{{ $item->name }}</span>
                    @foreach ($item->categoryLevels as $relatndata)
                        <ul class="nested">
                            <li>{{ $item->name }}-{{ $relatndata->level }}</li>
                        </ul>
                    @endforeach
                </li>
                <a href="{{ route('admin.cat.edit', ['id' => $item->id]) }}">Edit</a> <a href="{{ route('admin.cat.delete', ['id' => $item->id]) }}">Delete</a>
            @endforeach
        @else
            <span class="caret">NO DATA FOUND</span>
        @endif
    </ul>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

</body>

</html>
