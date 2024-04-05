<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form id="paymentForm">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label>Choose Payment type</label>
                <div>
                    <input type="radio" name="payment_type" value="COD"> COD
                    <input type="radio" name="payment_type" value="UPI/Card"> UPI/Card
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Razorpay popup modal -->
    <div id="razorpayModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="razorpayModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="razorpayModalLabel">Razorpay Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Razorpay payment form can be added here -->
                    <p>Redirecting to Razorpay...</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#paymentForm').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var paymentType = $("input[name='payment_type']:checked").val();
                if (paymentType === 'COD') {
                    // If COD is selected, submit the form data via AJAX
                    $.ajax({
                        type: 'POST',
                        url: 'process_payment.php', // Update the URL to your server-side script
                        data: formData,
                        success: function (response) {
                            // Handle success response
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            // Handle error response
                            console.error(xhr.responseText);
                        }
                    });
                } else if (paymentType === 'UPI/Card') {
                    // If UPI/Card is selected, open the Razorpay popup modal
                    $('#razorpayModal').modal('show');
                    // You can initiate Razorpay payment process here
                    // Example: Razorpay.orders.create({...});
                }
            });
        });
    </script>
</body>
</html>
