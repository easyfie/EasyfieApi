# EasyFie API PHP Client

The EasyFie API PHP Client is a simple and easy-to-use library for interacting with the EasyFie API. This library provides methods to authenticate, retrieve user data, manage orders, and more.

## Installation

You can install the EasyFie API PHP Client via Composer:

```bash
composer require robi/easyfieapi
```

## Usage

### Instantiate the Client

First, you need to instantiate the EasyFie class:

```php
use EasyFie\EasyFie;

$easyFie = new EasyFie();
```

### Get API Token

To authenticate and get an API token, use the `getToken` method:

```php
$token = $easyFie->getToken('your_username', 'your_password');
```

### Get User Profile

To retrieve the user profile data, use the `Me` method:

```php
$profile = $easyFie->Me($token);
```

### Get Web Data

To retrieve web data, use the `WebData` method:

```php
$webData = $easyFie->WebData($token);
```

### Get All Categories

To retrieve all categories, use the `getAllCategories` method:

```php
$categories = $easyFie->getAllCategories($token);
```

### Get Themes Color

To retrieve themes color, use the `getThemesColor` method:

```php
$themesColor = $easyFie->getThemesColor($token);
```

### Get Generated Pages

To retrieve generated pages, use the `generatedPages` method:

```php
$generatedPages = $easyFie->generatedPages($token);
```

### Get Single Generated Page

To retrieve a single generated page by slug, use the `generatedPageSingle` method:

```php
$generatedPage = $easyFie->generatedPageSingle($token, 'your_slug');
```

### Get Meta Data

To retrieve meta data, use the `getMetaData` method:

```php
$metaData = $easyFie->getMetaData($token);
```

### Get Products or Blogs

To retrieve products or blogs, use the `ProductsOrBlogs` method:

```php
$productsOrBlogs = $easyFie->ProductsOrBlogs($token, 'products', 10, 'asc', 1);
```

### Get Single Data

To retrieve single data by type and ID, use the `SingleData` method:

```php
$singleData = $easyFie->SingleData($token, 'products', 123);
```

### Get Single Category Data

To retrieve single category data, use the `singleCategories` method:

```php
$singleCategory = $easyFie->singleCategories($token, 1, 10, 1);
```

### Search Data

To search data by type and keyword, use the `Search` method:

```php
$searchResults = $easyFie->Search($token, 'products', 'keyword', 10);
```

### Place an Order

To place an order, use the `Orders` method:

```php
$order = $easyFie->Orders($token, ['product_id' => 123, 'quantity' => 1]);
```

### Update Order Payment Status

To update the payment status of an order, use the `OrdersPayment` method:

```php
$orderPayment = $easyFie->OrdersPayment($token, 123, 'paid');
```

### Get Notifications

To retrieve notifications, use the `notify` method:

```php
$notifications = $easyFie->notify($token);
```

### Generate Pagination

To generate pagination HTML, use the `Paginate` method:

```php
$pagination = $easyFie->Paginate(1, 100, 10);
```

### Get Portfolio Data

To retrieve portfolio data, use the `Portfolio` method:

```php
$portfolio = $easyFie->Portfolio($token, 10, 'asc', 1);
```

### Check Plugin Status

To check the status of a plugin, use the `plugin_checker` method:

```php
$pluginStatus = $easyFie->plugin_checker($token, 123);
```

## Error Handling

The library returns JSON-encoded error messages for invalid inputs or API errors. You can decode the JSON to handle errors appropriately:

```php
$error = json_decode($easyFie->getToken('', ''));
if (isset($error->error)) {
    echo $error->error;
}
```

## Contributing

Contributions are welcome! Please open an issue or submit a pull request on GitHub.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Support

For support, please open an issue on GitHub or contact the maintainer.

---

This documentation should help you get started with the EasyFie API PHP Client. For more detailed information, refer to the source code and the official EasyFie API documentation.
