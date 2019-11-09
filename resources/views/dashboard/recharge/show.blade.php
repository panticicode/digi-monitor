@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.hr.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Update Balance</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div class="grid">
				<p class="grid-header">Update Balance</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-8 mx-auto">
								<form action="{{ route('dashboard.recharge.changeRecharge') }}" method="post" id="payment-form">
								@csrf	
								  <div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType1">Current Balance</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<label for="" class="form-control">{{ \Auth::user()->balance/100 }}</label>
										</div>
									</div>
                  <div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType2">Balance (USD)</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="balance" class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('balance') }}" placeholder="USD">
											@if($errors->has('balance'))
												<div class="invalid-feedback">
													{{ $errors->first('balance') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group">
											<div class="card-header">
													<label for="card-element">
															Enter your credit card information
													</label>
											</div>
											<div class="card-body">
													<div id="card-element">
													<!-- A Stripe Element will be inserted here. -->
													</div>
													<!-- Used to display form errors. -->
													<div id="card-errors" role="alert"></div>
													<input type="hidden" name="id" value="{{ \Auth::user()->id }}" />
											</div>
									</div>
									<div class="card-footer form-group row showcase_text_area text-right">
											<button class="btn btn-success col-md-6" type="submit">Pay</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection
@section('pageJS')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
var stripe = Stripe('{{ env("STRIPE_KEY") }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection