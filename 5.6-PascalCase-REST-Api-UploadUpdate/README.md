# Laravel 11 - Custom DB Naming Conventions

Building on the previous example, **5.6-PascalCase-REST-Api**, we're adding the ability to bulk update.

## Reproduce

### Part 1

## Sample Code Highlights

### Invoice JSON Contract Differs from Model/DB

The invoice JSON contract uses `billedDate` and `paidDate` whereas the model/database use, `BilledDttm` and `PaidDttm` respectively.

An insert conversion happens with `InvoiceResource.php`.

```json
{
  "id": 65,
  "customerId": 15,
  "amount": 2177,
  "status": "0",
  "billedDate": "2020-11-14 06:55:40",
  "paidDate": null
}
```

## References

The example created here is based on the PHP course,

* [Bulk Insert (Sec 4.3)](https://youtu.be/YGqCZjdgJJk?t=4971)
* [GitHub](https://github.com/tutsplus/build-a-restful-api-with-laravel-2022)
* [TutsPlus](https://code.tutsplus.com/how-to-build-a-rest-api-with-laravel-php-full-course--cms-93786t).
