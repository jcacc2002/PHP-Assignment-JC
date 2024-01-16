# PHP Assignment JC
This project is a web-based application developed in PHP, designed to provide a comprehensive e-commerce platform. It encompasses various functionalities ranging from user authentication to product management, offering a seamless shopping experience.

## Key Features and Descriptions

### 1. User Authentication
- **Files Involved:** signin.php, signup.php
- **Functionality:** These files handle user sign-in and sign-up processes, ensuring secure access to the user's account. They manage form submissions, user session initiation, and include other shared functionalities for a streamlined process.

### 2. Product Management
- **Files Involved:** product.php, products.php
- **Functionality:** These files are responsible for managing individual and multiple product listings. They enable users to view product details, interact with multiple products, and handle related form submissions. Database interactions are crucial here for fetching and updating product details.

### 3. Order Processing
- **Files Involved:** orders.php
- **Functionality:** This file manages the order-related functionalities. It processes user orders, interacts with the database for order retrieval and management, and uses sessions for tracking user orders.

### 4. Shopping Cart Management
- **Files Involved:** shoppingcart.php
- **Functionality:** Manages the shopping cart features, maintaining the state of the user's cart across sessions and facilitating a smooth shopping experience.

### 5. User Account Management
- **Files Involved:** editdetails.php
- **Functionality:** Handles the editing and updating of user account details. It manages form submissions related to user detail changes and uses sessions for authentication.

### 6. Wishlist Feature
- **Files Involved:** wishlist.php
- **Functionality:** Manages the wishlist features for users, allowing them to save and manage their preferred products easily.

### 7. Landing Page
- **Files Involved:** index.php
- **Functionality:** Serves as the main entry point of the application. It initializes user sessions and includes other files to present a comprehensive landing page.

---

### Accessing the Project Using XAMPP

#### Prerequisites
- XAMPP: Ensure you have XAMPP installed on your machine.

#### Steps to Access
1. **Start XAMPP:** Launch XAMPP Control Panel and start the Apache and MySQL services. Ensure they are running without errors.

2. **Place Project Files:** Copy project files (PHP files, etc.) into the `htdocs` directory located in your XAMPP installation directory. For example, if you installed XAMPP in `C:\xampp`, the path would be `C:\xampp\htdocs\PHP-Assignment-JC`.

3. **Access the Project:** Open a web browser and navigate to `http://localhost/PHP-Assignment-JC`. This URL directs to the index.php file in your project folder within `htdocs`. If everything is set up correctly, you should see your project running.