<h1>ASU Dashboard</h1>

<p>Authenticated runtime area.</p>

<p>User ID: <?= htmlspecialchars((string) ($userId ?? ''), ENT_QUOTES, 'UTF-8') ?></p>

<a href="/logout">Logout</a>
