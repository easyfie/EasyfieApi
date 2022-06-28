# EasyfieApi


composer require robi/easyfieapi

//call now function

Api Usages...

require 'vendor/autoload.php';

$easyfie = new \EasyFie\EasyFie();

    $exmple_types = ['products', 'offer', 'service', 'shouts', 'article'];

    $token = $easyfie->getToken($user, $pass) //for get access token

    $me = $easyfie->Me($token) //for get profile information for portfolio

    $web_data = $easyfie->WebData($token) //for header footer and website data

    $categories = $easyfie->getAllCategories($token) //for get all categories what you have posts

    $themes_colors = $easyfie->getThemesColor($token) //for get themes header footer color dynmic

    $generated_pages = $easyfie->generatedPages($token) //for get you have created dynmic page from my-web

    $generated_single = $easyfie->generatedPageSingle($token, $slug) //for dynmic page single

    $meta = $easyfie->getMetaData($token) //for meta information for pages

    $easyfie->ProductsOrBlogs($token, $type, $limit, $order $paginate) //get all information products,offer,service,shouts or article

    $easyfie->SingleData($token, $type, $id) //get all posts single page data

    $easyfie->singleCategories($token, $category_id, $limit, $paginate) //get specific category data

    $easyfie->Search($token, $type, $keyword, $limit) //get search data without blogs
    
    $easyfie->Orders($token, $postRequest) //post order information data we required some info what we listed this link -> 
    
    $easyfie->OrdersPayment($token, $order_id, $payment_status) // for update payment status
    
    $easyfie->Portfolio($token, $limit, $order, $paginate) //get protfolio data and pagination
   
    $easyfie->paginate($page, $total, $limit) //get paginate design 1,2,3....
    
    
    
    
    
