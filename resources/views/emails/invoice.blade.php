<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
</head>

<body>
    <h1>Invoice</h1>
    <p><strong>Transaction Id:</strong> {{ $transaction->transaction_id }}</p>
    <p><strong>Student Name:</strong> {{ $transaction->student->full_name }}</p>
    <p><strong>Program:</strong>
        @foreach (get_program_university_name($transaction->program_id) ?? [] as $item)
            <div class="row">
                <div class="col-4">
                    Program
                </div>
                <div class="col-8">
                    {{ $item->program_title }}
                </div>
                <hr>
                <div class="col-4">
                    University
                </div>
                <div class="col-8">
                    {{ $item->university->university_name }}
                </div>
                <hr>
            </div>
        @endforeach
    </p>

    <p><strong>Payment Method:</strong> {{ $transaction->payment_method }}</p>
    <p><strong>Amount:</strong> {{ number_format($transaction->amount, 2) }}</p>
    <p><strong>Currency:</strong> {{ $transaction->currency }}</p>
    <p><strong>Payment Date:</strong> {{ date('M d, Y', strtotime($transaction->payment_date)) }}</p>
    <p><strong>Status:</strong> {{ $transaction->status }}</p>
</body>

</html>
