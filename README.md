# FTP-Browser

![](https://img.shields.io/badge/Code-JavaScript-informational?style=for-the-badge&logo=javascript&color=yellow) ![](https://img.shields.io/badge/Code-php-informational?style=for-the-badge&logo=php&color=787CB5) ![](https://img.shields.io/badge/Database-MySQL-informational?style=for-the-badge&logo=mysql&logoColor=white&color=f29111)

FTP-Browser is a web browser based File manager which manages the files stored in server device. A client can upload, download, rename, delete files and create folders using ftp protocol in this application. This application is developed in PHP and JS (For ajax). FTP connection requires username and password which can be generated using filezilla's ftp server.

## Requirements
  - ![Xampp server](https://www.apachefriends.org/download.html)
  - A text editor

**Note:** Xampp server includes filezilla server.
## How to execute

**Step 1)** Install Xampp server

**Step 2)** Clone this repo
```sh
$ git clone https://github.com/Kelta-King/FTP-browser.git
```
**Step 3)** Paste the cloned file inside the following path
```sh
C:\xampp\htdocs\
```

**Step 4)** Start the Xampp server. It has 5 modules. Start the Apache and filezilla.

<p align="center">
<img src="https://github.com/Kelta-King/Kelta-King/blob/master/Images/Xampp.PNG">
</p>


**Step 5)** Open filezilla's admin panel and do the following
<p align="center">
<img src="https://github.com/Kelta-King/Kelta-King/blob/master/Images/Xampp_admin.jpg">
</p>


- Goto Edit->Users
- Click add under the users
- Add the username as "useraccount1" and press ok.
- Tick the checkbox of password and set the password as "password".
- Now, from the page: panel goto shared folders
- click on add and set the path to the folder where the client can handle tasks.
- Select all the checkboxes for files and directories.
- click on Set home dir button.
- Now, click add button under the user's section.

Now, you have created an account for client.


**Step 6)** Open the following link in the browser
```sh
http://localhost:<port_number>/FTP-Browser/
```
You can see a screen like this.
<p align="center">
<img src="https://github.com/Kelta-King/Kelta-King/blob/master/Images/ftp_browser.PNG">
</p>


**Step 7)** Enter the username and password which we had set previously. Click login.

**Step 8)** Now you can access the page similar to the below image, where the user can perform all the FTP tasks.
<p align="center">
<img src="https://github.com/Kelta-King/Kelta-King/blob/master/Images/Ftp_browser_fm.PNG">
</p>

## Which button do what?
- Upload File: Uploads a file in the current directory.
- New Folder: Creates a new Folder in the current directory.
- Previous Folder: Goes back to the parent folder.
- Root Folder: Goes back to the root for this file  system.
- Download: Downloads the file in E drive.
- Remove: Removes the file or folder.
- Rename: Renames the file or folder.
