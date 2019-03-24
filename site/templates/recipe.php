<?php snippet('header') ?>

  <main class="docs-page | main" id="maincontent">
    <div class="wrap">
      <div class="docs-grid">
        <!-- # Sidebar -->
        <nav class="docs-sidebar">
          <p class="h1">
            <a href="<?= url('docs/cookbook') ?>">Cookbook</a>
          </p>

          <nav class="sidebar" >
           <ul class="sidebar-items">
              <?php foreach($page->category()->split(',') as $category) : ?>
              <li class="sidebar-item">
                <span class="sidebar-item-link">
                  More <strong><?= $category ?></strong> recipes:
                </span>

                <div class="sidebar-submenu">
                  <ul class="sidebar-subpages">
                  <?php foreach($page->siblings(false)->filter(function ($sibling) use ($category) {
                    return Str::contains($sibling->category(), $category);
                  })->shuffle() as $related): ?>
                    <li class="sidebar-subpage">
                      <?= $related->title()->link(['class' => 'sidebar-subpage-link']) ?>
                    </li>
                  <?php endforeach ?>
                  </ul>
                </div>
              </li>
              <br>
              <?php endforeach ?>
            </ul>
          </nav>
        </nav>

        <!-- # Recipe Content -->
        <article class="docs-content">
          <h1><?= $page->title()->widont() ?></h1>
          <div class="text intro -mb:large">
            <?= $page->description()->kt() ?>
          </div>
          <?php snippet('toc', $page->text()->headlines('h2')) ?>
          <div class="text">
            <?= $page->text()->kt()->anchorHeadlines('h2') ?>
          </div>
        </article>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
