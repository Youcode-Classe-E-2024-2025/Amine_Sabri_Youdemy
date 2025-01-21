# Youdemy - Plateforme de Cours en Ligne

## Contexte du Projet
Youdemy est une plateforme de cours en ligne qui vise à révolutionner l'apprentissage en proposant un système interactif et personnalisé pour les étudiants et les enseignants. 

---

## Fonctionnalités Requises

### Partie Front Office

#### **Visiteur** :
- Accès au catalogue des cours avec pagination.
- Recherche de cours par mots-clés.
- Création d’un compte avec le choix du rôle (Étudiant ou Enseignant).

#### **Étudiant** :
- Visualisation du catalogue des cours.
- Recherche et consultation des détails des cours (description, contenu, enseignant, etc.).
- Inscription à un cours après authentification.
- Accès à une section "Mes cours" regroupant les cours rejoints.

#### **Enseignant** :
- Ajout de nouveaux cours avec des détails tels que :
  - Titre, description, contenu (vidéo ou document), tags, et catégorie.
- Gestion des cours :
  - Modification, suppression et consultation des inscriptions.
- Accès à une section "Statistiques" sur les cours :
  - Nombre d’étudiants inscrits, Nombre de cours, etc.

---

### Partie Back Office

#### **Administrateur** :
- Validation des comptes enseignants.
- Gestion des utilisateurs :
  - Activation, suspension ou suppression.
- Gestion des contenus :
  - Cours, catégories et tags.
  - Insertion en masse de tags pour gagner en efficacité.
- Accès à des statistiques globales :
  - Nombre total de cours.
  - Répartition par catégorie.
  - Le cours avec le plus d'étudiants.
  - Les Top 3 enseignants.

---

### Fonctionnalités Transversales

- **Relation Many-to-Many** : Un cours peut contenir plusieurs tags.
- **Polymorphisme** : Application du concept dans les méthodes "Ajouter cours" et "Afficher cours".
- **Système d’authentification et d’autorisation** :
  - Protection des routes sensibles.
  - Contrôle d’accès : chaque utilisateur accède uniquement aux fonctionnalités correspondant à son rôle.

---

## Exigences Techniques

1. Respect des principes **OOP** (encapsulation, héritage, polymorphisme).
2. Utilisation d’une base de données relationnelle avec gestion des relations (one-to-many, many-to-many).
3. Gestion des utilisateurs connectés via des **sessions PHP**.
4. Système de validation des données utilisateur pour garantir la sécurité.

---

## Installation et Configuration

### Prérequis
- Serveur web local (XAMPP).
- PHP 7.4 ou supérieur.
- Base de données MySQL.

### Étapes d'installation
1. Clonez le dépôt GitHub :
   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/Amine_Sabri_Youdemy
   ```
2. Configurez le fichier `.env` ou `config.php` avec les informations de votre base de données.
3. Importez le fichier `database.sql` dans votre gestionnaire MySQL pour initialiser la base de données.
4. Assurez-vous que les dossiers nécessaires ont les bonnes permissions (ex : `uploads/` pour les fichiers des cours).
5. Lancez votre serveur local et accédez à la plateforme via votre navigateur.

---

## Fonctionnalités à venir
- Notifications pour les étudiants et enseignants.
- Intégration d’un système de messagerie interne.
- Possibilité d’ajouter des quiz et évaluations dans les cours.
- Système de notation et de commentaires pour les cours.

---

## Contributeurs
- [Amine Sabri](https://github.com/sabri-amine)


## Diagrammes du Projet

### Diagramme de Classes
<img width="617" alt="diagramme class" src="https://github.com/user-attachments/assets/2b1c8478-e6c6-414b-9157-4b461cf59cd9" />

Ce diagramme illustre les relations entre les différentes entités principales (Utilisateur, Cours, Tag, etc.).

### Diagramme de Cas d'Utilisation (Use Case)
<img width="411" alt="useCase youdemy" src="https://github.com/user-attachments/assets/b519aa71-9cf5-42c9-889f-a184064c9897" />


Ce diagramme met en évidence les interactions entre les différents types d’utilisateurs et les fonctionnalités de la plateforme.
