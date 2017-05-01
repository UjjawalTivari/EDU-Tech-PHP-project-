<nav class="navbar navbar-inverse navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Welcome, <?php echo $_SESSION['userName']; ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a id="Logout" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="nav-link">
    <a href="welcome.php">Home</a>
  </div>
  &#124;
  <?php if ($_SESSION['role'] == "student"): ?>
    <div class="nav-link">
      <a href="#">Profile</a>
    </div>
    &#124;
    <div class="nav-link">
      <a href="test.php">Tests</a>
    </div>
  <?php endif; ?>
  <?php if ($_SESSION['role'] == "teacher"): ?>
    <div class="nav-link">
      <a href="#">Add Student</a>
    </div>
  <?php endif; ?>
</div>
<script>
  $(function () {
    $('#Logout').click(function () {
      sessionStorage.clear();
    })
  });
</script>
