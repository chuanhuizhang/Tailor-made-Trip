Tailor-made-Trip
================

私人定制游 [php, mongoDB, bootstrap]

1. Configure apache, php, mongoDB(For Mac)
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
