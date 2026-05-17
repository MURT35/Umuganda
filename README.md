# Umuganda Smart Service Request Platform

A web-based community service request platform built for local sector offices and campus communities to collect, categorize, assign, and track service requests.

## Live Link
https://umugandasmart.xo.je/index.html?i=1

## GitHub Repository
https://github.com/MURT35/Umuganda

## Problem Statement
In many Rwandan communities, local service issues are reported informally through phone calls or WhatsApp groups. This creates delays, forgotten requests, poor tracking, and weak accountability. Umuganda Smart solves this with a structured, trackable web platform.

## Technologies Used
- HTML5, CSS3 (Responsive)
- JavaScript (Live preview, form validation)
- PHP (MVC architecture)
- MySQLi (Database)
- InfinityFree (Hosting)

## Installation Steps

1. Clone or download the project
2. Place the project folder inside `htdocs` (XAMPP) or `www` (WAMP)
3. Import the database schema (see below)
4. Configure `config/db.php` with your DB credentials
5. Start Apache and MySQL
6. Open `http://localhost/adv_web_ass2_group_8_II_C/public/index.php`

## Database Import Steps

1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Click **New** to create a database named `umuganda_service_platform`
3. Click **Import** → choose `database/schema.sql`
4. Click **Go**

## Login Credentials (for testing)

| Role  | Username | Password |
|-------|----------|----------|
| Admin | admin    | admin123 |

## Hosting Provider
InfinityFree (https://infinityfree.com)

## Team Members and Roles

| Name | Registration Number | Role |
|------|---------------------|------|
| Murtada Othman Yosof Abdalrahman | 25/30250 | Project Manager / Team Lead |
| Yassien Hussein Yassien Hussein  | 25/32557 | Backend Developer |
| Samuel Augustino Yugu Alisandro  | 25/32685 | Frontend Developer |
| Ali Balla Elfaki Gamer           | 25/30512 | Database Developer |
| Ahmed El Mustafa Khald Osman     | 25/27896 | QA Tester |
| Azam Abdelwahab Hussein Hamid    | 25/26834 | DevOps / Deployment Engineer |

## AI Usage Declaration

### Tools Used
- ChatGPT (OpenAI)

### What AI Helped With
- MVC folder structure debugging
- Deployment guidance for InfinityFree
- Search/filter SQL query ideas
- README template suggestions

### Code Written by Students
- All HTML/CSS design and layout
- PHP controller and model logic
- Database schema design
- JavaScript live preview and validation
- Testing and bug fixes
- PDF report writing

AI was used for learning and debugging only — not as a replacement for group understanding.
