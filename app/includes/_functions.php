<?php
include '_database.php';
include '_config.php';

function generateToken()
{
    if (!isset($_SESSION['token']) || !isset($_SESSION['tokenExpire']) || $_SESSION['tokenExpire'] < time()) {
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        $_SESSION['tokenExpire'] = time() + 60 * 15;
    }
}

function isRefererOk(): bool
{
    global $globalUrl;
    return isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], $globalUrl);
}

function isTokenOk(?array $data = null): bool
{
    if (!is_array($data)) $data = $_REQUEST;
    return isset($_SESSION['token']) && isset($data['token']) && $_SESSION['token'] === $data['token'];
}

function addError(string $errorMsg): void {
    if (!isset($_SESSION['errorsList'])) {
        $_SESSION['errorsList'] = [];
    }
    $_SESSION['errorsList'][] = $errorMsg;
}

function redirectTo(string $url): void
{
    if (headers_sent()) {
        echo "<script>location.href='$url';</script>";
    } else {
        header('Location: ' . $url);
    }
    exit;
}
function preventCSRF(string $redirectUrl = 'index.php'): void
{
    if (!isRefererOk()) {
        addError('referer');
        redirectTo($redirectUrl);
    }
    if (!isTokenOk()) {
        addError('csrf');
        redirectTo($redirectUrl);
    }
}

function validateToken($token)
{
    return $token === $_SESSION['token'];
}



/**
 * Gets all the routes. created by (ayk)
 * @param PDO $dbCo database connection
 * @return array array of routes.
 */
function getAllroutes(PDO $dbCo):?array
{
    $query = $dbCo->prepare("SELECT * FROM `route`;");
    $isQueryOk = $query->execute();
    $routes = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
    }
    return $routes;

}


/**
 * Gets details for a route. created by (ayk)
 * @param PDO $dbCo database connection
 * @return array of details of route.
 */
function getRouteDetails(PDO $dbCo, int $idRoute): ?array
{
    $query = $dbCo->prepare("SELECT * FROM route WHERE id_route =:idRoute;");
    $isQueryOk = $query->execute(['idRoute' => $idRoute]);
    $routeDetails = $query->fetchAll();

    if (!$isQueryOk) {  
        addError('select_ko');
    }
    return $routeDetails;
    
}


