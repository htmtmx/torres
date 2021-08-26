<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /*
	 "Schedule of Fees" responsive table for RushCard.com
	 Date: November 2013
	 Created by: Ricardo Zea
*/
        .BN-Gradient {
            background: #999;
            background-image: -moz-linear-gradient(top, #A7A7A7 0%, #666 100%);
            background-image: -webkit-linear-gradient(top, #A7A7A7 0%, #666 100%);
            background-image: linear-gradient(to bottom, #A7A7A7 0%, #666 100%);
            color: white;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);
        }
        .Border-Cells {
            border: #b2b2b2 1px solid;
        }
        .Highlight {
            background-color: #eee;
            background-image: -webkit-repeating-linear-gradient(135deg, transparent, transparent 5px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.5) 10px);
            background-image: -moz-repeating-linear-gradient(135deg, transparent, transparent 5px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.5) 10px);
            background-image: repeating-linear-gradient(135deg, transparent, transparent 5px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.5) 10px);
        }
        .RushCard-Pattern {
            background: #382c8b;
            background-image: -webkit-radial-gradient(rgba(255, 255, 255, 0.02) 20%, transparent 0), -webkit-radial-gradient(rgba(255, 255, 255, 0.02) 35%, transparent 0);
            background-image: -moz-radial-gradient(rgba(255, 255, 255, 0.02) 20%, transparent 0), -moz-radial-gradient(rgba(255, 255, 255, 0.02) 35%, transparent 0);
            background-image: radial-gradient(rgba(255, 255, 255, 0.02) 20%, transparent 0), radial-gradient(rgba(255, 255, 255, 0.02) 35%, transparent 0);
            background-size: 20px 20px;
            background-position: 0 0, 10px 30px;
        }
        sup {
            font-size: 10px;
            padding: 1px 3px;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 999px;
        }
        table {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            font: 16px Arimo, Arial, "Helvetica Neue", Helvetica, sans-serif;
            border-collapse: collapse;
        }
        td {
            text-align: left;
            padding: 8px 10px 10px;
            border: #b2b2b2 1px solid;
        }
        th {
            background: #999;
            background-image: -moz-linear-gradient(top, #A7A7A7 0%, #666 100%);
            background-image: -webkit-linear-gradient(top, #A7A7A7 0%, #666 100%);
            background-image: linear-gradient(to bottom, #A7A7A7 0%, #666 100%);
            color: white;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);
            padding: 10px;
            text-align: center;
        }
        th:first-child,
        th:last-child {
            color: black;
        }
        .col-1 {
            width: 25%;
            font: bold 18px ProximaNova-Light, Arial, Helvetica, sans-serif;
            font-size: 25px;
            text-align: left;
            vertical-align: bottom;
            background: none;
        }
        .col-2,
        .col-3,
        .col-4 {
            width: 18%;
            color: white;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3);
            box-shadow: inset 2px 0 0 white;
        }
        .col-5 {
            width: 21%;
            background: none;
            font-weight: normal;
            font-size: 14px;
            vertical-align: bottom;
            text-transform: uppercase;
        }
        .ie8 .col-2,
        .ie8 .col-3,
        .ie8 .col-4 {
            border-right: #fff 2px solid;
        }
        .ie8 .col-1,
        .ie8 .col-5 {
            color: black;
        }
        tbody tr {
            font-size: 14px;
        }
        .section td {
            background: #382c8b;
            background-image: -webkit-radial-gradient(rgba(255, 255, 255, 0.02) 20%, transparent 0), -webkit-radial-gradient(rgba(255, 255, 255, 0.02) 35%, transparent 0);
            background-image: -moz-radial-gradient(rgba(255, 255, 255, 0.02) 20%, transparent 0), -moz-radial-gradient(rgba(255, 255, 255, 0.02) 35%, transparent 0);
            background-image: radial-gradient(rgba(255, 255, 255, 0.02) 20%, transparent 0), radial-gradient(rgba(255, 255, 255, 0.02) 35%, transparent 0);
            background-size: 20px 20px;
            background-position: 0 0, 10px 30px;
            /*background:#25A4B8;*/
            padding: 8px;
            color: white;
            font: bold 20px ProximaNova-Light, Arial, Helvetica, sans-serif;
            border: none;
            box-shadow: inset 0 0 0 3px rgba(255, 255, 255, 0.2);
            text-shadow: 0 -1px 0 #000000;
            letter-spacing: -0.5px;
        }
        @media only screen and (max-width: 47.9375em) {
            .responsive-tables table,
            .responsive-tables thead,
            .responsive-tables tbody,
            .responsive-tables th,
            .responsive-tables td,
            .responsive-tables tr {
                display: block;
            }
            .responsive-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            .responsive-tables tr:not(.section) {
                border: 1px solid #bbb;
                border-radius: 3px;
            }
            .responsive-tables td {
                border: none;
                position: relative;
                padding-left: 50%;
                padding-bottom: 10px;
                white-space: normal;
                text-align: left;
            }
            .responsive-tables td:before {
                position: absolute;
                top: 8px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }
            .responsive-tables .section td {
                text-align: center;
                color: white;
            }
            .responsive-tables td:before {
                content: attr(data-title);
                white-space: normal;
                letter-spacing: -0.5px;
                color: #382c8b;
            }
            .responsive-tables tr.section td {
                padding: 10px;
            }
            .responsive-tables .main-group {
                margin-bottom: 10px;
            }
            .responsive-tables .main-group td:nth-child(odd):not(.subheading),
            .responsive-tables .main-group td:last-child {
                border-top: #ddd 1px solid;
                border-bottom: #ddd 1px solid;
            }
            .responsive-tables tbody .section + .main-group {
                border-radius: 0 0 3px 3px;
            }
            .responsive-tables .subheading {
                padding: 10px;
                text-align: center;
                font-size: 16px;
                font-weight: bold;
                letter-spacing: -0.5px;
                background: rgba(0, 0, 0, 0.1);
                color: black;
                box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.05);
                border-top: none;
            }
            .responsive-tables .basic-description {
                padding: 10px;
                text-align: center;
            }
            .responsive-tables .highlight {
                background: none;
            }
            .responsive-tables .downplay,
            .responsive-tables .downplay:before {
                color: #999;
                font-weight: normal;
                font-size: 12px;
            }
        }
        /*OOCSS*/
        .highlight {
            text-align: center;
            background-color: #eee;
            background-image: -webkit-repeating-linear-gradient(135deg, transparent, transparent 5px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.5) 10px);
            background-image: -moz-repeating-linear-gradient(135deg, transparent, transparent 5px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.5) 10px);
            background-image: repeating-linear-gradient(135deg, transparent, transparent 5px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.5) 10px);
        }
        .nobg {
            background: none;
        }
        .txt-center {
            text-align: center;
        }
        /*Globals*/
        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
        h1 {
            text-align: center;
        }

    </style>
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