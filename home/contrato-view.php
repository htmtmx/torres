<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Responsive Table CSS</h1>
<hr>
<div class="responsive-tables ie7 ie8 ie9">
    <table>
        <thead>
        <tr>
            <th class="col-1 numeric">Fee Plan Detail</th>
            <th class="col-2 numeric">Rush Unlimited Plan</th>
            <th class="col-3 numeric">Monthly Plan</th>
            <th class="col-4 numeric">Pay As You Go Plan</th>
            <th class="col-5 numeric">When are you Charged?</th>
        </tr>
        </thead>
        <tbody>
        <tr class="section">
            <td colspan="5">GET STARTED FEES</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">One-Time Card Fee</td>
            <td data-title="Rush Unlimited Plan">$3.95 - $9.95</td>
            <td data-title="Monthly Plan">$3.95 - $9.95</td>
            <td data-title="Pay As You Go Plan">$3.95 - $9.95</td>
            <td data-title="When are you Charged?" class="downplay">When you first load money onto your card.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">One-Time Card Activation Fee</td>
            <td colspan="4" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="section">
            <td colspan="5">MONTHLY USAGE FEES</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Monthly Fee (With direct deposit)</td>
            <td data-title="Rush Unlimited Plan">$5.95</td>
            <td data-title="Monthly Plan">$9.95</td>
            <td data-title="Pay As You Go Plan">No Fee</td>
            <td data-title="When are you Charged?" class="downplay">The 1<sup class="nobg">st</sup> of each month.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Monthly Fee (Without direct deposit)</td>
            <td data-title="Rush Unlimited Plan">$7.95</td>
            <td data-title="Monthly Plan">$9.95</td>
            <td data-title="Pay As You Go Plan">No Fee</td>
            <td data-title="When are you Charged?" class="downplay">The 1<sup class="nobg">st</sup> of each month.</td>
        </tr>
        <tr class="section">
            <td colspan="5">ADD MONEY FEES</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Direct Deposit</td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Cash (Third party money transfer service fees may apply)</td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="section">
            <td colspan="5">SPEND MONEY FEES (WITHIN THE U.S.)</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Transaction Fee - Signature &amp; Online Purchases</td>
            <td data-title="Rush Unlimited Plan">No Fee</td>
            <td data-title="Monthly Plan">No Fee</td>
            <td data-title="Pay As You Go Plan">$1.00<br>
                See Below<sup>A</sup></td>
            <td data-title="When are you Charged?" class="downplay">Each time you select credit and sign for a purchase or make a purchase online.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Transaction Fee - PIN Purchases</td>
            <td data-title="Rush Unlimited Plan">No Fee</td>
            <td data-title="Monthly Plan">$1.00</td>
            <td data-title="Pay As You Go Plan">$1.00<br>
                See Below<sup>A</sup></td>
            <td data-title="When are you Charged?" class="downplay">Each time you select debit and enter your PIN.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Bill Pay Service Fee</td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Card to Card Transfer Fee (To/From your own RushCards)</td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Card to Card Transfer Fee (To/From any other RushCard Member)</td>
            <td data-title="Rush Unlimited Plan">$0.99</td>
            <td data-title="Monthly Plan">$0.99</td>
            <td data-title="Pay As You Go Plan">$0.99</td>
            <td data-title="When are you Charged?" class="downplay">When you request this service.</td>
        </tr>
        <tr class="section">
            <td colspan="5">GET CASH FEES</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">ATM Withdrawal Fee - In Network<sup>B</sup></td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">ATM Withdrawal Fee - Out of Network<sup>C</sup></td>
            <td data-title="Rush Unlimited Plan">$2.50</td>
            <td data-title="Monthly Plan">First 2: $0.00<br>
                After 2: $2.50<sup>D</sup></td>
            <td data-title="Pay As You Go Plan">$2.50</td>
            <td data-title="When are you Charged?" class="downplay">Each time you use an out-of-network ATM to withdraw cash.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Store Cash Back with PIN Purchase</td>
            <td data-title="Rush Unlimited Plan">No Fee</td>
            <td data-title="Monthly Plan" colspan="3">Included in the Transaction Fee for a PIN purchase</td>
        </tr>
        <tr class="section">
            <td colspan="5">INFORMATION FEES</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Call with Live Customer Service agent</td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Toll Free Telephone Balance Inquiries</td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">ATM Balance Inquiry - In Network<sup>B</sup></td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">ATM Balance Inquiry - Out of Network<sup>C</sup></td>
            <td data-title="Rush Unlimited Plan">$0.50</td>
            <td data-title="Monthly Plan">$0.50</td>
            <td data-title="Pay As You Go Plan">$0.50</td>
            <td data-title="When are you Charged?" class="downplay">Each time you use an out-of-network ATM to check your balance.</td>
        </tr>
        <tr class="section">
            <td colspan="5">OTHER FEES</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Replacement Card Fee</td>
            <td data-title="Rush Unlimited Plan" colspan="3">No Fee for the first card replaced in a 12-month period.<br>
                $4.95 for each card thereafter.</td>
            <td data-title="When are you Charged?" class="downplay">When you request this service.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Expedited Card Fee (For a replacement card)</td>
            <td data-title="Rush Unlimited Plan">$30.00</td>
            <td data-title="Monthly Plan">$30.00</td>
            <td data-title="Pay As You Go Plan">$30.00</td>
            <td data-title="When are you Charged?" class="downplay">When you request this service.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Expedited Cash Fee</td>
            <td data-title="Rush Unlimited Plan">$30.00</td>
            <td data-title="Monthly Plan">$30.00</td>
            <td data-title="Pay As You Go Plan">$30.00</td>
            <td data-title="When are you Charged?" class="downplay">When you request this service.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Maintenance Fee</td>
            <td data-title="Rush Unlimited Plan">No Fee</td>
            <td data-title="Monthly Plan">No Fee</td>
            <td data-title="Pay As You Go Plan">$1.95</td>
            <td data-title="When are you Charged?" class="downplay">The first of each month after 90 consecutive days of zero transactions.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Paper Statement Fee</td>
            <td data-title="Rush Unlimited Plan">$1.00</td>
            <td data-title="Monthly Plan">$1.00</td>
            <td data-title="Pay As You Go Plan">$1.00</td>
            <td data-title="When are you Charged?" class="downplay">When you request this service.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">ATM Decline Fee - In Network<sup>B</sup> or Out of Network<sup>C</sup></td>
            <td colspan="7" class="highlight basic-description">No Fee for all Plan Options</td>
        </tr>
        <tr class="section">
            <td colspan="5">SPEND MONEY FEES (OUTSIDE THE U.S.)</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">International Transaction Fee</td>
            <td data-title="Rush Unlimited Plan">No Fee</td>
            <td data-title="Monthly Plan">With PIN: $1.00<br>
                Without PIN: $0.00</td>
            <td data-title="Monthly Plan">$2.00</td>
            <td data-title="When are you Charged?" class="downplay">Each time you make a purchase.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">International ATM Balance Inquiry Fee<sup>C</sup></td>
            <td data-title="Rush Unlimited Plan">$1.00</td>
            <td data-title="Monthly Plan">$1.00</td>
            <td data-title="Pay As You Go Plan">$1.00</td>
            <td data-title="When are you Charged?" class="downplay">Each time you use an ATM to check your balance.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">International ATM Withdrawal Fee<sup>C</sup></td>
            <td data-title="Rush Unlimited Plan">$2.50</td>
            <td data-title="Monthly Plan">$2.50</td>
            <td data-title="Pay As You Go Plan">$2.50</td>
            <td data-title="When are you Charged?" class="downplay">Each time you use an ATM to withdraw cash.</td>
        </tr>
        <tr class="main-group">
            <td class="subheading">Currency Conversion Fee</td>
            <td data-title="Rush Unlimited Plan" colspan="4" class="txt-center">Up to 2% of Transaction Amount for all Plan Options</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>