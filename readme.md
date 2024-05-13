# Learn Laravel 11

In this edition of the Suess Labs' Learn repository, we'll dive into the Laravel PHP framework for web applications.

Looking back, I've usually always created my own micro-frameworks with PHP to keep things lean and quick. However, maintainability and scalability can become a pinch-point throughout the product's lifecycle, so considerations should be made when starting a new product.

## Sample Projects

0. Template used for all projects
1. CRUD - _Basic webpage form with Create, Read, Update, and Delete operations_
2. Form Validation - _Form submission validator with recall of previously entered values_
3. REST API Login and CRUD operation - _Including VS Code tester using REST Client extension_
4. REST API and CRUD - _Slightly more complex implementation of the same thing_
5. Custom DB Naming Conventions - _Column names using PascalCase and not the gross `snake_case`._
   1. Pascal Case Seeder - _DB Factory and Seeder example using your PascalCase columns_

## References

The projects listed here are based on the following examples. The examples in this repository have been modified and improved upon (_bug fixes, added functionality, testability, etc._)

* [REST API Example](https://www.itsolutionstuff.com/post/laravel-11-rest-api-authentication-using-sanctum-tutorialexample.html)
* [CRUD Example](https://www.itsolutionstuff.com/post/laravel-11-crud-application-example-tutorialexample.html)
* [Form Validation Example](https://www.itsolutionstuff.com/post/laravel-11-form-validation-example-tutorialexample.html)

### Coming Soon

* [Deleting Multiple Records](https://websolutioncode.com/how-to-deleting-multiple-record-in-laravel)
* [Publish API Route File](https://www.itsolutionstuff.com/post/how-to-publish-api-route-file-in-laravel-11example.html)
* [File Upload Example](https://www.itsolutionstuff.com/post/laravel-11-file-upload-example-tutorialexample.html)
* [AJAX Request Example](https://www.itsolutionstuff.com/post/laravel-11-ajax-request-example-tutorialexample.html)
* [JQuery Ajax Loading Spinner Example](https://www.itsolutionstuff.com/post/laravel-jquery-ajax-loading-spinner-exampleexample.html)
* [Generate and Read Sitemap XML File Example](https://www.itsolutionstuff.com/post/laravel-11-generate-and-read-sitemap-xml-file-tutorialexample.html)
* Testing Database with Factory and Seeders - [Blog](https://code.tutsplus.com/how-to-build-a-rest-api-with-laravel-php-full-course--cms-93786t), [Video](https://www.youtube.com/watch?v=YGqCZjdgJJk&t=1045s)

## Debugging Tips

Checkout [debugging.md](debugging.md) for more information

## Naming Conventions

There are many "rules" out there which veer off from one another, however, the following appears to be widely accepted. (_Frankly, I often use Xeno Innovations' legacy rules._)

* Models - Always singular and `PascalCase`
* Controllers - Usually singular and ending with the word, `Controller`. i.e. `PostController`

## Other References

* [Database: Query Builder](https://laravel.com/docs/11.x/queries)
