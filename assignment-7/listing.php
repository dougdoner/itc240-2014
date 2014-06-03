<div class="listing-container">
  <h3><?= htmlentities($r["BookTitle"]) ?></h3>
  <img src="<?= htmlentities($r["BookCover"]) ?>">
  <p><b>Author:</b> <?= htmlentities($r["BookAuthor"]) ?></p>
  <p><?= htmlentities($r["BookDesc"]) ?></p>
  <button>Check Out</button>
</div>