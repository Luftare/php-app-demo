<div class="top-nav">
  <a href="/" class="top-nav__logo">
    <h1>A cool app</h1>
  </a>
  <?php echo $user_logged_in ? '<a href="/users-list">users</a>' : ''; ?>
  <?php echo $user_logged_in ? '<a href="handlers/logout">logout</a>' : ''; ?>

  <?php echo $user_logged_in ? "<span> Logged in as: $logged_user_name</span>" : ""; ?>
</div>
<style>
body {
  background-color: #dfd;
}

.top-nav {
  background-color: lightgreen;
  padding: 50px 10%;
}

.top-nav__logo {
  text-decoration: none;
}

.top-nav a {
  margin-right: 8px;
  font-size: 24px;
  color: black;
}
.top-nav h1 {
  display: inline;
  margin-right: 40px;
}
</style>