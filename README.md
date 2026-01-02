# 🔎 Lost and Found Portal

A simple web-based **Lost and Found Portal** built using **PHP and MySQL**, where users can report lost or found items in public places and search for them easily.

---

## 📌 Project Overview

This project allows users to:
- Post details of **lost or found items**
- Upload an **image** of the item
- Search items by **location, category, or status**
- Contact the person who posted the item

It is designed as a **beginner-friendly full-stack project** suitable for academic submissions and portfolios.

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** Apache (XAMPP)

---

## ✨ Features

- Post lost or found items
- Upload item images
- Secure form handling with validation
- Duplicate entry prevention
- Image upload restrictions (size & format)
- MySQL database integration
- Prepared statements for security

---
## 📂 Project Structure

---

## 🗄️ Database Structure

**Database Name:** `lost_and_found`

**Table:** `items`

| Column Name     | Type |
|----------------|------|
| id             | INT (Primary Key) |
| item_name      | VARCHAR |
| category       | VARCHAR |
| status         | ENUM (Lost/Found) |
| location       | VARCHAR |
| date_reported  | DATE |
| description    | TEXT |
| image_path     | VARCHAR |
| contact_info   | VARCHAR |
| created_at     | TIMESTAMP |

---

## 🔐 Security Measures

- Server-side form validation
- Prepared statements to prevent SQL Injection
- Image upload validation (type & size)
- Duplicate entry prevention (same item, same day)
- Restricted file formats (JPG, JPEG, PNG)

---

## 🚀 How to Run the Project

1. Install **XAMPP**
2. Start **Apache** and **MySQL**
3. Place the project inside:



---

## 🎓 Learning Outcomes

- PHP form handling using `$_POST` and `$_FILES`
- Secure image upload techniques
- MySQL database operations
- Prepared statements
- Backend validation and error handling
- Full-stack project structure

---

## 🔮 Future Enhancements

- User authentication system
- Admin moderation panel
- Email notifications
- Advanced search filters
- UI improvements using Bootstrap

---

## 👩‍💻 Author

**Megha Ajith**  
B.Tech Electronics and Communication Engineering  
Interested in Python, Automation, and Full-Stack Development

---

