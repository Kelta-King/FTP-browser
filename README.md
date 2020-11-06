# FTP-browser
This FTP browser is an web based file manager, kinda like cpanel. FTP client can upload, download, delete, rename, edit and view all the files which has been auloaded by them using this FTP browser.
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
$ git clone git@github.com:Kelta-King/FTP-browser.git
```
**Step 3)** Paste the cloned file inside the following path
```sh
C:\xampp\htdocs\
```
**Step 4)** Start the Apache and filezilla server from xampp's admin panel
**Step 5)** Open filezilla's admin panel and do the following
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

**Step 7)** Enter the username and password which we had set previously. Click login.
**Step 8)** Now you can access the page similar to the below image, where the user can perform all the FTP tasks.

