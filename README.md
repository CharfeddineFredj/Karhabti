# 🌟 **Karhabti**

## 🚀 **Project Description**
**Karhabti** is an innovative web application designed to assist in decision-making for buying and selling cars.
Built on a **microservices architecture**, it provides a seamless and efficient user experience,
allowing users, clients, and administrators to access features tailored to their specific needs.

---

## 🎯 **Main Features**

### 🧑‍💻 **User**
- 🔍 Search for cars that meet their needs.
- ⚖️ Compare different car models.
- 🏢 Browse available agencies on the platform.
- 📩 Contact the administrator directly when needed.

### 👤 **Client**
- 💬 Start a chat to interact with other users.
- 📢 Manage advertisements for selling or buying cars.
- ⚠️ Submit complaints to report issues.
- 🏪 Create their own agency and add professional advertisements.

### 🛠️ **Administrator**
- 🧑‍🔧 Manage user accounts.
- 🏢 Administer and approve agency creation requests.
- ✅ Validate advertisements submitted by clients.

---

## 🔧 **Technologies Used**

### **Frontend**
- 🖥️ Vue.js
- 🎨 Tailwind CSS

### **Backend**
- ⚙️ Laravel

### **Architecture**
- 🔗 Microservices

### **Methodology**
- 📋 Scrum

---

## 🎯 **Objective**
**Karhabti** aims to simplify and optimize the process of buying and selling cars,
while providing a reliable and user-friendly platform for all stakeholders.

---

## 📂 **How to Use This Project**

### 1️⃣ **Clone the Project**
Clone the Git repository to your local machine:
```bash
git clone https://github.com/username/Karhabti.git
```

### 2️⃣ **Install Dependencies**
- **Frontend**:
  Navigate to the `frontend` folder and install the required dependencies:
  ```bash
  cd frontend
  npm install
  ```

- **Backend**:
  Navigate to the `backend` folder and install Laravel dependencies:
  ```bash
  cd backend
  composer install
  ```

### 3️⃣ **Configure Environments**
- **Backend**:
  - Copy the `.env.example` file and rename it to `.env`:
    ```bash
    cp .env.example .env
    ```
  - Configure database connection settings in the `.env` file:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=karhabti
    DB_USERNAME=root
    DB_PASSWORD=yourpassword
    ```
  - Generate a Laravel application key:
    ```bash
    php artisan key:generate
    ```

- **Frontend**:
  - Configure the `environment.ts` file with the backend API settings:
    ```javascript
    export const environment = {
      production: false,
      apiUrl: 'http://localhost:8000/api'
    };
    ```

### 4️⃣ **Prepare the Database**
- Run migrations to create the necessary tables:
  ```bash
  php artisan migrate
  ```
- (Optional) Add dummy data using seeders:
  ```bash
  php artisan db:seed
  ```

### 5️⃣ **Start the Project**
- **Backend**:
  Start the Laravel server:
  ```bash
  php artisan serve
  ```
- **Frontend**:
  Start the Vue.js development server:
  ```bash
  npm run serve
  ```

### 6️⃣ **Access the Application**
- **Frontend**: Open your browser and go to:
  ```
  http://localhost:8080
  ```
- **Backend**: The backend API is available at:
  ```
  http://localhost:8000
  ```

---

## 🚀 **Features to Test**
- 🌟 Search for cars and compare available models.
- 💬 Start a chat between clients to discuss products.
- 🏪 Create an agency and publish advertisements.
- ⚠️ Manage complaints, advertisements, and agency requests as an administrator.

---

## 🖼️ **Screenshots**

### 🏠 Home Page
![Home Page](./screenshots/homepage.png)

### 🏪 Store Interface
![Store Interface](./screenshots/store.png)

### 🏢 Agency Interface
![Agency Interface](./screenshots/agency.png)

### 🚗 Car Questionnaire Interface
![Car Questionnaire](./screenshots/questionnaire.png)

### 📄 Car Details Interface
![Car Details](./screenshots/car-details.png)

### 💬 Chat Interface
![Chat Interface](./screenshots/chat.png)

---



