<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <title>Laravel</title>
  </head>

  <body>
    API Endpoints:
    <ul>
      <li><a href="http://localhost:8000/api/v1/customers">Customers</a></li>
      <li>
        <ul>
          <li><a href="http://localhost:8000/api/v1/customers&page=2">Customers - <i>Page 2</i></a></li>
          <li><a href="http://localhost:8000/api/v1/customers/1">Customer #1</a></li>
          <li><a href="http://localhost:8000/api/v1/customers?postalCode[gt]=40000">Customers - "postalCode > 40000"</a></li>
          <li><a href="http://localhost:8000/api/v1/customers?postalCode[gt]=40000&type[eq]=1">Customers - "postalCode > 40000 AND type = 1"</a></li>
        </ul>
      </li>

      <li><a href="http://localhost:8000/api/v1/invoices">Invoices</a></li>
      <li>
        <ul>
          <li><a href="http://localhost:8000/api/v1/invoices&page=2">Invoices - <i>Page 2</i></a></li>
          <li><a href="http://localhost:8000/api/v1/invoices/5">Invoices #5</a></li>
          <li><a href="http://localhost:8000/api/v1/invoices?paidStatusId[ne]=2">Invoiced not Paid</a></li>
        </ul>
      </li>
    </ul>
  </body>

</html>
