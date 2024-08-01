@extends('layouts.app')

@section('content')
<div>
    <h2>Login</h2>
    <form id="login-form">
        @csrf
        <input type="text" id="phone" name="phone" placeholder="Phone Number">
        <button type="submit">Send OTP</button>
    </form>

    <form id="verify-otp-form" style="display:none;">
        @csrf
        <input type="text" id="otp" name="otp" placeholder="OTP">
        <button type="submit">Verify OTP</button>
    </form>

    <div id="recaptcha-container"></div>
</div>

{{-- <script>
    // Render the reCAPTCHA
    window.onload = function() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'invisible',
            'callback': function(response) {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
            }
        });
        recaptchaVerifier.render();
    };

    $('#login-form').on('submit', function(e) {
        e.preventDefault();

        var phoneNumber = $('#phone').val();
        var appVerifier = window.recaptchaVerifier;

        firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                $('#login-form').hide();
                $('#verify-otp-form').show();
            }).catch(function(error) {
                console.error(error);
            });
    });

    $('#verify-otp-form').on('submit', function(e) {
        e.preventDefault();

        var otp = $('#otp').val();

        confirmationResult.confirm(otp).then(function(result) {
            var user = result.user;
            // Send the OTP to the server for verification
            $.post('/verify-otp', { _token: $('input[name="_token"]').val(), otp: otp }, function(response) {
                if(response.success) {
                    window.location.href = '/';
                }
            });
        }).catch(function(error) {
            console.error(error);
        });
    });
</script> --}}
@endsection
