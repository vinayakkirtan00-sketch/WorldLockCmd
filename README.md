<h1>🌌 WorldLockCmd</h1>

<p>
<strong>WorldLockCmd</strong> is a lightweight and efficient PocketMine-MP plugin that allows server owners
to block specific commands in specific worlds.
</p>

<p>
Managing commands in multi-world servers can be difficult, especially when certain commands should not be
accessible in lobbies, mini-game worlds, or survival environments.
WorldLockCmd solves this problem by providing simple and reliable world-wise command control.
</p>

<hr>

<h2>✨ Features</h2>
<ul>
  <li>🌍 World-wise command blocking</li>
  <li>🔐 Permission-based bypass system</li>
  <li>⚙️ Easy-to-edit configuration file</li>
  <li>🚀 Lightweight and performance-friendly</li>
  <li>📦 Supports both folder and <code>.phar</code> plugin formats</li>
  <li>🛡️ Helps keep servers secure and clean</li>
</ul>

<hr>

<h2>🧪 How It Works</h2>
<p>
WorldLockCmd checks the player’s current world before executing a command.
If the command is blocked in that world, it will be cancelled and a custom message will be shown to the player.
</p>

<p>
Server operators or trusted ranks can bypass all restrictions using a permission node.
</p>

<hr>

<h2>📁 Configuration Example</h2>

<pre>
worlds:
  lobby:
    - help
    - plugins
    - pl

  survival:
    - plugins
    - pl

blocked-message: "You cannot use this command in this world!"
</pre>

<hr>

<h2>🔑 Permission</h2>

<pre>
worldlockcmd.bypass
</pre>

<p>
Players with this permission can use all commands in all worlds.
</p>

<hr>

<h2>🛠 Compatibility</h2>
<ul>
  <li><strong>Server Software:</strong> PocketMine-MP 5.x</li>
  <li><strong>Minecraft:</strong> Bedrock Edition 1.21+</li>
  <li><strong>PHP:</strong> 8.1+</li>
</ul>

<hr>

<h2>🏁 Conclusion</h2>
<p>
WorldLockCmd is the perfect solution for servers that need clean, secure, and world-specific command control.
Whether you run a lobby-based network or a multi-world survival server, this plugin gives you full control
without unnecessary complexity.
</p>

<p>
<strong>Author:</strong> Kirtan
</p>
