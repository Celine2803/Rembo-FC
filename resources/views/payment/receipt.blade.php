<!DOCTYPE html>
<html>
<head>
    <title>Payment Receipt</title>
</head>
<body>
    <h1>Payment Receipt</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Space Email:</strong> {{ $user->email }}</p>
    <p><strong>Amount Paid:</strong> KES {{ $user->amount }}</p>
</body>
</html>
