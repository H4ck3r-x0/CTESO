@extends('layouts.master')
@section('body')
@section('title', 'Payment')
<div class="container">
      <div class="card text-center">
        <div class="card-header bg-light">
          <h3>Checkout to continue</h3>
        </div>
        <div class="card-body">
          <h4 class="mb-3">Payment</h4>
          <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <h4>{{$flight->user->name}} You will pay for</h4>
                  <p class="text-muted">Flight from: {{$flight->adminFlight->from}} to: {{$flight->adminFlight->to}}</p>
                  <p class="text-muted">Total (USD) ${{$price}}</p>
                  @if($flight->meal  !== null)
                    <p class="text-muted">Meals: $50</p>
                  @else
                    <p class="text-muted">Meals: $0</p>
                  @endif
                  <p class="text-muted">subtotal (USD) ${{$price}}</p>

                </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </div>
        <div class="card-footer text-muted bg-light">
        </div>
      </div>
      <br>
</div>
@endsection
