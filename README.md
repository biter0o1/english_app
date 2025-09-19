English_app ...



sudo a2enmod rewrite
sudo systemctl restart apache2


        <Directory /var/www/html/english_app/public>
            AllowOverride All
            Require all granted
        </Directory>
