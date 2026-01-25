# Maeno Kikaku Co., Ltd.

[![Vite](https://img.shields.io/badge/Vite-3.0-blue)](https://vitejs.dev/)
[![Docker](https://img.shields.io/badge/Docker-Yes-blue)](https://www.docker.com/)

**Description:**  
This project is a **static website** built with **HTML, SCSS, CSS, JavaScript, TypeScript, and PHP**.  
It supports a development environment powered by **Vite** and containerization using **Docker**.

## 🚀 Tech Stack

- **Markup:** HTML
- **Styles:** SCSS / CSS
- **Scripts:** JavaScript / TypeScript
- **Backend (optional):** PHP
- **Build Tool:** Vite
- **Containerization:** Docker

## 🌐 Demo

https://maenokikaku.co.jp/

## ⚙️ Setup

```bash
# Clone the repository
git clone <repository_url>
cd <project_folder>

# Install dependencies
npm install
```

## 💻 Development

```bash
# Start local development server
npm run dev
```

Open http://localhost:5173 in your browser.

## 📦 Production Build

```bash
npm run build
```

The built files will be output to the dist/ folder.

To preview the production build locally:

```bash
npm run preview
```

## 🧹 Code Quality

```bash
# Format code with Prettier
npm run format

# Lint styles with Stylelint
npm run lint:style

# Lint scripts with ESLint
npm run lint

# Fix ESLint issues automatically
npm run lint:fix
```

## 🐳 Using Docker

This project includes a docker-compose.yml for containerized deployment.

```yaml
version: '3.8'
services:
  web:
    build: .
    ports:
      - '8080:80'
    volumes:
      - ./dist:/var/www/html/dist
```

### Build and run with Docker

```bash
docker-compose up -d
```

Access the site at: http://localhost:8080

