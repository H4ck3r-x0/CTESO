@extends('layouts.master')
@section('body')
@section('title', 'Ticket Details')
<div class="container">
      <div class="card text-center">
        <div class="card-header bg-light">
          <h3>Thank you for your trust and confidence, your ticket details are below.</h3>
                    <h5 class="mb-3">{{$flight->ticket_number}}</h5>
        </div>
        <div class="card-body">
          <h2>Porsonal details</h2>
            <div class="row">
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Name</h4>
                  <div class="">
                    {{$flight->user->name}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">ID Number</h4>
                  <div class="">
                    {{$flight->user->id_number}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Passport Number</h4>
                  <div class="">
                    {{$flight->user->passport_number}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Phone Number</h4>
                  <div class="">
                    {{$flight->user->phone_number}}
                  </div>
                </div>

              </div>
              <hr class="mb-4">
            <h2>Flight details</h2>
            <div class="row">
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Depuart</h4>
                  <div class="">
                    {{$flight->adminFlight->from}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Arrival</h4>
                  <div class="">
                    {{$flight->adminFlight->to}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Depart date</h4>
                  <div class="">
                    {{$flight->adminFlight->depart_date}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Depart time</h4>
                  <div class="">
                    {{$flight->adminFlight->depart_time}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Seat Number</h4>
                  <div class="">
                    {{$flight->seat}}
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <h4 for="cc-expiration">Meals</h4>
                  <div class="">
                    @if($flight->meal !== null)
                      <p>Meals are included</p>
                    @else
                      <p>No meals are included</p>
                    @endif
                  </div>
                </div>
              </div>
              @if ($flight->adminFlight->return_date !== null)

                <div class="row">
                    <div class="col-md-3 mb-3">
                      <h4 for="cc-expiration">Return</h4>
                      <div class="">
                        {{$flight->adminFlight->to}}
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <h4 for="cc-expiration">Arrival</h4>
                      <div class="">
                        {{$flight->adminFlight->from}}
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <h4 for="cc-expiration">Return Date</h4>
                      <div class="">
                        {{$flight->adminFlight->return_date}}
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <h4 for="cc-expiration">Return time</h4>
                      <div class="">
                        {{$flight->adminFlight->depart_time}}
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <h4 for="cc-expiration">Seat Number</h4>
                      <div class="">
                        {{$flight->seat}}
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <h4 for="cc-expiration">Meals</h4>
                      <div class="">
                        @if($flight->meal !== null)
                          <p>Meals are included</p>
                        @else
                          <p>No meals are included</p>
                        @endif
                      </div>
                    </div>
                  </div>
              @endif

        </div>
        <div class="card-footer text-muted bg-light">
          <div class="row">
            <div class="col-md-6 mb-6">
              <div class="">
                <button class="btn btn-success" onclick="return window.print()">Print this ticket</button>
              </div>
            </div>
            <div class="col-md-6 mb-6">
              <div class="">
                <form class="" action="{{route('logout')}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
      <br>
</div>
<script>
function print_ticket() {
  window.print();
}
</script>
@endsection
