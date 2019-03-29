<form method="POST" action="{{route('search_flights_post')}}">
  @csrf
  <div class="row">
    <div class="col">
      <label for="from">From</label>
      <input type="text" class="form-control {{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" placeholder="Country, city" required>
      @if ($errors->has('from'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('from') }}</strong>
          </span>
      @endif
    </div>
    <div class="col">
      <label for="from">To</label>
      <input type="text" class="form-control {{ $errors->has('to') ? ' is-invalid' : '' }}" name="to" placeholder="Country, city" required>
      @if ($errors->has('to'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('to') }}</strong>
          </span>
      @endif
    </div>
    <div class="col">
      <label for="depart_date">Depart</label>
      <input id="depart_date" type="text" class="form-control {{ $errors->has('depart_date') ? ' is-invalid' : '' }}" name="depart_date" placeholder="01/01/2019" required>
      @if ($errors->has('depart_date'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('depart_date') }}</strong>
          </span>
      @endif
    </div>

  </div>
  <br>
  <div class="form-group row mb-0">
      <div class="col-md-8">
        <button type="submit" class="btn btn-primary btn-lg">Search Flights</button>
      </div>
  </div>
</form>
