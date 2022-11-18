<!DOCTYPE html>
<html>

<body>

    <h2>Category Create</h2>

  
    <form method="POST" action="@if(isset($category)){{route('admin.cat.update', $category->id)}}@endif">
        @csrf
        <label for="fname">Category:</label><br>
        <input type="text" id="catname" name="catname"  value="@if(isset($category)){{$category->name}}@else{{old('catname')}}@endif"><br>
        @if ($errors->has('catname'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('catname') }}</strong>
            </span>
        @endif
        <label for="lname">Category LEVEL:</label><br>
        <input type="number" id="catlevel" name="catlevel" value="@if(isset($categorySub)){{$categorySub->level}}@else{{old('catlevel')}}@endif"><br><br>
        @if ($errors->has('catlevel'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('catlevel') }}</strong>
            </span>
        @endif
        <input type="submit" value="Submit">
    </form>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif
</body>

</html>
