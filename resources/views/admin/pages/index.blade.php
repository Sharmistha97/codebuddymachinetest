<!DOCTYPE html>
<html>

<body>

    <h2>Category Create</h2>

  
    <form method="POST" action="{{ route('admin.cat.store') }}">
        @csrf
        <label for="fname">Category:</label><br>
        <input type="text" id="catname" name="catname" value="{{ old('catname') }}"><br>
        @if ($errors->has('catname'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('catname') }}</strong>
            </span>
        @endif
        <label for="lname">Category LEVEL:</label><br>
        <input type="number" id="catlevel" name="catlevel" value="{{ old('catlevel') }}"><br><br>
        @if ($errors->has('catlevel'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('catlevel') }}</strong>
            </span>
        @endif
        <input type="submit" value="Submit">
    </form>

   
</body>

</html>
