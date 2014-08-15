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
