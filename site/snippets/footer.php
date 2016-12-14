    </main>

    <footer class="footer row">
      <? snippet('menu') ?>
      <div class="copyright"><?= $site->copyright()->kirbytext() ?></div>
    </footer>
  </div>

  <?= js('assets/javascripts/main.js', true) ?>

</body>
</html>