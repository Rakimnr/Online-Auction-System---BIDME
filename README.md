# Online Auction Web Application (Group Project)

A role-based online auction platform built as a university group project.  
The system enables **Sellers** to list auction items, **Buyers** to bid in real time and manage shipping/payment, and **Auctioneers/Admins** to manage auction operations and categories.  
The solution was engineered as a full-stack PHP + MySQL web system with a lightweight HTML/CSS/JavaScript front end.

---

## 👥 Team (Equal Contributions)

This website is a collaborative group effort. All members contributed equally to analysis, design, implementation, testing, and documentation.

- **Rakindu Rajapksha**
- **Chenath Perera**
- **Sanjula Dilhara**
- **Thushan Shamendra**

---

## ✨ Key Features

### Public / General
- Modern landing page with a hero slider and feature highlights.
- Terms & Conditions page with expandable sections.
- Multi-role registration and login.
- Forgot-password flow.

### Buyer Capabilities
- Browse auction items by category.
- Place bids (validated against the current highest bid). :contentReference[oaicite:0]{index=0}
- View current highest bid in real time UI. :contentReference[oaicite:1]{index=1}
- Manage shipping details (add / view / edit / delete).
- Upload payments and view payment history.
- Manage buyer account (edit / delete).

### Seller Capabilities
- Upload auction items with images, base price, schedule, and category.
- View listed items and manage them (edit / delete).
- Seller account management.

### Auctioneer / Admin Capabilities
- Manage auction categories (upload category + image).
- Control auction lifecycle and platform governance.
- Auctioneer account management.

---

## 🛠️ Tech Stack

**Frontend**
- HTML5, CSS3
- JavaScript (form validation, bid validation, slider) :contentReference[oaicite:2]{index=2}

**Backend**
- PHP (session-based auth, CRUD flows)

**Database**
- MySQL / MariaDB

**Server**
- Apache (XAMPP/WAMP)

---

## 📌 System Overview (Role-Based Architecture)

- **Authentication Layer**
  - Single login endpoint routes users into Buyer/Seller/Auctioneer flows.
  - Session guard blocks unauthorized role access.

- **Auction Domain**
  - Seller listing → auction schedule → buyer bidding → payment → shipping fulfillment.

- **Data Governance**
  - Categories, products/items, bids, payments, shipping, and users are maintained in relational tables.

---

## 📂 Project Structure (Key Files)

> Your repo may include more; this list covers core modules:

### Public Pages
- `index.html` – Landing page with slider
- `login.html`, `login.php` – Login UI + logic
- `register.html`, `register.php` – Registration UI + multi-role insert
- `forget_pass.html`, `forget_pass.php` – Password reset
- `tc.html` – Terms & Conditions
- `aboutus.php` – About page
- `category.php` / `categoryitem.php` – Category listing + filtered items

### Buyer Module
- `shipping.php`, `insertshippingdetails.php`, `displayshipping.php`, `editshipping.php`, `deleteshipping.php`
- `payment.php`, `paymentupload.php`, `paymentdisplay.php`, `editpayment.php`, `deletepayment.php`
- `B_editmyaccount.php`, `B_deletemyaccount.php`

### Seller Module
- `uploadItem.html`, `uploaditem.php` – Item listing create flow
- `displayitemdetails.php`, `edititem.php`, `deleteitem.php`
- `S_editmyaccount.php`, `S_deletemyaccount.php`

### Auctioneer/Admin Module
- `category.html`, `categoryupload.php`
- `auction.php`, `auctioncontrol.php`
- `A_editmyaccount.php`, `A_deletemyaccount.php`

### Shared / Utilities
- `connect.php` – DB connection settings
- `sessionchecker.php` – Session + role guard
- `header.php`, `footer.php` – Shared layout
- `script.js` – Slider + register validation + bid validation :contentReference[oaicite:3]{index=3}

---

## 🚀 Getting Started (Local Setup)

> This guide assumes XAMPP. Adjust paths if using WAMP/LAMP.
