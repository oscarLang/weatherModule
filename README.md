# Weather module for the anax framework
`composer require osln/weather`

The module can be installed by running a postprocces script

`bash /vendor/osln/weather/.anax/scaffold/postprocces.d/350_weather.bash`
# Manual installation

Stand in the root directory of the anax framework.

1: Copy the configuration files

`rsync -av vendor/osln/weather/config/di ./config/di`

`rsync -av vendor/osln/weather/config/router ./config/router`

2: Copy the view files

`rsync -av vendor/osln/weather/view/ view/osln/weather`

3: Install leaflet

`cd $PWD/vendor/osln/weather/ | npm install`

4: Copy leaflet css files and images

`rsync -av vendor/osln/weather/node_modules/leaflet/dist/leaflet.css htdocs/css/`

`rsync -av vendor/osln/weather/node_modules/leaflet/dist/images/ htdocs/css/images/`
