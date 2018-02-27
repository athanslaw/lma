<option>--- Select Lga ---</option>
  @foreach($lga as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
