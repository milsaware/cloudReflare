# cloudReflare

Combining the power of the ipData and CloudFlare APIs, cloudReflare automatically checks for IPv4 address changes and updates cloudFlare IPv4 A Name records accordingly. Works across multiple CloudFlare accounts, zones and records simultaneously.

Available for Windows, Linux and browser.

-----

**No installation**

Simply download and unzip. Open either the **LINUX** or the **WINDOWS** (depending on your operating system) directory and run **cloudReflare**(.exe). For developers or MAC users, the source code is also provided so you can run it in your own server stack environment.

-----

**Server/Browser Use**

A server with access to one directory above the public folder is required to install and use this script. Upload the contents of httpd.www to your public folder, upload httpd.private to one directory above your public directory. Your public directory may be named something other than **httpd.www**. It may, for instance, be called **public** or your **username**. If this is the case you must open **httpd.private/system/bootstrap.php** and change all instances of **httpd.www** to the name of your public directory. Do the same for **httpd.private** to whatever your private directory is called.

-----

## How to use

I've tried to make the UI as user friendly as possible

### Language select

![language_select](https://user-images.githubusercontent.com/95859352/219932034-05dd4794-751e-4115-999a-ff505b382a88.png)

cloudReflare comes with 7 built-in languages. In the top left corner we have the language selection. A simple click and select will change the language of the app and remember the choice, so you only need to set it once.

-----

### Help

In the top right corner, you'll see a question mark. Click on this to view the help page. Click anywhere on the help page to go back.

-----

### ipData API key

In order to use this software, you will need an ipData account. It's quick and free to sign-up and use.

- To begin, go to [ipdata.co](https://ipdata.co).
- Click **Sign Up For Free** in the top right hand corner.
- On the following screen, add in your **email address** and **password**.
- **Verify** your email address.
- Sign in to your **ipdata** account.
- In the menu on the left hand side of the dashboard, click **API Settings**.
- On the following page, your **API key** will be displayed. Enter that in the **ipdata API key input**.

-----

### CloudFlare

**Zone ID**

- Sign in to your **CloudFlare** account.
- Select the **domain** you wish to work on.
- In **Quick actions** on the right of the **Overview** screen, scroll down to **API**. Your **Zone ID** will be listed there. Copy that into the **CloudFlare zone ID input** field.

**Global API Key**

- Go to [dash.cloudflare.com/profile/api-tokens](https://dash.cloudflare.com/profile/api-tokens).
- Click the **view** button for **Global API Key**. Copy the key into the **CloudFlare global API key input**

**DNS A Name**

- Next, go to your **DNS records** and copy the **name** field of your **A record** to the **CloudFlare DNS Name input**.

**email address**

- Finally, add in the **email address** associated with the **CloudFlare account**.

**Multiple Records**

If you want to add multiple records, click on **Add another record** and **repeat** the **above** steps for **each** record.

**Delete Record**

Does exactly what it says ... clicking this will delete the current record being viewed.

**Record Select**

Selects a record to view, edit or delete

-----

### Current IPv4 Address

This field is optional. You can insert your current IPv4 address here or you can leave it blank and allow the app to find it for you.

-----

### Refresh rate

Set the number of **minutes** between checks. The **default** is 10 minutes, the **minimum** requirement is **1** minute.

-----

### Save settings

All the fields, apart from the **Current IPv4 address** field, must be filled in in order for you to save the settings and begin monitoring. Once you're sure they're correct, click **Save settings**

-----

### Begin monitoring

Click this to start the monitor. The software will now check for local IPv4 address changes. If a change is detected, the new IPv4 address will be stored and the CloudFlare records will be changed. This software will only change the IPv4 address in the record, all other fields will remain in their current state. If there is no change in your IPv4 address, no other actions will be taken. These actions will repeat every x minutes, depending on how you've set the timer. You can leave the app minimised and running in the background. On Windows, the app will minimise to the tray and will ensure your IPv4 address is up to date while you work.

If any of the fields have been set incorrectly, the monitor will display a warning.

-----

### Screenshots

![screenshot](https://user-images.githubusercontent.com/95859352/219935389-e7537c8a-fee0-47c8-b91a-94d2d03b3e67.png)

-----

#### Stack

SQLite, PHP, Javascript, HTML, CSS

#### Framework

ozboware PHP MVCF 1.5.0

#### Version

1.0.0

-----

**Powered by [PHPDesktop](https://github.com/cztomczak/phpdesktop)**
