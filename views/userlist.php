<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-center text-gray-700 mb-6">Liste des Utilisateurs</h1>
    <div class="overflow-x-auto">
        <table class="table-auto w-full text-left border-collapse border border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border border-gray-300">ID</th>
                    <th class="px-6 py-3 border border-gray-300">utilisateur</th>
                    <th class="px-6 py-3 border border-gray-300">Email</th>
                    <th class="px-6 py-3 border border-gray-300">Statut</th>
                    <th class="px-6 py-3 border border-gray-300">Rôle</th>
                    <th class="px-6 py-3 border border-gray-300">Créé le</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-gray-100 border-b border-gray-200">
                            <td class="px-6 py-3"><?= $user['id']; ?></td>
                            <td class="px-6 py-3"><?= htmlspecialchars($user['username']); ?></td>
                            <td class="px-6 py-3"><?= htmlspecialchars($user['email']); ?></td>
                            <td class="px-6 py-3">
                                <!-- Formulaire pour modifier le statut -->
                                <form action="../../index.php?action=updateStatus" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                    <select 
                                        name="status" 
                                        class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                        onchange="this.form.submit()" 
                                        style="
                                            background-color: <?= $user['status'] === 'actif' ? '#d1fae5' : ($user['status'] === 'suspendu' ? '#fee2e2' : '#fef3c7'); ?>; 
                                            color: <?= $user['status'] === 'actif' ? '#065f46' : ($user['status'] === 'suspendu' ? '#b91c1c' : '#92400e'); ?>;
                                        ">
                                        <option value="actif" <?= $user['status'] == 'actif' ? 'selected' : ''; ?> style="background-color: #d1fae5; color: #065f46;">
                                            Actif
                                        </option>
                                        <option value="suspendu" <?= $user['status'] == 'suspendu' ? 'selected' : ''; ?> style="background-color: #fee2e2; color: #b91c1c;">
                                            Suspendu
                                        </option>
                                        <option value="pending" <?= $user['status'] == 'pending' ? 'selected' : ''; ?> style="background-color: #fef3c7; color: #92400e;">
                                            En attente
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td class="px-6 py-3"><?= ucfirst($user['role']); ?></td>
                            <td class="px-6 py-3"><?= date('d/m/Y H:i', strtotime($user['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-3 text-center text-gray-500">Aucun utilisateur trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
