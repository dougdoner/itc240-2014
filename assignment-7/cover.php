<div class="cover-container">
  <h3><?= htmlentities($r["BookTitle"]) ?></h3>
  <img src="<?= htmlentities($r["BookCover"]) ?>">
  <p>Author: <?= htmlentities($r["BookAuthor"]) ?></p>
  <button>Check Out</button>
</div>