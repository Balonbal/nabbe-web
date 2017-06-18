<?php
require_once dirname(realpath(__FILE__)) . "/../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/config/configuration.php";

function createJWT($user) {
    $nabbe = get_config();

    $tokenId = base64_encode(openssl_random_pseudo_bytes(32));
    $issuedAt = time();
    $notBefore = $issuedAt + $nabbe->jwt->nbf;
    $expiration = $notBefore + $nabbe->jwt->exp;
    $serverName = $nabbe->jwt->iss;

    $data = [
        "iat" => $issuedAt,
        "jti" => $tokenId,
        "nbf" => $notBefore,
        "exp" => $expiration,
        "iss" => $serverName,
        "sub" => $user
    ];

    $key = base64_decode($nabbe->jwt->key);
    $jwt = \Firebase\JWT\JWT::encode($data, $key, "HS512");
    return json_encode(["jwt" => $jwt]);
}

function decode_JWT($jwt) {
    $nabbe = get_config();

    $key = base64_decode($nabbe->jwt->key);
    return \Firebase\JWT\JWT::decode($jwt, $key, array("HS512"));
}

function verify_user($jwt) {
    try {
        if (!($jwt = decode_JWT($jwt))) {
            header("HTTP/1.0 401 Unauthorized");
            die();
        }
    } catch (UnexpectedValueException $e) {
        header("HTTP/1.0 401 Unauthorized");
        print(json_encode(["error" => "Please log in first"]));
        die();
    }
    return $jwt;
}