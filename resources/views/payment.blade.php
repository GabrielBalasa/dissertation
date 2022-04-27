@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 w-100">
            <div class="panel panel-default w-100">
                <div class="panel-heading">
                    <div class="row text-center">
                        <h3 class="panel-heading">Payment Details</h3>
                    </div>                    
                </div>
                {{-- Payment gateway create based on tutorials at References [10] & [11] --}}
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="/user/dashboard" class="close" data-dismiss="alert" aria-label="close">
                                <button style="cursor:pointer" type="submit" class="btn btn-secondary">Go to dashboard</button>
                            </a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <form role="form" action="{{ route('stripe.payment', ['trainer_id' => $trainer_id, 'subscription_tier' => $subscription_tier]) }}" method="post" class="payment-validation"data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        
                        {{-- Billing details based on the user loggedin --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="container">
                                    <div class="col-12 mt-2">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{$user['address']}}">
                                    </div>
                                    
                                    <div class="col-12 mt-2">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{$user['city']}}">
                                    </div>
                            
                                    <div class="col-12 mt-2">
                                        <label for="postcode">Postcode:</label>
                                        <input type="postcode" class="form-control" id="postcode" name="postcode" value="{{$user['postcode']}}">
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Card details --}}
                            <div class="col-6">
                                <div class='row mt-2'>
                                    <div class='form-group required'>
                                        <label class='control-label'>Name on Card</label>
                                        <input class='form-control' size='4' type='text'>
                                    </div>
                                </div>
          
                                <div class='row mt-2'>
                                    <div class='form-group required'>
                                        <label class='control-label'>Card Number</label>
                                        <input class='form-control num' type='text' size='16'>
                                    </div>
                                </div>
                            
                                <div class='row d-flex align-items-center mt-2'>
                                    <div class='col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label>
                                        <input class='form-control cvc' placeholder='CCC' type='text' size='4'>
                                    </div>
                                    <div class='col-md-4 form-group required'>
                                        <label class='control-label'>Exp. Month</label>
                                        <input class='form-control exp-m' placeholder='MM' type='text' size='2'>
                                    </div>
                                    <div class='col-md-4 form-group required'>
                                        <label class='control-label'>Exp. Year</label>
                                        <input class='form-control exp-y' placeholder='YYYY' type='text' size='4'>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-5">
                                <div class="d-flex justify-content-center">
                                    <button class="btn secondary-btn btn-lg" type="submit">Pay Now £{{$total}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>

{{-- Payment gateway create based on tutorials at References [10] & [11] --}}
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $payment = $(".payment-validation");
    $('form.payment-validation').bind('submit', function(e) {
        var $payment = $(".payment-validation"),
            inputVal = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs       = $payment.find('.required').find(inputVal),
            $errorStatus = $payment.find('div.error'),
            valid         = true;
            $errorStatus.addClass('hide');
     
            $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorStatus.removeClass('hide');
            e.preventDefault();
          }
        });
      
        if (!$payment.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($payment.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.num').val(),
                cvc: $('.cvc').val(),
                exp_month: $('.exp-m').val(),
                exp_year: $('.exp-y').val()
            }, stripeHandleResponse);
        }
    });
  
    function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $payment.find('input[type=text]').empty();
            $payment.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $payment.get(0).submit();
        }
    }
});
</script>
@endsection