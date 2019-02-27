# Set environment variable
DEBIAN_FRONTEND=noninteractive

# Update Packages
apt-get update

# Upgrade Packages
apt-get dist-upgrade

# Apache
apt-get install -y apache2

# Enable Apache Mods
a2enmod rewrite

# Install PHP
apt-get install -y php7.2

# PHP Apache Mod
apt-get install -y libapache2-mod-php7.2

# Restart Apache
service apache2 restart

# PHP Mods
apt-get install -y php7.2-xml
apt-get install -y php7.2-common
apt-get install -y php7.2-zip

# PHP-MYSQL lib
apt-get install -y php7.2-mysql
apt-get install -y mysql-server

# Restart Apache
sudo systemctl restart apache2.service
