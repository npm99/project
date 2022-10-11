<h3>config server</h3>
<p>sudo apt install software-properties-common</p>
<p>sudo add-apt-repository ppa:ondrej/php</p>
<p>sudo apt install php7.3-fpm</p>
<p>php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"</p>
<p>php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"</p>
<p>php composer-setup.php</p>
<p>php -r "unlink('composer-setup.php');"</p>
<p>sudo mv composer.phar /usr/local/bin/composer</p>
<p>sudo apt install nginx</p>
<p>sudo apt install openssl php7.3.-common php7.3-curl php7.3.-json php7.3-mbstring php7.3-mysql php7.3-xml php7.3-zip php7.3-dom php7.3-ext-zip php7.3-gd</p>
<p>sudo nano /etc/nginx/sites-enabled/default</p>
<br>
<pre>
server {
    listen 8080;
    server_name 203.158.201.67;
    index index.php index.html;
    root /var/www/html/project/public;

    location ~* \.(jpg|jpeg|gif|css|png|js|ico|html)$ {
	access_log off;
	expires max;
	log_not_found off;
    }

    # removes trailing slashes (prevents SEO duplicate content issues)
    if (!-d $request_filename)
    {
	rewrite ^/(.+)/$ /$1 permanent;
    }

    # enforce NO www
    if ($host ~* ^www\.(.*))
    {
	set $host_without_www $1;
	rewrite ^/(.*)$ $scheme://$host_without_www/$1 permanent;
    }

    # unless the request is for a valid file (image, js, css, etc.), send to bootstrap
    if (!-e $request_filename)
    {
	rewrite ^/(.*)$ /index.php?/$1 last;
	break;
    }

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;

    }
}
</pre>
<pre>
cd /var/www/html/project
cp .env.example .env
sudo nano .env

php artisan cache:clear
php artisan config:clear
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 755 bootstrap/cache
</pre>
<pre>
ตัวที่เปลี่ยนข้อมูล .env
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tqf
DB_USERNAME=tqf
DB_PASSWORD=tqf1234
</pre>

sudo php artisan key:generate

<h4>ฐานข้อมูล</h4>

<pre>
sudo apt install mariadb-server
sudo mysql_secure_installation
sudo mariadb
GRANT ALL ON *.* TO 'tqf'@'localhost' IDENTIFIED BY 'tqf1234' WITH GRANT OPTION;
</pre>
