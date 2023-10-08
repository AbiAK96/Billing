<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $invoice->invoice_id }}</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div> 
      <h1 style="margin-bottom: 5px;">INVOICE {{ $invoice->invoice_id }}</h1>
      <div class="company" style="text-align: center;">{{ $invoice->organization->organization_name }} {{ $invoice->organization->address_line_1 }}, {{ $invoice->organization->address_line_2 }}, {{ $invoice->organization->country }}, {{ $invoice->organization->post_code }}</div>
      <div class="company" style="text-align: center;">Mobile No - {{ $invoice->organization->mobile_no }}, Email - {{ $invoice->organization->email }}</div>
      </div>
      <div style="margin-bottom: 50px;"></div>
      <div>
        <div style="margin: 0 auto; width: 95%;">
          <div><strong>CLIENT :</strong> {{ $invoice->customer->first_name.' '.$invoice->customer->last_name }}</div>
          <div><strong>ADDRESS :</strong> {{ $invoice->customer->address_line_1 }}, {{ $invoice->customer->address_line_2 }}, {{ $invoice->customer->county }}, {{ $invoice->customer->post_code }}</div>
          <div><strong>EMAIL :</strong> <a href="mailto:{{ $invoice->customer->email }}">{{ $invoice->customer->email }}</a></div>
          <div><strong>INVOICE DATE :</strong> {{ $invoice->invoice_date }}</div>
      </div>      
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PRODUCT NAME</th>
            <th class="desc">DESCRIPTION</th>
            <th>UNIT PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
           @foreach ($invoice->billingItems as $item)
           <tr>
              <td class="service">{{ $item->product->product_name }} - {{$item->product->product_code}}</td>
              <td class="desc">{{ $item->product->description }}</td>
              <td class="unit">{{ env('CURRENCY').' '.number_format((float)$item->unit_price, 2, '.', '') }}</td>
              <td class="qty">{{ $item->quantity }}</td>
              <td class="total">{{ env('CURRENCY').' '.number_format((float)$item->total_price, 2, '.', '') }}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{ env('CURRENCY').' '.number_format((float)$invoice->net_price, 2, '.', '') }}</td>
          </tr>
          <tr>
            <td colspan="4">TAX {{ $invoice->billingTax->sum('percentage') }}%</td>
            <td class="total">{{ env('CURRENCY').' '.number_format((float)$invoice->tax_price, 2, '.', '') }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{ env('CURRENCY').' '.number_format((float)$invoice->gross_price, 2, '.', '') }}</td>
          </tr>
        </tbody>
      </table>
      <div style="margin-bottom: 50px;"></div>
      <div style="margin: 0 auto; width: 95%;">
        <div>GRAND TOTAL: {{}}</div>
        {{-- <div class="notice">Payment Information</div> --}}
        <p></p>
      </div>
    </main>
    <style>
         @page {
            size: A4;
            margin: 0;
        }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }

      a {
        color: #5D6975;
        text-decoration: underline;
      }

    body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

      header {
        padding: 10px 0;
        margin-bottom: 30px;
      }

      #logo {
        text-align: center;
        margin-bottom: 10px;
      }

      #logo img {
        width: 90px;
      }

      h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
      }

      #project {
        float: left;
      }

      #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
      }

      #company {
        float: right;
        text-align: right;
      }

      #project div,
      #company div {
        white-space: nowrap;        
      }

      table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
      }

      table tr:nth-child(2n-1) td {
        background: #F5F5F5;
      }

      table th,
      table td {
        text-align: center;
      }

      table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
      }

      table .service,
      table .desc {
        text-align: left;
      }

      table td {
        padding: 20px;
        text-align: right;
      }

      table td.service,
      table td.desc {
        vertical-align: top;
      }

      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }

      table td.grand {
        border-top: 1px solid #5D6975;;
      }

      #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
      }

      footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            header {
                margin-bottom: 10px;
            }

            footer {
                position: absolute;
                bottom: 0;
                width: 100%;
            }
        }
  </style>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>