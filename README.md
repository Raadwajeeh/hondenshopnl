# 🐶 DogLove Shop – PHP Webshop Project

Een volledige educatieve webshop voor hondenproducten, gebouwd met PHP & MySQL.
Dit project is ontwikkeld als onderdeel van de opleiding **MBO-4 Software Development (Web-App Development)**.

---

## 📌 Projectoverzicht

**DogLove Shop (HondenShopNL)** is een eenvoudige maar complete webshop waarin gebruikers
hondenproducten kunnen bekijken, toevoegen aan de winkelwagen en een account kunnen aanmaken.
Daarnaast bevat het project een **admin-paneel** voor het beheren van producten (CRUD).

Het project laat zien hoe een echte webshop technisch werkt, maar op een leerbaar MBO-4 niveau.

---

## 🎯 Doel van het project

- Werken met PHP en MySQL (PDO)
- Gebruik van sessions voor login en winkelwagen
- Bouwen van een volledig CRUD-systeem
- Toepassen van een duidelijke projectstructuur
- Veilig omgaan met gebruikersgegevens (password_hash)
- Front-end en back-end combineren in één web-app

---

## 🧰 Gebruikte technologieën

- **HTML5** – Structuur van de pagina’s  
- **CSS3** – Styling en responsive design  
- **PHP** – Backend-logica  
- **MySQL** – Database  
- **PDO** – Veilige databaseverbinding  
- **Sessions** – Login en winkelwagen  
- **GET & POST** – Formulier- en filterverwerking  

---

## 🗂️ Projectstructuur

```text
hondenshopnl/
│
├── index.php
├── login.php
├── register.php
├── logout.php
├── winkelwagen.php
│
├── contact.php
├── klantenservice.php
├── privacy.php
├── over_ons.php
│
├── php/
│   ├── db.php
│   ├── header.php
│   └── footer.php
│
├── pages/
│   ├── admin_products.php
│   ├── admin_add.php
│   ├── admin_edit.php
│   └── admin_delete.php
│
├── css/
│   ├── style.css
│   └── cart.css
│
├── fotos/
│
└── hondenshopnl.sql
