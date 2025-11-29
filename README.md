# 🩸 Blood Donation Management System

## 📖 Description
The Blood Donation Management System is a web-based application designed to simplify and manage the process of blood donation.  
It provides secure authentication, role-based access control, and a centralized database to manage donors and administrators.  
The system ensures that donor information, including profile photos, is stored safely and can be managed efficiently by authorized personnel.

## ✨ Features

### 🔐 Authentication
- Login page for secure access to the system.
- Accounts managed with role-based privileges:
  - **Administrator** → manages the system and donor records.
  - **Donor** → registers, maintains a profile, and participates in donation activities.

### 👤 Donor Management
- Donors can create accounts with personal details and upload a profile photo.
- Each donor account is stored in the database with unique credentials.

### 🛠️ Administrator Capabilities
- View all registered donors.
- Add new donor accounts.
- Update donor information (name, blood type, contact details, photo, etc.).
- Delete donor accounts when necessary.
- Reset or set donor passwords.

### 🗄️ Database Operations
- All donor accounts are fully integrated with the database.
- Supports complete **CRUD operations**:
  - **Create** → Add new donor records.
  - **Read** → View donor details.
  - **Update** → Modify donor information.
  - **Delete** → Remove donor accounts.
