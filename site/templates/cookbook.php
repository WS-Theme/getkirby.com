<?php snippet('header') ?>

  <main class="cookbook-page | main" id="maincontent">

    <div class="wrap" id="cookbook-recipes">

      <header class="hero">
        <h1>Cookbook</h1>
        <input class="cookbook-search search" placeholder="Search recipes …" />
      </header>


      <ul class="cookbook-categories">
        <?php foreach ($categories as $category): ?>
        <li data-category="<?= $category ?>">
          <code><?= $category ?></code>
        </li>
        <?php endforeach ?>
      </ul>

      <ul class="cookbook-articles cardgrid list">
        <?php foreach($recipes as $item): ?>
        <li class="cardgrid-item" id="<?= $item->slug() ?>">
          <a href="<?= $item->url() ?>" class="cardgrid-link">
            <h2 class="h5 cookbook-title">
              <?= $item->title()->widont() ?>

              <?php if ($item->published()->isNotEmpty() && $item->published()->toDate('U') > (time() - 4500000)): ?>
              <code class="cookbook-new">New</code>
              <?php endif ?>
            </h2>
            <p class="description cookbook-description">
              <?= $item->description() ?>
            </p>
            <p class="cookbook-category" data-category="<?= $item->category() ?>">
              <?php foreach ($item->category()->split(',') as $category): ?>
              <code><?= $category ?></code>
              <?php endforeach ?>
            </p>
          </a>
        </li>
        <?php endforeach ?>
      </ul>

    </div>

  </main>

<?php snippet('footer') ?>
