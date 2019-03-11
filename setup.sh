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
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Install PHP
apt-get install -y php7.2

# PHP Apache Mod
apt-get install -y libapache2-mod-php7.2

# Restart Apache
service apache2 restart

# PHP-MYSQL lib
apt-get install -y mysql-server
apt-get install -y php7.2-mysql

# Setup database
sudo mysql -e "CREATE USER IF NOT EXISTS 'loag'@'localhost';"
sudo mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'loag'@'localhost' WITH GRANT OPTION;"
sudo mysql -e "CREATE DATABASE IF NOT EXISTS loag;"
sudo service mysql restart

# Import bootstrap SQL
sudo mysql loag < /var/www/html/sql/employee.sql
sudo mysql loag < /var/www/html/sql/line_to_useplan.sql
sudo mysql loag < /var/www/html/sql/line.sql
sudo mysql loag < /var/www/html/sql/rollmaterial.sql
sudo mysql loag < /var/www/html/sql/station_to_line.sql
sudo mysql loag < /var/www/html/sql/station.sql
sudo mysql loag < /var/www/html/sql/useplan_to_employee.sql
sudo mysql loag < /var/www/html/sql/useplan_to_rollmaterial.sql
sudo mysql loag < /var/www/html/sql/useplan.sql

# Restart Apache
sudo systemctl restart apache2.service
