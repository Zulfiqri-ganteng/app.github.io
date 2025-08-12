<?php
// ======== CONFIG ========
$secret = "afshera24"; // ganti dengan kata rahasia kamu
$repoDir = '/home/swx2253/app.sewaambulaneindonesia24jam.com'; // path ke folder subdomain

$branch = 'main'; // atau 'master' sesuai branch repo kamu

// ======== SECURITY CHECK ========
$input = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';

if (!$signature || !hash_equals('sha1=' . hash_hmac('sha1', $input, $secret), $signature)) {
    http_response_code(403);
    die('Forbidden - Invalid signature');
}

// ======== DEPLOY COMMAND ========
chdir($repoDir);
exec("git fetch origin $branch 2>&1", $output);
exec("git reset --hard origin/$branch 2>&1", $output);
exec("git pull origin $branch 2>&1", $output);

// ======== OUTPUT ========
echo "<pre>Deploy Selesai:\n" . implode("\n", $output) . "</pre>";
