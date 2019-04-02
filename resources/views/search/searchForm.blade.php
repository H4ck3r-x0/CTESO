<form method="POST" action="{{route('search_flights_post')}}">
  @csrf

  <div class="row">
    <div class="col">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="roundtrip" id="oneway" value="oneway" onclick="disable_return_date()" checked>
        <label class="form-check-label" for="oneway">One way</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="roundtrip" id="return" value="return" onclick="enable_return_date()">
        <label class="form-check-label" for="return">Return</label>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label for="from">From</label>
      <select class="form-control" id="from" name="from">
        @if($flights->count() != 0)
          @foreach ($flights as $flight)
          <option value="{{$flight->from}}">{{$flight->from}}</option>
          @endforeach
        @else
          <option>No flights are available at this moment.</option>
        @endif
      </select>
    </div>
    <div class="col">
      <label for="to">To</label>
      <select class="form-control" id="to" name="to">
        @if($flights->count() != 0)
          @foreach ($flights as $flight)
          <option value="{{$flight->to}}">{{$flight->to}}</option>
          @endforeach
        @else
          <option>No flights are available at this moment.</option>
        @endif
      </select>
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

    <div class="col return">
      <label for="return_date">Return</label>
      <input id="return_date" type="text" class="form-control {{ $errors->has('return_date') ? ' is-invalid' : '' }}" name="return_date" placeholder="01/01/2019" required>
      @if ($errors->has('return_date'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('return_date') }}</strong>
          </span>
      @endif
    </div>

  </div>

  <br>

  <div class="form-group row mb-0">
      <div class="col-md-8">
        <button type="submit"
          class="btn btn-primary btn-lg" {{$flights->count() != 0 ? '' : 'disabled'}}>
          Search Flights
        </button>
      </div>
  </div>
</form>

@include('search.scripts.date_and_time')
@include('search.scripts.roundtrip')
