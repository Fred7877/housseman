# HOUSSEMAN
## AdminLTE
##### [doc](https://github.com/jeroennoten/Laravel-AdminLTE#51-the-adminlteinstall-command "doc")
### Installation
`composer require jeroennoten/laravel-adminlte`
`php artisan adminlte:install`
`composer require laravel/ui`
`php artisan ui:controllers`
### Installation des plugins
`artisan adminlte:plugins install`

###### Install only Pace Progress & Select2 plugin assets
`artisan adminlte:plugins install --plugin=paceProgress --plugin=select2`

###### Update all Plugin assets
`artisan adminlte:plugins update`

###### Update only Pace Progress plugin assets
`artisan adminlte:plugins update`

###### Remove all Plugin assets
`artisan adminlte:plugins remove`

###### Remove only Select2 plugin assets
`artisan adminlte:plugins remove --plugin=select2`

###### Installation des assets
`adminlte:install --force --only=assets.`

## Hash Id
`composer require vinkla/hashids`
Documentation :

([https://sampo.co.uk/blog/masking-ids-in-urls-using-hash-ids-in-laravel](https://sampo.co.uk/blog/masking-ids-in-urls-using-hash-ids-in-laravel "https://sampo.co.uk/blog/masking-ids-in-urls-using-hash-ids-in-laravel"))
