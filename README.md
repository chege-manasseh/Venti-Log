# VentiLog: Professional Audit & Compliance Engine

## 📌 The Business Problem
In enterprise applications, data accountability is a legal and security requirement. Standard CRUD (Create, Read, Update, Delete) operations often overwrite historical data, leaving no trail of who changed what, when, or why. This "accountability gap" creates risks for fraud and regulatory non-compliance.

**VentiLog** is a decoupled PHP backend engine designed to bridge this gap by capturing immutable audit trails of sensitive business actions.

## 🚀 Key Engineering Features
- **Contract-Based Architecture:** Uses PHP Interfaces to ensure all logged events follow strict data schemas.
- **Dependency Injection:** The core Logger is decoupled from the storage mechanism, allowing for easy migration from FileSystem to Database (MySQL/PostgreSQL) without touching business logic.
- **Hierarchical Storage:** Implements automated, date-based directory partitioning (`/logs/YYYY/MM/DD/`) to optimize read/write performance as data scales.
- **Business Rule Enforcement:** Includes a `SensitiveActionService` that validates business policies (e.g., rejecting changes without a provided reason) before logging occurs.
- **PSR-4 Autoloading:** Fully compliant with modern PHP standards using Composer.

## 🛠️ Technology Stack
- **Language:** PHP 8.x (OOP)
- **Dependency Management:** Composer (PSR-4)
- **Data Format:** JSON (for portability)
- **Architecture:** Service-Oriented Logic

## 📂 Project Structure
- `src/Contract`: Interfaces defining the system "rules."
- `src/Entity`: Data Transfer Objects (DTOs) for event data.
- `src/Service`: The "Brain" of the system handling business logic.
- `src/Storage`: Low-level file handling and directory management.

## 🚦 How to Run
1. Clone the repository.
2. Run `composer dump-autoload` to initialize the class map.
3. Run `php tests/test_audit.php` to execute the business logic test suite.
4. Check the `data/logs/` directory for generated audit trails.
