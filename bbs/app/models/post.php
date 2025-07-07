<?php

function get_all_posts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_post($pdo, $name, $comment)
{
    // 個性IDを取得する（uuid_helper.phpの関数を使う前提）
    $identityId = getOrCreateIdentityId($pdo);

    // 投稿をDBに挿入（identity_idカラムも追加）
    $stmt = $pdo->prepare("INSERT INTO posts (name, comment, identity_id) VALUES (:name, :comment, :identity_id)");
    $stmt->execute([
        ':name' => $name,
        ':comment' => $comment,
        ':identity_id' => $identityId
    ]);
}
