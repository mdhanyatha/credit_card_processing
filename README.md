# 💳 Credit Card Processing System

This is a **web-based Credit Card Processing System** built using **PHP**, **MySQL**, **HTML/CSS**, and runs locally using **XAMPP**. The system enables users to register, add cards, make payments, and track transactions. It also includes separate panels for **Admins**, **Vendors**, and **Customers**.

---

## 📁 Project Structure
credit-card-processing/
│
├── backend/
│ ├── add_card.php
│ ├── approve-payment.php
│ ├── approve-vendor.php
│ ├── config.php
│ ├── delete-vendor.php
│ ├── login.php
│ ├── logout.php
│ ├── manage-users.php
│ ├── manage-vendors.php
│ ├── process-payment.php
│ ├── process-payments.php
│ ├── register.php
│ └── view-transaction.php
│
├── frontend/
│ ├── add_card.php
│ ├── admin.php
│ ├── background.jpg
│ ├── customer.php
│ ├── index.html
│ ├── make-payment.php
│ ├── manage-cards.php
│ ├── process-payment.php
│ ├── raise-dispute.php
│ ├── register.html
│ ├── registration_success.html
│ ├── style.css
│ ├── vendor.php
│ └── view-sales.php

---

## ✅ Key Features

- 🔐 **User Authentication**
  - User login & registration system
- 💳 **Card Management**
  - Add, view, and manage credit cards
- 💰 **Payment System**
  - Make payments and process them
- 📄 **Transaction Logs**
  - View past transactions
- 🧑‍💼 **Admin Panel**
  - Manage users, vendors, and payments
- 🛒 **Vendor Panel**
  - View sales, approve payments
- 🚨 **Dispute Handling**
  - Customers can raise disputes on transactions

---

## 🛠️ Tech Stack

| Layer     | Technology            |
|-----------|------------------------|
| Frontend  | HTML, CSS              |
| Backend   | PHP                    |
| Database  | MySQL                  |
| Local Server | XAMPP (Apache + MySQL) |

---

## ⚙️ How to Run Locally

1. **Download or Clone this repository**
   ```bash
   git clone https://github.com/yourusername/credit-card-processing.git
2. Start XAMPP
   Enable Apache and MySQL

3. Move the project folder
   Copy the credit-card-processing folder into your htdocs directory
  Example:
   C:/xampp/htdocs/credit-card-processing/
4. Create the database
   Open phpMyAdmin: http://localhost/phpmyadmin 
   Create a new database named:
       credit_card_db
   Import your .sql file (if you have one)

5. Update Database Config
    Open backend/config.php
    Make sure your database name, username (root), and password ("") match your local setup

6. Launch the App:
   Open your browser and go to:
        http://localhost/credit-card-processing/frontend/index.html
## 🖼️ Screenshots

### 🏠 Homepage – Credit Card Portal
<img width="100%" src="https://github.com/user-attachments/assets/b9d75e22-ded6-439c-aa30-54dcca4b537b" alt="Homepage" />

### 🔐 Login Page
<img width="400" src="https://github.com/user-attachments/assets/5d4e47a4-dcfc-45c5-8ac7-bd5a865f2c0a" alt="Login" />

### 💳 Add Card Page
<img width="400" src="https://github.com/user-attachments/assets/16ee6c17-2d5c-4c3f-9504-23b7b3344a27" alt="Add Card" />

### 💰 Make Payment
<img width="400" src="https://github.com/user-attachments/assets/e1c1f528-970b-4406-abb3-4abcc45e1144" alt="Make Payment" />

### 📄 View Transaction
<img width="400" src="https://github.com/user-attachments/assets/af4c847d-3a04-4986-9ebb-b6e97381687a" alt="View Transaction" />

### 📊 Admin Dashboard
<img width="400" src="https://github.com/user-attachments/assets/91339787-9e0c-4c48-a51c-562918243d21" alt="Admin Dashboard" />

### 🧾 Vendor Dashboard
<img width="400" src="https://github.com/user-attachments/assets/0579ba55-6f9a-44b5-8ec0-f5d82fe9ea09" alt="Vendor Dashboard" />


👨‍💻 Author
This project was developed by:
M Dhanyatha Sreeraj(mdhanyatha)
K Govardhan(KantaGovardhan)
B.Tech Student
Project: Credit Card Processing System (Web App Project)

📌 Note
This project is for educational/demo purposes only. It does not handle real payments or banking-level security.






   
