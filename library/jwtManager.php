<?php
require_once dirname(realpath(__FILE__)) . "/../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/config/configuration.php";

function createJWT($user) {
    $nabbe = get_config();

    $tokenId = base64_encode(random_bytes(32));
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
