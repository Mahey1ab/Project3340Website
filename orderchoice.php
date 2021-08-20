<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        @import "css1.css";
    </style>
</head>
<body>

<form method="post" action="order.php">
    <h3>Choose Delivery Way</h3>
    <input type="radio" name="DeliveryWay" value="Normal Delivery">Normal Delivery $3.50<br>
    <input type="radio" name="DeliveryWay" value="Express Delivery">Express Delivery $8.50<br>
    <h3>Choose Delivery Time</h3>
    <input type="radio" name="DeliveryTime" value="Weekend Delivery">Weekend Delivery<br>
    <input type="radio" name="DeliveryTime" value="Weekday Delivery">Weekday Delivery<br>
    <input type="radio" name="DeliveryTime" value="Any Date Delivery">Any Date Delivery<br>
    <h3>Choose Payment Method</h3>
    <input type="radio" name="PaymentMethod" value="Pay by Credit Card">Pay by Credit Card<br>
    <input type="radio" name="PaymentMethod" value="Pay by Paypal">Pay by Paypal<br>
    <input type="radio" name="PaymentMethod" value="Pay by Giftcard">Pay by Giftcard<br>

    <input type="submit" value="Place an order" name="submit1">
</form>

</body>
</html>
