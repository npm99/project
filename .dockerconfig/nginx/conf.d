server {
    listen 8080;
    server_name 203.158.201.67;
    index index.php index.html;
    root /var/www/html/tqf-rmuti-kkc/public;
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
    fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
    fastcgi_index index.php;
    include fastcgi_params;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    fastcgi_param PATH_INFO $fastcgi_path_info;

}
}
