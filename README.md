# EasyfieApi


composer require robi/easyfieapi


Usages: 

require 'vendor/autoload.php';

$easyfie = new \EasyFie\EasyFie();

//call now function

Api Usages...

    $exmple_types = ['products', 'offer', 'service', 'shouts', 'article'];

    $easyfie->getToken($user, $pass)

    $easyfie->Me($token)

    $easyfie->WebData($token)

    $easyfie->getAllCategories($token)

    $easyfie->getThemesColor($token) 

    $easyfie->generatedPages($token)

    $easyfie->generatedPageSingle($token, $slug)

    $easyfie->getMetaData($token)

    $easyfie->ProductsOrBlogs($token, $type, $limit, $order $paginate)

    $easyfie->SingleData($token, $type, $id)

    $easyfie->singleCategories($token, $category_id, $limit, $paginate)

    $easyfie->Search($token, $type, $keyword, $limit)
    
    $easyfie->Orders($token, $postRequest)
    
    $easyfie->paginate($page, $total, $limit)
