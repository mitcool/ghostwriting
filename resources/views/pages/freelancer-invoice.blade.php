<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Nunito, sans-serif;
    margin: 0;
    padding: 0;
}

.invoice-info {
    position: absolute;
    left: 29rem;
    top: 3rem;
    margin-top: 0.5rem;
}

.invoice-info td {
    font-size: 8px;
}

.td-left {
    font-weight: bold;
}

table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    border-collapse: collapse;
}

.header {
    background-color: #0195FF;
    font-size: 13px;
    color: #000;
}

.header p {
    margin-top: 20px;
}

.header td {
    padding: 0.75rem;
    font-weight: bold;
    color: #FFFFFF;
}

td {
    text-transform: uppercase;
    color: #000;
}

#invoice-image {
    width: 100%;
}

#print-btn {
    margin: 5rem 0;
}

.last-div span {
    margin-bottom: 0 !important;
    font-size: 14px;
    margin-top: 10px !important;
    text-transform: uppercase;
}
td, th {
    text-align: left !important;
    vertical-align: middle !important;
}

.table td, .table th {
    border-top: unset !important;
    vertical-align: middle !important;
}
p {
    color: #000;
    margin-bottom: 0 !important;
}

.tb-content {
    margin: 2rem 0;
}

.tb-content td {
    padding: 0.3rem !important;
    font-size: 12px;
}
.amounts_label {
    display: inline-block;
    list-style: none;
    line-height: 3;
    margin: 0 1rem;
    padding: 0;
    text-align: center;
}

.inv-label {
    line-height: 1.25;
}

.inv-label td {
    font-size: 13px;
    padding: 0 10px;
}

.section-bottom {
    position: absolute;
    bottom: 0;
}
.divider{
    border-top:2px solid black;
}
.additional_info_pars{
    font-size:13px;
}
</style>
</head>
<body>
    <div id="print">
        <div id="banner">
            <img src="{{asset('images/invoice.png')}}" style="width: 100%;">
            <div class="invoice-info">
                <table style="line-height: 1">
                    <tr>
                        <td></td>
                        <td class="td-left" style="color:white;">Date / Datum:</td>
                        <td style="color:white;">{{$invoice->created_at->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="td-left" style="color:white;">Invoice No. / Rechnungsnummer:</td>
                        <td style="color:white;">{{$invoice->invoice_number}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <table class="table tb-invoice" style="margin-top: 2rem; margin-bottom: 2rem;">
            <tr class="header">
                <td style="width: 33%;">CONTRACTOR</td>
                <td style="width: 33%;"></td>
                <td style="width: 33%;">CLIENT</td>
            </tr>
            <tr>
                <td style="padding: 1rem;"></td>
            </tr>
            <tr class="inv-label">
                <td>{{$invoice->contractor->name}}</td>
                <td></td>
                <td>{{$invoice->order->name}}</td>
            </tr>
            <tr class="inv-label">
                <td style="width:40%;">{{$invoice->contractor->address}}, {{$invoice->contractor->zip}}, {{$invoice->contractor->city}}</td>
                <td style="width:20%;"></td>
                <td style="width:40%;">{{$invoice->freelancer->email}}</td>
            </tr>
            <tr class="inv-label">
                <td>VAT ID {{$invoice->contractor->vat}}</td>
                <td></td>
                <td>{{$invoice->freelancer->phone}}</td>
            </tr>
        </table>
        <table class="table tb-invoice" style="margin-top:100px;">
             <tr class="inv-label">
                <td style="font-weight:bold">
                    DESCRIPTION
                </td>
                <td></td>
                <td style="text-align:right !important;font-weight:bold;">
                   AMOUNT(EUR)
                </td>
            </tr>
        </table>
        <hr>
         <table class="table tb-invoice">
            @foreach($invoice->order->details as $detail)
            @if($detail->key == 'main')
            <tr class="inv-label">
                <td style="text-transform: normal;font-size:14px;">
                    {{$detail->value}}
                </td>
                <td></td>
                <td style="text-align:right !important;">
                    &euro;{{ number_format((float)$invoice->freelancer_payment, 2, '.', ',')}}
                </td>
            </tr>
            @endif
            @endforeach
            
        </table>
        <table class="table tb-invoice" style="margin-top:100px;">
            <tr class="inv-label">
                <td style="text-align: right!important;font-weight:bold;padding:5px;">SUBTOTAL</td>
                <td style="text-align: right!important;font-weight:bold;padding:5px;">VAT</td>
                <td style="text-align: right!important;font-weight:bold;padding:5px;">TOTAL VAT</td>
                <td style="text-align: right!important;font-weight:bold;padding:5px;">TOTAL</td>
            </tr>
            <tr class="inv-label">
                <td style="text-align: right!important;padding:5px;">&euro;{{number_format((float)$invoice->freelancer_payment,2,'.', ',')}}</td>
                <td style="text-align: right!important;padding:5px;">0%</td>
                <td style="text-align: right!important;padding:5px;">0</td>
                <td style="text-align: right!important;padding:5px;">&euro;{{number_format((float)$invoice->freelancer_payment,2,'.', ',')}}</td>
            </tr>
        </table>
        <hr style="border-top:4px solid #0195FF">
        <div class="section-bottom">
            <div style="margin-top: 2rem;">
                <p class="text-justify additional_info_pars">For stated local value added tax: standard tax treatment at national level.</p>
                <p class="text-justify additional_info_pars">For stated foreign value added tax: standard tax treatment in recipient’s state of residence.</p>
                <p class="text-justify additional_info_pars">For unstated value added tax with indication of VAT ID NO: Reverse charge mechanism (EU) – according to Article 194, 196 of Council Directive 2006/112/EEC, VAT liability rests with the service recipient. Reverse charge mechanism (third country) – service that is not taxable at national level. VAT liability rests with the service recipient.</p>
                <hr>
                <p>Payable immediately on receipt of invoice without deductions and free of charges to one of the following bank account</p>
                <p>IBAN: {{$invoice->iban}} &rsaquo; BIC: {{$invoice->bic}} &rsaquo; Bank: {{$invoice->bank}}</p>
            </div>
        </div>
    </div>
</body>
</html>