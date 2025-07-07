<?php
function getOrCreateUUID()
{
    if (isset($_COOKIE['uuid'])) {
        return $_COOKIE['uuid'];
    } else {
        $uuid = bin2hex(random_bytes(16));
        setcookie('uuid', $uuid, time() + (10 * 365 * 24 * 60 * 60), "/");
        return $uuid;
    }
}

function getOrCreateIdentityId($pdo)
{
    $uuid = getOrCreateUUID();

    // すでに紐づいているか確認
    $stmt = $pdo->prepare("SELECT identity_id FROM user_identities WHERE uuid = :uuid");
    $stmt->execute([':uuid' => $uuid]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row['identity_id'];
    } else {
        // identitiesからランダムに1つ選ぶ
        $stmt = $pdo->query("SELECT id FROM identities ORDER BY RAND() LIMIT 1");
        $identity = $stmt->fetch(PDO::FETCH_ASSOC);

        // 新しく紐づけ
        $stmt = $pdo->prepare("INSERT INTO user_identities (uuid, identity_id) VALUES (:uuid, :identity_id)");
        $stmt->execute([
            ':uuid' => $uuid,
            ':identity_id' => $identity['id']
        ]);

        return $identity['id'];
    }
}
