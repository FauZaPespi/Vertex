# Journal de travail
**Projet:** VertexAI
**Auteur:** Calvo Oscar
**Date:** 27.11.2025 - 18.12.2025
Le journal de board du projet, chaque jours y sera expliquer.

## Jours
### 27.11.2025 (Jeudi)
Aujourd'hui je commence le projet, j'ai déjà une idée en tête de ce que je veux faire mais il faut maintenant le réaliser.

Donc je vais réaliser l'API avec Slim et PHP connecté à une base de données MongoDB, puis le frontend avec ReactJS.

#### Mise en place de la documentation OpenAPI automatique
J'ai implémenté un système de génération automatique de documentation OpenAPI pour l'API VertexAI en utilisant **Scalar** pour l'interface de documentation et **swagger-php** pour la génération automatique.

**Ce qui a été fait:**

1. **Configuration de swagger-php** - Ajout de la dépendance `zircote/swagger-php` dans `composer.json` pour analyser les annotations PHP et générer automatiquement les spécifications OpenAPI.

2. **Création de la configuration OpenAPI** (`src/Config/OpenApiConfig.php`) - Fichier contenant les métadonnées de l'API (titre, version, description, serveurs). Ces informations sont automatiquement incluses dans la documentation générée.

3. **Ajout d'annotations OpenAPI aux contrôleurs existants:**
   - `HealthController.php` - Documentation complète de l'endpoint `/api/health` avec la structure de réponse JSON
   - `ApiController.php` - Documentation de l'endpoint racine `/api/` qui liste les informations de l'API

4. **Création du contrôleur de génération** (`src/Controllers/OpenApiController.php`) - Ce contrôleur scanne automatiquement tous les fichiers du dossier `src/` pour extraire les annotations et générer le JSON OpenAPI à la volée.

5. **Ajout de la route dynamique** - L'endpoint `/api/openapi` sert maintenant la spécification OpenAPI générée automatiquement, pas de fichier statique à maintenir.

6. **Intégration avec Scalar** - La documentation interactive est déjà configurée dans `public/docs.html` et utilise Scalar pour afficher une interface moderne et élégante.

**Avantages de cette approche:**
- Documentation toujours à jour automatiquement
- Pas besoin de maintenir manuellement le fichier `openapi.json`
- Il suffit d'ajouter des annotations aux nouvelles méthodes de contrôleurs
- Interface Scalar moderne et interactive pour tester l'API
- Génération à la volée, pas de cache ou de fichiers statiques

### 01.12.2025 (Lundi)
Aujourdhui jai changer l'architecture du projet pour utiliser le template que j'ai créer personnellement car c'est plus facile pour moi, puis jai commencer a travailler sur le frontend en installant react javascript avec react bits j'ai eu quelque soucis alors la source est pas super belle mais je repasserais pas dessus plus tard si jai le temps la ça marche alors on touche pas.