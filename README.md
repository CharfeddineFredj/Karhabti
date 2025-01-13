# 🌟 **Karhabti**

## 🚀 **Description du projet**
**Karhabti** est une application web innovante d’aide à la décision pour l’achat et la vente de voitures.
Basée sur une **architecture microservices**, elle offre une expérience utilisateur fluide et performante,
permettant aux internautes, clients et administrateurs de bénéficier de fonctionnalités adaptées à leurs besoins spécifiques.

---

## 🎯 **Fonctionnalités principales**

### 🧑‍💻 **Internaute**
- 🔍 Rechercher des voitures adaptées à ses besoins.
- ⚖️ Comparer différents modèles de voitures.
- 🏢 Consulter les agences disponibles sur la plateforme.
- 📩 Contacter directement l'administrateur en cas de besoin.

### 👤 **Client**
- 💬 Lancer un chat pour interagir avec d'autres utilisateurs.
- 📢 Gérer ses annonces de vente ou d'achat de voitures.
- ⚠️ Déposer des réclamations pour signaler un problème.
- 🏪 Créer sa propre agence et ajouter des publicités professionnelles.

### 🛠️ **Administrateur**
- 🧑‍🔧 Gérer les comptes des utilisateurs.
- 🏢 Administrer et valider les demandes de création d’agences.
- ✅ Valider les publicités ajoutées par les clients.

---

## 🔧 **Technologies utilisées**

### **Frontend**
- 🖥️ Vue.js
- 🎨 Tailwind CSS

### **Backend**
- ⚙️ Laravel

### **Architecture**
- 🔗 Microservices

### **Méthodologie**
- 📋 Scrum

---

## 🎯 **Objectif**
**Karhabti** vise à simplifier et optimiser le processus d'achat et de vente de voitures,
tout en offrant une plateforme fiable et conviviale pour tous les acteurs.

---

## 📂 **Comment utiliser ce projet**

### 1️⃣ **Cloner le projet**
Clonez le dépôt Git sur votre machine locale :
```bash
git clone https://github.com/username/Karhabti.git
```

### 2️⃣ **Installer les dépendances**
- **Frontend** :
  Accédez au dossier `frontend` et installez les dépendances nécessaires :
  ```bash
  cd frontend
  npm install
  ```

- **Backend** :
  Accédez au dossier `backend` et installez les dépendances Laravel :
  ```bash
  cd backend
  composer install
  ```

### 3️⃣ **Configurer les environnements**
- **Backend** :
  - Copiez le fichier `.env.example` et renommez-le `.env` :
    ```bash
    cp .env.example .env
    ```
  - Configurez les paramètres de connexion à la base de données dans le fichier `.env` :
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=karhabti
    DB_USERNAME=root
    DB_PASSWORD=yourpassword
    ```
  - Générez une clé d'application Laravel :
    ```bash
    php artisan key:generate
    ```

- **Frontend** :
  - Configurez le fichier `environment.ts` avec les paramètres de l'API backend :
    ```javascript
    export const environment = {
      production: false,
      apiUrl: 'http://localhost:8000/api'
    };
    ```

### 4️⃣ **Préparer la base de données**
- Exécutez les migrations pour créer les tables nécessaires :
  ```bash
  php artisan migrate
  ```
- (Optionnel) Ajouter des données factices avec les seeders :
  ```bash
  php artisan db:seed
  ```

### 5️⃣ **Démarrer le projet**
- **Backend** :
  Lancez le serveur Laravel :
  ```bash
  php artisan serve
  ```
- **Frontend** :
  Lancez le serveur de développement Vue.js :
  ```bash
  npm run serve
  ```

### 6️⃣ **Accéder à l'application**
- **Frontend** : Ouvrez votre navigateur et accédez à :
  ```
  http://localhost:8080
  ```
- **Backend** : L'API backend est accessible à :
  ```
  http://localhost:8000
  ```

---

## 🚀 **Fonctionnalités à tester**
- 🌟 Rechercher des voitures et comparer les modèles disponibles.
- 💬 Lancer un chat entre clients pour discuter des produits.
- 🏪 Créer une agence et publier des annonces.
- ⚠️ Gérer les réclamations, publicités et demandes d’agences en tant qu’administrateur.

---

🌟 **Merci d'explorer Karhabti et de contribuer au projet !**

