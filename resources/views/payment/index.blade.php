<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel - Razorpay Payment Gateway Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="card mt-5">
        <h3 class="card-header p-3">Laravel Razorpay Payment Gateway</h3>
        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="" method="POST">
                @csrf
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_KEY') }}"
                        data-amount="{{ request('amount') }}" 
                        data-buttontext="Pay {{ number_format(request('amount') / 100, 2) }} INR"
                        data-name="Your Website Name"
                        data-description="Product Payment"
                        data-image="https://www.yoursite.com/logo.png"
                        data-prefill.name="Your Name"
                        data-prefill.email="your.email@example.com"
                        data-theme.color="#ff7529">
                </script>
            </form>
        </div>
    </div>
</div>
</body>
</html>
