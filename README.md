Tailor-made-Trip
================

Configure apache, php, mongoDB(For Mac)

  a. Download xampp package from https://www.apachefriends.org/download_success.html and install it
  
  b. Configure mongoDB, useful link: http://thatsimplecode.com/install-mongodb-driver-for-php-on-xampp-for-mac-osx/
  
    i) Install package tool for mac brew by runing command 
      [ruby -e "$(curl -fsSL https://raw.github.com/Homebrew/homebrew/go/install)"] 
    
    ii) [ brew install mongodb ]
        [ mongob ],if failed because /data/db,run [ mkdir ~/data/mongodb ] [ mongod --dbpath ~/data/mongodb ]
    
    ii) [ brew install wget ] [ brew install autoconf ] 
        [ sudo /Applications/XAMPP/xamppfiles/bin/pecl install mongo ]
    
    iii)[ cd /Applications/XAMPP/xamppfiles/etc ] [ vi php.ini ], add "extension=mongo.so" to the end.
  
  c. Restart Apache, and add phpinfo() to check.
  
  
Change Document directory of XAMPP


  [ cd /Applications/XAMPP/xamppfiles/etc ] [ subl http.conf ]
  
    DocumentRoot "/Users/zhangchuanhui/Documents/ZFWorkSpace"
    
    <Directory "/Users/zhangchuanhui/Documents/ZFWorkSpace">
    
  If you have 403 error:
  
    To fix this you can configure Apache to run as your OS X user. 
    
    Open /Applications/XAMPP/xamppfiles/etc/httpd.conf and look for the following lines:
    
    # User/Group: The name (or #number) of the user/group to run httpd as.
    # It is usually good practice to create a dedicated user and group for
    # running httpd, as with most system services.
    #
    User daemon
    Group daemon
    Change User to your OS X username, and save the file:
    
    User yourusername
    
    
Configure zend framework
    
    1. Download zend framework http://framework.zend.com/downloads/latest#ZF1, here we choose to use zend framework 1.
    
      Select Zend Framework 1.12.7 Full
      
    2.Open .bash_profile by [ subl ~/.bash_profile ],
      and add [ alias zf="path/to/ZendFramework-1.12.7/bin/zf.sh" ] -- save and exit
      
      [ source ~/.bash_profile ]
    
    3. [ zf create project path/to/ProjectName ]  -- Here the path should be same to xampp document directory
        Then, it will create several files and folders for you, which is the basic file organization of zend framework.
        
    4. Copy folder call zend in path/to/ZendFramework-1.12.7/library to you the folder libray in you project.
    
    5. Restart Apache, with url: http://localhost/ProjectName/public/, you will find a "Welcome to the Zend Framework!"
      
    [ cd path/to/ZendFramework-1.12.7/bin ]
    
    
Configure zend framework 1 and mongoDB

  Useful link http://www.masterzendframework.com/zend-framework/writing-a-simple-blog-with-zend-framework-and-mongodb
  
  1. Download Shanty-Mongo : git clone https://github.com/coen-hyde/Shanty-Mongo.git
  
  2. Copy "Shanty" folder in Shanty-Mongo/library/ to your library folder in your project in the same directory with zend.
  
  3. Copy [ "autoloaderNamespaces[] = "Shanty" ] to application.inn in YourProject/application/configs/, and put it under [ production ] module.
  
  4. Suppose you have a collection named "users" in "mydb"(db name), create a file named "Users.php" in models folder, and add 
    
  <?php

    class Users extends Shanty_Mongo_Document 
    {
        protected static $_db = 'mydb';
        protected static $_collection = 'users';
    }
  
  5. Go to the YourProject/application/controllers/IndexController.php, in "indexAction", add 
    
    try {
            $user = new Users();
            $user->name = ('test');
            $user->save();
            $all_users = Users::all();
            echo "<pre>";
            foreach ($all_users as $element) {
      			    print($element->name."<br />\n");
      			}
            echo "</pre>"; 
            exit();
        } catch (Exception $exc) {
            echo $exc->getMessage();
            echo "error";
        }
        echo "done";
    }
  6. Use browser to visit url : localhost/YourProject/public to test.
