<?php
require_once 'includes/database.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM avis WHERE id = ?");
    $stmt->execute([$_POST['delete_id']]);
    echo "<p class='text-center text-green-600'>Avis supprimé avec succès.</p>";
}

$avis = $pdo->query("SELECT * FROM avis ORDER BY date_creation DESC")->fetchAll();
?>

<section class="p-6 bg-white">
  <h2 class="text-2xl font-bold mb-4 text-center text-blue-900">Interface d'administration des avis</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded">
      <thead>
        <tr class="bg-gray-200 text-left">
          <th class="py-2 px-4">Photo</th>
          <th class="py-2 px-4">Nom</th>
          <th class="py-2 px-4">Commentaire</th>
          <th class="py-2 px-4">Date</th>
          <th class="py-2 px-4">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($avis as $a): ?>
        <tr class="border-t">
          <td class="py-2 px-4"><img src="<?= htmlspecialchars($a['photo']) ?>" class="w-12 h-12 rounded-full"></td>
          <td class="py-2 px-4 font-bold"><?= htmlspecialchars($a['nom']) ?></td>
          <td class="py-2 px-4 text-sm"><?= htmlspecialchars($a['commentaire']) ?></td>
          <td class="py-2 px-4 text-gray-500"><?= htmlspecialchars($a['date_creation']) ?></td>
          <td class="py-2 px-4">
            <form method="POST" onsubmit="return confirm('Supprimer cet avis ?');">
              <input type="hidden" name="delete_id" value="<?= $a['id'] ?>">
              <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Supprimer</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
