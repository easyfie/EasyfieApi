<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyFie API PHP Client Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2, h3 {
            color: #333;
        }
        code {
            background: #f4f4f4;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
        .note {
            background: #e7f3fe;
            padding: 10px;
            border-left: 4px solid #2196F3;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h1>EasyFie API PHP Client Documentation</h1>
    <p>The EasyFie API PHP Client is a simple and easy-to-use library for interacting with the EasyFie API. This library provides methods to authenticate, retrieve user data, manage orders, and more.</p>

    <h2>Installation</h2>
    <p>You can install the EasyFie API PHP Client via Composer:</p>
    <pre><code>composer require robi/easyfieapi</code></pre>

    <h2>Usage</h2>

    <h3>Instantiate the Client</h3>
    <p>First, you need to instantiate the <code>EasyFie</code> class:</p>
    <pre><code>&lt;?php
use EasyFie\EasyFie;

$easyFie = new EasyFie();
</code></pre>

    <h3>Get API Token</h3>
    <p>To authenticate and get an API token, use the <code>getToken</code> method:</p>
    <pre><code>$token = $easyFie->getToken('your_username', 'your_password');</code></pre>

    <h3>Get User Profile</h3>
    <p>To retrieve the user profile data, use the <code>Me</code> method:</p>
    <pre><code>$profile = $easyFie->Me($token);</code></pre>

    <h3>Get Web Data</h3>
    <p>To retrieve web data, use the <code>WebData</code> method:</p>
    <pre><code>$webData = $easyFie->WebData($token);</code></pre>

    <h3>Get All Categories</h3>
    <p>To retrieve all categories, use the <code>getAllCategories</code> method:</p>
    <pre><code>$categories = $easyFie->getAllCategories($token);</code></pre>

    <h3>Get Themes Color</h3>
    <p>To retrieve themes color, use the <code>getThemesColor</code> method:</p>
    <pre><code>$themesColor = $easyFie->getThemesColor($token);</code></pre>

    <h3>Get Generated Pages</h3>
    <p>To retrieve generated pages, use the <code>generatedPages</code> method:</p>
    <pre><code>$generatedPages = $easyFie->generatedPages($token);</code></pre>

    <h3>Get Single Generated Page</h3>
    <p>To retrieve a single generated page by slug, use the <code>generatedPageSingle</code> method:</p>
    <pre><code>$generatedPage = $easyFie->generatedPageSingle($token, 'your_slug');</code></pre>

    <h3>Get Meta Data</h3>
    <p>To retrieve meta data, use the <code>getMetaData</code> method:</p>
    <pre><code>$metaData = $easyFie->getMetaData($token);</code></pre>

    <h3>Get Products or Blogs</h3>
    <p>To retrieve products or blogs, use the <code>ProductsOrBlogs</code> method:</p>
    <pre><code>$productsOrBlogs = $easyFie->ProductsOrBlogs($token, 'products', 10, 'asc', 1);</code></pre>

    <h3>Get Single Data</h3>
    <p>To retrieve single data by type and ID, use the <code>SingleData</code> method:</p>
    <pre><code>$singleData = $easyFie->SingleData($token, 'products', 123);</code></pre>

    <h3>Get Single Category Data</h3>
    <p>To retrieve single category data, use the <code>singleCategories</code> method:</p>
    <pre><code>$singleCategory = $easyFie->singleCategories($token, 1, 10, 1);</code></pre>

    <h3>Search Data</h3>
    <p>To search data by type and keyword, use the <code>Search</code> method:</p>
    <pre><code>$searchResults = $easyFie->Search($token, 'products', 'keyword', 10);</code></pre>

    <h3>Place an Order</h3>
    <p>To place an order, use the <code>Orders</code> method:</p>
    <pre><code>$order = $easyFie->Orders($token, ['product_id' => 123, 'quantity' => 1]);</code></pre>

    <h3>Update Order Payment Status</h3>
    <p>To update the payment status of an order, use the <code>OrdersPayment</code> method:</p>
    <pre><code>$orderPayment = $easyFie->OrdersPayment($token, 123, 'paid');</code></pre>

    <h3>Get Notifications</h3>
    <p>To retrieve notifications, use the <code>notify</code> method:</p>
    <pre><code>$notifications = $easyFie->notify($token);</code></pre>

    <h3>Generate Pagination</h3>
    <p>To generate pagination HTML, use the <code>Paginate</code> method:</p>
    <pre><code>$pagination = $easyFie->Paginate(1, 100, 10);</code></pre>

    <h3>Get Portfolio Data</h3>
    <p>To retrieve portfolio data, use the <code>Portfolio</code> method:</p>
    <pre><code>$portfolio = $easyFie->Portfolio($token, 10, 'asc', 1);</code></pre>

    <h3>Check Plugin Status</h3>
    <p>To check the status of a plugin, use the <code>plugin_checker</code> method:</p>
    <pre><code>$pluginStatus = $easyFie->plugin_checker($token, 123);</code></pre>

    <h2>Error Handling</h2>
    <p>The library returns JSON-encoded error messages for invalid inputs or API errors. You can decode the JSON to handle errors appropriately.</p>
    <pre><code>&lt;?php
$error = json_decode($easyFie->getToken('', ''));
if (isset($error->error)) {
    echo $error->error;
}
</code></pre>

    <h2>Contributing</h2>
    <p>Contributions are welcome! Please open an issue or submit a pull request on GitHub.</p>

    <h2>License</h2>
    <p>This project is licensed under the MIT License. See the <a href="LICENSE">LICENSE</a> file for details.</p>

    <h2>Support</h2>
    <p>For support, please open an issue on GitHub or contact the maintainer.</p>

</body>
</html>