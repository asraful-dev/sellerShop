@foreach ($buypackageReport as $key =>  $report)
<p>User Id: {{ $user_id = \App\Models\User::where('id', $report->user_id)->first()->id }}</p>
<p>Package Name: {{ $report->package_name }}</p>
<p>Package Amount: {{ $report_amount = $report->amount }}</p>

$day_payment = $report->day_payment + 1;
$packageAmount = $report->amount / 100 * 0.22 ;

$amount = $report->user_id->roc + $packageAmount;
$user->roc = $amount;
$user->save();


$this->transaction($pushData->created_at, $package->amount, 8, 1, null, $report->user_id);


public function transaction($out, $amount, $purpose, $status, $from_id, $user_id){

    Transaction::create([
        'user_id' => $user_id,
        'from_id' => $from_id,
        'out' =>  $out,
        'purpose' => $purpose,
        'status' => $status,
        'amount' => $amount,
    ]);

}



@endforeach