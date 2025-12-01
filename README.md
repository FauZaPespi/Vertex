# VertexAI

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-%5E8.0-blue)](https://www.php.net/)
[![Slim Framework](https://img.shields.io/badge/Slim-4.15-green)](https://www.slimframework.com/)

Plateforme IA tout-en-un combinant chat intelligent, gestion documentaire avec Drive, et calendrier collaboratif. VertexAI analyse vos fichiers, planifie automatiquement des événements et organise votre quotidien professionnel grâce à l'intelligence artificielle.

## 📋 Table des matières

- [Fonctionnalités](#-fonctionnalités)
- [Architecture](#-architecture)
- [Installation](#-installation)
- [Documentation API](#-documentation-api)
- [Technologies](#-technologies)
- [Structure du projet](#-structure-du-projet)
- [Développement](#-développement)
- [Contributeurs](#-contributeurs)

## ✨ Fonctionnalités

- **Chat IA intelligent** - Assistant conversationnel alimenté par Mistral AI
- **Gestion documentaire** - Drive intégré pour organiser et analyser vos fichiers
- **Calendrier collaboratif** - Planification automatique d'événements via IA
- **Analyse de fichiers** - Extraction et compréhension automatique de documents
- **API REST complète** - Documentation interactive avec Scalar

## 🏗️ Architecture

Le projet est séparé en deux parties distinctes :

### Frontend
Application ReactJS moderne avec interface utilisateur réactive.

**Technologies:**
- ReactJS
- PrimeReact (composants UI)

### Backend (API)
API REST construite avec Slim Framework et PHP.

**Technologies:**
- PHP 8.0+
- Slim Framework 4.15
- MongoDB (base de données)
- Mistral AI (intelligence artificielle)
- JWT (authentification)
- Monolog (logging)
- Scalar (documentation API)
- swagger-php (génération OpenAPI)

## 📦 Installation

### Prérequis

- PHP 8.0 ou supérieur
- Composer
- MongoDB
- Serveur web (Apache/Nginx)

### Installation du backend

1. Clonez le dépôt:
```bash
git clone https://github.com/votre-username/vertexai.git
cd vertexai/API
```

2. Installez les dépendances:
```bash
composer install
```

3. Configurez les variables d'environnement:
```bash
cp .env.example .env
# Éditez .env avec vos paramètres
```

4. Démarrez le serveur:
```bash
php -S localhost:8000 -t public
```

## 📚 Documentation API

La documentation API est **générée automatiquement** à partir des annotations dans le code source.

### Accéder à la documentation

- **Documentation interactive (Scalar):** [http://vertex.fauza.xyz/docs.html](http://vertex.fauza.xyz/docs.html)
- **Spécification OpenAPI:** [http://vertex.fauza.xyz/api/openapi](http://vertex.fauza.xyz/api/openapi)

### Génération automatique

La documentation est générée dynamiquement grâce à **swagger-php**. Chaque endpoint documenté avec des annotations PHP est automatiquement inclus dans la spécification OpenAPI.

**Exemple d'annotation:**
```php
/**
 * @OA\Get(
 *     path="/api/health",
 *     summary="Health check endpoint",
 *     tags={"System"},
 *     @OA\Response(response=200, description="API is healthy")
 * )
 */
public function check(Request $request, Response $response): Response
```

## 🛠️ Technologies

### Backend Stack

| Technologie | Version | Description |
|------------|---------|-------------|
| PHP | 8.0+ | Langage principal |
| Slim Framework | ^4.15 | Framework micro-services REST |
| MongoDB | Latest | Base de données NoSQL |
| partitech/php-mistral | Latest | Client Mistral AI |
| lcobucci/jwt | Latest | Authentification JWT |
| monolog/monolog | Latest | Système de logs |
| zircote/swagger-php | ^4.0 | Génération OpenAPI |

### Frontend Stack

| Technologie | Description |
|------------|-------------|
| ReactJS | Framework JavaScript |
| PrimeReact | Bibliothèque de composants UI |

## 📁 Structure du projet

```
vertexai/
├── API/
│   ├── public/
│   │   ├── index.php          # Point d'entrée
│   │   ├── docs.html           # Documentation Scalar
│   │   └── openapi.json        # Spécification OpenAPI (legacy)
│   ├── src/
│   │   ├── Config/
│   │   │   ├── Config.php      # Configuration globale
│   │   │   └── OpenApiConfig.php # Configuration OpenAPI
│   │   ├── Controllers/
│   │   │   ├── ApiController.php     # Contrôleur principal
│   │   │   ├── HealthController.php  # Health check
│   │   │   └── OpenApiController.php # Génération OpenAPI
│   │   └── routes.php          # Définition des routes
│   ├── vendor/                 # Dépendances Composer
│   ├── .env                    # Variables d'environnement
│   ├── composer.json           # Configuration Composer
│   └── composer.lock           # Lock des dépendances
├── Frontend/                   # Application ReactJS
└── README.md                   # Ce fichier

```

## 🚀 Développement

### Ajouter un nouvel endpoint

1. Créez ou modifiez un contrôleur dans `src/Controllers/`
2. Ajoutez les annotations OpenAPI:
```php
/**
 * @OA\Post(
 *     path="/api/users",
 *     summary="Create a new user",
 *     tags={"Users"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="email", type="string", example="john@example.com")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="User created successfully"
 *     )
 * )
 */
```
3. Ajoutez la route dans `src/routes.php`
4. La documentation sera automatiquement mise à jour!

### Endpoints disponibles

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| GET | `/api/` | Informations sur l'API |
| GET | `/api/health` | Vérification de santé |
| GET | `/api/openapi` | Spécification OpenAPI (auto-générée) |

## 👥 Contributeurs

- **Calvo Oscar** - Développeur principal

## 📄 Licence

Ce projet est sous licence MIT.

## 🔗 Liens utiles

- [Slim Framework Documentation](https://www.slimframework.com/docs/)
- [Scalar Documentation](https://scalar.com/)
- [swagger-php Documentation](https://zircote.github.io/swagger-php/)
- [OpenAPI Specification](https://swagger.io/specification/)







