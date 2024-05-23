<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## COLORS

COLORS is a blogging website which is mainly developed to publish art blogs and to administer the process of publishing blogs related to the art world.

It was developed on Laravel 10. The database was MySQL and XAMPP was used.

It has three main parts:

- The Home side
- The User side
- The Admin side

The website opens on the Home page and which shows the various aspect of this website alongside the published blogs. When logged in as a User it will show the User Dashboard and other maintainace sections. When logged in as an Admin it will show the Admin Dashboard and some maintaining sections related to Admin

- Admin Login:

Email: admin@gmail.com
Password: 123456


- User Login:

Email: user@gmail.com
Password: 123456


## Home part:

The Home page contains 
- Introduction
- What we offer (Quick access by link About Us)
- Learn about Us (Quick access by link About Us)
- Upcoming Exhibition
- Our teams (Quick access by link Our Teams)
- Testemonial
- Latest Blogs (Quick access by link Our Blog)

It also contains some pages as 
- Art Supplies (Contains blogs related to art supplies)
- Arts (Contains blogs related to arts)
- Artists (Contains blogs related to differenct artists)
- Art Techniques (Contains blogs related to differenct art techniques)
- Gallery (Contains some pictures of the activities arranged)
- Contact (People can directly mail us from this)


## Admin part:

It contains the following sections:

- Dashboard: 
It shows total Blog Posts, total Comments, total Blog Writers.
It shows a line graph on the basis of total blog posts, total comments, total Blog Writers on basis of time.
It shows a bar diagram on User Blogging activity (shows the users who have created blogs on basis of time).
It shows a pie chart about the Categories and total blogs related to those categories.

- Users:   
Create new Users
Update existing Users
Delete existing Users

- Category: 
Create new Category
Update existing Category
Delete existing Category

- Blogs: 
Create new Blogs
Update existing Blogs
Delete existing Blogs

- Page: 
Create new Page
Update existing Page

- Change Password

- Account Settings

- Need Help?

- Logout


## User part:

- Dashboard: 
It shows total Blog Posts written by this User, total Comments on the blogs of this User.
It shows a line graph on the basis of total blog posts, total comments, total Blog Writers on basis of time.

- Blogs: 
Create new Blogs
Update existing Blogs
Delete existing Blogs

- Change Password

- Account Settings

- Need Help?

- Logout


## Database:

6 tables are used:

### users table:

- id (bigint(20)) Primary key (auto increment)
- name (varchar(255))
- email (varchar(255))
- emaill_verified_at (timestamp)
- password (varchar(255))
- remember_token (varchar(100))
- profile_pic (varchar(100))
- profile_identity (varchar(255))
- profile_description (longtext)
- remarks (varchar(255))
- is_admin (tinyint(4))
- status (tinyint(4))
- is_delete (tinyint(4))
- created_at (timestamp)
- updated_at (timestamp)

### category table

- id (int(11)) PRIMARY KEY (auto increment)
- name (varchar(255))
- slug (varchar(255))
- title (varchar(255))
- meta_title (varchar(255))
- meta_description (varchar(1000))
- meta_keywords (varchar(255))
- status (tinyint(4))
- is_menu (tinyint(4))
- is_delete (tinyint(4))
- created_at (datetime)
- updated_at (datetime)


### blog table:

- id (int(11)) PRIMARY KEY (auto increment)
- user_id (int(11)) FOREIGN KEY references users(id)
- title (varchar(255))
- slug (varchar(255))
- category_id (int(11)) FOREIGN KEY references category(id)
- image_file (varchar(255))
- description (longtext)
- meta_description (varchar(1000))
- meta_keywords (varchar(255))
- is_publish (tinyint(4))
- status (tinyint(4))
- is_delete (tinyint(4))
- created_at (datetime)
- updated_at (datetime)

### blog_comment table

- id (int(11)) PRIMARY KEY (auto increment)
- user_id (int(11)) FOREIGN KEY references users(id)
- blog_id (int(11)) FOREIGN KEY references blog(id)
- comment (text)
- created_at (datetime)
- updated_at (datetime)

### blog_comment_reply table

- id (int(11)) PRIMARY KEY (auto increment)
- user_id (int(11)) FOREIGN KEY references users(id)
- comment_id (int(11)) FOREIGN KEY references blog_comment(id)
- comment (text)
- created_at (datetime)
- updated_at (datetime)

### blog_tags table:

- id (int(11)) PRIMARY KEY (auto increment)
- blog_id (int(11)) FOREIGN KEY references blog(id)
- name (varchar(255))
- created_at (datetime)
- updated_at (datetime)

### page table:

- id (int(11)) PRIMARY KEY (auto increment)
- slug (varchar(255))
- title (varchar(255))
- description (longtext)
- meta_title (varchar(255))
- meta_description (text)
- meta_keywords (varchar(255))
- created_at (datetime)
- updated_at (datetime)

## Schema Diagram:

![schema](https://github.com/HafsaTazrian/Laravel-Project---Colors/assets/170466716/ef40dc61-20d5-4bfd-b4be-29b6ba576a3d)
